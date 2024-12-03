<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::paginate(5);

        return view('admin.transactions.index', [
            'transactions' => $transactions
        ]);
    }

    public function edit(Transaction $transaction)
    {
        $statusMaps = Transaction::STATUS_MAP;

        return view('admin.transactions.edit', [
            'transaction' => $transaction,
            'statusMaps' => $statusMaps
        ]);
    }

    public function update(Request $request, Transaction $transaction)
    {
        $data = $request->only([
            'status'
        ]);

        try {
            DB::beginTransaction();
            
            $transaction->update($data);
            $transaction->save();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors([
                'errors' => $th->getMessage()
            ]);
        }

        return to_route('admin.transaction.index')->with([
            'success' => 'Transaction Status has been updated.'
        ]);
    }
}
