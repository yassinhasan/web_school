<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->

                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Components </li>
                    <!-- menu item students-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#students">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">Students</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="students" class="collapse" data-parent="#sidebarnav">
                            <!-- here only if parents -->
                            <!-- here only if admin -->
                            <li><a href="{{ route('students.all') }}">Show Students</a></li>
                           <!-- <li><a href="{{ route('student.index') }}">My Students</a></li> -->
                          

                        </ul>
                    </li>
                      <!-- end menu item students-->
                    <!-- menu item attendance-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#attendance">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">Attendance</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="attendance" class="collapse" data-parent="#sidebarnav">
                            <!-- here only if parents -->
                            <!-- here only if admin -->
                            <li><a href="{{ route('attendance.index') }}">Attendance</a></li>                                  
                        </ul>
                    </li>
                      <!-- end menu item attendance-->
                    <!-- menu item parents-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#parents">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">Family</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="parents" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('parents.index')}}">Parents</a> </li>
                            <!-- <li> <a href="calendar-list.html">List Calendar</a> </li> -->
                        </ul>
                    </li>
                    <!-- menu item categories-->
                    <li>
                        <a href="{{route('categories.index')}}"><i class="ti-menu-alt"></i><span class="right-nav-text">
                                Categories</span> </a>
                    </li>
                    <!-- posts -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#posts">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">Posts</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="posts" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('posts.create')}}">Add New Post</a> </li>
                            <li> <a href="{{route('posts.index')}}">Posts</a> </li>
                            <!-- <li> <a href="calendar-list.html">List Calendar</a> </li> -->
                        </ul>
                    </li>                    
                    <!-- zoom -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#zoom">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">Zoom</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="zoom" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('zoom.index')}}">Zoom Mettings</a> </li>
                            <!-- <li> <a href="calendar-list.html">List Calendar</a> </li> -->
                        </ul>
                    </li>                    
                    <!-- menu item chat-->
                    <li>
                        <a href="{{route('settings.index')}}"><i class="ti-comments"></i><span class="right-nav-text">Settings
                            </span></a>
                    </li>
                    <!-- menu item mailbox-->
                    <li>
                        <a href="mail-box.html"><i class="ti-email"></i><span class="right-nav-text">Mail
                                box</span>
                                 <!-- <span class="badge badge-pill badge-warning float-right mt-1">HOT</span> -->
                                 </a>
                    </li>
                    <!-- menu item Charts-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart">
                            <div class="pull-left"><i class="ti-pie-chart"></i><span
                                    class="right-nav-text">Charts</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="chart" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="chart-js.html">Chart.js</a> </li>
                            <li> <a href="chart-morris.html">Chart morris </a> </li>
                            <li> <a href="chart-sparkline.html">Chart Sparkline</a> </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================