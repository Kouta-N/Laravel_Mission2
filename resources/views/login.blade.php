@extends('layout.login_form')

@section('title','Login')

@section('content')
    @if (session('err_msg'))
        <p style="color: red">{{ session('err_msg') }}</p>
    @endif
    <form method="POST" action={{ route('exeLogin') }}>
        @csrf
        <div>
            <label for="email">E-mail Address: </label>
            <input type="email" name="email" value="{{ old('email') }}">
            @if ($errors->has('email'))
                <div style="color: red">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>
        <div>
            <label for="password">Password: </label>
            <input type="password" name="password">
            @if ($errors->has('password'))
                <div style="color: red">
                    {{ $errors->first('password') }}
                </div>
        @endif
        </div>
        <br>
        <input type="submit" style="background-color: blue;color: white; font-size: 14pt" value="Login">&ensp;
        <a href="" style="text-decoration: none">Forget Your Password?</a>
        <br><br>
    </form>
@endsection
