<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class PortfolioProject extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'project_category_id',
        'title',
        'slug',
        'problem_statement',
        'solution_description',
        'technologies',
        'key_features',
        'image_url',
        'demo_url',
        'repository_url',
        'status',
        'is_featured',
        'order',
    ];

    protected $casts = [
        'technologies' => 'array',
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

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProjectCategory::class, 'project_category_id');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true)->orderBy('order');
    }
}
