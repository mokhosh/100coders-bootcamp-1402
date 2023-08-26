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
    <aside class="w-72 p-4 font-mono">
        <h3 class="text-slate-500">Notes</h3>

        <ul>
            @foreach($files as $file)
                @continue(str_starts_with($file, '.'))

                <li>
                    <a href="{{ route('note.edit', $file) }}">{{ $file }}</a>
                </li>
            @endforeach
        </ul>
    </aside>

    <main class="flex-1 p-4">
        <h1 class="text-rose-700 font-extralight text-5xl">FileNotes&trade;</h1>

        {{ $slot }}
    </main>
</section>
</body>
</html>
