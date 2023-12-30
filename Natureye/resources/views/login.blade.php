<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Sofia Sans' rel='stylesheet'>
    <link href="{{ asset('/css/login.css') }}" rel="stylesheet">
    <title>Natureye Login</title>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <div class="left-container">
            </div>
            <div class="right-container">
                <div class="logo">
                <img src="images/Logo.png" alt="Natureye Logo">
                </div>
                <h2>Login</h2>

                <form action="{{route('login.post')}}" method="POST">
                  @csrf 
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" value="{{old('email')}}">
                    <label for="email">Email address</label>
                  </div>
                  <div class="form-floating">
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    <label for="password">Password</label>
                  </div>

                  <a href="forgotPassword"><h5>Forgot Password?</h5></a>

                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                    <label class="form-check-label" for="formCheckDefault">Remember this device</label>
                  </div>  

                  @if($errors->any())
                    <div class="form-check" style="color:red">
                      @foreach ($errors->all() as $error)
                          {{$error}}
                      @endforeach
                    </div>
                  @endif

                  @if(session()->has("error"))
                    <div class="form-check" style="color:red">
                      {{session("error")}}
                    </div>
                  @endif

                  @if(session()->has("success"))
                    <div class="form-check" style="color:red">
                      {{session("success")}}
                    </div>
                  @endif

                  @if(session()->has("status"))
                    <div class="form-check" style="color:red">
                      {{session("status")}}
                    </div>
                  @endif

                  <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">Sign In</button>
                  </div>
                  <div class="signup-link">
                    <h5>Doesn't have account ? <a href="signup">Sign Up</a></h5>
                  </div>

                </form>
            </div>
        </div>
        </div>

    </div>
</body>
</html>