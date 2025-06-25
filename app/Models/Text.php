<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    /** @use HasFactory<\Database\Factories\TextFactory> */
    use HasFactory;
       /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'slug',
        'title',
        'text',
        'order'
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
      /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

    static::addGlobalScope('order', function ($builder) {
        $builder->orderBy('order');
    });

        // Automatically generate slug from title when creating
        static::creating(function ($text) {
            if (empty($text->slug)) {
                $text->slug = Str::slug($text->title);
                
                // Make sure slug is unique
                $originalSlug = $text->slug;
                $count = 1;
                
                while (static::where('slug', $text->slug)->exists()) {
                    $text->slug = $originalSlug . '-' . $count;
                    $count++;
                }
            }
        });
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Scope a query to find by slug.
     */
    public function scopeBySlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }
}
