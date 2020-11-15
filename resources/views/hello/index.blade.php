<!DOCTYPE html>
<html lang="jp">
    <head>
        <title>hello/index</title>
    </head>
    <body>
        <h1>
            Hello/Index
        </h1>
        <pre>

            {{ $data['msg'] }}
            {{ $data['myServiceMsg'] }}
            @foreach( $data['myServiceData'] as $item )
                <li>{{ $item }}</li>
            @endforeach

        </pre>

    </body>

</html>
