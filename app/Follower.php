<?php

namespace App;


class Follower extends Model
{

  protected $fillable = [
      'id', 'user_id', 'follower_id',
  ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
