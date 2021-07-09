<?php

use Illuminate\Support\Facades\Route;

//ログイン画面
Route::get('/login','LoginController@login')->name('login');
//ログイン処理
Route::post('/exeLogin','LoginController@exeLogin')->name('exeLogin');
//ログイン後の画面
Route::get('/isLogin','LoginController@isLogin')->name('isLogin');
//ユーザー登録画面
Route::get('/register', 'LoginController@register')->name('register');
//ユーザー登録処置
Route::post('/update', 'LoginController@update')->name('update');