<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!--  CSS Include -->
    <?php $settings   = (new \App\Http\Controllers\Helper)->public_page_settings; ?>

    @if(count($settings['css']) > 0)
    @foreach($settings['css'] as $css)
    <link rel="stylesheet" type="text/css" href="{!! $css !!}" media />
    @endforeach
    @endif


    <!-- START SCRIPTS -->
    @if(count($settings['js']) > 0)
    @foreach($settings['js'] as $js)
    <script type="text/javascript" src="{!! $js !!}"></script>
    @endforeach
    @endif

    <script>
        new WOW().init();
    </script>
</head>

<body>

@include('sweetalert::alert')

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right  col sidebar" id="sidebar-wrapper">


            <div class="sidebar-title"><a href="#"> <img src="{{asset('image/home/logo2.png')}}" class="img-fluid"></a> </div>



            <div class=" row sidebar-shop-info">

                <div class="col-2"><img src="{{asset('image/home/shopper-logo.png')}}" class="img-fluid shoper-logo"></div>
                <div class="col-sm-8">
                    <div class="shopper-info">
                        <h4>Pathabo </h4>
                        <p>online shop</p>
                    </div>

                </div>
                <div class="col"> <i class="fas fa-chevron-down" style="color:#fff;"></i></div>
            </div>



            <div class="list-group list-group-flush">







                <a href="#" class="list-group-item list-group-item-action active"> <span class="item-logo"> <img src="{{asset('image/home/dashboard-logo.png')}}" class="img-fluid"></span> Dashboard</a>
                <a href="{{route('myshop')}}" class="list-group-item list-group-item-action"> <span class="item-logo"> <img src="{{asset('image/home/shop-logo.png')}}" class="img-fluid"></span> My Shop </a>
                <a href="#" class="list-group-item list-group-item-action   "> <span class="item-logo"> <img src="{{asset('image/home/parcel-logo.png')}}" class="img-fluid"></span> Parcels</a>
                <a href="#" class="list-group-item list-group-item-action  "> <span class="item-logo"> <img src="{{asset('image/home/payment-logo.png')}}" class="img-fluid"></span> Payment</a>
                <a href="{{ route('logout') }}" class="list-group-item list-group-item-action  "> <span class="item-logo"> <img src="{{asset('image/home/log-out.png')}}" class="img-fluid"></span> Sign Out</a>

            </div>


        </div>
        <!-- /#sidebar-wrapper -->





        <!-- Page Content -->
        <div id="page-content-wrapper" class="col-sm-10 page-wrapper">

            <nav class="navbar navbar-expand-sm navbar-light bg-light border-bottom">

                <form class="form-inline">
                    <div class="input-group track-group">
                        <input type="text" class="form-control track-input " placeholder="Type Parcel Id" aria-label="Type Parcel Id" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary track-btn" type="button">Track Parcel</button>
                        </div>
                    </div>
                </form>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link create-parcel-btn " href="{{Route('create-parcel')}}" style="color:#fff;"> + Create Parcel <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link notification-bell" href="#" style="color:#3659A2;"><i class="fas fa-bell"></i></a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link  setting" href="#" style="color:#3659A2;" >
                                <i class="fas fa-cog"></i>
                            </a>

                        </li>
                    </ul>
                </div>
            </nav>







            <div class="container-fluid">
                @yield('merchant-dashboard')

            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

</body>

</html>
