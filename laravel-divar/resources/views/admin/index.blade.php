<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            All Ads
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="w-full mt-8">
                        <tr>
                            <th>ID</th>
                            <th>Creator</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                        @forelse ($ads as $ad)
                            <tr>
                                <td class="border border-slate-300 p-2">{{ $ad->id }}</td>
                                <td class="border border-slate-300 p-2">{{ $ad->user->name }}</td>
                                <td class="border border-slate-300 p-2">{{ $ad->title }}</td>
                                <td class="border border-slate-300 p-2">{{ $ad->price }}</td>
                                <td class="border border-slate-300 p-2">{{ $ad->created_at->diffForHumans() }}</td>
                                <td class="border border-slate-300 p-2">
                                    <a href="{{ route('ad.view', $ad) }}">View</a>
                                    <a href="{{ route('admin.edit', $ad) }}">Edit</a>

                                    <form method="post" action="{{ route('ad.destroy', $ad) }}">
                                        @csrf
                                        @method('delete')
                                        <button>Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            There aren't any ads.
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
