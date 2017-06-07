<?php

namespace App;


class Follower extends Model
{

  protected $fillable = [
       'user_id', 'follower_user_id',
  ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
