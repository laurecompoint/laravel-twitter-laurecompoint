@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row">
                        <div class="form-group col-6">
                            <label for="name" class="ml-3 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group col-6">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-12">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="ml-3 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="ml-3 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-12">
                               
                                <input id="password" type="password" class="form-control  @error('password')  is-invalid @enderror" name="password" required  autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <button class="buttonpassword" type="button" onclick="iconpassword()"
                                    ><i class='fas fa-eye' id="icon-password" style='font-size:18px;color:#17a2b8;'></i></button>
                                <div id="icon-vuelogin" class="icon-vueregister" onclick="iconpassword()"><i class='fas fa-eye-slash' style='font-size:18px;color:#17a2b8;'></i></div>
                              
                            </div>
                        </div>

                        <div class="form-group">
                           
                            <label for="password-confirm" class="ml-3 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                          
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                              
                            </div>
                        </div>

                        <div class="form-group float-left">
                            <div class="col-md-4 rmr-5" style="">
                                <button type="submit" class="btn btn-info">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="{{ asset('js/script.js') }}"> </script>