<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Account;
use Image;
use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        if (Auth::check()) {
            
            return view('account', ['user' => Auth::user()] );
        }
        else{
            return view('welcome');
        }
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
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
       $user->password = Hash::make($request->password);
       $user->save();
        return redirect()->back()->with('alertupdate', "User name :   $user->name  à bien été mis à jour" );
        
    }

    public function destroyavatar(Account $account, User $user)
    {
        $user->where('avatar', Auth::user()->avatar)->update([  'avatar'  =>    'avatar.png']);
        return redirect()->back()->with('alertdeleteavatar', "Votre avatar à bien été suprime et remplacer par celui par défaut" );
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account, User $user)
    {
        $user = User::find(Auth::user()->id);
        $user->delete();
        //return redirect('home/dashboard');
        //return redirect('twitter');
        return redirect()->route('login')->with('alertdeleteuser', "Votre compte à bien été suprime" );
    }
}
