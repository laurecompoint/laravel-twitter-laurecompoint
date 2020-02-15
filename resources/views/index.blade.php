@extends('layouts.app')

@section('content')
<SCRIPT language="JavaScript">
function delete_confirm()
{
confirm("Vraiment ?");
if(Check == false) history.back();
}
</script>
<div class="w-75 m-auto">
<div class="row d-flex justify-content-between "  style="height:900px;">

<div class="col-6" >





<div class="card border-info mt-3" style="width: 18rem;">
  <div class="card-body">
  <form method="post" action="{{route('posts.create')}}">
    <input name="user_id" type="hidden" class="form-control" value="{{ Auth::user()->id }}" > 
    <textarea name="name" class="form-control" aria-label="With textarea"></textarea>
    {{csrf_field()}}
    <button type="summit" class="btn btn-info mt-3 col-12">Tweet</button>
  </form>
  </div>
</div>


</div>

<div class="col-6">

<div class="card" style="col-10">
  <div class="card-body">

  @if (session('alertdelete'))
        <div class="alert alert-success  h-100 col-12">
            {{ session('alertdelete') }}
        </div>
  @endif

  @if (session('alertcreate'))
        <div class="alert alert-success  h-100 col-12">
              {{ session('alertcreate') }}
        </div>
  @endif

 
  
  @forelse ($user->timeline() as $tweet)
  <div class="row mt-3">

  <div class="col-3">

    <div class="border border-dark" style="height: 80px;" >
      <img src="img/{{$tweet->user->avatar}}"  class="bg-black" style="width:99px; height:80px; float:left; margin-right:25px;"/>
    </div>

  </div>
  
  <div class="col-6">
        <p>{{$tweet->user->username}} - {{$tweet->created_at->diffForHumans()}}</p> 
        <p class="card-title">{{ $tweet->name }}</p> 
       
  </div>

  <div class="col-1">
  <button type="button" class="btn text-white"  style="opacity: 0.90;background-color: #660A11" data-toggle="modal" data-target="#exampleModal{{ $tweet->id }}">
      Suprimer
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
      <h6>Etes vous sur de vouloir suprimer ce tweet : " {{$tweet->name}} " ?</h6>

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
  
 
  </div>
  
 
  @empty
        <p>No tweet</p>
  @endforelse

  <div class="mt-3 float-right">
  
  </div>
  <button type="summit" class="btn btn-info mt-3 col-12">Show More</button>

  
 

</div>


</div>
</div>



</div>
@endsection