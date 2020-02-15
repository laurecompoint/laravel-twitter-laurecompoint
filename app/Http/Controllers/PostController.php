<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use Illuminate\Http\Request;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = $post->user()->orderBy('id', 'DESC')->paginate(2);
       // $posts = $post->orderBy('id', 'DESC')->paginate(4);
        //dd($posts);
       
        
        $userurl = User::where('id', Auth::user()->id)->firstOrFail();
        if (Auth::check()) {
           
            return view('index', [
                'user' => Auth::user(),
                'userurl' => $userurl,
                
                ]);

               
        }
        else{
            return view('welcome');
        }
        
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post, Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
        
        ]);
        $post = new Post;
        $post->name = $request->name;
        $post->user_id = $request->user_id;
       
        if (Auth::check()) {
            $post->save();
            return redirect()->back()->with('alertcreate', "Le tweet  :   $post->name  à bien été crée" );
        }
      
     

        
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
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, Request $request)
    {
        $post = Post::find($post->id = $request->id);
        
        if (Auth::check()) {
          
            $post->delete();
            return redirect()->back()->with('alertdelete', "Le tweet  :   $post->name  à bien été suprimer" );
        }
       
    }
}
