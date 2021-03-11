@extends('Layout.landing_layout')
@section('title')Airposted local parcel - Shipping Simplified | Home @stop

@section('meta')
<meta name="description" content="Airposted is an open platform that allows buyers to shop for goods from anywhere in the world and have it delivered to them by a traveler who is already heading that way, without the cost and hassle of international shipping.">
<meta name="keywords" content="Airposted, open platform, buyers, shop, anywhere in the world, delivered, traveler, without cost, without hassle, international shipping.">
@stop


@section('main')


@include('Landing.header')

<section class="main-banner">
    <div class="container">


        <div class="row">


            <div class="col col-sm-6 align-self-center banner-text">

                <h1> <b class="animated jello infinite">Fastest </b> <span>Delivery</span> in Bangladesh</h1>

                <p class="text-justify">Ship and sen any product from any websie or your <br>documents to and from the Us and Bangladesh</p>


                <a href="{{route('signup')}}" class="button12">

                    <span>
                        Become a Merchant
                    </span>
                </a>


            </div>
            <div class="col-12  col-sm-6"> <img src="{{asset('image/home/banner-img.png')}}" styel="max-width:100%;" class="img-fluid" alt="Responsive image"> </div>

        </div>

    </div>
</section>



<section class="client wow slideInLeft">
    <div class="container">

        <div class="row  ">
            <div class="col-6   col-sm-2  col   client-logo"> <a href=""> <img class="img-fluid" src="{{asset('image/icons/client1.png')}}"> </a></div>
            <div class="col-6   col-sm-2 col client-logo"> <a href=""> <img class="img-fluid" src="{{asset('image/icons/client2.png')}}"> </a></div>
            <div class="col-6  col-sm-2 col  client-logo"> <a href=""><img class="img-fluid" src="{{asset('image/icons/client3.png')}}"> </a></div>
            <div class="col-6  col-sm-2  col client-logo"> <a href=""> <img class="img-fluid" src="{{asset('image/icons/client4.png')}}"> </a></div>
            <div class="col-6  col-sm-2   col client-logo"> <a href=""> <img class="img-fluid" src="{{asset('image/icons/client5.png')}}"> </a></div>

        </div>
    </div>
</section>



<section class="how-it-work wow zoomIn " data-wow-duration="5s" data-wow-delay="1s">
    <div class="container">
        <div class="row">

            <div class="col  col-sm-12 work-header">
                <h1>How we work </h1>
                <ul>
                    <li> <a onclick="workToggle(1)" id="marchant" class="active"> Marcent registration </a>
                    </li>

                    <li> <a onclick="workToggle(2)" id="order"> Make a order</a> </li>

                    <li> <a onclick="workToggle(3)" id="pickup"> Pickup and delivery </a> </li>
                </ul>

            </div>
        </div>

        <div class="row " id="marchant-content" style="display:flex;">



            <div class="col-12 col-sm-12  col-md-4   work-content-title">

                <p>Marchant Registration</p>

            </div>

            <div class="col-12 col-sm-12 col-md-8 work-content">

                <div class="semicircle"></div>
                <div class="work-main-content">
                    <p>You can't have content reach out of a parent with overflow: hidden and still find a way to show the head. The question is why you need overflow hidden on the parent.

                        Perhaps you could use a sibling element for the image container and limit overflow on the content container.</p>
                </div>


            </div>
        </div>

        <div class="row " id="order-content" style="display:none;">



            <div class="col-12 col-sm-12  col-md-4   work-content-title">

                <p>Make a Order</p>

            </div>

            <div class="col-12 col-sm-12 col-md-8 work-content">

                <div class="semicircle"></div>
                <div class="work-main-content">
                    <p>You can't have content reach out of a parent with overflow: hidden and still find a way to show the head. The question is why you need overflow hidden on the parent.

                        Perhaps you could use a sibling element for the image container and limit overflow on the content container.</p>
                </div>


            </div>
        </div>


        <div class="row " id="pickup-content" style="display:none;">



            <div class="col-12 col-sm-12  col-md-4    work-content-title">

                <p>Pickup and Delivery</p>

            </div>

            <div class="col-12 col-sm-12 col-md-8 work-content">

                <div class="semicircle"></div>
                <div class="work-main-content">
                    <p>You can't have content reach out of a parent with overflow: hidden and still find a way to show the head. The question is why you need overflow hidden on the parent.

                        Perhaps you could use a sibling element for the image container and limit overflow on the content container.</p>
                </div>


            </div>
        </div>





    </div>
</section>


<section class="second-banner">
    <div class="container">

        <div class="row">
            <div class="col-12 col-sm-6 ">
                <img class="img-fluid" src="{{asset('image/home/second-banner-img.png')}}">

            </div>
            <div class="col col-sm-6  second-banner-text ">

                <div class="col align-self-center">

                    <h1>Choose Airposted Parcel as your Delivery Partner </h1>

                    <p class="text-justify">You can't have content reach out of a parent with overflow: hidden and still find a way to show the head. The question is why you need overflow hidden on the parent.

                        Perhaps you could use a sibling element for the image container and limit overflow on the content container.</p>

                </div>


            </div>
        </div>
    </div>
