<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //page user profil tweet ( + nav profile )
    public function show($username, User $user)
    {
        
        if (Auth::check()) {
            
            $me = Auth::user();
            $userprofil = User::where('username', $username)->firstOrFail();

           
            $followers_count = $userprofil->followers()->count();
            $following_count = $userprofil->following()->count();
            $tweet_count = $userprofil->posts()->get()->count();
            
            $is_edit_profile = (Auth::id() == $userprofil->id);
            $is_follow_button = !$is_edit_profile && !$me->isFollowing($userprofil);

           
            $usersall = $user->orderBy('id', 'DESC')->paginate(4);
          
          
            return view('profil-users/profile-tweet', [
                'followers_count' => $followers_count, 
                'following_count' => $following_count,
                'tweet_count' => $tweet_count,
                'is_edit_profile' => $is_edit_profile, 
                'is_follow_button' => $is_follow_button,
                'userprofil' => $userprofil, 
                'usersall' => $usersall,
                ]);
        }
       else{
        return view('welcome');
       }
        
     
      
    }
 //page user profil following  ( + nav profile )
    public function following($username, User $user){
    if (Auth::check()) {
        $me = Auth::user();
        $userprofil = User::where('username', $username)->firstOrFail();

        $tweet_count = $userprofil->posts()->get()->count();
        $followers_count = $userprofil->followers()->count();
        $following_count = $userprofil->following()->count();
      
        $is_edit_profile = (Auth::id() == $userprofil->id);
        $is_follow_button = !$is_edit_profile && !$me->isFollowing($userprofil);

        $usersall = $user->orderBy('id', 'DESC')->paginate(4);
        
        $listfollowing = $userprofil->following()->orderBy('username')->get();
      
        return view('profil-users/following', [
            'followers_count' => $followers_count,
            'following_count' => $following_count,
            'is_edit_profile' => $is_edit_profile,
            'tweet_count' => $tweet_count,
            'userprofil' => $userprofil,
            'usersall' => $usersall,
            'is_follow_button' => $is_follow_button,
            'listfollowing' => $listfollowing,
            ]);
    }
    else{
        return view('welcome');
       }
    
}
//page user profil followers  ( + nav profile )
public function followers($username, User $user)
{
    
    if (Auth::check()) {
      
        $me = Auth::user();
        $userprofil = User::where('username', $username)->firstOrFail();

        $followers_count =  $userprofil->followers()->count();
        $following_count = $userprofil->following()->count();
        $tweet_count = $userprofil->posts()->get()->count();
       
        $is_edit_profile = (Auth::id() == $userprofil->id);
        $is_follow_button = !$is_edit_profile && !$me->isFollowing($userprofil);

        $usersall = $user->orderBy('id', 'DESC')->paginate(4);
       
        $listfollowers = $userprofil->followers()->orderBy('username')->get();

        return view('profil-users/followers', [
            'userprofil' => $userprofil,
            'followers_count' => $followers_count,
            'tweet_count' => $tweet_count,
            'following_count' => $following_count,
            'is_edit_profile' => $is_edit_profile,
            'is_follow_button' => $is_follow_button,
            'listfollowers' =>  $listfollowers,
            'usersall' => $usersall,
          
            ]);
    }
    else{
        return view('welcome');
    }
    
}

  
  
   
}
