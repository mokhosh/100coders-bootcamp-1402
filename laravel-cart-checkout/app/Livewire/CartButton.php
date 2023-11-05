<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\On;
use Livewire\Component;

class CartButton extends Component
{
    #[On('add-to-cart')]
    public function addToCart(Product $product)
    {
        auth()->user()->cart->add($product);
    }

    public function render()
    {
        return view('livewire.cart-button', [
            'count' => auth()->user()->cart->count,
        ]);
    }
}
