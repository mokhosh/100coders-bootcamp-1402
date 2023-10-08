<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    public function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn() => Storage::disk('public')->url($this->image),
        );
    }
}
