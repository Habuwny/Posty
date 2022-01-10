<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image as ImageResize;

class UserUpdate extends Controller
{
  public function update(User $user)
  {
    $validateImg = request()->validate([
      "image" =>
        "image|mimes:jpg,png,jpeg|max:1024|dimensions:min_width=400,min_height=400,max_width=1000,max_height=1000",
    ]);
    //    ddd($validateImg);
    if (request()->file("image")) {
      $extensions = collect(["jpg", "jpeg", "png"]);

      $userName = $user->username;
      foreach ($extensions as $oldExtension) {
        $imgPath = "user/avatars/$userName.$oldExtension";
        if (Storage::exists($imgPath)) {
          Storage::delete($imgPath);
        }

        $img = request()->file("image");
        $extension = $img->getClientOriginalExtension();
        $img_path = $userName . "." . $extension;
        $path = storage_path("app\\public\\user\\avatar\\");

        ImageResize::make($img)
          ->resize(400, 400)
          ->crop(300, 300)
          ->fit(300)
          ->save($path . $img_path);
        $path_ = "user/avatar/$userName.$extension";
        Image::where("type_id", "=", $user->id)
          ->where("type", "=", "user")
          ->delete();
      }
      Image::create([
        "type" => "user",
        "type_id" => $user->id,
        "path" => $path_,
      ]);
    }

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
