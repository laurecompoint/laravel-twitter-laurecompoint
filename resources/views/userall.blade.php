@extends('layouts.app')

@section('content')
<div class="bg-info d-flex justify-content-center align-items-center align-content-center" style="height: 70px"><h4 class="text-white ">Users</h4></div>
<div class="mt-4 container row d-flex flex-wrap">

@foreach($usersall as $user)


<div class="bg-white border ml-2 mt-2 w-25" style="height: 150px;  background: url('/img/{{ $user->avatar }}') no-repeat;  background-size: cover;  border-radius: 22px #665A5C;box-shadow: 4px 2px 4px #665A5C;">
                   
                   <a href="{{ $user->username }}" class="text-info">
                       <h4 class="list-group-item-heading">{{$user->name}}</h4>
                       <small class="list-group-item-text">@ {{$user->username}}</small>
                   </a>
              
</div>                                  
                   
               
@endforeach
                       
   
</div>
@endsection
