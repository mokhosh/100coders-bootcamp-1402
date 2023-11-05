<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class CartManager extends Component
{
    public $address;
    public $voucher;

    public function updatedAddress()
    {
        auth()->user()->cart->address()->associate($this->address)->push();
    }

    public function vouch()
    {
        auth()->user()->cart->vouch($this->voucher);
    }

    public function remove(Product $product)
    {
        auth()->user()->cart->remove($product);
    }

    public function render()
    {
        return view('livewire.cart-manager', [
            'cart' => auth()->user()->cart,
            'addresses' => auth()->user()->addresses
        ]);
    }
}
