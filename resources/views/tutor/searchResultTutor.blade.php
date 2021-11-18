<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/viewProfile.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title></title>
  </head>
  <body>
  <div class="container mt-3">
    <div class="main-body">


      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <img src="/assets/images/tutorProfile-Pictures/{{$tutor->photo}}" alt="Admin" class="rounded-circle" width="150">
                <div class="mt-3">
                  <h4 class="mt-1 mb-2">{{ $tutor->name }}</h4>

                  <p class="text-muted font-size-sm mb-3">{{$tutor->email}}</p>

                <a href="/learner/viewTutor/{{$tutor->id}}"> <button class="btn btn-outline-primary mb-3">Message</button></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Full Name</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ $tutor->name }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ $tutor->email }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Age</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ $tutor->age }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Gender</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ $tutor->gender }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Country</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ $tutor->country }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0 mt-1">Courses</h6>
                </div>
                  @foreach($courses as $course )
                    <a href="/tutor/viewCourse/{{$course->id}}"><button class="btn btn-success btn-rounded mr-1 btn-dark">{{ $course->name }}</button></a>
                  @endforeach
              </div>
              <hr>

            </div>
          </div>
        </div>
  			</div>
  		</div>
  	</div>
  </body>
</html>
