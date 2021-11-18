<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <link rel="apple-touch-icon" href="/assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="/assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/app-lite.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/core/menu/menu-types/vertical-menu.css">
    <style>
      .box{
        height: 100px;
        border: 1px solid beige;
        margin: 10px;;
        padding: 10px;
        margin-left: 40px;
        text-align: center;
      }
    </style>
  </head>
  <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-chartbg" data-col="2-columns">

    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
      <div class="navbar-wrapper">
        <div class="navbar-container content">
          <div class="collapse navbar-collapse show" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left text-light">Admin</ul>
            <ul class="nav navbar-nav float-right">

              <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-mail"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <div class="arrow_box_right"><a class="dropdown-item" href="#"><i class="ft-book"></i> Read Mail</a><a class="dropdown-item" href="#"><i class="ft-bookmark"></i> Read Later</a><a class="dropdown-item" href="#"><i class="ft-check-square"></i> Mark all Read       </a></div>
                </div>
              </li>

              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="avatar avatar-online"><img src="/assets/images/learnerProfile-Pictures/learnerAvatar.png" alt="avatar"><i></i></span></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <div class="arrow_box_right"><a class="dropdown-item" href="#"><span class="avatar avatar-online"><span class="user-name text-bold-700 ml-1">Admin</span></span></a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="ft-power"></i> Logout</a>
                    <form action="{{ route('admin.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>
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
          <li class="nav-item mr-auto"><a class="navbar-brand" href="index.html">
              <h5 class="brand-text">Admin</h5></a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link close-navbar"><i class="ft-x"></i></a>
         </li>
        </ul>
      </div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class="active"><a href="/admin/home"><i class="ft-home"></i><span class="menu-title" data-i18n="">Home</span></a>
          </li>
          <li class=" nav-item"><a href="/admin/learner"><i class="ft-credit-card"></i><span class="menu-title" data-i18n="">Learners</span></a>
          </li>
          <li class=" nav-item"><a href="/admin/tutor"><i class="ft-box"></i><span class="menu-title">Tutors</span></a>
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

                         
                          <div class="container">
                              <div class="row">
                                  <div class="col-md-1"></div>
                                  <div class="col-md-10 shadow">
                                  <div class="media p-5">
                                      <div class="media-body">
                                        <div class="container ">
                                          <div class="row">
                                            <div class="col-2 box">
                                              <h4>Users</h4> <br>
                                              <p>{{ $income }}</p>
                                            </div>
                                            <div class="col-2 box">
                                              <h4>Tutors</h4> <br>
                                              <p>[{{ $tutor }}]</p>
                                            </div>
                                            <div class="col-2 box">
                                              <h4>Learners</h4> <br>
                                              <p>[{{ $learner }}]</p>
                                            </div>
                                            <div class="col-2 box">
                                              <h4>Enrolled</h4> <br>
                                              <p>[{{ $enrolledlearner }}]</p>
                                            </div>
                                          </div>
                                        </div>


                                      </div>

                                  </div>
                              </div>
                              </div> <br> <br><br>
                          </div>
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
