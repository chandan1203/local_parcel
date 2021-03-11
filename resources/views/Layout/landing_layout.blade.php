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

    @yield('main')

</body>

</html>