<?php 
  use Illuminate\Support\Facades\Route;
?>
    
<header>
    <div class="menu-cont" id="toggle">
      <span class='menu-txt' data-text='CLOSE-'>
      -MENU
    </span>
    </div>
  </header>
  <div class="menu-overylay" id="overlay">
    <nav class="nav-menu">
      <ul>
    
       @if (Route::currentRouteName() != 'home' )
           <li> <a href="{{route('home') }}">Home</a></li> 
      @endif
      
      @if(auth('user')->check() || auth('admin')->check() || auth('student')->check())
      <li><a href="{{route('courses') }}">Courses</a></li>
      <li><a href="{{route('cards') }}">Cards</a></li>
        <li><a href="{{route('rating') }}">Rating</a></li>
        <li><a href="{{route('dashboard') }}">Dashboard</a></li>
        @else
        <li><a href="{{route('student.login') }}"> Login</a></li>
        <li><a href="{{route('student.register') }}"> Register</a></li>
     
      @endif

      @if(auth('user')->check())
        <form method="POST" action="{{ route('user.logout') }}">
         @csrf
         <li><a href="{{route('user.logout') }}"
         onclick="event.preventDefault();
           this.closest('form').submit();">
           Logout
         </a></li>
       </form>
      @elseif(auth('admin')->check())
        <form method="POST" action="{{ route('admin.logout') }}">
         @csrf
         <li><a href="{{route('admin.logout') }}"
         onclick="event.preventDefault();
           this.closest('form').submit();">
           Logout
         </a></li>
       </form>
      @elseif(auth('student')->check())
        <form method="POST" action="{{ route('student.logout') }}">
         @csrf
         <li><a href="{{route('student.logout') }}"
         onclick="event.preventDefault();
           this.closest('form').submit();">
           Logout
         </a></li>
       </form>
        @endif



      </ul>    
    </nav>
  </div>
  <!-- <div class="transparent"></div> -->
