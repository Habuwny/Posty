<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    //
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    Model::unguard();

    Gate::define("owner", function (User $user) {
      $ownerUsr = explode("/", request()->url())[3];
      return auth()->user()->username === $ownerUsr;
    });
      Paginator::useTailwind();


      //    Gate::define("poster", function (Post $post) {
    //      return $post->user_id !== auth()->user()->id;
    //    });
    //
    //    Blade::if("poster", function () {
    //      return request()
    //        ->user()
    //        ->can("poster");
    //    });
  }
}
