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
                                {{ Auth::user()->name }}<img src="/img/{{ Auth::user()->avatar }}" class="" style="width: 40px"/>   <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <a class="dropdown-item" href="account">
                                        Account
                                    </a>
                                    <a class="dropdown-item" href="{{ Auth::user()->username }}">
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

        <div class="col-2" >
        <a href="{{ url('/' . $userurl->username) }}"><h4 class="text-white"><img src="/img/{{ $userurl->avatar }}" class="" style="width: 200px; "/>  </h4> </a>
        </div>
        
        <ul class="nav" style="margin-top: 13px">
               
                <li class="mr-5">
                   <a href="{{ url('/' . $userurl->username) }}" class="text-center text-white w-75 {{ !Route::currentRouteNamed('profile') ?: 'text-danger' }}">
                        <div class="text-uppercase">Tweets</div>
                        <div>{{ $following_tweet }}</div>
                    </a>
                </li>
              
                <li class="nav-item pl-3">
                    <a href="{{ url('/' . $userurl->username .'/following') }}" class="text-center text-white {{ !Route::currentRouteNamed('following') ?: 'text-danger' }}">
                        <div class="text-uppercase">Following</div>
                        <div>{{ $following_count }}</div>
                    </a>
                </li>
                
                <li class="nav-item ml-5 mb-3 ">
                    <a href="{{ url('/' . $userurl->username . '/followers') }}" class="text-center text-white {{ !Route::currentRouteNamed('followers') ?: 'text-danger' }}">
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
                    <a href="{{ url('/follows/' . $userurl->username) }}" class="navbar-btn navbar-right">
                        <button type="button" class="btn btn-default text-info">
                       
                            Follow
                        </button>
                        <svg class="w-25" style="position: absolute; top: -3px; left: -16px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 100 125" enable-background="new 0 0 100 100" xml:space="preserve"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.782,89.35C-1.283,75.66-0.807,59.494,7.858,48.896  c7.53-9.214,18.234-11.375,28.01-4.605c4.45,3.083,6.102,1.778,9.117-1.553c8.423-9.311,19.157-13.455,31.602-10.583  c10.987,2.53,17.548,10.237,20.763,20.776c5.302,17.368-3.433,38.383-19.34,45.59c8.817-6.918,14.931-15.442,17.118-26.523  c3.479-17.629-6.572-34.376-23.037-37.909c-8.101-1.74-14.996,1.387-20.969,6.231C38.261,50.75,29.073,70.963,40.142,89.927  c0.729,1.239,3.068,2.851-0.105,4.544c-1.488-3.163-3.08-6.243-4.397-9.44c-1.029-2.504-0.958-4.504-5.367-3.187  c-3.991,1.188-4.926-3.75-4.985-7.195c-0.064-4.021-0.535-9.417,5.038-9.399c3.356,0.006,3.48-1.169,4.079-3.181  c0.388-1.311,0.953-2.609,1.076-3.944c0.317-3.426,5.49-6.529,0.87-10.281c-4.838-3.924-10.011-6.228-16.471-3.712  C9.034,48.349,1.433,62.457,3.708,75.201C4.443,79.352,6.018,83.349,7.782,89.35z"/><path fill-rule="evenodd" clip-rule="evenodd" d="M89.631,26.076c-9.188-5.726-16.936-10.07-26.358-9.561  c-2.438,0.129-3.38-1.346-3.438-3.953C59.582,1.246,63.632-1.343,73.76,4.121C81.789,8.453,86.622,15.284,89.631,26.076z"/><path fill-rule="evenodd" clip-rule="evenodd" d="M3.473,18.972c3.509-2.469,7.854-2.104,11.598-3.595  c4.303-1.719,8.224-3.885,11.322-7.436c1.293-1.478,1.399-5.07,4.773-3.421c3.421,1.669,7.23,2.895,9.481,6.298  c0.694,1.052,0.335,2.213-0.517,3.116C32.711,21.832,12.149,26.476,3.473,18.972z"/><path fill-rule="evenodd" clip-rule="evenodd" d="M77.951,71.745c-0.253,4.655-0.389,10.051-5.309,10.234  c-5.167,0.193-5.52-5.532-5.602-9.424c-0.089-3.95,0.429-9.563,5.366-9.699C77.58,62.71,77.499,68.2,77.951,71.745z"/></svg>
                    </a>
                    @else
                    <a href="{{ url('/unfollows/' . $userurl->username) }}" class="navbar-btn navbar-right">
                        <button type="button" class="btn btn-default text-danger">Unfollow</button>
                        <svg class="w-25" style="position: absolute; top: -3px; left: -16px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 100 125" enable-background="new 0 0 100 100" xml:space="preserve"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.782,89.35C-1.283,75.66-0.807,59.494,7.858,48.896  c7.53-9.214,18.234-11.375,28.01-4.605c4.45,3.083,6.102,1.778,9.117-1.553c8.423-9.311,19.157-13.455,31.602-10.583  c10.987,2.53,17.548,10.237,20.763,20.776c5.302,17.368-3.433,38.383-19.34,45.59c8.817-6.918,14.931-15.442,17.118-26.523  c3.479-17.629-6.572-34.376-23.037-37.909c-8.101-1.74-14.996,1.387-20.969,6.231C38.261,50.75,29.073,70.963,40.142,89.927  c0.729,1.239,3.068,2.851-0.105,4.544c-1.488-3.163-3.08-6.243-4.397-9.44c-1.029-2.504-0.958-4.504-5.367-3.187  c-3.991,1.188-4.926-3.75-4.985-7.195c-0.064-4.021-0.535-9.417,5.038-9.399c3.356,0.006,3.48-1.169,4.079-3.181  c0.388-1.311,0.953-2.609,1.076-3.944c0.317-3.426,5.49-6.529,0.87-10.281c-4.838-3.924-10.011-6.228-16.471-3.712  C9.034,48.349,1.433,62.457,3.708,75.201C4.443,79.352,6.018,83.349,7.782,89.35z"/><path fill-rule="evenodd" clip-rule="evenodd" d="M89.631,26.076c-9.188-5.726-16.936-10.07-26.358-9.561  c-2.438,0.129-3.38-1.346-3.438-3.953C59.582,1.246,63.632-1.343,73.76,4.121C81.789,8.453,86.622,15.284,89.631,26.076z"/><path fill-rule="evenodd" clip-rule="evenodd" d="M3.473,18.972c3.509-2.469,7.854-2.104,11.598-3.595  c4.303-1.719,8.224-3.885,11.322-7.436c1.293-1.478,1.399-5.07,4.773-3.421c3.421,1.669,7.23,2.895,9.481,6.298  c0.694,1.052,0.335,2.213-0.517,3.116C32.711,21.832,12.149,26.476,3.473,18.972z"/><path fill-rule="evenodd" clip-rule="evenodd" d="M77.951,71.745c-0.253,4.655-0.389,10.051-5.309,10.234  c-5.167,0.193-5.52-5.532-5.602-9.424c-0.089-3.95,0.429-9.563,5.366-9.699C77.58,62.71,77.499,68.2,77.951,71.745z"/></svg>
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