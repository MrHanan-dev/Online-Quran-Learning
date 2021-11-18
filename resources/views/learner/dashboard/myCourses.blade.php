<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Learner Dashboard</title>
    <link rel="apple-touch-icon" href="/assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="/assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/app-lite.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/core/menu/menu-types/vertical-menu.css">
  </head>
  <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-chartbg" data-col="2-columns">

    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
      <div class="navbar-wrapper">
        <div class="navbar-container content">
          <div class="collapse navbar-collapse show" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left text-light">Learner Dashboard</ul>
            <ul class="nav navbar-nav float-right">

                            <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="avatar avatar-online"><img src="/assets/images/learnerProfile-Pictures/{{Auth::guard('web')->user()->photo}}" alt="avatar"><i></i></span></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <div class="arrow_box_right"><a class="dropdown-item" href="#"><span class="avatar avatar-online"><span class="user-name text-bold-700 ml-1">{{Auth::guard('web')->user()->learner_name}}</span></span></a>
                                  <div class="dropdown-divider"></div><a class="dropdown-item" href="/learner/editProfile/{{Auth::guard('web')->user()->id}}"><i class="ft-user"></i> Edit Profile</a>
                                  <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ route('learner.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="ft-power"></i> Logout</a>
                                  <form action="{{ route('learner.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>
                                </div>
                              </div>
                            </li>

                          </ul>
                        </div>
                      </div>
                    </div>
                  </nav>


                  <div class="main-menu menu-fixed menu-light menu-accordion  menu-shadow " data-scroll-to-active="true" data-img="/assets/images/backgrounds/02.jpg">
                    <div class="navbar-header">
                      <ul class="nav navbar-nav flex-row">
                        <li class="nav-item mr-auto"><span class="navbar-brand" >
                          <h5 class="brand-text">Learn Quran</h5></span>
                        </li>
          <li class="nav-item d-md-none">
            <a class="nav-link close-navbar"><i class="ft-x"></i></a>
         </li>
        </ul>
      </div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class="nav-item"><a href="/learner/home"><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
          </li>
          <li class=" nav-item"><a href="/learner/findTutor"><i class="ft-credit-card"></i><span class="menu-title" data-i18n="">Find Tutor</span></a>
          </li>
          <li class=" nav-item"><a href="/learner/viewProfile/{{Auth::guard('web')->user()->id}}"><i class="ft-box"></i><span class="menu-title">Profile</span></a>
          </li>
          <li class=" active"><a href="/learner/myCourses"><i class="ft-pie-chart"></i><span class="menu-title">My Courses</span></a>
          </li>
          <li class=" nav-item"><a href="/learner/paymentHistory"><i class="ft-image"></i><span class="menu-title">Payment History</span></a>
          </li>
        </ul>
      </div>
      <div class="navigation-background"></div>
    </div>

    <div class="app-content content">
      <div class="content-wrapper">
         <div class="content-body">

              <div class="row">
                  <div class="col-lg-12 col-md-12">
                      <div class="card">
                          <div class="card-header">
                              <h4 class="card-title">Courses</h4>
                          </div>
                          <div class="card-content collapse show">
                              <div class="card-body">

                                @if (Session::get('leave'))
                                <div class="alert alert-danger">
                                    {{ Session::get('leave') }}
                                </div>
                                @endif

                                @if(count($courses) > 0 )
                                @foreach($courses as $course)
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10 shadow">
                                        <div class="media p-3">
                                            <div class="media-body">
                                              <div class="container">
                                                <div class="row">
                                                  <div class="col-4">
                                                    <h4><a class="text-left mr-5" href="/learner/viewEnrolledCourse/{{$course->id}}">{{$course->name}} </a> </h4>
                                                  </div>
                                                  <div class="col-5">

                                                  </div>
                                                  <div class="col-3">
                                                    <p class="text-right text-dark">Course Fee : {{$course->fees}}$</p>
                                                  </div>
                                                </div>
                                                <p>Teacher : {{$course->tutorName}}</p>
                                                <p>Description : {{$course->description}}</p>
                                              </div>


                                            </div>

                                        </div>
                                    </div>
                                        <div class="col-md-1"></div>
                                    </div> <br> <br><br>
                                </div>
                                @endforeach
                                @else
                                 <h4>You Are Not Enrollrd In Any Course Yet</h4>
                                @endif
                              </div>
                          </div>
                      </div>
                  </div>
              </div>


          </div>
        </div>
      </div>





    <script src="/assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  </body>
</html>
