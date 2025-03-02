<!-- ======= Header =======  -->
  <header id="header" class="fixed-top" style="background-color: rgba(255,255,255,0.5);">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="/">VirtualFamilyGallery</a></h1>
      
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="/home">Home</a></li>
          <li><a href="/story">Our Story</a></li>
          <li><a href="/events">Events</a></li>
          <li><a href="/albums">Albums</a></li>
          @if(!Auth::check())
            <li><a href="/admin">Admin</a></li>
          @endif
        </ul>
      </nav> 
      @if(Auth::check()) 
        <nav class="nav-menu d-none d-lg-block">
          <ul>
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
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }}
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                          </form>
                      </div>
                  </li>
              @endguest
          </ul>
        </nav>
      @endif
      <!-- .nav-menu -->

    </div>
  </header><!-- End Header -->