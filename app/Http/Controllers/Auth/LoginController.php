<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
  public function login()
  {
    return view("auth.login");
  }
  public function session()
  {
    $attrs = request()->validate([
      "email" => ["required", "email"],
      "password" => ["required"],
    ]);

    if (!auth()->attempt($attrs)) {
      throw ValidationException::withMessages([
        "email" => "Your provided credentials could not be verified.",
      ]);
    }

    session()->regenerate();
    $name = auth()->user()->name;
    return redirect("/")->with("success", "Welcome back, $name ");
  }
}
