<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function scopeSearch(Builder $query, string $q)
    {
        return $query
            ->where('title', 'like', "%$q%")
            ->orWhere('body', 'like', "%$q%");
    }
}
