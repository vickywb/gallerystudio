<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Xendit\Configuration;
use Xendit\Invoice\InvoiceApi;


class TransactionController extends Controller
{
    private $keyApi;
    
    public function checkoutPage(Package $package, Transaction $transaction)
    {
        $paymentChannels = Transaction::PAYMENT_METHODS_MAP;

        return view('frontend.checkouts.checkout', [
            'package' => $package,
            'paymentChannels' => $paymentChannels,
            'transaction' => $transaction
        ]);
    }

    public function checkout(Request $request, Package $package)
    {
        $invoiceId = 'Order' . '-' . time();
        dd($invoiceId);
        dd($package->id);
        dd($request->all());
    }
}
