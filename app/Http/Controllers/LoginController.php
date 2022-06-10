<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
    'email' => ['required', 'email'],
    'password' => ['required'],
  ]);
  if (Auth::attempt($credentials)) {
    $request->session()->regenerate();
    return redirect('/');
  }

  return back()->withErrors([
    'email' => 'The provided credentials do not match
        our records.',
  ])->onlyInput('email');
}

public function logout(Request $request)
{
  Auth::logout();
  $request->session()->invalidate();
  $request->session()->regenerateToken();
  return redirect('/');
}

public function register(Request $request){
  $comment = new User;
  $comment->name = $request->nama;
  $comment->email = $request->email;
  $comment->password = bcrypt($request->password);
  $comment->role = $request->Role;
  $comment->save();
  return redirect('/');
}
}




