<?php
if(!isset($_SESSION["id"])){
    header("Location: login.html");
    return;
}
?>
@extends('layout.login_form')

@section('title','Login')

@section('content')
    @if (session('err_msg'))
        <p>{{ session('err_msg') }}</p>
    @endif
    <p>ログイン完了</p>
    <p>ログインユーザ名: {{ $user->name }}</p>
    <a href="{{ route('login') }}"><button>ログアウト</button></a>
@endsection
