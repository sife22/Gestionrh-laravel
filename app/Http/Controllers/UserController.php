<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function logIn(Request $request){
        $credentials = $request->only('name', 'password');
        if(Auth::attempt($credentials)){
            return redirect('/accueil');
        }else{
            session()->flash('failed', 'Vous êtes pas un admin!');
            return back()->onlyInput('name', 'password');
        };
    }

    // public function index(Request $request){
    //     $credentials = $request->only('name', 'password');
    //     $id = User::find(Auth::attempt($credentials));
    //     $admin = User::find($id);
    //     return view('attestation')->with(['admin' => $admin]);
    // }
}
