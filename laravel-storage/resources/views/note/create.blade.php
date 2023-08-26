<x-layout>
    <div class="mt-8">
        <form method="post" action="{{ route('note.store') }}">
            @csrf

            <div>
                <label class="text-slate-500" for="note">New Note</label>
                <textarea id="note" class="mt-2 px-3 py-2 w-full text-xl text-slate-700 rounded border border-rose-200 focus:outline-none focus:border-rose-400 focus:ring-4 focus:ring-rose-100" rows="10" name="note"></textarea>
            </div>

            <div class="flex">
                <button class="mt-2 mx-8 hover:mx-0 flex-1 rounded p-2 bg-rose-200 font-semibold hover:bg-rose-100 text-rose-700 transition-all" type="submit">Create</button>
            </div>
        </form>
    </div>
</x-layout>
