<a href="{{ route('cart') }}" class="relative">
    <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-400 icon icon-tabler icon-tabler-shopping-cart" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
        <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
        <path d="M17 17h-11v-14h-2"></path>
        <path d="M6 5l14 1l-1 7h-13"></path>
    </svg>

    <div class="flex items-center justify-center rounded-full w-6 h-6 bg-red-700 text-white font-semibold absolute right-0 top-0 -mr-4 -mt-2">
        <span>{{ $count }}</span>
    </div>
</a>
