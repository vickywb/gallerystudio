<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

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
            fn () => Storage::url($this->location)
        );
    }
}
