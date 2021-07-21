<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{

    /**
   * ログイン画面へ遷移
   */
    public function login(){
        return view('login');
    }

    /**
   * ユーザー登録画面へ遷移
   */
    public function showRegister(){
        return view('showRegister');
    }

    /**
   * ログイン用メソッド
   * @param string $email,$password
   * @return void
   */
    public function exeLogin(LoginRequest $request){
        $user = DB::table('users')->where('email', $request['email'])->first();
        if (is_null($user)) {
            \Session::flash('err_msg', 'ユーザーが存在しません。');
            return redirect(route('login'));
        //パスワードの照会
        }elseif(password_verify($request['password'], $user->password)) {
            //ログイン成功
            session_start();
            $_SESSION = array();
            $_SESSION['id'] = $user->id;
            return view('isLogin',compact('user'));
        }else{
            \Session::flash('err_msg', 'パスワードが一致しません。');
            return redirect(route('login'));
        }
    }

   /**
   * 新たなユーザーを登録するメソッド
   * @param string $name,$email,$password
   * @return void
   */
    public static function store(UserRequest $request){
        $inputs = $request->all();
        \DB::beginTransaction();
        try {
            User::create([
                'name' => $inputs['name'],
                'email' => $inputs['email'],
                'password' => password_hash($inputs['password'],PASSWORD_DEFAULT),
            ]);
            \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollback();
            echo $e;
            abort(500);
        }
        \Session::flash('err_msg', 'ユーザーを登録しました。');
        return redirect(route('login'));
    }
}