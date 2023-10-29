<x-layout>
    <div x-data="{open:false}">

    <x-passenger-form/>
        <button x-on:click="open = true" class="bg-gray-700 hover:bg-gray-600 text-white mt-4 px-8 py-1 rounded">Input</button>
    <div class="flex">
        <x-responsive-box/>
        <x-responsive-box/>
        <x-responsive-box/>
        <x-responsive-box/>
        <x-responsive-box/>
        <x-responsive-box/>
        <x-responsive-box/>
    </div>
   <x-passenger-form/>
   <x-passenger-form/>
    <script src="//unpkg.com/alpinejs" defer></script>

    <div x-show="open" x-transition.opacity.duration.2000ms x-cloak class="flex justify-center items-center backdrop-blur-sm fixed inset-0">
        <button @click="open = false" class="fixed inset-0 bg-gray-700 opacity-20"></button>
        <div class="relative rounded-xl bg-white p-16">
            <x-text-input name="name" label="ایمیل"/>
            <button x-on:click="open = false" class="bg-gray-700 hover:bg-gray-600 text-white mt-4 px-8 py-1 rounded">Cancel</button>
        </div>
    </div>
    </div>
</x-layout>
