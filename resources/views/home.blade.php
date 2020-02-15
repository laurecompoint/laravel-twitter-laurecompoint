@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info">Mon Compte</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="panel-body">
    @forelse ($user->timeline() as $tweet)
        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">{{ $tweet->name }}</h4>
            <p class="list-group-item-text">{{ $tweet->created_at }}</p>
        </a>
    @empty
        <p>No tweet</p>
    @endforelse
</div>

                </div>
              
            </div>
        </div>
    </div>
</div>
@endsection
