
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tutor Dashboard</title>
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
            <ul class="nav navbar-nav mr-auto float-left text-light">
              <li> <a class="btn text-light" href="/tutor/demoClassInvitations">Demo Class Invitations</a></li>
              <li> <a class="btn text-light" href="/tutor/enrollmentInvitations">Course Enrollment Invitations </a></li>
            </ul>
            <ul class="nav navbar-nav float-right">
              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="avatar avatar-online"><img src="/assets/images/tutorProfile-Pictures/{{Auth::guard('tutor')->user()->photo}}" alt="avatar"><i></i></span></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <div class="arrow_box_right"><a class="dropdown-item" href="#"><span class="avatar avatar-online"><img src="/assets/images/tutorProfile-Pictures/{{Auth::guard('tutor')->user()->photo}}" alt="avatar"><span class="user-name text-bold-700 ml-1">{{Auth::guard('tutor')->user()->name}}</span></span></a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="/tutor/editProfile/{{Auth::guard('tutor')->user()->id}}"><i class="ft-user"></i>Edit Profile</a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ route('tutor.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="ft-power"></i> Logout</a>
                    <form action="{{ route('tutor.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>


    <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="/assets/images/backgrounds/02.jpg">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mr-auto"><span class="navbar-brand"><h3 class="brand-text">Teach Quran</h3></span></li>
          <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
      </div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class="nav-item"><a href="/tutor/home"><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
          </li>
          <li class=" nav-item"><a href="/tutor/findLearner"><i class="ft-credit-card"></i><span class="menu-title" data-i18n="">Find Learner</span></a>
          </li>
          <li class=" nav-item"><a href="/tutor/viewProfile/{{Auth::guard('tutor')->user()->id}}"><i class="ft-droplet"></i><span class="menu-title" data-i18n="">Profile</span></a>
          </li>
          <li class=" nav-item"><a href="/tutor/showCourses"><i class="ft-box"></i><span class="menu-title" data-i18n="">My Courses</span></a>
          </li>
          <li class=" nav-item"><a href="/tutor/demoClassInvitations"><i class="ft-layers"></i><span class="menu-title" data-i18n="">Invitations</span></a>
          </li>
          <li class=" active"><a href="/tutor/myStudents"><i class="ft-pie-chart"></i><span class="menu-title" data-i18n="">My Students</span></a>
          </li>
          <li class=" nav-item"><a href="/tutor/paymentLearnerHistory"><i class="ft-pie-chart"></i><span class="menu-title" data-i18n="">Payment Recipts</span></a>
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
                            <h4 class="card-title">My Students</h4>
                        </div>
                          <div class="card-content collapse show">
                              <div class="card-body">

                                @if (Session::get('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                                @endif
                                @if (Session::get('fail'))
                                <div class="alert alert-primary">
                                    {{ Session::get('fail') }}
                                </div>
                                @endif

                                @if(count($learner)>0)
                                <table class="table">
                                      <thead class="thead">
                                        <tr>

                                          <th scope="col">Name</th>
                                          <th scope="col">Email</th>
                                          <th scope="col">Course</th>
                                          <th scope="col">Gender</th>
                                          <th scope="col">Age</th>
                                          <th scope="col">Country</th>
                                          <th scope="col">View</th>
                                          <th scope="col">Remove</th>
                                        </tr>
                                      </thead>

                                      <tbody class="mt-4">

                                        @foreach( $learner as $learner)
                                       <tr style="color:black">

                                         <td class="text-capitalize">{{ $learner->learner_name}}</td>
                                         <td>{{ $learner->email }}</td>
                                         <td>{{ $learner->name}}</td>
                                         <td>{{ $learner->gender}}</td>
                                         <td>{{ $learner->age}}</td>
                                         <td>{{ $learner->country}}</td>
                                         <td>


                                           <form class="" action="/tutor/viewMyStudent/{{$learner->id}}" method="get">
                                             @csrf
                                             @method('POST')
                                             <input type="text" name="course_name" value="{{$learner->name}}" hidden>
                                             <input type="text" name="course_id" value="{{$learner->courseID}}" hidden>
                                             <input type="text" name="course_schedule" value="{{$learner->schedule}}" hidden>
                                             <input type="text" name="course_howToConduct" value="{{$learner->howToConduct}}" hidden>
                                             <input type="submit" class="btn btn-info btn-sm" name="submit" value="View">
                                           </form>
                                         </td>
                                         <td>
                                           <form class="" action="/tutor/removeMyStudent/{{$learner->id}}" method="get">
                                             @csrf
                                             @method('POST')
                                             <input type="text" name="course_name" value="{{$learner->name}}" hidden>
                                             <input type="text" name="course_schedule" value="{{$learner->schedule}}" hidden>
                                             <input type="text" name="course_howToConduct" value="{{$learner->howToConduct}}" hidden>
                                             <input type="submit" class="btn btn-danger btn-sm" name="submit" value="Remove">
                                           </form>
                                         </td>
                                       </tr>
                                       @endforeach
                                       @else
                                       <h3>You Don't Have Any Student Yet </h3>
                                       @endif
                                      </tbody>
                                     </table>

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
