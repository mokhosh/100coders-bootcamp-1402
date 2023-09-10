<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Your Ads
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <a href="{{ route('ad.create') }}" class="bg-sky-100 hover:bg-sky-200 text-sky-600 text-sm font-semibold rounded px-4 py-2">New Ad</a>
                    </div>

                    <table class="w-full mt-8">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                        @forelse ($ads as $ad)
                            <tr>
                                <td class="border border-slate-300 p-2">{{ $ad->id }}</td>
                                <td class="border border-slate-300 p-2">{{ $ad->title }}</td>
                                <td class="border border-slate-300 p-2">{{ $ad->price }}</td>
                                <td class="border border-slate-300 p-2">{{ $ad->created_at->diffForHumans() }}</td>
                                <td class="border border-slate-300 p-2">
                                    <a href="{{ route('ad.view', $ad) }}">View</a>
                                    <a href="{{ route('ad.edit', $ad) }}">Edit</a>

                                    <form method="post" action="{{ route('ad.destroy', $ad) }}">
                                        @csrf
                                        @method('delete')
                                        <button>Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            You don't have any ads. Create one now.
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
