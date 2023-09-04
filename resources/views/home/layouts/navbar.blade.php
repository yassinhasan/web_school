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
       <li data-active="{{Route::currentRouteName() =='profile'?'true':'false'}}"><a href="{{route('profile') }}">Profile</a></li>
       <li data-active="{{ preg_match('#^courses|^html#' ,Route::currentRouteName()) == 1 ? 'true':'false'}}"><a href="{{route('courses') }}">Courses</a></li>
       @guest
       <li data-active="{{preg_match('#^login|^register|^password|^profile#' ,Route::currentRouteName()) == 1 ? 'true':'false'}}"><a href="{{route('login') }}">Login</a></li>
       @endguest
       @auth
       <li class="dropdown" data-active="{{preg_match('#^profile.#' ,Route::currentRouteName()) == 1 ? 'true':'false'}}">
         <span class="dropdown-toggle" type="button" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           {{ auth()->user()->name}}
         </span>
         <div class="dropdown-menu" aria-labelledby="profileDropdown" style="z-index: 100;">
           <a class="dropdown-item" href="{{ route('profile.edit') }}">Edit Profile</a>
           <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
           <form method="POST" action="{{ route('logout') }}">
             @csrf
             <a href="route('logout')" class="dropdown-item" onclick="event.preventDefault();
                                            this.closest('form').submit();">
               <i class="text-danger ti-unlock"></i> {{ __('Log Out') }}
             </a>
           </form>
         </div>
       </li>
       @endauth
     </ul>
   </nav>
 </header>