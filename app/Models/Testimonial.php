<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'author', 'role', 'company', 'quote', 'photo',
        'is_featured', 'is_active', 'order',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true)->where('is_active', true)->orderBy('order');
    }
}
