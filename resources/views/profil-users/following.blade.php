@extends('layouts.navprofil')

@section('content')
<div class="m-auto" style="width: 84%">
    <div class="row">
        <div class="col-4  mt-5">
                <div class="bg-white mt-5">

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
        <div class="col-8 row mt-5 d-flex">
        
                    @forelse ($listfollowing as $following)
                    <div class="bg-white border  mt-2 col-4" style="margin-left: 5px;height: 150px;  background: url('/img/{{ $following->avatar }}') no-repeat;  background-size: cover;  border-radius: 22px #665A5C;box-shadow: 4px 2px 4px #665A5C;">
                        <div class="row">
                                <a href="{{ url('/' . $following->username) }}" class="text-info col-6">
                                    <h4 class="list-group-item-heading">{{ $following->name }}</h4>
                                    <strong class="list-group-item-text">@ {{ $following->username }}</strong>
                                
                                </a>
                                <strong class="list-group-item-text text-info col-6">{{ $following->created_at->diffForHumans() }}</strong>
                        </div>
                    </div>
                    @empty
                    <div class="mt-3 text-center  col-12 d-flex flex-column justify-content-center align-items-center align-content-center">
   
                        <h5 class="mt-5">No following</h5>
                        <img src="/img/nofollowing.png" class="w-50">

                    </div>
                    @endforelse
          
        </div>
    </div>
</div>
@endsection