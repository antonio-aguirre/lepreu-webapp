<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger" style="color:#A00303;" href="/">
      Lepreu
    </a>
    <button
      class="navbar-toggler navbar-toggler-right"
      type="button"
      data-toggle="collapse"
      data-target="#navbarResponsive"
      aria-controls="navbarResponsive"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      Menú <i class="fas fa-arrow-circle-down"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" style="color:gray;" href="#download"
            >Descargas</a>
        </li>
        
        @guest
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ route('login') }}" style="color:gray;">{{ __('Login') }}</a>
          </li>
        @else
          <li class="nav-item dropdown" >
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" 
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color:gray;">
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                  <a class="dropdown-item" href="{{ url('/home') }}" style="color:gray;">Panel administración </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" style="color:gray;">
                      Cerrar sesión
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