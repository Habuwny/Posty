<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get("/", [PostController::class, "index"])->name("home");
Route::get("/posting", [PostController::class, "create"])->name("posts.create");
Route::post("/posting", [PostController::class, "store"])->name("posts.store");

Route::get("/{username}/posts/{slug}", [PostController::class, "show"])->name(
  "post.show"
);

Route::get("register", [RegisterController::class, "register"])->name(
  "register"
);
Route::post("auth/register", [RegisterController::class, "store"])->name(
  "auth.register"
);

Route::get("login", [LoginController::class, "login"])->name("login");
Route::post("auth/login", [LoginController::class, "session"])->name(
  "auth.login"
);
Route::post("auth/logout", [LogoutController::class, "logout"])->name(
  "auth.logout"
);
