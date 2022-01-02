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
  public function setTagsAttribute($tags)
  {
    //    if (!request()->tags ) {
    //      $this->attributes["tags"] = "#General";
    //    } else {
    //      $this->attributes["tags"] = $tags;
    //    }
  }

  public function setTitleAttribute($value)
  {
    $this->attributes["title"] = $value;
    $this->attributes["slug"] = $value;
  }
}
