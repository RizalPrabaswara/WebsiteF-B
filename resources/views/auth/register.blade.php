<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="{{asset('style/assets/css/login.css')}}"> -->
</head>
<body background="{{asset('style/assets/photo/background.png')}}">
<br><br><br><br><br><br><br><br><br><br><br><br>
<div class="container">
        <div class="col-md-4 offset-md-4 mt-5 ">
                    <h3 class="text-center" style="color:white">Register</h3>
                    <hr style="border-width: 5px; background-color:grey">
                    <form action="{{ route('register') }}" method="post">
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
                    <div class="form-group">
                        <input type="text" name="nama" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password">
                    </div>
                    <div class="form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="L">
                        <label class="form-check-label" style="color: white;" for="jenis_kelamin">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="P">
                        <label class="form-check-label" style="color: white;" for="jenis_kelamin">Perempuan</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="number" name="no_telp" class="form-control" placeholder="Nomor Telepon">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="alamat" id="alamat" placeholder="Alamat Lengkap">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                    <p class="text-center" style="color: white;">Sudah punya akun? <a href="{{ route('login') }}">Login</a> sekarang!</p>
                </div>
                </form>

            </div>        
    </div>
</body>
</html>