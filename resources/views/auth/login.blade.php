<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body background="{{asset('style/assets/photo/background.png')}}">
<br><br><br><br><br><br><br><br><br><br><br><br>
    <div class="container">
        <div class="col-md-4 offset-md-4 mt-5">
                    <h3 class="text-center" style="color: white;">Login</h3>
                    <hr style="border-width: 5px; background-color:grey">
                <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="card-body">
                    @if(session('errors'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Something it's wrong:
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    <div class="row form-group">
                        <label for="" style="color: white;"><strong>Email</strong></label>
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="row form-group">
                        <label for="" style="color: white;"><strong>Password</strong></label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block">Log In</button>
                    <p class="text-center" style="color: white;">Belum punya akun? <a href="{{ route('register') }}">Register</a> sekarang!</p>
                </div>
                </form>
        </div>
    </div>
</body>
</html>