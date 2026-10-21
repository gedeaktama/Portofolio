<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Publication extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'authors',
        'is_first_author',
        'publication_year',
        'journal_name',
        'indexing_status',
        'volume',
        'issue',
        'pages',
        'doi',
        'url',
        'abstract',
        'keywords',
        'category',
        'file_path',
        'is_published',
        'order',
    ];

    protected $casts = [
        'is_first_author' => 'boolean',
        'is_published' => 'boolean',
        'publication_year' => 'integer',
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

    public function scopePublished($query)
    {
        return $query->where('is_published', true)->orderByDesc('publication_year')->orderBy('order');
    }
}
