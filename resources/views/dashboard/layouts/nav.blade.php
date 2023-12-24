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

          <li class="nav-item {{ Route::is('student.index') ? 'active' : '' }}">
            <b></b>
            <b></b>
            <a href="{{ route('student.index') }}">
              <i class="fa fa-user-group nav-icon" title="Students"></i>
              <span class="nav-text">Students</span>
            </a>
          </li>
          
          <li class="nav-item {{ Route::is('categories.index') ? 'active' : '' }}">
            <b></b>
            <b></b>
            <a href="{{ route('categories.index') }}">
              <i class="fa fa-layer-group nav-icon" title="Categories"></i>
              <span class="nav-text">Categories</span>
            </a>
          </li>
          <li class="nav-item {{( Route::is('posts.index') ||  Route::is('posts.create') ||  Route::is('posts.edit')  ) ? 'active' : '' }}">
            <b></b>
            <b></b>
            <a href="{{ route('posts.index') }}">
            <i class="fa  fa-pen-to-square nav-icon" title="Show Posts"></i>
              <span class="nav-text">Show Posts</span>
            </a>
          </li>
          <li class="nav-item {{ Route::is('attendance.index') ? 'active' : '' }}">
            <b></b>
            <b></b> 
           <a href="{{ route('attendance.index') }}">
              <i class="fa fa-clipboard-user nav-icon" title="Attendance"></i> 
              <span class="nav-text">Attendance</span>
            </a>
          </li>
          <li class="nav-item {{ (Route::is('attendance.report')  ||  Route::is('attendance.search'))? 'active' : '' }}">
            <b></b>
            <b></b>
           <a href="{{ route('attendance.report') }}">
              <i class="fa fa-chart-line nav-icon" title="Attendance Report"></i> 
              <span class="nav-text">Attendance Report</span>
            </a>
          </li>

          <li class="nav-item {{ Route::is('zoom.index') ? 'active' : '' }}">
            <b></b>
            <b></b>
            <a href="{{ route('zoom.index')}}">
              <i class="fa fa-handshake nav-icon" title="zoom metting"></i> 
              <span class="nav-text">Zoom</span>
            </a>
          </li>
          
          <li class="nav-item {{ Route::is('settings.index') ? 'active' : '' }}">
            <b></b>
            <b></b>
            <a href="{{ route('settings.index')}}">
              <i class="fa fa-gear nav-icon" title="Settings"></i> 
              <span class="nav-text">Settings</span>
            </a>
          </li>


        </ul>
      </nav>