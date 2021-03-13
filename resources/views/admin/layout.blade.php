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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

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



        @include('admin.partials.sidebar')


        </div>
        <!-- /#sidebar-wrapper -->





        <!-- Page Content -->
        <div id="page-content-wrapper" class="col-sm-10 page-wrapper">

            <nav class="navbar navbar-expand-sm navbar-light bg-light border-bottom">
                <h3>Warehouse Name:
                    @if (auth()->user()->role_id == 3)
                        {{ auth()->user()->warehouse->name }}
                    @endif

                </h3>
            </nav>







            <div class="container-fluid">
                @yield('main')

            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/fontawesome.min.js" integrity="sha512-pafh0hrrT9ZPZl/jx0cwyp7N2+ozgQf+YK94jSupHHLD2lcEYTLxEju4mW/2sbn4qFEfxJGZyIX/yJiQvgglpw==" crossorigin="anonymous"></script>

    <!-- Menu Toggle Script -->


</body>

</html>
