<x-blog-layout>
    {{--  Hero Section  --}}
    <div class="bg-orange-100">
        <div class="flex justify-around container mx-auto">
            <div class="flex flex-col justify-center p-16">
                <div class="text-7xl text-lime-700">Join Larablog!</div>
                <div class="text-2xl text-lime-600">Join {{ $blogCount }} {{ Str::plural('blog', $blogCount) }} on Larablog today.</div>

                <div class="mt-20">
                    <a href="{{ route('register') }}" class="px-10 py-5 text-2xl font-semibold rounded-xl bg-lime-400 text-lime-800 hover:bg-lime-500 hover:text-lime-900">Create My Blog</a>
                </div>
            </div>

            <div>
                <x-home.hero-illustration class="w-[50rem] h-[50rem] -mb-32" />
            </div>
        </div>
    </div>
    {{--  End Hero Section  --}}

    {{--  Latest Posts  --}}
    <x-home.section title="Latest Posts">
        <div class="flex mt-16 gap-12">
            @foreach($latestPosts as $post)
                <x-widgets.post-card :$post/>
            @endforeach
        </div>
    </x-home.section>
    {{--  End Latest Posts  --}}

    {{--  Latest Blogs  --}}
    <x-home.section title="Latest Blogs">
        <div class="flex mt-16 gap-12">
            @foreach($latestBlogs as $blog)
                <x-widgets.blog-card :$blog/>
            @endforeach
        </div>
    </x-home.section>
    {{--  End Latest Blogs  --}}

    {{--  Most Viewed Posts  --}}
    <x-home.section title="Most Viewed Posts">
        <div class="flex mt-16 gap-12">
            @foreach($mostViewedPosts as $post)
                <x-widgets.post-card :$post/>
            @endforeach
        </div>
    </x-home.section>
    {{--  End Most Viewed Posts  --}}

    <x-slot name="footer">
        All Rights Reserved &copy; {{ now()->year }}
    </x-slot>
</x-blog-layout>
