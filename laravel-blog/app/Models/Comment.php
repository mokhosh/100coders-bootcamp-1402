<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'body',
    ];

    public static function booted()
    {
        static::addGlobalScope('moderated', fn ($q) => $q->whereNotNull('moderated_at'));
    }
}
