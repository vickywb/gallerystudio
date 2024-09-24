<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_id', 'blog_id'
    ];

    //Relationship
    public function file(): BelongsTo
    {
        return $this->belongsTo(File::class);
    }

    public function blog(): BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }

    //Acessor
    protected function showFile(): Attribute
    {
        return new Attribute (
            fn () => Storage::url($this->file->location)
        );
    }
}
