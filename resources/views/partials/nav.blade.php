<nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
    <div class="container">

        <a class="navbar-brand" href="{{url('/')}}">
            Daily Notes
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                {{-- <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{url('/')}}"><i class="fas fa-home"></i> Home</a>
                </li> --}}
                @if(Auth::check()) 
                    <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                        <a class="nav-link" href="{{url('/dashboard')}}"><i class="fas fa-th-large"></i> Dashboard</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                @else
                    <li class="nav-item {{ Request::is('login') ? 'active' : '' }}">
                        <a class="nav-link" href="{{url('/login')}}">Login</a>
                    </li>
                    <li class="nav-item {{ Request::is('register') ? 'active' : '' }}">
                        <a class="nav-link" href="{{url('/register')}}">Register</a>
                    </li>
                @endif
                
            </ul>
        </div>

    </div>
</nav>