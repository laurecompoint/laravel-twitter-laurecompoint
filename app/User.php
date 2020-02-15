<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable 
{
    

    public function following(){
         return $this->belongsToMany('App\User', 'followers', 'follower_user_id', 'user_id')->withTimestamps();
    }
    public function isFollowing(User $user)
    {
        return !is_null($this->following()->where('user_id', $user->id)->first());
    }
    public function followers()
    {
         return $this->belongsToMany('App\User', 'followers', 'user_id', 'follower_user_id')->withTimestamps();
    }
    public function posts()
    {
         return $this->hasMany('App\Post', 'user_id', 'id');
    }
    public function timeline(){
        $following = $this->following()->with(['posts' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->get();
    // By default, the tweets will group by user.
    // [User1 => [Tweet1, Tweet2], User2 => [Tweet1]]
    //
    // The timeline needs the tweets without grouping.
    // Flatten the collection.
    $timeline = $following->flatMap(function ($values) {
        return $values->posts;
    });
    // Sort descending by the creation date
    $sorted = $timeline->sortByDesc(function ($post) {
        return $post->created_at;
    });
    return $timeline;
    }
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
   
}

