<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PackageDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'person', 'session', 'photo_shoot', 'edited_photo', 'studio', 
        'digital_photo', 'printed_photo', 'package_id'
    ];

    //Relationship
    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }
}
