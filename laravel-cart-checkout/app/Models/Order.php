<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'address_id',
        'voucher_id',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count', 'price');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
