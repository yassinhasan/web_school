<nav class="main-menu">
        <h1> <a href="{{ route('home') }}" class="text-light">Hullo  Code</a></h1>
        <a href="{{ route('home') }}" class="logo" ><img src="{{url('images/settings/logo.png') }}" alt="" style="margin: auto;" /></a>
        <ul>

          <li class="nav-item {{ Route::is('dashboard') ? 'active' : '' }}">
            <b></b>
            <b></b>
            <a href="{{ route('dashboard') }}">
              <i class="fa fa-house nav-icon" title="Home"></i>
             <span class="nav-text">Home</span>
            </a>
          </li>

          <li class="nav-item {{ Route::is('student.profile') ? 'active' : '' }}">
            <b></b>
            <b></b>
            <a href="{{ route('student.profile') }}">
              <i class="fa fa-user nav-icon" title="Porfile"></i>
             <span class="nav-text">Profile</span>
            </a>
          </li>
          <form method="POST" action="{{ route('student.logout') }}">
          @csrf
          <li class="nav-item {{ Route::is('student.logout') ? 'active' : '' }}">
            <b></b>
            <b></b>
            <a href="{{ route('student.logout')}}" onclick="event.preventDefault();
           this.closest('form').submit();">
              <i class="fa fa-sign-out nav-icon" title="Settings"></i> 
              <span class="nav-text"> Logout</span>
            </a>
          </li>
          </form>

        </ul>
      </nav>