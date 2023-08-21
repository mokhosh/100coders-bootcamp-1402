<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blade Syntax</title>
</head>
<body>
    @if (true)
        <div>You can see this line because the condition is true</div>
    @else
        <div>You will never see this line</div>
    @endif

    @if (false)
        <div>You will never see this line because the condition is false</div>
    @elseif (true)
        <div>This will also run</div>
    @endif

    <div>You will see a list of 10 items here:</div>
    <ul>
        @for ($i = 0; $i < 10; $i++)
            <li>This is item #{{ $i }}</li>
        @endfor
    </ul>

    <div>You will see a list of names here:</div>
    <ul>
        @foreach (['ali', 'mohammad', 'zahra'] as $name)
            <li>{{ ucfirst($name) }}</li>
        @endforeach
    </ul>
    <div>Did you notice that names are Title Cased? I used the <code>ucfirst</code> php function for that.</div>

    <div>You can also have nested for loops:</div>
    <table>
        @foreach([1,2,3,4,5,6,7,8,9,10] as $row)
            <tr>
                @foreach([1,2,3,4,5,6,7,8,9,10] as $col)
                    <td>{{ $row * $col }}</td>
                @endforeach
            </tr>
        @endforeach
    </table>
</body>
</html>
