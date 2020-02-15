<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    // app/Http/Controllers/UserController.php
public function follows($username)
{
    // Find the User. Redirect if the User doesn't exist
    $user = User::where('username', $username)->firstOrFail();
// Find logged in User
    $id = Auth::id();
    $me = User::find($id);
    $me->following()->attach($user->id);
    return redirect('/' . $username);
}
public function unfollows($username)
{
    // Find the User. Redirect if the User doesn't exist
    $user = User::where('username', $username)->firstOrFail();
// Find logged in User
    $id = Auth::id();
    $me = User::find($id);
    $me->following()->detach($user->id);
    return redirect('/' . $username);
}
}
