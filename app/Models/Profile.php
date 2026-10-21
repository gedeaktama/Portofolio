<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'nickname',
        'title_prefix',
        'title_suffix',
        'primary_role',
        'secondary_role',
        'tertiary_role',
        'business_role',
        'tagline',
        'short_bio',
        'full_bio',
        'avatar_url',
        'cv_file_url',
        'location',
        'email',
        'phone',
        'whatsapp',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
