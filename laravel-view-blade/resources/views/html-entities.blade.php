<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HTML Entities</title>
</head>
<body>
    {{-- this will turn html tags and entities to plain text that the user can read --}}
    {{-- this is good for security because hackers won't be able to inject javascript to your website --}}
    {{ $danger }}

    {{-- this will not change the variable and will output it directly to your final HTML --}}
    {{-- this can be dangerous so only use it when you know the variable connot contain malicious code --}}
    {!! $danger !!}
</body>
</html>
