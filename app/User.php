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
        return $this->belongsToMany('App\User', 'followers', 'user_id', 'follower_user_id')->withTimestamps();
    }


    public function following()
    {
        return $this->belongsToMany('App\User', 'followers', 'follower_user_id');
    }

    public function isFollowing(User $user)
    {
        return !is_null($this->following()->where('user_id', $user->id)->first());
    }

    public function followingPosts()
    {
        return $this->hasManyThrough('App\Post', 'App\Follower', 'follower_user_id', 'user_id', 'id' );
    }

}
