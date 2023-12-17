<nav class="main-menu">
        <h1>Hullo  Code</h1>
        <img class="logo" src="https://github.com/ecemgo/mini-samples-great-tricks/assets/13468728/4cfdcb5a-0137-4457-8be1-6e7bd1f29ebb" alt="" />
        <ul>
          <li class="nav-item {{ Route::is('dashboard') ? 'active' : '' }}">
            <b></b>
            <b></b>
            <a href="{{ route('dashboard') }}">
              <i class="fa fa-house nav-icon"></i>
             <span class="nav-text">Home</span>
            </a>
          </li>

          <li class="nav-item {{ Route::is('student.index') ? 'active' : '' }}">
            <b></b>
            <b></b>
            <a href="{{ route('student.index') }}">
              <i class="fa fa-user nav-icon"></i>
              <span class="nav-text">Students</span>
            </a>
          </li>

          <li class="nav-item {{ Route::is('posts.create') ? 'active' : '' }}">
            <b></b>
            <b></b>
            <a href="{{ route('posts.create') }}">
              <i class="fa fa-calendar-check nav-icon"></i>
              <span class="nav-text">Add Post</span>
            </a>
          </li>
          <li class="nav-item {{ Route::is('posts.index') ? 'active' : '' }}">
            <b></b>
            <b></b>
            <a href="{{ route('posts.index') }}">
              <i class="fa fa-calendar-check nav-icon"></i>
              <span class="nav-text">Show Posts</span>
            </a>
          </li>
          <li class="nav-item {{ Route::is('attendance.index') ? 'active' : '' }}">
            <b></b>
            <b></b> 
           <a href="{{ route('attendance.index') }}">
              <i class="fa fa-calendar-check nav-icon"></i>
              <span class="nav-text">Attendance</span>
            </a>
          </li>
          <li class="nav-item {{ Route::is('attendance.report') ? 'active' : '' }}">
            <b></b>
            <b></b>
           <a href="{{ route('attendance.report') }}">
              <i class="fa fa-calendar-check nav-icon"></i>
              <span class="nav-text">Att.. Report</span>
            </a>
          </li>

          <li class="nav-item {{ Route::is('categories.index') ? 'active' : '' }}">
            <b></b>
            <b></b>
            <a href="{{ route('categories.index') }}">
              <i class="fa fa-person-running nav-icon"></i>
              <span class="nav-text">categories</span>
            </a>
          </li>

          <li class="nav-item {{ Route::is('zoom.index') ? 'active' : '' }}">
            <b></b>
            <b></b>
            <a href="{{ route('zoom.index')}}">
              <i class="fa fa-sliders nav-icon"></i>
              <span class="nav-text">Zoom</span>
            </a>
          </li>
          
          <li class="nav-item {{ Route::is('settings.index') ? 'active' : '' }}">
            <b></b>
            <b></b>
            <a href="{{ route('settings.index')}}">
              <i class="fa fa-sliders nav-icon"></i>
              <span class="nav-text">Settings</span>
            </a>
          </li>


        </ul>
      </nav>