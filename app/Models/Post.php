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
  public function tags()
  {
    return $this->belongsToMany(Tag::class, "post_tags");
  }

  public function PostTags()
  {
    return $this->hasMany(PostTag::class);
  }

  public function scopeLatest(Builder $query)
  {
    return $query->orderBy(static::CREATED_AT, "desc");
  }
}
