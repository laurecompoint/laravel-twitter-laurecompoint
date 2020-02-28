<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Follower;
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
       
        if (Auth::check()) {
           
            return view('index', [ 'user' => Auth::user() ]);
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
    public function create(Post $post, Follower $follower , Request $request)
    {
        $validate = $request->validate([
            'tweet' => 'required',
        
        ]);
        $post = new Post;
        $post->tweet = $request->tweet;
        $post->user_id = $request->user_id;

        if (Auth::check()) {

            $post->save();

            //user ce suit automiquement lors de la creation de son premier tweet, pour pouvoir afficher tout les tweets qu'il suis y compris les siens

            if( !$follower->where('user_id', Auth::user()->id)->update([  'user_id'  =>    Auth::user()->id, 'follower_user_id'  =>  Auth::user()->id ])){
                $follower = new Follower;
                $follower->follower_user_id = Auth::user()->id;
                $follower->user_id = Auth::user()->id;
                $follower->save();
            }else{
                $follower->where('user_id', Auth::user()->id)->update([  'user_id'  =>    Auth::user()->id, 'follower_user_id'  =>  Auth::user()->id ]);
            }
          
           return redirect()->back()->with('alertcreate', 'Le tweet  : "$post->tweet" a bien été crée' );
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
        $pageActuelle = url()->current();
       
        if($pageActuelle = 'twitter'){

          
           $newurl = '/twitter?page=2';
           return redirect($newurl);
        }
        else{

        }
  
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
            return redirect()->back()->with('alertdelete', 'Le tweet  :  " $post->name " a bien été suprimer' );
        }
       
    }
}
