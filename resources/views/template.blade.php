<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Chick n Cook</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="{{asset('style/assets/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('style/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('style/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('style/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('style/assets/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('style/assets/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('style/assets/scss/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" >Chick n Cook</a>
                <a class="navbar-brand hidden">CnC</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/Admin"> <i class="menu-icon fa fa-tachometer"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="/Order"> <i class="menu-icon fa fa-tachometer"></i>Order</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cutlery"></i>Produk</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-sitemap"></i><a href="/Master/Produk">Master</a></li>
                            <li><i class="fa fa-sitemap"></i><a href="/Master/Menu">Menu</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-leaf"></i>Bahan Baku</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-users"></i><a href="/pembelian">Pembelian</a></li>
                            <li><i class="fa fa-sitemap"></i><a href="/Master/Bahan">Master</a></li>
                            <li><i class="fa fa-sitemap"></i><a href="/Detail/Pembelian">Detail Pembelian</a></li>
                            <li><i class="fa fa-users"></i><a href="/supplier">Supplier</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-file"></i>Report</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-users"></i><a href="/Detail/Pembelian">Detail Pembelian</a></li>
                            <li><i class="fa fa-sitemap"></i><a href="/Detail/Penjualan">Detail Penjualan</a></li>
                            <li><i class="fa fa-sitemap"></i><a href="/Laporan">Laporan</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->


    <div id="right-panel" class="right-panel">

<!-- Header-->
<header id="header" class="header">

    <div class="header-menu">

        <div class="col-sm-7">
            <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
            <div class="header-left">
            
                <div class="dropdown for-message">
                  
                  <div class="dropdown-menu" aria-labelledby="message">
                  
                  </div>
                </div>
            </div>
        </div>

        <div class="col-sm-5">
            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle" src="{{asset('style/images/admin.jpg')}}" alt="User Avatar">
                </a>

                <div class="user-menu dropdown-menu">

                        <a class="nav-link" href="#"><i class="fa fa-power -off"></i>Logout</a>
                </div>
            </div>

          

        </div>
    </div>

</header><!-- /header -->
        @yield('breadcrumbs')        
        
        @yield('konten')




    <script src="{{asset('style/assets/js/vendor/jquery-2.1.4.min.js')}}"></script>
    <script src="{{asset('style/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('style/assets/js/plugins.js')}}"></script>
    <script src="{{asset('style/assets/js/main.js')}}"></script>

</body>
</html>
