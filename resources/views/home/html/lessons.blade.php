@extends('home.master')
@section('css')
<!-- Styles -->
<link href="{{ asset('css/layouts/nav2.css?sad') }}" rel="stylesheet">
<link href="{{ asset('css/home/html/lessons.css') }}" rel="stylesheet">
@endsection()
<!-- style -->

@section('title')
My Heroes Courses
@endsection()

<!-- navbar -->

@section("navbar")
    @include('home.layouts.navbar2')
@endsection()
<!-- navbar -->

@section('page-header')
      <!-- breadcrumb -->
      <div aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('courses') }}">Courses</a></li>
          <li class="breadcrumb-item active" aria-current="page">HTML Lessons</li>
          <!-- <li class="breadcrumb-item active" aria-current="page">Data</li> -->
        </ol>
      </div>
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- articles -->
    <div class="accordion" id="main_accordio">
            <!-- why html -->
            <div class="card bg bg-info">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Why HTML?
                        </button>
                    </h2>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#main_accordio">
                    <div class="card-body">
                        <p>

                            What is <span class="marked">HTML</span>?
                            HTML is short for HyperText Markup Language and is the foundation of what exists on the web.
                        </p>

                        <p class="question"><strong>Why Should Learn HTML?</strong></p>
                        <ol type="1" class="list-group list-group-flush">
                            <li class="list-group-item">1-Lots of Job opportunities</li>
                            <li class="list-group-item">2-HTML teaches students about structuring data and dealing with
                                text-based syntax</li>
                        </ol>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Future front-end programmers</li>
                            <li class="list-group-item">Those who work in marketing and content management:</li>
                            <li class="list-group-item">Bloggers and websites owners:</li>
                        </ul>
                    </div>
                </div>
            </div>
             <!-- why html end -->
            <!-- head and body -->
            <div class="card bg bg-secondary">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            HTML head and body
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#main_accordio">
                    <div class="card-body">
                        <div style="padding-left: 2em">
                            <p><code>&lt;!DOCTYPE html&gt;</code> — This tag
                                <strong>specifies the language</strong> you will write on the page. In this case, the
                                language is HTML 5.</p>
                            <p><code>&lt;html&gt;</code> — This tag signals that from here on
                                we are going to write in HTML code.</p>
                            <p><code>&lt;head&gt;</code> — This is where all the
                                <strong>metadata for the page</strong> goes — stuff mostly meant for search engines and
                                other computer programs.</p>
                            <p><code>&lt;body&gt;</code> — This is where the <strong>content
                                    of the page</strong> goes.</p>
                        </div>
                        <figure class="wp-block-image">
                            <img alt="HTML Structure" decoding="async" class="image"
                                src="{{url('images/html/head_body2.jpeg')}}">
                            <figcaption><em>This is how your average HTML page is structured visually.</em></figcaption>
                        </figure>
                        <p>Inside the <code>&lt;head&gt;</code> tag, there is one tag that is always included:
                            <code>&lt;title&gt;</code></p>
                        <p> let's see this example</p>
                        <div style="padding-left: 2em">
                            <pre>
<b>&lt;html&gt;</b>
    <b>&lt;head&gt;</b>
        <b>&lt;title&gt;</b>Welcome to Heroes Website.<b>&lt;/title&gt;</b>
    <b>&lt;/head&gt;</b>
<b>&lt;/html&gt;</b>
                                </pre>
                        </div>
                        <!-- try button -->
                        <button class="btn btn-success run" type="button" data-toggle="modal" data-target="#editor">Try Edit</button>

                        <!-- try button -->
                    </div>
                </div>
            </div>
            <!-- end head and body -->
            <!-- tag elemnts-->
            <div class="card bg bg-danger">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            HTML Tag Elemets
                        </button>
                    </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#main_accordio">
                    <div class="card-body">
                        <!-- heading -->
                        <h3><u>HTML Headings &lt;h1&gt;  &lt;/h1&gt;</u></h3>
                        <p>The HTML heading tags (&lt;h1&gt; to &lt;h6&gt;) are used to add headings to a webpage. For example,</p>
                        <div style="padding-left: 2em">
                            <pre>
