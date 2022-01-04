<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use function PHPUnit\Framework\isEmpty;

class UserController extends Controller
{
  public function settings(User $user)
  {
    return view("user.settings", ["user" => $user]);
  }

  public function update(User $user)
  {
    $checkValues = collect($this->updateValidation($user))
      ->only("name", "username", "email")
      ->toArray();
    $user->update($checkValues);
    $pass = request()->validate(["password" => ["min:7", "max:255"]])[
      "password"
    ];
    $checkPass = Hash::check($pass, $user->password);
    if (!($pass === "كل2f-ffR" && $checkPass)) {
      $user->update(["password" => $pass]);
    }

    return redirect()->back();
  }

  public function dashboard(User $user)
  {
    $posts = $user->posts;
    $comments = $user->comments;
    //    $comment = ;
    $participates = $posts->merge($comments)->sortByDesc("created_at");

    return view("user.dashboard", [
      "user" => $user,
      "participates" => $participates,
    ]);
  }

  protected function updateValidation(User $user): array
  {
    return request()->validate([
      "name" => ["required", "max:255"],
      "username" => [
        "required",
        Rule::unique("users", "username")->ignore($user),
      ],
      "email" => [
        "required",
        "email",
        "max:255",
        Rule::unique("users", "email")->ignore($user),
      ],
      "password" => ["min:7", "max:255"],
    ]);
  }
}
