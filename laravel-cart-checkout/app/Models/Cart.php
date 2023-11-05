<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'gateway_ref',
        'address_id',
        'voucher_id',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count');
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function voucher()
    {
        return $this->belongsTo(Voucher::class);
    }

    public function add(Product $product)
    {
        if ($this->products()->whereId($product->id)->count()) {
            return $this->products->where('id', $product->id)->first()->pivot->increment('count');
        }

        $this->products()->attach($product);
    }

    public function remove(Product $product)
    {
        $this->products()->detach($product);
    }

    public function vouch(string $code)
    {
        $voucher = Voucher::whereCode($code)->where('remaining', '>', 0)->firstOrFail();
        $this->voucher()->associate($voucher)->push();
        $voucher->decrement('remaining');
    }

    public function reset()
    {
        $this->products()->detach();
        $this->update([
            'gateway_ref' => null,
            'address_id' => null,
            'voucher_id' => null,
        ]);
    }

    public function getCountAttribute()
    {
        return $this->products->sum('pivot.count');
    }

    public function getRawTotalAttribute()
    {
        return $this->products->reduce(function ($carry, $next) {
            return $carry + $next->pivot->count * $next->price;
        });
    }

    public function getTotalAttribute()
    {
        $total = $this->raw_total;

        if ($this->voucher) {
            $total -= $total * $this->voucher->discount_percent / 100;
        }

        return $total;
    }
}
