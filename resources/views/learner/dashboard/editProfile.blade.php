
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Profile</title>
    <link rel="apple-touch-icon" href="/assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="/assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/editProfile.css">
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
              <li><a class="btn text-light" href="/learner/viewProfile/{{Auth::guard('web')->user()->id}}">View Profile</a></li>
              <li><a class="btn text-light" href="/learner/editProfile/{{Auth::guard('web')->user()->id}}">Edit Profile</a></li>
            </ul>
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
          <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
      </div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class="nav-item"><a href="/learner/home"><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
          </li>
          <li class=" nav-item"><a href="/learner/findTutor"><i class="ft-credit-card"></i><span class="menu-title" data-i18n="">Find Tutor</span></a>
          </li>
          <li class=" active"><a href="/learner/viewProfile/{{Auth::guard('web')->user()->id}}"><i class="ft-box"></i><span class="menu-title">Profile</span></a>
          </li>
          <li class=" nav-item"><a href="/learner/myCourses"><i class="ft-pie-chart"></i><span class="menu-title">My Courses</span></a>
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
              <div class="card-content collapse show">
                <div class="card-body">

                  @if (Session::get('success'))
                  <div class="alert alert-success">
                      {{ Session::get('success') }}
                  </div>
                  @endif
                  @if (Session::get('fail'))
                  <div class="alert alert-danger">
                      {{ Session::get('fail') }}
                  </div>
                  @endif

                  <div class="container">
                    <div class="row gutters ">
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                      <div class="card h-100">
                       <div class="card-body">
                         <div class="account-settings">
                           <div class="user-profile">
                             <div class="user-avatar mt-2">
                               <img class=" " src="/assets/images/learnerProfile-Pictures/{{Auth::guard('web')->user()->photo}}" alt="image">
                             </div>
                             <h5 class="user-name">{{$learner->learner_name}}</h5>
                             <h6 class="user-email">{{$learner->email}}</h6>
                           </div>

                         </div>
                       </div>
                      </div>
                    </div>
                  <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12 ">
                    <div class="card h-100">
                     <div class="card-body">
                       <div class="row gutters">
                         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                           <h6 class="mt-3 mb-2 text-primary"><b>Update Profile Picture</b></h6>
                         </div>
                         <form action="/learner/updateProfilePhoto/{{$learner->id}}" method="POST" enctype="multipart/form-data">
                             @csrf
                             @method('PUT')
                                 <div class="form-inline">
                                     <input type="file" class="form-control mb-2 mr-5" value="" name="image" />
                                     <button type="submit" id="submit" name="submit" class="btn btn-primary mb-2">Update</button>
                                 </div>
                         </form>
                      </div>

                      <form action="/learner/updatePersonalInfo/{{$learner->id}}" method="POST" >
                          @csrf
                          @method('PUT')
                       <div class="row gutters">
                         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                           <h6 class="mb-2 text-primary"><b>Personal Details</b></h6>
                         </div>
                         <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                           <div class="form-group">
                             <label for="fullName"><b>Full Name</b></label>
                             <input type="text" class="form-control" name="learner_name" value="{{$learner->learner_name}}"placeholder="Enter full name">
                           </div>
                         </div>
                         <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                           <div class="form-group">
                             <label for="eMail"><b>Email</b></label>
                             <input type="email" class="form-control" name="email" value="{{$learner->email}}" placeholder="Enter email ID">
                           </div>
                         </div>
                         <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <label for="inputState"><b>Country</b></label>
                              <select name="country" class="form-control">
                                <option value="{{$learner->country}}" selected>{{$learner->country}}</option>
                                <option value="Egypt">Egypt</option>
                              </select>
                            </div>
                         </div>

                         <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <label for="Gender"><b>Gender</b></label>
                              <select name="gender" class="form-control">
                                <option value="Male" selected>Male</option>
                                <option value="Female">Female</option>
                              </select>
                            </div>
                         </div>
                         <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                           <div class="form-group">
                             <label for="Phone"><b>Phone</b></label>
                             <input type="number" class="form-control" name="phone" value="{{$learner->phone}}">
                           </div>
                         </div>

                         <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <label for="Age"><b>Age</b></label>
                              <input type="number" class="form-control" name="age" value="{{$learner->age}}">
                            </div>
                         </div>
                       </div>

                        <div class="form-group">
                          <fieldset>
                            <span class="pr-3 text-center"> <b>I Want Learn : </b></span>
                              <div class="form-check form-check-inline pr-2">
                                <input class="form-check-input" type="checkbox" name="toLearn[]" value="Hifz">
                                <label class="form-check-label" for="inlineCheckbox1">Hifz</label>
                              </div>
                              <div class="form-check form-check-inline pr-2">
                                <input class="form-check-input" type="checkbox" name="toLearn[]" value="Tajweed">
                                <label class="form-check-label" for="inlineCheckbox1">Tajweed</label>
                              </div>
                              <div class="form-check form-check-inline pr-2">
                                <input class="form-check-input" type="checkbox" name="toLearn[]" value="Recitation">
                                <label class="form-check-label" for="inlineCheckbox1">Recitation</label>
                              </div>
                              <div class="form-check form-check-inline pr-2">
                                <input class="form-check-input" type="checkbox" name="toLearn[]" value="Translation">
                                <label class="form-check-label" for="inlineCheckbox1">Translation</label>
                              </div>
                            </fieldset>
                        </div>
                        <div class="row gutters">
                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="text-right">
                               <input type="submit" class="btn btn-primary" name="submit" value="Update">
                            </div>
                          </div>
                        </div>
                        </form>
                       <div class="row gutters">
                         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                           <h6 class="mt-3 mb-2 text-primary"><b>Change Password</b></h6>
                         </div>
                      </div>

                      <form action="/learner/updatePassword/{{$learner->id}}" method="POST">
                          @csrf
                          @method('PUT')
                        <div class="row gutters">

                          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <label for="Phone"><b>New Password</b></label>
                              <input type="password" class="form-control" name="password">
                              <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                            </div>
                          </div>

                          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                              <label for="inputPassword4"><b>Confirm Password</b></label>
                              <input type="password" class="form-control" name="cpassword">
                              <span class="text-danger">@error('cpassword'){{ $message }}@enderror</span>
                            </div>
                          </div>

                        </div>


                       <div class="row gutters">
                         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                           <div class="text-right">
                              <input type="submit" class="btn btn-primary" name="submit" value="Update">
                           </div>
                         </div>
                       </div>
                       </form>
                     </div>
                    </div>

                    </div>
                    </div>
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
