<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
    </head>
    <body style="font-size: 20px">
        <div style="display:flex">@yield('title')
        <span style="margin-left:auto">
            <a href="{{ url('/login') }}"><button>Login</button></a>
            <a href="{{ url('/showRegister') }}"><button>Register</button></a>
        </span>
        </div>
        <hr>
        <div style="text-align: center">
             @yield('content')
        </div>
    </body>
</html>
