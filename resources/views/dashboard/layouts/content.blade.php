<section class="content">
  <div class="left-content">
    <div class="activities">
      <h1>Last Students</h1>
      <div class="activity-container">
        <!-- latest students -->
        @for($x = 0 ; $x < count($data['students']) ; $x++) 
        <div class="image-container img-{{$x+1}}">
          <img src="{{ url('/images/profile/students/'.$data['students'][$x]->image) }}" alt="tennis" />
          <div class="overlay">
            <h3>{{$data['students'][$x]->first_name}}</h3>
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
        @for($x = 0 ; $x < count($data['courses']) ; $x++)
         <div class="day-and-activity activity-{{$x+1}}">
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
    </div>
  <!-- livewire -->
  <livewire:calendar />
  <!-- livewire -->
 
  </div>

  </div>


  <div class="right-content">
    <div class="user-info">
      <div class="icon-container">
        <i class="fa fa-bell nav-icon"></i>
        <i class="fa fa-message nav-icon"></i>
      </div>
      <h4>{{ auth()->user()->name}}</h4>
      <img src="{{url('images/profile/users/'.auth()->user()->image)}}" alt="user" />
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
      @for($x = 0 ; $x < count($data['height_students']) ; $x++)
        <div class="card card-{{$x+1}}">
          <div class="card-user-info">
          
            <h2>{{$data['height_students'][$x]->first_name." ".$data['height_students'][$x]->last_name }}</h2>
          </div>
          <img class="card-img" src="{{ url('images/profile/students/'.$data['height_students'][$x]->image) }}" alt="" />
          <p>Number Of Points {{$data['height_students'][$x]->points}} </p>
        </div>
      @endfor
      </div>
    </div>
  </div>

</section>

