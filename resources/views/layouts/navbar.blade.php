 <?php

  use Illuminate\Support\Facades\Route;
  ?>
 <!-- navbar -->
 <!-- you can easily turn the "li" into a button using the "onclick" js function -->
 <header class="main_navbar">
   <nav>
     <ul>
       <div class="selectedLink">
         <div class="side left"></div>
         <div class="side right"></div>
         <div class="outside left"></div>
         <div class="outside right"></div>
         <div class="dot"></div>
       </div>
       <li data-active="{{Route::currentRouteName() == 'home'?'true':'false'}}"> <a href="{{route('home') }}">Home</a></li>
       @auth
       <li data-active="{{Route::currentRouteName() == 'rating'?'true':'false'}}"> <a href="{{route('rating') }}">Rating</a></li>
       <li data-active="{{Route::currentRouteName() =='profile'?'true':'false'}}"><a href="{{route('profile') }}">Profile</a></li>
       @endauth
       <li data-active="{{ preg_match('#^courses|^html#' ,Route::currentRouteName()) == 1 ? 'true':'false'}}"><a href="{{route('courses') }}">Courses</a></li>
       @guest
       <li data-active="{{preg_match('#^login|^register|^password|^profile.#' ,Route::currentRouteName()) == 1 ? 'true':'false'}}"><a href="{{route('login') }}">Login</a></li>
       @endguest
       @auth
       <li data-active="{{preg_match('#^login|^register|^password|^profile.#' ,Route::currentRouteName()) == 1 ? 'true':'false'}}"><a href="{{route('dashboard') }}"><i class="fa-solid fa-user"></i></a></li>
       <form method="POST" action="{{ route('logout') }}">
         @csrf
         <li data-active="{{preg_match('#^logout#' ,Route::currentRouteName()) == 1 ? 'true':'false'}}"><a href="{{route('logout') }}"
         onclick="event.preventDefault();
                                            this.closest('form').submit();">
         <i class="fa-solid fa-right-from-bracket"></i></a></li>
       </form>
       @endauth
     </ul>
   </nav>
 </header>