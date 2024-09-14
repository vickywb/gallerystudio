<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'location'
    ];

    //Relationship
    public function abouts(): HasMany
    {
        return $this->hasMany(About::class);
    }

    public function portofolioImages(): HasMany
    {
        return $this->hasMany(PortofolioImage::class);
    }

    public function blogImages(): HasMany
    {
        return $this->hasMany(BlogImage::class);
    }

    //Attribute
    protected function locationFile(): Attribute
    {
        return new Attribute (
            get: fn () => 'file/' . $this->location . '/' . $this->name ,
        );
    }

    protected function showFile(): Attribute
    {
        return new Attribute (
            get: fn () => Storage::url($this->location)
        );
    }
}
