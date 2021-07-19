@extends('layout.login_form')

@section('title','Login')

@section('content')
  <form method="POST" action="{{ route('store') }}" onsubmit="return checkPassword()">
    @csrf
     <div>
        <label for="name">Name: </label> <input type="text" name="name" value="{{ old('name') }}">
        @if ($errors->has('name'))
            <div style="color: red">
                {{ $errors->first('name') }}
            </div>
        @endif
    </div>
    <div>
        <label for="email">E-Mail Address: </label> <input type="email" name="email" value="{{ old('email') }}">
        @if ($errors->has('email'))
            <div style="color: red">
                {{ $errors->first('email') }}
            </div>
        @endif
    </div>
    <div>
         <label for="password">Password: </label><input type="password" name="password">
         @if ($errors->has('password'))
            <div style="color: red">
                {{ $errors->first('password') }}
            </div>
        @endif
    </div>
    <div>
        <label for="pasword_conf">Confirm Password: </label><input type="password" name="password_conf">
    </div>
    <br>
    <button type="submit" style="background-color: blue;color: white; font-size: 14pt">Register</button>&ensp;
  </form>
@endsection

<script>
    function checkPassword() {
        if($password === $password_conf) {
            alert("一致")
            return true;
        }else{
            alert("パスワードと確認用パスワードが一致しません。");
            return false;
        }
     }
</script>
