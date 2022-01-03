<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserNotification extends Model
{
  use HasFactory;

  public function user()
  {
    return $this->belongsTo(User::class);
  }
  //  public function notifier()
  //  {
  //    return $this->belongsTo(User::class, "notifier_id");
  //  }
}
