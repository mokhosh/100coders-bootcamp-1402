@props(['blog'])

<div class="flex justify-between items-center {{ session()->has('subscribed') ? 'bg-green-100' : 'bg-primary-100' }} p-16 rounded-3xl">
    <div class="text-left">
        @if (session()->has('subscribed'))
            <p class="text-3xl tracking-tight font-semibold text-green-700">Thanks for subscribing</p>
            <p class="mt-4 text-green-600">You will get notified whenever {{ $blog->name }} posts a new post!</p>
        @else
            <p class="text-3xl tracking-tight font-semibold text-primary-700">Subscribe to {{ $blog->title }}</p>
            <p class="mt-4 text-primary-600">Get notified whenever {{ $blog->name }} posts a new post!</p>
        @endif
    </div>

    <div class="text-left">
        @unless(session()->has('subscribed'))
            <form action="{{ route('subscriber.store', ['user' => $blog]) }}" method="post" class="flex items-stretch rounded-lg focus-within:ring-4 focus-within:ring-primary-200">
                @csrf
                <input type="email" name="email" class="px-6 py-3 text-primary-700 w-80 border-none rounded-l-lg focus:ring-0" placeholder="Enter your email" required>
                <button class="px-8 py-2 bg-brown-400 rounded-r-lg uppercase text-white font-semibold">Subscribe</button>
            </form>
        @endunless

        @error('email', 'subscribe')
        <div class="mt-1 text-red-600">{{ $message }}</div>
        @enderror
    </div>
</div>