<b>&lt;html&gt;</b>
    <b>&lt;head&gt;</b>
         <b>&lt;title&gt;</b>Welcome to Heroes Website.<b>&lt;/title&gt;</b>
    <b>&lt;/head&gt;</b>
    <b>&lt;body&gt;</b>
         <b>&lt;h1&gt;</b>Heading 1<b>&lt;/h1&gt;</b>
         <b>&lt;h2&gt;</b>Heading 1<b>&lt;/h2&gt;</b>
         <b>&lt;h3&gt;</b>Heading 1<b>&lt;/h3&gt;</b>
         <b>&lt;h4&gt;</b>Heading 1<b>&lt;/h4&gt;</b>
         <b>&lt;h5&gt;</b>Heading 1<b>&lt;/h5&gt;</b>
         <b>&lt;h6&gt;</b>Heading 1<b>&lt;/h6&gt;</b>
    <b>&lt;/body&gt;</b>
<b>&lt;/html&gt;</b>
                                </pre>
                        <!-- try button -->
                        <button class="btn btn-success run" type="button" data-toggle="modal" data-target="#editor">Try Edit</button>
                        <!-- try button -->
                                <figure class="wp-block-image">
                                    <img alt="Heading Structure" decoding="async" class="image"
                                        src="{{url('images/html/heading1.jpg')}}">
                                    <figcaption><em>In the example, we have used tags &lt;h1&gt; to &lt;h6&gt; to create headings of varying sizes and importance.</em></figcaption>
                                </figure>
                        </div>
                        <!-- end heading -->
                        <!-- Paragraphs -->
                        <h2><u>HTML Paragraphs  &lt;p&gt;  &lt;/p&gt;</u></h2>
                        <p>HTML paragraphs  always start on a new line</p>
                        <div style="padding-left: 2em">
                            <pre>
<b>&lt;html&gt;</b>
    <b>&lt;head&gt;</b>
         <b>&lt;title&gt;</b>Welcome to Heroes Website.<b>&lt;/title&gt;</b>
    <b>&lt;/head&gt;</b>
    <b>&lt;body&gt;</b>
         <b>&lt;p&gt;</b> Short Paragraph <b>&lt;p&gt;</b>
         <b>&lt;p&gt;</b> Long Paragraph, this is a long paragraph with more text to fill an entire line in the website<b>&lt;p&gt;</b>
    <b>&lt;/body&gt;</b>
<b>&lt;/html&gt;</b>
                                </pre>
                        <!-- try button -->
                        <button class="btn btn-success" type="button" data-toggle="modal" data-target="#editor">Try Edit</button>
                        <!-- try button -->
                                <figure class="wp-block-image">
                                    <img alt="Heading Structure" decoding="async" class="image"
                                        src="{{url('images/html/paragraph.png')}}">
                                </figure>
                        </div>
                        <!-- end paragraph -->
                        <!-- formating text -->
                        <h3><b><u>HTML Format Tags</u></b></h3>
                        <h5>Line-break tag &ltbr/&gt</h5>
                        <p>The line-break tag should be used to start the text from the next line. No opening tags and closing tags are available for this.</p>
                        <h5>Horizontal lines &lthr&gt</h5>
                        <p>Horizontal lines are used to break down or separate different sections in a document. A horizontal line is drawn from the position of the cursor to the extreme right margin.</p>
                        <h5>Bold tag &ltb&gt &lt/b&gt</h5>
                        <p>To make the text bold,</p>
                        <h5>Italic tag &lti&gt &lt/i&gt</h5>
                        <p>To make the text Italic</p>
                        <h5>Underline tag &ltu&gt &lt/u&gt</h5>
                        <p>To underline the text</p>
                        <div style="padding-left: 2em">
                            <pre>
