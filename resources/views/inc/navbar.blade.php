            <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    @if(Auth::guest())
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name') }}
                    </a>
                    @endif
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                        @if(Auth::check())
                              <ul class="nav navbar-nav">
                                <li class="{{ Request::is('home') ? 'active': '' }}"><a href="/home">
                                <i class="fa fa-home" aria-hidden="true"></i>
                                Home</a></li>
                                <li class="{{ Request::is('posts') ? 'active': '' }}"><a href="/posts">Blogs</a></li>
                                <li class="{{ Request::is('chat') ? 'active': '' }}"><a href="/chat">Chat Room</a></li>
                                <li class="{{ Request::is('about') ? 'active': '' }}"><a href="/about">About</a></li>
                              </ul>
                        @endif

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right"> 
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <img src="{{ Cloudder::show('avatars/' . Auth::user()->avatar)}}" alt="Profile Picture" class="img-circle" width="25" height="20">
                                    {{ Auth::user()->name . ' ' . Auth::user()->lname }}  
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                <li>
                                <a href="{{ route('profile') }}">
                                   <i class="fa fa-user" aria-hidden="true"></i>
                                   Profile
                                </a>
                                </li>
                                    <li>

                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>