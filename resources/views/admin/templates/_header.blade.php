<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">                                 
    <img class="animation__shake" src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
</div>

  <!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
     <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          {{ ucwords(auth()->user()->name) }} ( {{ ucwords(auth()->user()->roles[0]->nama) }} )
        </a>

        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">        
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">Profile</a>
          <a class="dropdown-item dropdown-footer" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </div>
      </li>
    </ul>
  </nav>