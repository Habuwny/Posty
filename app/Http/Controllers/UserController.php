<?php

namespace App\Http\Controllers;

//use App\Models\Image;
//use App\Models\Image;
use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image as ImageResize;

class UserController extends Controller
{
  public function settings(User $user)
  {
    return view("user.settings", ["user" => $user]);
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
}
