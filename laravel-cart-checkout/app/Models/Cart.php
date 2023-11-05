<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count');
    }

    public function add(Product $product)
    {
        if ($this->products()->whereId($product->id)->count()) {
            return $this->products->where('id', $product->id)->first()->pivot->increment('count');
        }

        $this->products()->attach($product);
    }

    public function getCountAttribute()
    {
        return $this->products->sum('pivot.count');
    }
}
