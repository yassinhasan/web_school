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
      <li><a href="{{route('courses') }}">Courses</a></li>
        @guest
        <li><a href="{{route('login') }}">Login</a></li>
        <li><a href="{{route('register') }}">Register</a></li>
        @endguest
        @auth
        <li><a href="{{route('rating') }}">Rating</a></li>
        <li><a href="{{route('profile') }}">Cards</a></li>
        <li><a href="{{route('profile.edit') }}">{{ auth()->user()->name }}</a></li>
        <li><a href="{{route('dashboard') }}">Dashboard</a></li>
        <li><a href="{{route('addstudent') }}">Add Student</a></li>
        <form method="POST" action="{{ route('logout') }}">
         @csrf
         <li><a href="{{route('logout') }}"
         onclick="event.preventDefault();
           this.closest('form').submit();">
           Logout
         </a></li>
       </form>  
        @endauth

      </ul>    
    </nav>
  </div>
  <!-- <div class="transparent"></div> -->
