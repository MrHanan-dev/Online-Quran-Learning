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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </head>
  <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-chartbg" data-col="2-columns">

    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
      <div class="navbar-wrapper">
        <div class="navbar-container content">
          <div class="collapse navbar-collapse show" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left text-light">Payment History</ul>
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
          <li class="nav-item "><a href="/learner/myCourses"><i class="ft-pie-chart"></i><span class="menu-title">My Courses</span></a>
          </li>
          <li class="active"><a href="/learner/paymentHistory"><i class="ft-image"></i><span class="menu-title">Payment History</span></a>
          </li>
        </ul>
      </div>
      <div class="navigation-background"></div>
    </div>


    <div class="app-content content">
      <div class="content-wrapper">
         <div class="content-body">
            <table class="table ">
                <thead class="thead">
                  <tr>
                    <th scope="col">Tutor Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Date</th>
                    <th scope="col">Files</th>
                  </tr>
                </thead>

                <tbody class="mt-4">

                @foreach( $learner as $value)
                  <tr style="color:black">

                    <td class="text-capitalize">{{ $value->tutor_name}}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->course_name}}</td>
                    <td>{{ $value->gender}}</td>
                    <td>{{ $value->created_at}}</td>
                    <td>{{ $value->fileName}}</td>

                    <td>
                      <form class="" action="/learner/viewReciept/{{$value->course_id}}" method="get">
                        @csrf
                        <input type="text" name="file" value="{{ $value->fileName}}" hidden>
                        <input type="submit" class="btn btn-info btn-sm" name="submit" value="View">
                      </form>
                    </td>
                  </tr>
                  @endforeach

                </tbody>
               </table>
        </div>
      </div>
    </div>
          </div>
        </div>
      </div>


    <script src="/assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  </body>
</html>
