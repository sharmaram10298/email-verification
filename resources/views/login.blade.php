<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Email Verification</title>
  </head>
  <body style="background-color:#9adbb6">
 <div class="container py-5 offset-3">

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

  <div class="row">
    <div class="col-6">
      <div class="card ">
        <div class="alert alert-white">
          <h4 class="text-center"><b>Email Verification System</b></h4>
        </div>
        <div class="card-body rounded-pill">
          <form method="POST" action="{{ route('login')}}">
            @csrf
           
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="text" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
              @error('email')<span style="color: red;">{{$message}}</span>@enderror
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" name="password">
              @error('password')<span style="color: red;">{{$message}}</span>@enderror
            </div>
        
            <button type="submit" class="btn btn-primary">Login</button>
            <a href="{{ url('/') }}" >Register</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>