<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
          <a class="navbar-brand brand-logo" href="{{ route('admin.dashboard') }}">
              {{-- <img src="{{ getImage('settings',getInfo('logo'))}}" alt="Property" /> --}}
              <b>Polling System</b>
          </a>
          <a class="navbar-brand brand-logo-mini" href="{{ route('admin.dashboard') }}">
              {{-- <img src="{{ getImage('settings',getInfo('logo'))}}" alt="logo" /> --}}
              <b>Polling System</b>
          </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>  
            <li class="nav-item">
              <a 
              style="text-decoration: none;color: #000;"
              target="_blank"
              href="">Visit Website</a>
            </li> 
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="{{ asset('public/backend/user/'.Auth::user()->image)}}" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black">{{ Auth::user()->name }}</p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="{{ route('admin.profile',[Auth::user()->id]) }}">
                  <i class="mdi mdi-cached me-2 text-success"></i> Profile </a>
                <div class="dropdown-divider"></div>                             
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>
            </li>                                     
            
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>