<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</head>
<body class="bg-dark">
    @include('inc.navbar')

    <div class="container-fluid bg-light">
        <div class="row">
            <div class="col-md-7 pl-0">
                <img src="/images/login3.jpeg" width="100%" height="530px" alt="image">
            </div>
            <div class="col-md-5 mt-5">
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
                @if (Session::get('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
                @endif
                <form action="{{ route('tutor.check') }}" method="post">
                    @csrf
                    <h1 class="text-center">Login To Continue</h1> <br><br>
                        <div class="form-group">
                            <label for="inputPassword4">Email</label>
                            <input type="email" class="form-control" name="email">
                            <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                          </div> <br>
                          <div class="form-group">
                            <label for="inputPassword4">Password</label>
                            <input type="password" class="form-control" name="password">
                            <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                          </div>
                            <a href="/learner/forget-password">Forgot Password ?</a>
                          <div class="form-row mt-3">
                        <input type="submit" value="Login" class="submit btn btn-primary" />
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>
</html>
