@extends('layouts.app')

@section('content')
<div class="container">
                
               
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white"> <h2>{{ $user->name }}'s Account</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                 
                </div>
                <div class="col-12">
                @if ($errors->any())
                    <div class="">
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger text-center col-12" role="alert">
                    <p>{{ $error }}</p>
                                
                    </div>
                @endforeach
                @endif
                @if (session('alertupdate'))
                <div class="alert alert-success  h-100 col-12">
                    {{ session('alertupdate') }}
                </div>
                @endif
                </div>              
                <form class="col-12" enctype="multipart/form-data" method="post" action="{{route('account.update')}}">
               
                <div class="form-group">
                    <input name="id" type="hidden" value="{{ Auth::user()->id }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <img src="img/{{ $user->avatar }}" style="width:150px; height:150px; float:left; margin-right:25px;">
                       
                            <label>Update Profile Image</label>
                            <input type="file" name="avatar">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                           
                       
                    </div>
                </div>
                <div class="row">
                <div class="form-group mt-2 col-6">
                    <label>Name</label>
                    <input name="name" value="{{ Auth::user()->name }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group col-6 mt-2">
                    <label for="exampleInputEmail1">User name</label>
                    <input name="username" value="{{ Auth::user()->username }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                </div>
              
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                   
                    <input id="password" type="password" name="password" class="form-control">
                    <button class="buttonpassword3" type="button" onclick="unmask()"
                                    title="Mask/Unmask password to check content"><i class='fas fa-eye' id="icon-password" style='font-size:18px;color:#17a2b8;'></i></button>
                                <div id="icon-vue" onclick="unmask()"><i class='fas fa-eye-slash' style='font-size:18px;color:#17a2b8;'></i></div>
                </div>
              
                {{csrf_field()}}
                <button type="summit" class="btn btn-info mt-3 mb-3 col-12">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="{{ asset('js/script.js') }}"> </script>