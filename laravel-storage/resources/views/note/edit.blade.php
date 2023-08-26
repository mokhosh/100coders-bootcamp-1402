<x-layout>
    <div class="mt-8">
        <div class="my-8 font-semibold text-slate-500">
            <div>Last updated: {{ \Carbon\Carbon::createFromTimestamp($updated)->diffForHumans() }}</div>
        </div>

        <form method="post" action="{{ route('note.update', $filename) }}">
            @csrf
            @method('put')

            <div>
                <label class="text-slate-500">Note Name</label>
                <div class="mt-2 px-3 py-2 w-full text-xl text-rose-400 font-semibold rounded border border-rose-200 bg-rose-100">{{ $filename }}</div>
            </div>

            <div class="mt-4">
                <label class="text-slate-500" for="note">Note Content</label>
                <textarea id="note" autofocus class="mt-2 px-3 py-2 w-full text-xl text-slate-700 rounded border border-rose-200 focus:outline-none focus:border-rose-400 focus:ring-4 focus:ring-rose-100" rows="10" name="note">{{ $note }}</textarea>
            </div>

            <div class="flex">
                <button class="mt-2 mx-8 hover:mx-0 flex-1 rounded p-2 bg-rose-200 font-semibold hover:bg-rose-100 text-rose-700 transition-all" type="submit">Update</button>
            </div>
        </form>
    </div>
</x-layout>
