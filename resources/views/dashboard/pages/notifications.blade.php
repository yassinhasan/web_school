@extends('dashboard.master')

@section('title')
students
@endsection

@section('content')
<!-- row -->
<div class="container">
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="weekly-schedule">

            <h1>All Notifications</h1>

            <div class="schedule">
                <!-- latest courses -->
                @for($x = 0 ; $x < count($notifications) ; $x++) @if (isset($notifications[$x]->data['metting_id']))
                    <div class="day-and-activity activity-{{$x+1}}">
                        <div class="day">
                            <h1>{{ date_format(date_create($notifications[$x]->created_at),"d"); }}</h1>
                            <p>{{ date_format(date_create($notifications[$x]->created_at),"M"); }}</p>
                        </div>
                        <div class="activity">
                            <h2>{{ $notifications[$x]->data['from'] }}</h2>
                            Add new metting zoom <span class="title" style="font-weight: bold;"> {{ $notifications[$x]->data['metting_topic'] }}</span>
                            <div class="participants">
                            </div>
                        </div>
                        <a class="btn" href="{{ $notifications[$x]->metting_join_url }}">Join</a>
                    </div>
                    @else
                    <div class="day-and-activity activity-{{$x+1}}">
                        <div class="day">
                            <h1>{{ date_format(date_create($notifications[$x]->created_at),"d"); }}</h1>
                            <p>{{ date_format(date_create($notifications[$x]->created_at),"M"); }}</p>
                        </div>
                        <div class="activity">
                            <h2>{{ $notifications[$x]->data['from'] }}</h2>
                            Add new post <span class="title" style="font-weight: bold;">{{ $notifications[$x]->data['post_title'] }} </span>
                            <div class="participants">
                            </div>
                        </div>
                        <a class="btn" href="{{ url('/trainning', ['slug' =>  $notifications[$x]->data['post_slug'] ]) }}"> view post</a>
                    </div>
                    @endif

                    @endfor
            </div>
        </div>
    </div>
</div>
</div>
    <!-- row closed -->

    @endsection
    @section('js')

    @endsection