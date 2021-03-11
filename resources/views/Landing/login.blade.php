@extends('Layout.landing_layout')
@section('title')Airposted local parcel - Shipping Simplified | Home @stop

@section('meta')
<meta name="description" content="Airposted is an open platform that allows buyers to shop for goods from anywhere in the world and have it delivered to them by a traveler who is already heading that way, without the cost and hassle of international shipping.">
<meta name="keywords" content="Airposted, open platform, buyers, shop, anywhere in the world, delivered, traveler, without cost, without hassle, international shipping.">
@stop


@section('main')

@include('Landing.header')

<section id="loading">
    <div id="loading-content"></div>
</section>
<section class="sign-in">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6">

                <img src="{{asset('image/home/vanpic.png')}}" class="img-fluid">
            </div>



            <div class="col-12 col-sm-6  align-self-center signup-content main">
                <h2>Sign in to access your account </h2>
                <form class="password-login" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="field">
                        <input type="tel" required autocomplete="off" name="phone" id="username" value="">
                        <label for="username" title="Phone number" data-title="Phone  number "></label>




                    </div>




                    <div class="field">
                        <input type="password" name="password" required autocomplete="off" id="gdfg" value="">
                        <label for="gdf" title="Password" data-title="Password "></label>
                    </div>


                    <div class="field">
                        <input type="submit" class="submitbtn" value="Sign in" style="color:white">
                    </div>
                </form>


                <form class="otp-login" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="field">

                        <div class="row">
                            <div class="col">
                                <input type="text" required autocomplete="off" id="phone_number" name="phone" value="">
                                <label for="username" title="Phone number" data-title="Phone  number "></label>

                            </div>

                            <div class="col-2">

                                <button class="btn btn-outline-secondary otp-btn" onclick="sendSignupOTP()" id="otp-btn" type="button">
                                    Send OTP
                                </button>

                                <button class="btn btn-outline-secondary resent-otp" onclick="sendSignupOTP()" id="resent-otp" type="button">
                                    Resend
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <input type="text" required autocomplete="off" id="username" name="code" value="">
                        <label for="username" title="code " data-title="code"></label>
                    </div>

                    <div class="field">
                        <input type="submit" class="submitbtn" value="Sign in" style="color:white">
                    </div>
                </form>

                <div class="field">
                    <p class="text-center">Or</p>
                    <p class="text-center"> <a class="otp-login" onclick="signinToggle(1)">Sign in with password </a></p>
                    <p class="text-center"> <a class="password-login" onclick="signinToggle(2)">Sign in with OTP </a></p>
                    <hr>
                    <p class="text-center"> Have an account ? <a href="{{route('signup')}}">Sign up here </a> </p>
                </div>
            </div>


        </div>

    </div>
</section>


<script>

</script>


@endsection