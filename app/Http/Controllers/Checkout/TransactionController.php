<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use App\Models\CustomerDetail;
use App\Models\Package;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Xendit\Configuration;
use Xendit\Invoice\CreateInvoiceRequest;
use Xendit\Invoice\InvoiceApi;
use Xendit\Invoice\InvoiceCallback;

class TransactionController extends Controller
{
    public function __construct() 
    {
       Configuration::setXenditKey(env('XENDIT_SECRET_KEY'));
    }
    
    public function checkoutPage(Package $package, Transaction $transaction)
    {
        return view('frontend.checkouts.checkout', [
            'package' => $package,
            'transaction' => $transaction
        ]);
    }

    public function checkoutStore(Request $request, Package $package, Transaction $transaction)
    {
        $date = Carbon::now()->format('dmY');
        $invoice_id = 'INV' . '/' . $date . '/' . 'ABC' . '/' . time();
        $currency = 'IDR';
        $external_id = 'Invoice' . '-' . time();
        $description = 'Invoice' . '-' . $package->title . '-' . time();
        $invoiceDuration = 86400;
        $status = Transaction::STATUS_PENDING;

        try {
           DB::beginTransaction();
           
            $apiInstance = new InvoiceApi();
            $createInvoiceRequest = new CreateInvoiceRequest([
                'external_id' => $external_id,
                'description' => $description,
                'amount' => $request->amount,
                'invoice_duration' => 86400,
                'currency' => $currency,
                'payer_email' => $request->email,
                'status' => 'PENDING',
                'success_redirect_url' => 'http://127.0.0.1:8000/package',
                'failure_redirect_url' => 'http://127.0.0.1:8000',
                'customer' => [
                    'phone_number' => $request->phone_number,
                    'given_names' => $request->name,
                    'email' => $request->email,
                    'mobile_number' => $request->phone_number,
                ],
            ]);
            $generateInvoice = $apiInstance->createInvoice($createInvoiceRequest);

            $invoice_url = $generateInvoice['invoice_url'];
            $transaction = Transaction::create([
                'invoice_id' => $invoice_id,
                'external_id' => $external_id,
                'package_id' => $package->id,
                'amount' => $request->amount,
                'currency' => $currency,
                'invoice_duration' => $invoiceDuration,
                'description' => $description,
                'invoice_url' => $invoice_url
            ]);
            $transaction->save();

            $customerDetail = CustomerDetail::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'city' => $request->city,
                'address_1' => $request->address1,
                'address_2' => $request->address2
            ]);
            $customerDetail->save();

            $transactionDetail = TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'customer_detail_id' => $customerDetail->id,
                'gross_amount' => $transaction->amount,
                'transaction_status' => Transaction::STATUS_PENDING
            ]);
            $transactionDetail->save();

           DB::commit();
        } catch (\Xendit\XenditSdkException $e) {
            DB::rollBack();
    
            return redirect()->back()->withErrors([
                'errors' => $e->getMessage()
            ]);
        }
        return to_route('payment.page', $transaction);
    }

    public function paymentPage(Transaction $transaction)
    {
        return view('frontend.checkouts.payment', [
            'transaction' => $transaction
        ]);
    }

    public function callbakNotification(Request $request)
    {
        $getToken = $request->headers->get('x-callback-token');
        $callbackToken = env('XENDIT_CALLBACK_TOKEN');

        if (!$callbackToken) {
            return response()->json([
                'status' => 'Error',
                'message' => 'Callback Token Xendit is not Exists'
            ], 400);
        }

        if ($getToken !== $callbackToken) {
            return response()->json([
                'status' => 'Error',
                'message' => 'Callback Token is Invalid'
            ], 401);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Callback Sent'
        ], 200);

        // Log incoming payload for debugging
        Log::info('Xendit Callback Payload', $request->all());

        try {
            DB::beginTransaction();

            $transaction = Transaction::where('external_id', $request->external_id)->first();
            
            if (!$transaction) {
                Log::error('Transaction not found for external_id: ' . $request->external_id);
                return response()->json(['error' => 'Transaction not found'], 404);
            }

            if ($transaction) {
                if ($request->status === 'PAID') {
                    $transaction->status(['status' => $request->status]);
                    // $transaction->status = 'PAID';

                } else {
                    $transaction->update(['status' => $request->status]);
                    // $transaction->status = 'FAILED';
                }
            }
           
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json([
                'status' => 'Error',
                'message' => $th->getMessage()
            ], 500);
        }

        return response()->json([
            'status' => 'success', 
            'message' => 'Transaction updated'
        ], 200);

    }

    public function paymentSuccess()
    {
        return view('frontend.checkouts.success');
    }

    public function paymentFailed()
    {
        return view('frontend.checkouts.failed');
    }
}
