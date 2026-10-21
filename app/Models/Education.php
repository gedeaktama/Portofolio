<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'educations';

    protected $fillable = [
        'degree',
        'institution',
        'field_of_study',
        'start_year',
        'end_year',
        'description',
        'order',
        'is_visible',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
        'order' => 'integer',
    ];

    public function scopeVisible($query)
    {
        return $query->where('is_visible', true)->orderBy('order')->orderByDesc('start_year');
    }
}
