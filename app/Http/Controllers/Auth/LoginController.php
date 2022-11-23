<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;


class LoginController extends Controller
{

    use AuthenticatesUsers,HasRoles;

    //protected $redirectTo = RouteServiceProvider::HOME;

    public function authenticated(){
        if(Auth::user()->hasAnyRole('admin')){
            return redirect()->route('home') ;
        }else{
            return redirect()->route('adoptar');
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
       
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
    }


}
