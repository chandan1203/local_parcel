@extends('Layout.dashboard-layout')
@section('title')Airposted local parcel - Shipping Simplified | Home @stop

@section('meta')
<meta name="description" content="Airposted is an open platform that allows buyers to shop for goods from anywhere in the world and have it delivered to them by a traveler who is already heading that way, without the cost and hassle of international shipping.">
<meta name="keywords" content="Airposted, open platform, buyers, shop, anywhere in the world, delivered, traveler, without cost, without hassle, international shipping.">
@stop


@section('merchant-dashboard')

<section class="pickup-shop">


    <div class="row justify-content-md-center">

        <div class="col-sm-4 text-center">

            <img src="{{asset('image/home/create-bulk.png')}}" class="img-fluid">

            <h2>Create Bulk Order </h2>
            <p>To help you getting your parcel information from your excel file as effectively as possible, download our </p>
        </div>
    </div>

    <div class="row justify-content-md-center ">
        <div class="col-sm-2">
            <div class="field">
                <input type="submit" class="submitbtn" value="Download CSV" style="color:white">
            </div>
        </div>
        <div class="col-sm-2">

            <div class="field">
                <input type="submit" class="" value="Upload CSV">
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>



    </div>



</section>
@endsection