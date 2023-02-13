<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use Auth;
class UserController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function postRegister(Request $req)
    {
        
        try {
            User::create([
                'email'=>$req->email,
                'name'=>$req->name,
                'password'=> Hash::make($req->password)
            ]);
            return redirect()->route('login');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
        
    }

    public function login()
    {
        return view('login');
    }

    public function postLogin(Request $req)
    {
        # code...
        $credentials = $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)){
            return redirect()->route('home');
        } else{
            return redirect()->back()->with('err',"Tài khoản hoặc mật khẩu không đúng");
        }
    }

    public function logout ()
    {
        Auth::logout();
        return redirect()->route('home');
    }


    public function adminLogin()
    {
        return view('admin.login');
    }

    public function postLoginAdmin(Request $req)
    {
        $credentials = $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            
        ]);
       
        if(Auth::attempt(['email'=>$req->email,'password'=>$req->password,'role'=>1])){
            return redirect()->route('admin.index');
        } else{
            return redirect()->back()->with('err',"Tài khoản hoặc mật khẩu không đúng");
        }
       
    }
}
