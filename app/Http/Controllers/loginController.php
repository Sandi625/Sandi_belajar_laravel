<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function halamanlogin() {
        return view("Login.login");

    }

    public function postlogin(Request $request){
        if(Auth::attempt($request->only("username","password"))){
    }
    return redirect("/postlogin");
}
public function registrasi(){
    return view("Login.registrasi");
}
}
