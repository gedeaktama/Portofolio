<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'position',
        'organization',
        'category',
        'start_date',
        'end_date',
        'is_current',
        'description',
        'order',
        'is_visible',
    ];

    protected $casts = [
        'is_current' => 'boolean',
        'is_visible' => 'boolean',
        'order' => 'integer',
    ];

    public function scopeVisible($query)
    {
        return $query->where('is_visible', true)->orderBy('order')->orderByDesc('start_date');
    }
}
