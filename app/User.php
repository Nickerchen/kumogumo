<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function publish(Post $post)
    {
        $this->posts()->save($post);
    }

    public function followers()
    {
        return $this->belongsToMany('User', 'followers', 'follow_id', 'user_id')->withTimestamps();
    }

    public function following()
    {
        return $this->belongsToMany('User', 'followers', 'user_id', 'follow_id')->withTimestamps();
    }


    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("name", "LIKE","%$keyword%");
            });
        }
        return $query;
    }



}