<b>&lt;html&gt;</b>
    <b>&lt;head&gt;</b>
         <b>&lt;title&gt;</b>Welcome to Heroes Website.<b>&lt;/title&gt;</b>
    <b>&lt;/head&gt;</b>
    <b>&lt;body&gt;</b>
         <b>&lt;p&gt;</b> Paragraph <b>&lt;/p&gt;</b>
         <b>&lt;br&gt;</b>
         <b>&lt;hr&gt;</b>
         <b>&lt;b&gt;</b> text is bold <b>&lt;/b&gt;</b>
         <b>&lt;i&gt;</b> text is Italic <b>&lt;/i&gt;</b>
         <b>&lt;u&gt;</b> text is underline <b>&lt;/u&gt;</b>

    <b>&lt;/body&gt;</b>
<b>&lt;/html&gt;</b>
                                </pre>
                        <!-- try button -->
                        <button class="btn btn-success run" type="button" data-toggle="modal" data-target="#editor">Try Edit</button>
                        <!-- try button -->
                        <table class="table table-striped table-dark">
                        <tbody><tr>
                        <th style="width:20%">Tag</th>
                        <th>Description</th>
                        </tr>
                        <tr>
                        <td>&lt;b&gt</td>
                        <td>Defines bold text</td>
                        </tr>
                        <tr>
                        <td>&lt;em&gt;</td>
                        <td>Defines emphasized text&nbsp;</td>
                        </tr>
                        <tr>
                        <td>&lt;i&gt;</td>
                        <td>Defines a part of text in an alternate voice or mood</td>
                        </tr>
                        <tr>
                        <td>&lt;small&gt;</td>
                        <td>Defines smaller text</td>
                        </tr>
                        <tr>
                        <td>&lt;strong&gt;</td>
                        <td>Defines important text</td>
                        </tr>
                        <tr>
                        <td>&lt;sub&gt;</td>
                        <td>Defines subscripted text</td>
                        </tr>
                        <tr>
                        <td>&lt;sup&gt;</td>
                        <td>Defines superscripted text</td>
                        </tr>
                        <tr>
                        <td>&lt;ins&gt;</td>
                        <td>Defines inserted text</td>
                        </tr>
                        <tr>
                        <td>&lt;del&gt;</td>
                        <td>Defines deleted text</td>
                        </tr>
                        <tr>
                        <td>&lt;mark&gt;</td>
                        <td>Defines marked/highlighted text</td>
                        </tr>
                        </tbody></table>
                        </div>          

                        <!-- end formating text -->
                    </div>
                </div>
            </div>
            <!-- end tag elemnts -->
      </div>
<!-- articles -->
@endsection

@section('editor')
    <!-- editor modal -->
    <div class="modal fade" id="editor" tabindex="-1" role="dialog" aria-labelledby="editorModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="row" style="width: 100%; justify-content: space-between;padding: 0 1rem;margin-bottom: 10px;">
              <h5 class="modal-title" style="font-weight: 800;" id="editorModalLabel">HTML</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 1.5rem;">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="form-group">
              <textarea class="form-control html_code" style="font-family: monospace;" id="exampleFormControlTextarea1"
                rows="10" placeholder="enter your code here"></textarea>
            </div>
            <button type="button" class="btn btn-danger run" style="margin-bottom: 15px;">Run</button>
            
            <div class="embed-responsive embed-responsive-16by9 html_preview_div">
              <iframe class="embed-responsive-item html_preview"></iframe>
            </div>
          </div>  
        </div>
      </div>
    </div>
    <!-- editor modal -->
@endsection('editor')


<!-- footer -->
@section("footer")
@include('home.layouts.footer')
@endsection()

<!-- footer -->

<!-- Scripts -->
@section('js')
<script src="{{ asset('js/layouts/nav2.js') }}" ></script>
<script src="{{ asset('js/home/html/videos.js') }}" defer></script>
@endsection
