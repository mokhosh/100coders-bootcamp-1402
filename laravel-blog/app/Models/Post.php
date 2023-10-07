<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'category_id',
        'published_at',
        'is_draft',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
