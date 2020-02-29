<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use Image;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
//page user all
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
//page account affichage
public function show()
{
    if (Auth::check()) {
        
        return view('account', ['user' => Auth::user()] );
    }
    else{
        return view('welcome');
    }
  
}
//mise à jour du compte
public function update(Request $request)
{
    if(!empty($request->password)){
        $validate = $request->validate([
            'password' => ['required', 'string', 'min:8'],
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            ]);
    }
    $validate = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'username' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255'],
    ]);
    $user = Auth::user();
    if($request->hasFile('avatar')){
        $avatar = $request->file('avatar');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(300, 300)->save( public_path('/img/' . $filename ) );
        $user->avatar =  $filename;

    }

    $user->name = $request->name;
    $user->username = $request->username;
    $user->email = $request->email;
    if(!empty($request->password)){
        $user->password = Hash::make($request->password);
    }
  
    $user->save();
    return redirect()->back()->with('alertupdate', "User name :   $user->name  à bien été mis à jour" );
    
}
//suprime l'avatar 
public function destroyavatar(User $user)
{
    $user->where('avatar', Auth::user()->avatar)->update([  'avatar'  =>    'avatar.png']);
    return redirect()->back()->with('alertdeleteavatar', "Votre avatar à bien été suprime et remplacer par celui par défaut" );
}


//destroy account user
public function destroy(User $user)
{
    $user = User::find(Auth::user()->id);
    $user->delete();
    return redirect()->route('login')->with('alertdeleteuser', "Votre compte à bien été suprime" );
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
