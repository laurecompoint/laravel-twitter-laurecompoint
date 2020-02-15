@extends('layouts.profile')

@section('content')
<div class="m-auto" style="width: 84%">
    <div class="row">
        <div class="col-md-4 col-md-offset-2 mt-5">
                <h5> {{ $userurl->name  }}</h5>
                <small>@ {{ $userurl->username  }}</small>
                <div class="mt-3  border border-info" style="width: 18rem; height: 400px; border-radius: 22px;box-shadow: 5px -4px 5px #17a2b8;">
                        
               
                 <h6 class="mt-4 text-center text-info">Personne que vous pouvez suivre</h6>
                

                 <div class="mt-4 container">
                 @foreach($usersall as $user)
                    <div class="col-12 mt-3">
            
                    <a href="{{$user->username}}">
                       <button type="button" class="btn btn-info text-white col-12">{{$user->username}}</button>
                       </a>
                    </div>
                    @endforeach
                    
                    
                </div>

                
                 <a href="" class="float-right mr-4 mt-3">Voir plus</a>   
                </div>
        </div>
        <div class="col-md-8 col-md-offset-2 row mt-5 d-flex flex-wrap">
           
         
               
        
                    @forelse ($list as $following)
                    <div class="bg-white border  mt-2 w-25 ml-2" style="height: 150px;  background: url('/img/{{ $following->avatar }}') no-repeat;  background-size: cover;  border-radius: 22px #665A5C;box-shadow: 4px 2px 4px #665A5C;">
                   
                        <a href="{{ url('/' . $following->username) }}" class="text-info">
                            <h4 class="list-group-item-heading">{{ $following->name }}</h4>
                            <small class="list-group-item-text">@ {{ $following->username }}</small>
                        </a>
                   
                    </div>
                    @empty
                    <div class="mt-3 text-center border col-12 d-flex flex-column justify-content-center align-items-center align-content-center" style="  border-radius: 22px #665A5C;box-shadow: 4px -2px 4px #665A5C;">
   
                        <h5 class="mt-5">No following</h5>
                        <img src="/img/nofollowing.png" class="w-50">

                    </div>
                    @endforelse
          
        </div>
    </div>
</div>
@endsection