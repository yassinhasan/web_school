@extends('home.master')
@section('css')
<!-- Styles -->
<link href="{{ asset('css/home/index.css?ad') }}" rel="stylesheet">
@section('title')
My Heroes
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->

<!-- breadcrumb -->
@endsection
@section('content')
<!-- section -->
<div class="section-container">
    <section class="section" id="about">
        <i class="fa-solid fa-code"></i>
        <h1 class="section__title">Want to learn to code?
</h1>
        <p class="section__paragraph">
        Go ahead, give it a try. Our hands-on learning environment means you'll be writing real code from your very first lesson.
        I want to create a world where anyone can build something meaningful with technology, and everyone has the learning tools, resources, and opportunities to do so. Code contains a world of possibilities — all that’s required is the curiosity and drive to learn.
        </p>

        <!-- section-form -->
        <section class="section__form">
            <h2 class="section__form-title">Don’t just watch or read about someone else coding — write your own code live in our online</h2>
            <form id="form">
                @guest
                <a href="{{route('login') }}" class="login_btn">join us</a>
                @endguest
                @auth
                <a href="{{route('rating') }}" class="login_btn name_btn">wellcome {{ auth()->user()->name}}</a>
                @endauth
            </form>
        </section>
    </section>
</div>


<!-- cards -->
<div class="cards-container" id="pricing">
    <div class="card card-1">
        <div class="card__logo">
            <i class="fas fa-code"></i>
            <p class="card__title">HTML</p>
        </div>
        <i class="fab fa-html5"></i>
        <p class="card__info">
        Fun fact: all websites use HTML — even this one. It’s a fundamental part of every web developer’s toolkit. HTML provides the content that gives web pages structure, by using elements and tags, you can add text, images, videos, forms, and more. Learning HTML basics is an important first step in your web development journey and an essential skill for front- and back-end developers.
        </p>
        <a href="{{route('courses')}}" class="card__btn">Open Course</a>
    </div>
    <div class="card card-2">
        <div class="card__logo">
            <i class="fab fa-css3"></i>
            <p class="card__title">CSS</p>

        </div>
        <p class="card__info">
        You’ll find learning CSS essential in styling websites. Web developers use it to build on basic HTML and add personality to plain text pages. This course helps you expand your coding foundation and gives you CSS interactive practice to start adding colors and background images or editing layouts so you can create your very own, unique stylized web pages.
        </p>
        <a href="{{route('courses')}}" class="card__btn">Open Course</a>
    </div>
    <div class="card card-3">
        <div class="card__logo">
            <i class="fab fa-js"></i>
            <p class="card__title">Java Script</p>
        </div>
        <p class="card__info">
        You interact with JavaScript code all the time — you just might not realize it. It powers dynamic behavior on websites (like this one) and plays an important role in many fields, like front- and back-end engineering, game and mobile development, virtual reality, and more. In this course, you’ll learn JavaScript fundamentals that will be helpful as you dive deeper into more advanced topics.
        </p>
        <a href="{{route('courses')}}" class="card__btn">Open Course</a>
    </div>
</div>
@endsection

@section('js')

<!-- Scripts -->
<script src="{{ asset('js/home/index.js') }}" defer></script>
@endsection