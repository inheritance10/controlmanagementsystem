<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function view;

class DefaultController extends Controller
{
    public function index(){
            return view('backend.default.index');

    }

    public function login(){
        return view('backend.default.login');
    }


    public function authenticate(Request $request){
        $request->flash();//verilerin form üzrinde veya bir yerden kaldırılmasını önler

        $credentials = $request->only('email','password');
        $remember_me = $request->has('remember_me') ? true : false;

        if(Auth::attempt($credentials,$remember_me)){
             return redirect()->intended(route('admin.index'));
        }else{
            return back()->with('error','hatalı kullanıcı');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect(route('admin.login'))->with('success','Güvenli çıkış yapıldı');
    }
}
