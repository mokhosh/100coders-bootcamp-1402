<div class="container mx-auto">
    <h2 class="mt-6 text-xl font-bold uppercase">Products</h2>
    <div>
        @foreach($cart->products as $product)
            <div class="p-4 text-xl flex justify-between">
                <div>
                    <div class="text-2xl font-semibold">{{ $product->title }}</div>
                    <div>{{ $product->price }}</div>
                </div>

                <div>{{ $product->pivot->count }}</div>

                <button wire:click="remove({{ $product->id }})" class="mt-2 bg-red-300 hover:bg-red-200 p-2 rounded">Remove from cart</button>
            </div>
        @endforeach
    </div>

    <h2 class="mt-6 text-xl font-bold uppercase">Address</h2>
    <div>
        <select wire:model.live="address">
            @foreach($addresses as $address)
                <option value="{{ $address->id }}">{{ $address->address }}</option>
            @endforeach
        </select>

        <div class="mt-4 text-xl">
            Selected address:
            @if ($cart->address)
                {{ $cart->address->address }}
            @else
                You haven't selected an address
            @endif
        </div>
    </div>

    <h2 class="mt-6 text-xl font-bold uppercase">Voucher</h2>
    <form wire:submit="vouch" class="text-xl">
        <input type="text" wire:model="voucher">
        <button class="mt-2 bg-green-300 hover:bg-green-200 p-2 rounded">Use Voucher</button>

        <div class="mt-4 text-xl">
            Selected voucher:
            @if ($cart->voucher)
                {{ $cart->voucher->code }} {{ $cart->voucher->discount_percent }}%
            @else
                You haven't selected an voucher
            @endif
        </div>
    </form>

    <h2 class="mt-6 text-xl font-bold uppercase">Total</h2>
    <div class="text-5xl font-semibold">Total: {{ $cart->raw_total }}</div>
    <div class="text-5xl font-semibold">Total w/ discount: {{ $cart->total }}</div>

    <form method="post" action="/checkout" class="mt-16 flex justify-center">
        @csrf
        <button class="bg-purple-300 hover:bg-purple-200 p-4 text-xl font-semibold rounded">Checkout</button>
    </form>
</div>
