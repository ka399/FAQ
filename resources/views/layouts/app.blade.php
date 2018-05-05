<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('includes.head')
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container mr-auto">


            @guest
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQz4DJIXmiBJ07hob-HCy0BC9G4mmS5cTrgt7q_c3ExLu0E-t6Uww"
                         style="width:50px; height:50px; float:left; border-radius:25%;margin-right:5px";>
                </a>
                <H4>Frequently Asked Questions</H4>
            @else
                <a class="navbar-brand " href="{{ route('home') }}">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQz4DJIXmiBJ07hob-HCy0BC9G4mmS5cTrgt7q_c3ExLu0E-t6Uww"
                         style="width:50px; height:50px; float:left; border-radius:25%;margin-right:5px";>
                </a>
                <H4>Frequently Asked Questions</H4>
            @endguest


            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                        <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @else


                        @if($profile->avatar!=null)
                        <img src="/uploads/avatars/{{ $profile->avatar }}" style="width:30px; height:30px; float:left; border-radius:25%;
                        margin-right:5px;">
                        @endif

                        <li class="nav-item dropdown">


                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                My Account <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @if (Auth::user()->profile)
                                    <a class="dropdown-item" href="{{ route('profile.show', ['user_id' => Auth::user()->id,'profile_id' => Auth::user()->profile->id]) }}">My Profile</a>

                                @else
                                    <a class="dropdown-item" href="{{ route('profile.create', ['user_id' => Auth::user()->id]) }}">Create Profile</a>
                                @endif


                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>


                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="col-12">
            @include('Flash.error')
            @include('Flash.messages')
            @include('Flash.status')
        </div>
        <section class="content-header">
        @yield('breadcrumbs')
        </section>
        @yield('content')

    </main>
</div>
<footer class="row">
    @include('includes.footer')
</footer>
</body>

</html>