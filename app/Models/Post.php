<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  use HasFactory;

  protected $guarded = [];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function categories()
  {
    return $this->belongsToMany(Tag::class, "post_tags");
  }

  public function scopeLatest(Builder $query)
  {
    return $query->orderBy(static::CREATED_AT, "desc");
  }

  public function likes()
  {
    return $this->hasMany(Like::class);
  }

  public function comments()
  {
    return $this->hasMany(Comment::class);
  }

  public function readTime(Post $post)
  {
    $bod = $post->body;
    $bodS = explode(" ", $bod);
    $time = count($bodS) * 0.5;
    if ($time < 5) {
      return "5 Seconds";
    } elseif ($time < 60) {
      $s = ceil($time);
      return "$s  Seconds";
    } elseif ($time === 60) {
      return "1 Minute";
    } else {
      $t = ceil($time / 60);
      return "$t Minutes";
    }
  }

  public function setTagsAttribute($tags)
  {
    if (!request()->tags) {
      $this->attributes["tags"] = "#General";
    } else {
      $this->attributes["tags"] = $tags;
    }
  }

  public function setTitleAttribute($value)
  {
    $this->attributes["title"] = $value;
    $this->attributes["slug"] = $value;
  }
}
