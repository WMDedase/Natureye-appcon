<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Sofia Sans' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/resetPassword.css') }}">
    <title>Reset Password</title>
</head>
<body>
    <div class="container">
        <div class="rp-container">
        <div class="left-container">
           <img src="{{ asset('images/change-password.png') }}" alt="changePassword">
                
                <h2>Reset Password </h2>
                <h5>Enter your Password below </h5>

                <form action="{{route('password.update')}}" method="POST"> 
                  @csrf
                  <input name="email" value="{{$email = request('email');}}" hidden>
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    <label for="floatingPassword">New Password</label>
                  </div>
                    
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password_confirmation">
                    <label for="floatingPassword">Confirm Password</label>
                  </div>
                  @if($errors->any())
                    <div class="form-check" style="color:red">
                      @foreach ($errors->all() as $error)
                          {{$error}}
                      @endforeach
                    </div>
                  @endif
                  <input name="token" value="{{ $token }}" hidden>
                  <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">Done</button>
                  </div>
                </form>
        </div>

        <div class="right-container">
            <img src="{{ asset('images/5.png')}}" alt="hand-nature">
        </div>
    </div>
    </div>
</body>
</html>!