<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Sofia Sans' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('/css/signup.css')}}">
    <title>Natureye Signup</title>
</head>
<body>
    <div class="container">
        <div class="signup-container">
            <div class="left-container">
            </div>

            <div class="right-container">
                <div class="logo">
                    <img src="images/Logo.png" alt="Natureye Logo">
                  </div>
                <h2>Sign Up</h2>
                <form action="{{route('signup.post')}}" method="POST">
                  @csrf 
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" placeholder="name" name="name"  value="{{old('name')}}" required>
                    <label for="name">Full Name</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email"  value="{{old('email')}}" required>
                    <label for="email">Email address</label>
                  </div>

                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="{{old('password')}}" required>
                    <label for="password">Password</label>
                  </div>
                  
                  <div class="form-floating">
                    <input type="password" class="form-control" id="rpt-password" placeholder="Confirm password" name="password_confirmation" value="{{old('password_confirmation')}}" required>
                    <label for="repeatPassword">Repeat Password</label>
                  </div>

                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="formCheckDefault" required>
                    <label class="form-check-label" for="formCheckDefault"> <a href="">I Agree to the Terms and Conditions</a></label>
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

                  <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">Sign Up</button>
                  </div>
                  <div class="login-link">
                  <h5>Already have an account? <a href="login">Log In</a></h5>
                </div>
              </form>
            </div>
        </div>
        </div>

    </div>
</body>
</html>