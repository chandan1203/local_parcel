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

            <div class="col-12 col-sm-6   signup-content main">
                <h2>Sign up to access your account </h2>
                <form method="post" action="{{route('signup-submit')}}">
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
                    <div class="field" id="phone-code">
                        <input type="text" required autocomplete="off" id="username" name="code" value="">
                        <label for="username" title="code " data-title="code"></label>
                    </div>

                    <div class="row" id="phone-password">
                        <div class="col-12 col-sm-6">
                            <div class="field">
                                <input type="text" required  name="password" value="">
                                <label for="gdf" title="Password" data-title="Password "></label>
                            </div>
                        </div>

                        <div class=" col-12  col-sm-6">
                            <div class="field">
                                <input type="text" required name="confirm_password" value="">
                                <label for="gdf" title="retype Password" data-title=" retype Password "></label>
                            </div>
                        </div>

                    </div>

                    <div class="field2" id="acknowledged-checkbox">
                        <div class="col-sm-2">
                            <input type="checkbox" class="form-check-input" name="acknowlege" required  id="exampleCheck1">
                        </div>

                        <div class="col-sm-10">
                            <label class="">I acknowledge that the sale price of the said product is correct and this amount will be used in the refund process if the product is lost or damaged.</label>

                        </div>
                    </div>

                    <div class="field">
                        <input type="submit" id="signin-btn" class="submitbtn" disabled value="Sign in" style="color:white">

                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#auth-modal">
                            Launch demo modal
                        </button> -->
                    </div>
                </form>

                <div class="field">

                    <p class=""> Have an account ? Sign in here</p>


                </div>








            </div>
        </div>

    </div>

    @include('Modal.auth-modal');


</section>





@endsection