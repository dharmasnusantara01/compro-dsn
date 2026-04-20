<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class CaseStudy extends Model
{
    use HasSlug, SoftDeletes;

    protected $fillable = [
        'title', 'slug', 'client', 'category', 'cover', 'gallery',
        'content', 'results', 'date', 'is_featured', 'is_active',
        'seo_title', 'seo_description',
    ];

    protected $casts = [
        'gallery' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'date' => 'date',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->latest('date');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true)->where('is_active', true)->latest('date');
    }
}
