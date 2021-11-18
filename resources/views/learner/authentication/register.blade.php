<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
      <title>Learner Register</title>
  </head>
  <body class="bg-dark">
    @include('inc.navbar')
    <div class="container-fluid bg-light">
      <div class="row">
        <div class="col-md-6 pl-0">
          <img src="/images/test.jpg" width="100%" height="600px" alt="image">
        </div>
        <div class="col-md-6 mt-3">
          @if (Session::get('fail'))
          <div class="alert alert-danger">
              {{ Session::get('fail') }}
          </div>
          @endif
          <form action="{{ route('learner.create') }}" method="post">
            @csrf
            <div class="form-row">
               <div class="form-group col-md-6">
                 <label for="inputEmail4">Name</label>
                 <input type="text" class="form-control" name="learner_name">
                 <span class="text-danger">@error('name'){{ $message }}@enderror</span>
               </div>
               <div class="form-group col-md-6">
                 <label for="inputPassword4">Email</label>
                 <input type="email" class="form-control" name="email">
                 <span class="text-danger">@error('email'){{ $message }}@enderror</span>
               </div>
             </div><br>
             <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="age">Age</label>
                  <input type="number" class="form-control" name="age">
                </div>
                <div class="form-group col-4">
                  <label for="inputState">Gender</label>
                  <select name="gender" class="form-control">
                    <option selected>Choose Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputState">Country</label>
                  <select name="country" class="form-control">
                    <option  selected>Choose Country</option>
                    <option value="Pakistan">Pakistan</option>
                    <option value="Egypt">Egypt</option>
                  </select>
                </div>
              </div><br>

                 <div class="form-group">
                   <label for="Phone">Phone</label>
                   <input type="number" class="form-control" placeholder="Enter Phone with Country Code Ex. +923484409011" name="phone">
                 </div><br>


              <div class="form-row">
                 <div class="form-group col-md-6">
                   <label for="password">Password</label>
                   <input type="password" class="form-control" name="password">
                   <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                 </div>
                 <div class="form-group col-md-6">
                   <label for="inputPassword4">Confirm Password</label>
                   <input type="password" class="form-control" name="cpassword">
                   <span class="text-danger">@error('cpassword'){{ $message }}@enderror</span>
                 </div>
               </div><br>
              <div class="form-row">
                <div class="form-group">
                  <fieldset>
                    <span class="pr-2 text-center"> I Want to Learn : </span>
                      <div class="form-check form-check-inline pl-2">
                        <input class="form-check-input" type="checkbox" name="toLearn[]" value="Hifz">
                        <label class="form-check-label" for="inlineCheckbox1">Hifz</label>
                      </div>
                      <div class="form-check form-check-inline pl-2">
                        <input class="form-check-input" type="checkbox" name="toLearn[]" value="Tajweed">
                        <label class="form-check-label" for="inlineCheckbox1">Tajweed</label>
                      </div>
                      <div class="form-check form-check-inline pl-2">
                        <input class="form-check-input" type="checkbox" name="toLearn[]" value="Recitation">
                        <label class="form-check-label" for="inlineCheckbox1">Recitation</label>
                      </div>
                      <div class="form-check form-check-inline pl-2">
                        <input class="form-check-input" type="checkbox" name="toLearn[]" value="Translation">
                        <label class="form-check-label" for="inlineCheckbox1">Translation</label>
                      </div>
                    </fieldset>
                </div>
              </div> <br>
                <input type="submit" value="Submit" class="submit btn btn-primary mr-2 ml-0" />
                <a class="ml-2"href="{{ route('learner.login') }}">I already have an account</a>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
