@extends('layouts.app')

@section('content')

<div class="w-75 m-auto">
<div class="row d-flex justify-content-between "  style="height:900px;">

<div class="col-6" >

      <a href="twitter-user">
        <button type="button" class="btn btn-info text-white " style="width: 18rem;">Voir user que vous pouvez suivre</button>
      </a>
      <div class="card border-info mt-3" style="width: 18rem;">
        <div class="card-body">
        <form method="post" action="{{route('posts.create')}}">
          <input name="user_id" type="hidden" class="form-control" value="{{ Auth::user()->id }}" > 
          <textarea name="tweet"  data-emojiable="true" id="example"  class="form-control emojionearea-editor" aria-label="With textarea"></textarea>
         
          {{csrf_field()}}
          <button type="summit" class="btn btn-info mt-3 col-12">Tweet</button>
        </form>
        </div>
      </div>
</div>  

<div class="col-6">

<div class="card" style="col-10" >
    <div class="card-body" style="border-radius: 22px #665A5C;">

    @if (session('alertdelete'))
          <div class="alert alert-danger h-100 col-12">
              {{ session('alertdelete') }}
          </div>
    @endif

    @if (session('alertcreate'))
          <div class="alert alert-success  h-100 col-12">
                {{ session('alertcreate') }}
          </div>
    @endif

    
    @foreach ( $user->posts()->get() as $tweet  )
    <div class="row mt-3 m-auto" >

      <div class="col-3">

       
          <img src="img/{{$tweet->user->avatar}}"  class="bg-black mt-4"  style="width:99px; height: 80px"/>
       

      </div>
      
      <div class="col-8 mt-4">
            <p><a href="{{$tweet->user->username}}" class="text-dark"> {{$tweet->user->username}}</a> - {{$tweet->created_at->diffForHumans()}}</p> 
            <p class="card-title">{{ $tweet->tweet }}</p> 
          
      </div>
     
    
      <div class="col-1 mt-4">
     
     
            <button type="button" class="btn text-white"  style="opacity: 0.90; margin-left: -40px" data-toggle="modal" data-target="#exampleModal{{ $tweet->id }}">
              <i class="material-icons" style="font-size:36px; color: #660A11">delete_forever</i>
            </button>
            <div class="modal fade " id="exampleModal{{ $tweet->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog " role="document">
              <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Supression alerte ?</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <h6>Etês vous sur de vouloir supprimer ce tweet : " {{$tweet->tweet}} " ?</h6>

                    </div>
                    <div class="modal-footer">
                    
                          <form action="delete/{{ $tweet->id }}" method="POST">
                          {{ csrf_field() }}

                          <button class="btn text-white"   style="opacity: 0.90;background-color: #660A11">Oui</button>
                      
                          </form>
                    </div>
                </div>     
              </div>  
      </div>
     
     
 
  </div>
  @endforeach
    @forelse ($user->timeline() as $tweet  )

      <div class="row mt-3 m-auto" >

          <div class="col-3">

           
              <img src="img/{{$tweet->user->avatar}}"  class="bg-black mt-5" style="width:99px; height: 80px"/>
           

          </div>
          
          <div class="col-9 mt-5">
                <p><a href="{{$tweet->user->username}}" class="text-dark"> {{$tweet->user->username}}</a> - {{$tweet->created_at->diffForHumans()}}</p> 
                <p class="card-title">{{ $tweet->tweet }}</p> 
              
          </div>
        
        
    
      </div>
  

  @empty
  

  <div class="mt-3 text-center col-12 d-flex flex-column justify-content-center align-items-center align-content-center">
   
      <h5 class="mt-5">You dont have tweet of your following...</h5>
      <img src="/img/notweet.png" class="w-50">

  </div>
 
  
  @endforelse

  
  

  @if ($user->timeline()->count() == 5)
  <form method="post" action="{{route('posts.store')}}">
  {{csrf_field()}}
  <button type="summit" class="btn btn-info mt-3 col-12" style="width:485px">Show More</button>
  </form> 
  @else

  @endif
  
</div>

</div>

</div>
</div>

@endsection
