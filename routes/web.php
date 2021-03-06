<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CreatePost;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\SubscriptionNotificationController;
use App\Http\Controllers\SubscriptionsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserNotificationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserUpdate;
use Illuminate\Support\Facades\Route;

Route::get("/", [PostController::class, "index"])->name("home");
Route::get("/posting", [PostController::class, "create"])->name("posts.create")->middleware('auth');
Route::post("/posting", [CreatePost::class, "store"])->name("posts.store")->middleware('auth');

Route::get("/posts/{post:slug}", [PostController::class, "show"])
  ->name("post.show")
  ->middleware("postViewed");

Route::post("/posts/{post}/like", [PostController::class, "like"])
  ->name("post.like")
  ->middleware("auth");

Route::delete("/posts/{post}/destroy", [PostController::class, "destroy"])
  ->name("post.destroy")
  ->middleware("auth");

Route::post("/posts/{post}/subscription", [
  SubscriptionsController::class,
  "add",
])->name("subscription.add");

Route::get("userSubscription/{subscriptionNotification}", [
  SubscriptionNotificationController::class,
  "checked",
])->name("subscriptionNotification.check");

Route::post("/posts/{post}/comment", [PostController::class, "comment"])
  ->name("post.comment")
  ->middleware("auth");

Route::get("/userNotifications/{userNotification}", [
  UserNotificationController::class,
  "seen",
])->name("userNotification.seen");

/////////

Route::get("register", [RegisterController::class, "register"])
  ->name("register")
  ->middleware("guest");
Route::post("auth/register", [RegisterController::class, "store"])
  ->name("auth.register")
  ->middleware("guest");

Route::get("login", [LoginController::class, "login"])->name("login");
Route::post("auth/login", [LoginController::class, "session"])
  ->name("auth.login")
  ->middleware("guest");
Route::post("auth/logout", [LogoutController::class, "logout"])
  ->name("auth.logout")
  ->middleware("auth");

Route::get("{user:username}/settings", [UserController::class, "settings"])
  ->name("username.settings")
  ->middleware("can:owner");

Route::put("{user:username}/settings", [UserUpdate::class, "update"])->name(
  "user.update"
);

Route::get("{user:username}/dashboard", [
  UserController::class,
  "dashboard",
])->name("user.dashboard");
