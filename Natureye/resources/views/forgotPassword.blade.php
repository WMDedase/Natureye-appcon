<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Sofia Sans' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('/css/forgotPassword.css')}}">
    <title>Forgot Password</title>
</head>
<body>
    <div class="container">
        <div class="fp-container">
            <div class="left-container">
                <img src="images/hand.png" alt="">
            </div>
            <div class="right-container">
                <img class="reset-icon" src="images/reset-password.png" alt="reserPassword">
                
                <h2>Forgot your Password ?</h2>
                <h5>Don't worry!  Enter your email and well send you a reset. </h5>
                <form action="{{route('password.email')}}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                        <label for="floatingInput">Email address</label>
                    </div>
                        @if($errors->any())
                            <div class="form-check" style="color:red">
                            @foreach ($errors->all() as $error)
                                {{$error}}
                            @endforeach
                            </div>
                        @endif

                        @if(session()->has("status"))
                            <div class="form-check" style="color:red">
                                {{session("status")}}
                            </div>
                        @endif
    
                    <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">Send Request</button>
                    </div>
                </form>
            </div>
        </div> 
    </div> 
</body>
</html>