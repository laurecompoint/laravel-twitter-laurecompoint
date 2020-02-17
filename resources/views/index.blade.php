@extends('layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<SCRIPT language="JavaScript">
function moretweet()
{
  var CheminComplet = document.location.href;
  
  if(CheminComplet = 'twitter'){
    var page2 = 2;
    var url2 = '/twitter' + (page2 > 1 ? '?page=' + page2 : '');
    document.location.href= " " + url2; 
  }
  
}
</script>

<div class="w-75 m-auto">
<div class="row d-flex justify-content-between "  style="height:900px;">

<div class="col-6" >

      <a href="twitter-user">
        <button type="button" class="btn btn-info text-white " style="width: 18rem;">Voir tous les User</button>
      </a>
                        


      <div class="card border-info mt-3" style="width: 18rem;">
        <div class="card-body">
        <form method="post" action="{{route('posts.create')}}">
          <input name="user_id" type="hidden" class="form-control" value="{{ Auth::user()->id }}" > 
          <textarea name="tweet" class="form-control" aria-label="With textarea"></textarea>
          {{csrf_field()}}
          <button type="summit" class="btn btn-info mt-3 col-12">Tweet</button>
        </form>
        </div>
      </div>
</div>  

<div class="col-6">

<div class="card" style="col-10" >
    <div class="card-body" style="border-radius: 22px #665A5C;box-shadow: 4px -2px 4px #665A5C;">

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


  @forelse ($user->timeline() as $tweet)
  <div class="">
  <div class="row mt-3" >

      <div class="col-3">

        <div class="border border-dark" style="height: 80px;" >
          <img src="img/{{$tweet->user->avatar}}"  class="bg-black" style="width:99px; height:80px; float:left; margin-right:25px;"/>
        </div>

      </div>
      
      <div class="col-6">
            <p>{{$tweet->user->username}} - {{$tweet->created_at->diffForHumans()}}</p> 
            <p class="card-title">{{ $tweet->tweet }}</p> 
          
      </div>

      <div class="col-1">
 
      @if ($tweet->user->username === Auth::user()->username)
            <button type="button" class="btn text-white ml-5"  style="opacity: 0.90" data-toggle="modal" data-target="#exampleModal{{ $tweet->id }}">
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
            <h6>Etes vous sur de vouloir suprimer ce tweet : " {{$tweet->tweet}} " ?</h6>

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
      @else

      @endif
 
  </div>
  
</div>
  </div>
  
  @empty

  <div class="mt-3 text-center border col-12 d-flex flex-column justify-content-center align-items-center align-content-center" style="  border-radius: 22px #665A5C;box-shadow: 2px 4px 4px #665A5C;">
   
      <h5 class="mt-5">Your dont have tweet...</h5>
      <img src="/img/notweet.png" class="w-50">

  </div>
 
  @endforelse

  
  <a  onclick="moretweet()">
<button type="summit" class="btn btn-info mt-3 col-12">Show More</button>
</a>

</div>

</div>

</div>



</div>

@endsection
