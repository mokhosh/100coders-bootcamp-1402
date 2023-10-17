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
        'moderated_at',
    ];

    protected $casts = [
        'moderated_at' => 'datetime',
    ];

    public static function booted()
    {
        static::addGlobalScope('moderated', fn ($q) => $q->whereNotNull('moderated_at'));
        static::addGlobalScope('latest', fn ($q) => $q->latest());
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
