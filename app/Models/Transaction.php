<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    const STATUS_PENDING = 'PENDING';
    const STATUS_PAID = 'PAID';
    const STATUS_FAILED = 'FAILED';

    const STATUS_MAP = [
        'paid' =>  'PAID', 
        'pending' => 'PENDING', 
        'expired' => 'EXPIRED',
        'settled' => 'SETTLED'
    ];

    protected $fillable = [
        'invoice_id', 'package_id', 'amount', 'currency', 'description', 'invoice_duration',
        'invoice_url', 'external_id'
    ];

    protected $casts = [
        'payment_methods' => 'array'
    ];

    //Relationship
    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }
}
