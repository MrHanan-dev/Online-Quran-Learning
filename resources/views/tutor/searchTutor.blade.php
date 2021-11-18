<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style media="screen">
      a{text-decoration: none !important;}
    </style>
    <title>Document</title>
</head>
<body>

  <div class="card">
    <div class="card-header">
        <h4 class="card-title">Tutors</h4>
    </div>
    <div class="card-content collapse show">
        <div class="card-body">
          @if(count($tutor) > 0 )

          @foreach ($tutor as $val)
          <div class="container">
            <div class="row mt-3 border shadow mr-5">
              <div class="media p-3">
                <img src="/assets/images/tutorProfile-Pictures/{{$val->photo}}" alt="Profile Picture" class="mr-3 mt-1 rounded-circle" style="width:60px;">
                <div class="media-body">
                  <h4> <a class="pr-3"href="/searchResult/tutor/{{$val->id}}">{{ $val->name }}</a></h4>
                  <p>{{$val->about}}</p>
                  <p>Gender : {{$val->gender}}</p>
                  <p>Country : {{$val->country}}</p>
                </div>
              </div>
            </div>
          </div>
          @endforeach

        @else
        <h2>No Record</h2>
        @endif
        
        </div>
    </div>
  </div> 

</body>
</html>
