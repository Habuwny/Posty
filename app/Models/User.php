<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  protected $guarded = [];
  protected $hidden = ["password", "remember_token"];
  protected $casts = [
    "email_verified_at" => "datetime",
  ];

  public function posts()
  {
    return $this->hasMany(Post::class);
  }
  public function comments()
  {
    return $this->hasMany(Comment::class);
  }
  public function notifications()
  {
    return $this->hasMany(UserNotification::class);
  }
  public function subscribers()
  {
    return $this->hasMany(Subscribers::class);
  }
  public function subscriptions()
  {
    return $this->hasMany(Subscriptions::class);
  }
  public function subscriptionNotifications()
  {
    return $this->hasMany(SubscriptionNotification::class);
  }

  public function setPasswordAttribute($password)
  {
    $this->attributes["password"] = bcrypt($password);
  }
}
