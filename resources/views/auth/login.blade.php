<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv= "X-UA-Compatible" content= "ie=edge">
        <title>Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row" style="margin-top:125px">
            <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h1 align="center">User Login</h1>
                    <hr>
                    <form action="{{route('auth.check')}}" method="POST">
                    @csrf
                        <div class="results">
                            @if(Session::get('fail'))
                                <div class="alert alert-danger">
                                    {{Session::get('fail')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter your mail id" value="{{ old('email') }}" />
                            <span class="text-danger">@error('email') {{$message}} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter password" />
                            <span class="text-danger">@error('password') {{$message}} @enderror</span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-primary">Login</button>
                        </div>
                        <hr>
                        <a href="register">Create a new account now!</a>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </body>
</html>