</section>




<section class="service">
    <div class="container">

        <div class="row service-content">
            <div class="col-6  col-md-4 col-lg-4 col-sm-2 ">

                <img src="{{'image/home/fast-delivery.png'}}">

                <h1>Nationwide Delivery </h1>

                <p class="text-justify">No matter what you’re shipping, just book online and get it delivered
                    anywhere inside Bangladesh</p>

            </div>
            <div class="col-6  col-md-4 col-lg-4 col-sm-2 ">

                <img src="{{'image/home/tracking.png'}}">

                <h1>Easy Track </h1>

                <p class="text-justify">See all your latest parcel statuses in a glance under All Parcels. You may easily check on shipment progress without needing to track one by one.</p>

            </div>
            <div class="col-6  col-md-4 col-lg-4 col-sm-2 ">

                <img src="{{'image/home/bulk.png'}}">

                <h1>Bulk Parcel </h1>

                <p class="text-justify">Sellers with large volume of shipments may easily upload orders via CSV</p>

            </div>
        </div>

        <div class="row service-content">
            <div class="col-6  col-md-4 col-lg-4 col-sm-2 ">

                <img src="{{'image/home/accounting.png'}}">

                <h1>Dedicated Support </h1>

                <p class="text-justify">Dedicated key account manager 24/7 to oversee & solve any issue.</p>

            </div>
            <div class="col-6  col-md-4 col-lg-4 col-sm-2 ">

                <img src="{{'image/home/hand.png'}}">

                <h1> Fast Payment </h1>

                <p class="text-justify">Fast payment disbursement after successful delivery</p>

            </div>
            <div class="col-6 col-md-4 col-lg-4 col-sm-2 ">

                <img src="{{'image/home/location.png'}}">

                <h1> Pic & drop point </h1>

                <p class="text-justify">Drop-off your parcel to our AirPosted Parcel pick & drop points near you.</p>

            </div>
        </div>


    </div>
</section>


<section class="delivery-charge">
    <div class="container">

        <div class="row justify-content-md-center">
            <h2> See You delivery charge </h2>

        </div>


        <div class="row justify-content-md-center delivery-header">



            <div class="delivery-btn">



                <a class="charge-btn in-btn" onclick="areaToggle(1)">Inside Dhaka </a>

                <a class="charge-btn out-btn" onclick="areaToggle(2)">Outside Dhaka </a>

            </div>
        </div>






        <div class="row delivery-fee col-md-10 offset-md-1" id="inside-dhaka">



            <div class="col">
                <p>upto 1kg </p>
                <h1>Tk 60</h1>
            </div>
            <div class="col">
                <p>1kg to 2kg </p>
                <h1>Tk 75</h1>
            </div>
            <div class="col">
                <p>3kg to 4kg </p>
                <h1>Tk 90</h1>
            </div>
            <div class="col">
                <p>5kg to 6kg </p>
                <h1>Tk 105</h1>
            </div>
            <div class="col">
                <p> 7 kg to 8kg </p>
                <h1>Tk 120</h1>
            </div>





        </div>

        <div class="row  delivery-fee2 col-md-10 offset-md-1" id="outside-dhaka">
            <div class="col">
                <p>upto 1kg </p>
                <h1>Tk 60</h1>
            </div>
            <div class="col">
                <p>upto 1kg </p>
                <h1>Tk 60</h1>
            </div>
            <div class="col">
                <p>upto 1kg </p>
                <h1>Tk 60</h1>
            </div>
            <div class="col">
                <p>upto 1kg </p>
                <h1>Tk 60</h1>
            </div>
            <div class="col">
                <p>upto 1kg </p>
                <h1>Tk 60</h1>
            </div>

        </div>





    </div>
</section>

<section class="third-banner">
    <div class="container">

        <div class="row">
            <div class="col-12 col-sm-6 align-self-center  ">

                <h1> Cash On Delivery </h1>
                <p>NunitoFacebook is defined by our unique culture – one that rewards impact. We encourage our people to be bold and solve the problems they care most about.
                    Facebook employees work in small teams that move fast and iterate to develop new </p>

                <a href="" class="charge-btn in-btn2">Create Parcel </a>

            </div>
            <div class="col-12 col-sm-6 third-banner-img">
                <img class="img-fluid" src="{{asset('image/home/third-banner-img.png')}}">
            </div>
        </div>

    </div>
</section>


