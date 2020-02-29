
@extends('layouts.navprofil')

@section('content')
<div class="m-auto" style="width: 84%">
    <div class="row">
        <div class="col-md-4 col-md-offset-2 mt-5">

                <div class="bg-white">
                <a href="{{ url('/' . $userprofil->username) }}"><h4 class="text-white"><img src="/img/{{ $userprofil->avatar }}" class="" style="width: 200px; "/>  </h4> </a>
                <h5 class="mt-4 text-info">  {{ $userprofil->name  }}</h5>
                <small>@ {{ $userprofil->username  }}</small>

                </div>

                <div class="mt-3  border border-info" style="width: 18rem; height: 330px; border-radius: 22px;">
                        
               
                 <h6 class="mt-4 text-center text-info">Personne que vous pouvez suivre</h6>
                

                 <div class="mt-4 container">
                 @foreach($usersall as $user)
                    <div class="col-12 mt-3">
            
                    <a href="/{{$user->username}}">
                       <button type="button" class="btn btn-info text-white col-12">{{$user->username}}</button>
                       </a>
                    </div>
                 @endforeach
                    
                    
                </div>

                
                 <a href="/twitter-user" class="float-right mr-4 mt-3">Voir plus</a>   
                </div>
        </div>
        <div class="col-md-8 col-md-offset-2 mt-5">


        <div class="mt-3 text-center border col-12 d-flex justify-content-center align-items-center align-content-center" style=" height: 80px; border-radius: 22px #665A5C;box-shadow: 4px -2px 4px #665A5C;">
   
                <h4>Tweets</h4>

        </div>
        
            @forelse ($userprofil->posts()->get() as $tweet)
          
            <div class="mt-3  border col-12 d-flex justify-content-start align-items-center " style=" min-height: 80px; border-radius: 22px #665A5C;">
   
            <div class="container">
                    <strong class="">@ {{ $userprofil->username  }} - {{ $tweet->created_at->diffForHumans() }}</strong>
                    <p class="lead">{{ $tweet->tweet }}</p>
                </div>

            </div>
          
            @empty
            <div class="mt-3 text-center col-12 d-flex flex-column justify-content-center align-items-center align-content-center">
   
                 <h5 class="mt-5">No tweet</h5>
                 <img src="/img/notweet.png" class="w-50">

            </div>
               
            @endforelse
          
        </div>
    </div>
</div>

@endsection
