<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
  use HasFactory;

  public function user()
  {
    return $this->belongsTo(User::class, "type_id", "id");
  }
  public function post()
  {
    return $this->belongsTo(Post::class, "type_id", "id");
  }
}
