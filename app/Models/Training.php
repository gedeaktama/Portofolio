<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Training extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'theme',
        'organizer',
        'role',
        'event_date',
        'location',
        'description',
        'image_url',
        'slides_url',
        'certificate_url',
        'is_featured',
        'order',
    ];

    protected $casts = [
        'event_date' => 'date',
        'is_featured' => 'boolean',
        'order' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->title);
            }
        });
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true)->orderByDesc('event_date')->orderBy('order');
    }
}
