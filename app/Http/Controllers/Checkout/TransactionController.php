<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use Xendit\Configuration;
use Xendit\Invoice\InvoiceApi;


class TransactionController extends Controller
{
    private $keyApi;
    
    public function checkoutPage(Package $package)
    {
        return view('frontend.checkouts.checkout', [
            'package' => $package
        ]);
    }

    public function checkout()
    {
        
    }
}
