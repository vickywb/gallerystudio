<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Portofolio extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id', 'title', 'slug', 'description'
    ];

    //Relationship
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function portofolioImages(): HasMany
    {
        return $this->hasMany(PortofolioImage::class);
    }
    
    //Accessor
    public function firstImage(): Attribute
    {
        return new Attribute (
           get: fn() => $this->portofolioImages()->first()
        );
    }
}
