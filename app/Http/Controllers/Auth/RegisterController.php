<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
  public function register()
  {
    return view("auth.register");
  }

  public function store()
  {
    $attributes = $this->registerValidation();
    $user = User::create($attributes);

    auth()->login($user);
    return redirect("/")->with("success", "Well done, Now you are a Poster 🎉");
  }

  protected function registerValidation(): array
  {
    return request()->validate([
      "username" => ["required", Rule::unique("users", "username")],
      "name" => ["required", "max:255"],
      "email" => [
        "required",
        "email",
        "max:255",
        Rule::unique("users", "email"),
      ],
      "password" => ["required", "min:7", "max:255"],
    ]);
  }
}
