<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    const STATUS_MAP = [
        'paid' =>  'PAID', 
        'pending' => 'PENDING', 
        'expired' => 'EXPIRED',
        'settled' => 'SETTLED'
    ];

    const PAYMENT_METHODS_MAP = ["CREDIT_CARD", "BCA", "BNI", "BSI", 
        "BRI", "MANDIRI", "PERMATA", "SAHABAT_SAMPOERNA", "BNC", "ALFAMART", 
        "INDOMARET", "OVO", "DANA", "SHOPEEPAY", "LINKAJA", "JENIUSPAY", "DD_BRI", 
        "DD_BCA_KLIKPAY", "KREDIVO", "AKULAKU", "UANGME", "ATOME", "QRIS"
    ];

    protected $fillable = [
        'invoice_id', 'package_id', 'amount', 'currency', 'description', 'invoice_duration',
        'payment_methods'
    ];

    protected $casts = [
        'payment_methods' => 'array'
    ];
}
