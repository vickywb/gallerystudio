<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

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
    
    //Accessor
    protected function showFile(): Attribute
    {
        return new Attribute (
            get: fn () => Storage::url($this->file->location)
        );
    }
}
