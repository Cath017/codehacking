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
          <a class="navbar-brand" href="/">
              CodeHacking
          </a>
      </div>

      <div class="collapse navbar-collapse" id="app-navbar-collapse">
          <!-- Right Side Of Navbar -->
          <ul class="nav navbar-nav navbar-right">
              <!-- Authentication Links -->
              @if (Auth::guest())
                  <li><a href="{{ url('/login') }}">Login</a></li>
                  <li><a href="{{ url('/register') }}">Register</a></li>
              @else
                <li><a href="{{route('post.create')}}"><small>Create Post</small></a></li>
                <li><a href="{{ url('/') }}">Home</a></li>
                @if(auth()->user()->isAdmin())
                <li><a href="{{url('/admin') }}">Admin</a></li>
                @endif
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                    </ul>
                </li>
              @endif
          </ul>
      </div>
  </div>
</nav>
<div class="container">