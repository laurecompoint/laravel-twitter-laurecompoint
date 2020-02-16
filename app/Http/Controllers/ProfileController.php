<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show($username, User $user)
    {
        $me = Auth::user();
        $userurl = User::where('username', $username)->firstOrFail();
        $usersall = $user->orderBy('id', 'DESC')->paginate(4);
        $followers_count = $userurl->followers()->count();
        $following_count = $me->following()->count();
        $following_tweet = $userurl->posts()->get()->count();
        if (Auth::check()) {
            
           
            $list = $me->following()->orderBy('username')->get();
            $is_edit_profile = false;
            $is_following = false;
            $is_edit_profile = (Auth::id() == $userurl->id);
            $is_follow_button = !$is_edit_profile && !$me->isFollowing($userurl);
            return view('profil', [
                'userurl' => $userurl, 
                'followers_count' => $followers_count, 
                'is_edit_profile' => $is_edit_profile, 
                'following_count' => $following_count,
                'following_tweet' => $following_tweet,
                'is_follow_button' => $is_follow_button,
                'is_following' => $is_following,
                 'list' => $list,
                 'usersall' => $usersall,
                 'me' => $me,
                ]);
        }
       else{
        return view('error/error');
       }
        
     
      
    }

    public function following($username, User $user)
{
    if (Auth::check()) {
        $me = Auth::user();
        $userurl = User::where('username', $username)->firstOrFail();
        $usersall = $user->orderBy('id', 'DESC')->paginate(4);
        $following_tweet = $userurl->posts()->get()->count();
        $followers_count = $userurl->followers()->count();
        $following_count = $me->following()->count();
        $list = $me->following()->orderBy('username')->get();
        $is_edit_profile = false;
        $is_following = false;
        $is_edit_profile = (Auth::id() == $userurl->id);
        $is_follow_button = !$is_edit_profile && !$me->isFollowing($userurl);
        return view('following', [
            'userurl' => $userurl,
            'followers_count' => $followers_count,
            'is_edit_profile' => $is_edit_profile,
            'following_count' => $following_count,
            'is_follow_button' => $is_follow_button,
            'is_following' => $is_following,
            'following_tweet' => $following_tweet,
            'list' => $list,
            'usersall' => $usersall,
            ]);
    }
    else{
        return view('error/error');
       }
    
}
public function followers($username, User $user)
{
    
    if (Auth::check()) {
      
        $me = Auth::user();
        $userurl = User::where('username', $username)->firstOrFail();
        $usersall = $user->orderBy('id', 'DESC')->paginate(4);
        $followers_count =  $userurl->followers()->count();
        $following_count = $me->following()->count();
        $following_tweet = $userurl->posts()->get()->count();
        $list = $userurl->followers()->orderBy('username')->get();
        $is_edit_profile = false;
        $is_following = false;
        $is_edit_profile = (Auth::id() == $userurl->id);
        $is_following = !$is_edit_profile && $me->isFollowing($userurl);
        $is_follow_button = !$is_edit_profile && !$me->isFollowing($userurl);
        return view('followers', [
            'userurl' => $userurl,
            'followers_count' => $followers_count,
            'is_edit_profile' => $is_edit_profile,
            'following_count' => $following_count,
            'following_tweet' => $following_tweet,
            'is_following' => $is_following,
            'is_follow_button' => $is_follow_button,
            'list' => $list,
            'usersall' => $usersall,
            ]);
    }
    else{
        return view('error/error');
    }
    
}

  
  
   
}
