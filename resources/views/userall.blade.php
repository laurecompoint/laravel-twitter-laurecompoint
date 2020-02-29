@extends('layouts.app')

@section('content')
<div class="bg-info d-flex justify-content-center align-items-center align-content-center" style="height: 70px"><h4 class="text-white ">Users</h4></div>

<div class="">
<div class="mt-4 container-fluid row m-auto" style="width: 95% ;">

@foreach($usersall as $user)


<div class="bg-white border mr-5  mt-2" style="height: 150px;width: 20% ; background: url('/img/{{ $user->avatar }}') no-repeat;  background-size: cover;  border-radius: 22px #665A5C;box-shadow: 4px 2px 4px #665A5C;">
                   
                   <a href="{{ $user->username }}" class="text-dark ">
                       <h4 class="list-group-item-heading font-weight-bold">{{$user->name}}</h4>
                       <small class="list-group-item-text">@ {{$user->username}}</small>
                   </a>
              
</div>                                     
@endforeach
                       
   
</div>
</div>
@endsection
