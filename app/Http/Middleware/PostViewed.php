<?php

namespace App\Http\Middleware;

use App\Models\Post;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class PostViewed
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
   * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
   */
  public function handle(Request $request, Closure $next)
  {
    $post = $request->route()->parameter("post");
    $isViewed = Cache::get("post" . $post->id . auth()->user()->id);
    if ($post->user_is !== auth()->user()->id && !$isViewed) {
      $vPlus = $post->viewed + 1;
      $post->update(["viewed" => $vPlus]);
      Cache::put("post" . $post->id . auth()->user()->id, true, 3200);
    }
    return $next($request);
  }
}
