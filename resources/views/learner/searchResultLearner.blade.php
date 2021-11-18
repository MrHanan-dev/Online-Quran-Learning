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
                <img src="/assets/images/learnerProfile-Pictures/{{$learner->photo}}" alt="Admin" class="rounded-circle" width="150">
                <div class="mt-3">
                  <h3>{{ $learner->learner_name }}</h3>
                  <p class="text-secondary mb-2">{{ $learner->email}}</p>
                <a href="/learner/viewProfile/{{$learner->id}}"> <button class="btn btn-outline-primary mb-3">Message</button></a>
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
                  {{ $learner->learner_name }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ $learner->email }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Age</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ $learner->age }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Gender</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ $learner->gender }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Country</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ $learner->country }}
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">I want to Learn</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  @foreach($learner->toLearn as $learn)
                  {{$learn}}
                  @endforeach
                </div>
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
