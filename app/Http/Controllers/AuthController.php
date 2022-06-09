<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function get_register_menu() {
        return(view('auth.register'));
    }

    public function get_login_menu() {
        return(view('auth.login'));
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 'user';
        $user->save();

        return redirect("/sign_in");
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // return(view('beranda.app'));
            return redirect('/beranda');

            // THIS IS JUST A TEST FOR AUTHENTICATION
            // return(view('layouts.test', ['title' => Auth::user()->name, 'isi_artikel' => 'Hello, my name is ' . Auth::user()->name]));
        }

        return back()->withErrors(
            ['email' => 'The provided credentials do not match our records.'])->onlyInput('email');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
