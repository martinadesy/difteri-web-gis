<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(Request $request){
        if ($request->session()->exists('activeUser')) {
            return redirect('/home');
        }
        return view('login');
    }
    public  function login(Request $request){
        $username=$request->input('username');
        $password=$request->input('password');
        $activeUser=User::where(['username'=>$username])->first();
        if(is_null($activeUser)){
            return "<div class='alert alert-danger'>Pengguna Tidak Ditemukan!</div>";
        }else{
            if(Hash::check($password,'password')){
                return "<div class='alert alert-danger'>Password Salah!</div>";
            }else{
                $request->session()->put('activeUser', $activeUser);
                return "
            <div class='alert alert-success'>Login berhasil!</div>
            <script> scrollToTop(); reload(1000); </script>";
            }
        }
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}
