<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PortofolioImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_id', 'portofolio_id'
    ];

    //Relationship
    public function file(): BelongsTo
    {
        return $this->belongsTo(File::class);   
    }

    public function portofolio(): BelongsTo
    {
        return $this->belongsTo(Portofolio::class);
    }
}
