<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
      {{-- <h1 class="logo me-auto"><a href="index.html">Presento<span>.</span></a></h1> --}}
      <!-- Uncomment below if you prefer to use an image logo -->
      <a @guest
          href="{{ route('home') }}"
        @endguest
        @auth
          href="{{ route('adminHome') }}"
        @endauth
        class="logo me-auto"><img src="{{ asset('assets/img/loveComputer.png') }}" alt=""></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          @auth
            <li><a class="nav-link scrollto @if(Route::is('adminHome')) active @endif" href="{{ route('adminHome') }}">Accueil</a></li>

            <li><a class="nav-link scrollto @if(Route::is('myPost')) active @endif" href="{{ route('myPost') }}">Mes publications</a></li>

            <li><a class="nav-link scrollto @if(Route::is('postMemeView')) active @endif" href="{{ route('postMemeView') }}">Publier un même</a></li>

            @if(Auth::user()->role == "sadmin")
              <li><a class="nav-link scrollto @if(Route::is('admins')) active @endif" href="{{ route('admins') }}">Liste des admins</a></li>
            @endif
            
            <li><a type="submit" class="nav-link scrollto" href="{{ route('logout') }}">Déconnexion</a></li>
          @endauth

          @guest
            <li><a class="nav-link scrollto" href="{{ route('loginVue') }}">Se connecter</a></li>
          @endguest
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

      @auth  
        <a href="{{ route('becomeAdmin') }}" class="get-started-btn scrollto">{{ Auth::user()->pseudo }}</a>
      @endauth

      @guest
        <a href="{{ route('becomeAdmin') }}" class="get-started-btn scrollto">Devenir Admin</a>
      @endguest

    </div>
  </header>