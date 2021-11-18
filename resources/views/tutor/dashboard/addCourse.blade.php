
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/css/editprofile.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="apple-touch-icon" href="/assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="/assets/images/ico/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/app-lite.css">
  <link rel="stylesheet" type="text/css" href="/assets/css/core/menu/menu-types/vertical-menu.css">

  <title>Tutor Dashboard</title>
</head>
  <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-chartbg" data-col="2-columns">

    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
      <div class="navbar-wrapper">
        <div class="navbar-container content">
          <div class="collapse navbar-collapse show" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left text-light">
              <li><a class="btn text-light" href="/tutor/showCourses">My Courses</a></li>
              <li><a class="btn text-light" href="/tutor/addCourse">Add A New Course</a></li>
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
          <li class=" active"><a href="/tutor/showCourses"><i class="ft-box"></i><span class="menu-title" data-i18n="">My Courses</span></a>
          </li>
          <li class=" nav-item"><a href="/tutor/demoClassInvitations"><i class="ft-layers"></i><span class="menu-title" data-i18n="">Invitations</span></a>
          </li>
          <li class=" nav-item"><a href="/tutor/myStudents"><i class="ft-pie-chart"></i><span class="menu-title" data-i18n="">My Students</span></a>
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
                                   <h4 class="card-title">Add A New Course </h4>
                               </div>
                               <div class="card-content collapse show">
                                   <div class="card-body">
                                       <form action="/tutor/addCourse" method="POST">
                                           @csrf
                                           <div class="row gutters">
                                               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                   <div class="form-group">
                                                       <label for="Country">Title</label>
                                                       <select name="name" class="form-control">
                                                           <option value="Hifz">Hifz</option>
                                                           <option value="Recitation">Recitation</option>
                                                           <option value="Tajweed">Tajweed</option>
                                                           <option value="Translation">Translation</option>
                                                       </select>
                                                    </div>
                                               </div>
                                               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                   <div class="form-group">
                                                       <label for="fees">Fee</label>
                                                       <input type="number" class="form-control" name="fees" value="" placeholder="Enter Course Fee in $dollars">
                                                   </div>
                                               </div>
                                               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                   <div class="form-group">
                                                       <label for="description">Course Description</label>
                                                       <div class="mb-3">
                                                           <textarea class="form-control" name="description" rows="3"></textarea>
                                                         </div>
                                                   </div>
                                               </div>
                                               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                   <div class="form-group">
                                                       <label for="schedule">Enter the Schedule for this course</label>
                                                       <div class="mb-3">
                                                           <textarea class="form-control" name="schedule" rows="3"></textarea>
                                                         </div>
                                                   </div>
                                               </div>
                                               <div class="form-group">
                                                   <label for="pre">How course will be conducted?</label>
                                                   <input type="text" class="form-control" name="howToConduct" value="" placeholder="Eg:Zoom, Skype, Whatsapp etc.">
                                               </div>
                                               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                   <div class="form-group">
                                                       <label for="duration">Duration</label>
                                                       <input type="text" class="form-control" name="duration" value="" placeholder="Enter Course Duration">
                                                   </div>
                                               </div>
                                               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                   <div class="form-group">
                                                       <label for="howToConduct">Pre-Requisite of Course?</label>
                                                       <input type="text" class="form-control" name="prerequisite" value="" placeholder="Eg:Pre-Recosite of Hifz is Recitation.">
                                                   </div>
                                               </div>

                                               <div>
                                                <?php
                                                $tutor_id=Auth::guard('tutor')->user()->id;
                                                ?>
                                                <input type="text" name="tutor_id" value="{{$tutor_id}}" hidden>
                                               </div>


                                               <div class="row gutters">
                                                   <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                       <div class="text-right">
                                                           <button type="submit" id="submit" name="submit" class="btn btn-primary">Add</button>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div> <br>
                                       </form>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>




    <script src="/assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  </body>

</html>
