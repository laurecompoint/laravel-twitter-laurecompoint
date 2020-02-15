<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

public function index(User $user){
    $usersall = $user->get();
    if (Auth::check()) {
        return view('/userall')->with([
            'usersall' => $usersall,
        ]);
    }
    else{
        return view('welcome');
    }
  
}
    
public function follows($username)
{
    
    $user = User::where('username', $username)->firstOrFail();

    $id = Auth::id();
    $me = User::find($id);
    $me->following()->attach($user->id);
    return redirect('/' . $username);
}
public function unfollows($username)
{
   
    $user = User::where('username', $username)->firstOrFail();

    $id = Auth::id();
    $me = User::find($id);
    $me->following()->detach($user->id);
    return redirect('/' . $username);
}
}
