<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Storage</title>

    @vite('resources/css/app.css')
</head>
<body class="antialiased">
<section class="min-h-screen max-w-screen-lg mx-auto p-8 flex">
    <aside class="w-72 p-4 font-mono border-r-8 border-rose-50">
        <h3 class="text-xl text-slate-500">Notes</h3>

        <ul class="mt-4">
            @foreach($files as $file)
                @continue(str_starts_with($file, '.'))

                <li>
                    <a class="inline-flex text-slate-700 py-1 hover:underline" href="{{ route('note.edit', $file) }}">{{ $file }}</a>
                </li>
            @endforeach
            <li>
                <a class="inline-flex text-rose-700 py-1 font-semibold hover:underline" href="{{ route('note.create') }}">+ New note</a>
            </li>
        </ul>
    </aside>

    <main class="flex-1 py-4 px-8">
        <a href="{{ url('/') }}">
            <h1 class="text-rose-700 font-extralight text-5xl">FileNotes&trade;</h1>
        </a>

        {{ $slot }}
    </main>
</section>
</body>
</html>