<section class="frequent-ask">
    <div class="container">

        <div class="row justify-content-sm-center">

            <div class="col-md-6 freq-header">
                <h1> Frequently asked question </h1>
            </div>

        </div>

        <div class="row justify-content-sm-center">
            <div class="col-12 col-md-8">

                <div class="row ques-row">
                    <div class="question-header w-100 " id="ques1">

                        <h1> What is airposted parcel delivery? <span class="float-right" onclick="questionToggle(1)"> <i class="fas fa-angle-down"></i></span></h1>

                    </div>
                    <div class="question-content w-100 wow zoomIn" id="ans1" style="display:none;">
                        <div class="circle"></div>

                        <div class="ques-main-content w-100">

                            <h1>What is airposted parcel delivery? <span class="float-right" style="cursor:pointer;" onclick="ansToggle(1)"> <i class="fas fa-times"></i></span></h1>
                            <p>NunitoFacebook is defined by our unique culture – one that rewards impact. We encourage our people to be bold and solve the problems they care most about. Facebook employees work in small teams that move fast and iterate to develop new
                            </p>
                        </div>
                        <div class="semi-circle2">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="question-header w-100" id="ques2">
                        <h1>What is the delivery charge? <span class="float-right" onclick="questionToggle(2)"> <i class="fas fa-angle-down"></i></span> </h1>
                    </div>
                    <div class="question-content w-100 wow zoomIn" id="ans2" style="display:none;">
                        <div class="circle"></div>

                        <div class="ques-main-content w-100">

                            <h1>What is airposted parcel delivery? <span class="float-right" style="cursor:pointer;" onclick="ansToggle(2)"> <i class="fas fa-times"></i></span></h1>
                            <p>NunitoFacebook is defined by our unique culture – one that rewards impact. We encourage our people to be bold and solve the problems they care most about. Facebook employees work in small teams that move fast and iterate to develop new
                            </p>
                        </div>
                        <div class="semi-circle2 ">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="question-header w-100" id="ques3">

                        <h1>What is your coverage area? <span class="float-right" onclick="questionToggle(3)"> <i class="fas fa-angle-down"></i></span></h1>
                    </div>
                    <div class="question-content w-100 wow zoomIn" id="ans3" style="display:none;">
                        <div class="circle"></div>

                        <div class="ques-main-content w-100">

                            <h1>What is airposted parcel delivery? <span class="float-right" style="cursor:pointer;" onclick="ansToggle(3)"> <i class="fas fa-times"></i></span></h1>
                            <p>NunitoFacebook is defined by our unique culture – one that rewards impact. We encourage our people to be bold and solve the problems they care most about. Facebook employees work in small teams that move fast and iterate to develop new
                            </p>
                        </div>
                        <div class="semi-circle2 ">

                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
</section>



<section class="lower-slider">
    <div class="container">

        <div class="row ">


            <div id="carouselExampleControls" class="carousel slide w-100" data-ride="carousel">
                <div class="carousel-inner review-slider">
                    <div class="carousel-item  active">
                        <div class="row">
                            <div class=" col-12 col-sm-4  review-img ">
                                <img src="{{asset('image/home/pathabo.png')}}" class="img-fluid">

                            </div>
                            <div class=" col-12  col-sm-8   align-self-center">

                                <div class="reviews ">
                                    <p>NunitoFacebook is defined by our unique culture – one that rewards impact.
                                        We encourage our people to be bold and solve the problems they care most about.
                                        Facebook employees work in small teams that move fast and iterate to develop new
                                    </p>

                                    <h4>Pathabo <span> online</span></h4>

                                </div>

                            </div>

                        </div>


                    </div>

                    <div class="carousel-item  ">
                        <div class="row">
                            <div class=" col-12 col-sm-4 review-img  ">
                                <img src="{{asset('image/home/pathabo.png')}}" class="img-fluid">

                            </div>
                            <div class=" col-12  col-sm-8   align-self-center">

                                <div class="reviews">
                                    <p>NunitoFacebook is defined by our unique culture – one that rewards impact. We encourage our people to be bold and solve the problems they care most about. Facebook employees work in small teams that move fast and iterate to develop new
                                    </p>
                                    <h4>Pathabo <span> online</span></h4>
                                </div>

                            </div>

                        </div>


                    </div>

                    <div class="carousel-item  ">
                        <div class="row">
                            <div class=" col-12 col-sm-4   review-img">
                                <img src="{{asset('image/home/pathabo.png')}}" class="img-fluid">

                            </div>
                            <div class=" col-12  col-sm-8  align-self-center ">

                                <div class="reviews ">
                                    <p>NunitoFacebook is defined by our unique culture – one that rewards impact. We encourage our people to be bold and solve the problems they care most about. Facebook employees work in small teams that move fast and iterate to develop new
                                    </p>
                                    <h4>Pathabo <span> online</span></h4>
                                </div>

                            </div>

                        </div>


                    </div>

                </div>
                <a class="carousel-control-prev  " href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="prev-icon" aria-hidden="true"><i class="fas fa-arrow-left"></i></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next " href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="next-icon" aria-hidden="true"><i class="fas fa-arrow-right"></i></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</section>


@include('Landing.footer')

@endsection