<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Random Name Picker</title>

    @vite(['resources/css/app.css'])
</head>
<body class="flex min-h-screen items-center">
    <div class="p-8 max-w-screen-md mx-auto">
        <h1 class="font-mono text-4xl text-slate-300 font-light">Random Name Picker</h1>
    
        @isset ($name)
            <div class="p-8 rounded-xl bg-teal-100 text-teal-700 text-5xl">
                <h1 class="font-bold">{{ ucfirst($name) }}</h1>
                <h1 class="mt-4 text-lg">You were randomly picked!</h1>
            </div>
        @endisset
    
        <p class="text-slate-600 mt-8">Input your names on separate lines and press "Pick"</p>
    
        <form method="post" action="{{ url('/') }}">
            @csrf
            <div>
                <textarea class="mt-2 w-full rounded-xl border-slate-300 focus:outline-none focus:border-orange-400 focus:ring-4 focus:ring-orange-100" rows="10" name="names">{{ $names ?? '' }}</textarea>
            </div>
    
            <div class="flex">
                <button class="mt-2 mx-8 hover:mx-0 flex-1 rounded-xl p-4 bg-orange-200 hover:bg-orange-300 text-orange-700 transition-all" type="submit">Pick</button>
            </div>
        </form>
    </div>
</body>
</html>
