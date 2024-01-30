<section class="content">
  <div class="left-content">
    <div class="activities">
      <h1>Last Students</h1>
      <div class="activity-container">
        <!-- latest students -->
        @for($x = 0 ; $x < count($data['students']) ; $x++) <div class="image-container img-{{$x+1}}">
          <img src="{{  getStudentImage($data['students'][$x]->image) }}" alt="not found" />
          <div class="overlay">
            <span class="name">{{$data['students'][$x]->name}}</span>
          </div>
      </div>
      @endfor
      <!-- latest students -->
    </div>
  </div>

  <div class="left-bottom">
    <div class="weekly-schedule">

      <h1>Zoom Schedule</h1>
      <div class="schedule">
        <!-- latest courses -->
        @for($x = 0 ; $x < count($data['courses']) ; $x++) <div class="day-and-activity activity-{{$x+1}}">
          <div class="day">
            <h1>{{ date_format(date_create($data['courses'][$x]->start_at),"d"); }}</h1>
            <p>{{ date_format(date_create($data['courses'][$x]->start_at),"M"); }}</p>
          </div>
          <div class="activity">
            <h2>{{ $data['courses'][$x]->topic }}</h2>
            <div class="participants">
            </div>
          </div>
          <a class="btn" href="{{ $data['courses'][$x]->join_url }}">Join</a>
      </div>
      @endfor
    </div>
    <h1>Event Schedule</h1>
    <div class="schedule">
      <!-- latest courses -->
      @for($x = 0 ; $x < count($data['events']) ; $x++) <div class="day-and-activity activity-{{$x+1}}">
        <div class="day">
          <h1>{{ date_format(date_create($data['events'][$x]->start_at),"d"); }}</h1>
          <p>{{ date_format(date_create($data['events'][$x]->start_at),"M"); }}</p>
        </div>
        <div class="activity">
          <h2>{{ $data['events'][$x]->title }}</h2>
          <div class="participants">
          </div>
        </div>

    </div>
    @endfor
  </div>
  </div>
  <!-- livewire -->
  <livewire:calendar />
  <!-- livewire -->

  </div>

  </div>


  <div class="right-content">

    <div class="user-info">

      <p style="font-size:18px;text-align:center">
        <span style="color:#6f42c1">{{ auth()->user()->name}}</span>
      </p>
      
      <form class="noti-form" method="post">
        @csrf
        <a class="nav-link dropdown-toggle open-noti" style="position: relative;"  id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="noti_num">{{ auth()->user()->unreadNotifications->count()}}</span>
          <img src="{{   getStudentImage(auth()->user()->image)  }}" alt="user" />
        </a>

        <div class="custom dropdown-menu" aria-labelledby="navbarDropdown">
          <div class="noti-wraper">
            <div class="noti-head">
              <div>
                Notification (<span class="not-count">{{ auth()->user()->unreadNotifications->count() }}</span>)
              </div>
              <!-- <div class="noti-readall">
                <a href="#" style="    color: #fff; text-decoration: none;">Mark all as read</a>
              </div> -->
            </div>
            <!-- body -->
            <div class="noti-body">
              @if(auth()->user()->unreadNotifications->count() > 0)
                @foreach (auth()->user()->unreadNotifications as $notification)
                @if (isset($notification->data['metting_id']))
                <div class="noti-details">
                  <p style="margin-bottom: 0;">
                    <span class="noti-from">{{ $notification->data['from'] }}</span>
                    <span class="noti-text">
                      Add new metting zoom <span class="title" style="font-weight: bold;"> {{ $notification->data['metting_topic'] }}</span> <a href="{{ $notification->data['metting_join_url']}}">join now</a>
                  </p>
                  <span class="noti-date">
                    {{ $notification->created_at }}
                  </span>
                </div>
                @endif
                @if (isset($notification->data['post_id']))
                <div class="noti-details" href="#">
                  <p style="margin-bottom: 0;">
                    <span class="noti-from">{{ $notification->data['from'] }}</span>
                    <span class="noti-text">
                      Add new post <span class="title" style="font-weight: bold;">{{ $notification->data['post_title'] }} </span><a href="{{ url('/trainning', ['slug' =>  $notification->data['post_slug'] ]) }}"> view post</a>
                  </p>
                  <span class="noti-date">
                    {{ $notification->created_at }}
                  </span>
                </div>
                @endif
                @endforeach
              @else 
              <div class="noti-details" href="#">
                  <p style="margin-bottom: 0;">
                    <span class="noti-from"></span>
                    <span class="noti-text">
                      You don't have any unread notifications
                  </p>

                </div>
              @endif
            </div>
            <!-- footer -->
            <div class="noti-footer">
              <a class=""  style="color: #fff;text-decoration:none" href="{{ route('show-all') }}">View All</a>
            </div>
          </div>

        </div>
      </form>
    </div>

    <div class="active-calories">
      <h1 style="align-self: flex-start">Posts Activity</h1>
      <div class="active-calories-container">
        <div class="box" style="--i: {{ $data['posts_count'] }}%">
          <div class="circle">
            <h2>{{ $data['posts_count'] }}<small>%</small></h2>
          </div>
        </div>
        <div class="calories-content">
          <p><span>Today:</span> {{ $data['posts_today'] }}</p>
          <p><span>This Week:</span>{{ $data['posts_lastweek'] }}</p>
          <p><span>This Month:</span> {{ $data['posts_month'] }}</p>
        </div>
      </div>
    </div>


    <div class="friends-activity">
      <h1>Best Websites</h1>
      <div class="card-container">
        @for($x = 0 ; $x < count($data['height_students']) ; $x++) <div class="card card-{{$x+1}}">
          <div class="card-user-info">

            <h2>{{$data['height_students'][$x]->name }}</h2>
          </div>
          <img class="card-img" src="{{ getStudentImage($data['height_students'][$x]->image) }}" alt="" />
          <p class="best-name"> {{$data['height_students'][$x]->name}} <br>
            {{$data['height_students'][$x]->points}} <i class="fa fa-heart heart_rating text-danger"></i>
          </p>

      </div>
      @endfor
    </div>
  </div>
  </div>

</section>