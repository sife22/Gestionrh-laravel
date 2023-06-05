<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function logIn(Request $request){
        $credentials = $request->only('name', 'password');
        $name = $credentials['name'];
        $password = $credentials['password'];
        $admin = User::where('name', '=', $name)->where('password', '=', $password)->first();
        if($admin){
            session()->put('adminId', $admin->id);
            return redirect('/accueil');
        }else{
            session()->flash('failed', 'Vous êtes pas un admin!');
            return back()->onlyInput('name', 'password');
        };
    }

    public function logOut(){
        
        if(session()->has('adminId')){
            session()->pull('adminId');
            return redirect('/');
        }
    }

    // public function index(Request $request){
    //     $credentials = $request->only('name', 'password');
    //     $id = User::find(Auth::attempt($credentials));
    //     $admin = User::find($id);
    //     return view('attestation')->with(['admin' => $admin]);
    // }
}
