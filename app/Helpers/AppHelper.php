<?php

namespace App\Helpers;

use App\Models\Post;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as ImageResize;

class AppHelper
{
  public function uniqueText($text, $type)
  {
    if ($type === "slug") {
      $slug = Str::slug($text);
      $isSlugged = Post::where("slug", "=", $slug)->exists();
      if ($isSlugged) {
        return Str::slug($text . " " . Carbon::now()->timestamp);
      } else {
        return Str::slug($text);
      }
    }
  }
  public function postExcerpt ($body) {

  }
  public static function instance()
  {
    return new AppHelper();
  }
}
