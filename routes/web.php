<?php

use Illuminate\Support\Facades\Route;

//ログイン画面
Route::get('/login','LoginController@login')->name('login');
//ログイン処理
Route::post('/exeLogin','LoginController@exeLogin')->name('exeLogin');
//ログイン後の画面
Route::get('/isLogin','LoginController@isLogin')->name('isLogin');
//ユーザー登録画面
Route::get('/showRegister', 'LoginController@showRegister')->name('showRegister');
//ユーザー登録処置
Route::post('/register', 'LoginController@store')->name('register');