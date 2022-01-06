<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
  public function logout()
  {
    $name = auth()->user()->name;
    auth()->logout();
    return redirect("/")->with("success", "See you soon 🪁👋");
  }
}
