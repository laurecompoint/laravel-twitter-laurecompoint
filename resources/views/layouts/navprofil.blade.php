<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
 
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <style type="text/css">
        .no-bottom {
            bottom: 0;
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <div id="app">

    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   <i class='fab fa-twitter text-info' style='font-size:48px;'></i>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                               
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->username }}<img src="/img/{{ Auth::user()->avatar }}" class="" style="width: 40px"/>   <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <a class="dropdown-item" href="/account">
                                        Account
                                    </a>
                                    <a class="dropdown-item" href="/{{ Auth::user()->username }}">
                                        Profil
                                    </a>
                                   

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ URL::previous() }}"><i class='fas fa-arrow-left text-info' style='font-size:24px;'></i></a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="bg-info ">
        <nav class="m-auto row  d-flex justify-content-between" style="width: 82%; height: 70px">

        <div class="col-2 mt-4" >
       
            <a href="/twitter" class="text-white">Revenir au tweet</a>
       
        </div>
        
        <ul class="nav" style="margin-top: 13px">
               
                <li class="mr-5">
                   <a href="{{ url('/' . $userprofil->username) }}" class="text-center text-white w-75 {{ !Route::currentRouteNamed('profile') ?: 'text-danger' }}">
                        <div class="text-uppercase">Tweets</div>
                        <div>{{ $tweet_count }}</div>
                    </a>
                </li>
              
                <li class="nav-item pl-3">
                    <a href="{{ url('/' . $userprofil->username .'/following') }}" class="text-center text-white {{ !Route::currentRouteNamed('following') ?: 'text-danger' }}">
                        <div class="text-uppercase">Following</div>
                        <div>{{ $following_count }}</div>
                    </a>
                </li>
                
                <li class="nav-item ml-5 mb-3 ">
                    <a href="{{ url('/' . $userprofil->username . '/followers') }}" class="text-center text-white {{ !Route::currentRouteNamed('followers') ?: 'text-danger' }}">
                        <div class="text-uppercase">Followers</div>
                        <div>{{ $followers_count }}</div>
                    </a>
                </li>
               
        </ul>

        <div class="col-2 mt-3">
        @if (Auth::check())
                    @if ($is_edit_profile)
                    <a href="/account" class="navbar-btn navbar-right">
                        <button type="button" class="btn btn-white  text-info">Edit Profile</button>
                    </a>
                    @elseif ($is_follow_button)
                    <a href="{{ url('/follows/' . $userprofil->username) }}" class="navbar-btn navbar-right">
                        <button type="button" class="btn btn-default text-info">
                       
                            Follow
                        </button>
                       
                    </a>
                    @else
                    <a href="{{ url('/unfollows/' . $userprofil->username) }}" class="navbar-btn navbar-right">
                        <button type="button" class="btn btn-default text-danger">Unfollow</button>
                       
                    </a>
                    @endif
            @endif
        </div>

        </nav>
        </div>

    
        @yield('content')
    </div>


</body>
</html>