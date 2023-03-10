<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('style/assets/css/font-awesome.min.css')}}">
</head>
<body background="{{asset('style/assets/photo/background.png')}}">
    
    <br><br><br>
    <div class="container">
        <div class="row">
            <div class="ml-auto">
                <nav class="navbar navbar-expand-lg navbar-light ">
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                      <ul class="navbar-nav">
                        <li class="nav-item active">
                          <a class="nav-link" href="/Home" style="color: red"><h4>Home &nbsp;&nbsp;&nbsp;</h4> <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="/Product" style="color: red"><h4>Product&nbsp;&nbsp;&nbsp;</h4></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="/About" style="color: red"><h4>About&nbsp;&nbsp;&nbsp;</h4></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/Location" style="color: red"><h4>Location&nbsp;&nbsp;&nbsp;</h4></a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="/cart" style="color: red"><h4>Cart&nbsp;&nbsp;&nbsp;</h4></a>
                          </li>
                          @guest
                          <li class="nav-item">
                            <a class="nav-link" href="#" style="color: red"><h4>Login</h4></a>
                          </li>
                            @endguest
                            {{-- After Login --}}
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user-circle-o fa-2x" aria-hidden="true"></i>
                              </a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Profil</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>

                            {{-- After Login --}}
                          </div>
                        </li>
                      </ul>
                    </div>
                  </nav>
                </div>
            </div>
        </div>
    </div>

    <br><br><br><br><br><br>
    @yield('konten')
</body>
</html>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>