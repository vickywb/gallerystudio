<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title', 'slug', 'description'
    ];

    //Relationship
    public function blogImages(): HasMany
    {
        return $this->hasMany(BlogImage::class);
    }
    
    //Accessor
    public function firstImage(): Attribute
    {
        return new Attribute (
           get: fn() => $this->blogImages()->first()
        );
    }
}
