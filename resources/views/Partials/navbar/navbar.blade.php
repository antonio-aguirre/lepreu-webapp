    <nav class="navbar navbar-expand-lg navbar-dark" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="/"
            style="color:black;"
          >MEETINGS HELP</a
        >
        <button
          class="navbar-toggler navbar-toggler-right"
          type="button"
          data-toggle="collapse"
          data-target="#navbarResponsive"
          aria-controls="navbarResponsive"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          Menu
          <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">

                @guest
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link js-scroll-trigger disabled" style="color:black;" aria-disabled="true">
                        Ingresar</a>
                    </li>
                    
                @else
                     <li class="nav-item">
                        <a id="navbarDropdown" class="nav-link js-scroll-trigger" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:black;" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();" style="color:black;">
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