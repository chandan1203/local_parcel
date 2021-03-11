@extends('Layout.dashboard-layout')
@section('title')Airposted local parcel - Shipping Simplified | Home @stop

@section('meta')
<meta name="description" content="Airposted is an open platform that allows buyers to shop for goods from anywhere in the world and have it delivered to them by a traveler who is already heading that way, without the cost and hassle of international shipping.">
<meta name="keywords" content="Airposted, open platform, buyers, shop, anywhere in the world, delivered, traveler, without cost, without hassle, international shipping.">
@stop


@section('merchant-dashboard')
<section class="Recent-order-filter">


    <div class="row ">
        <div class="col-sm-12">
            <h2>Did you find your parcel Order ?</h2>
        </div>
    </div>
    <div class="row">
        <div class="col">

            <div class="field">
                <input type="text" required autocomplete="off" id="gdfg" value="" style="height: 40px;">
                <label for="gdf" title="Password" data-title="Password "></label>
            </div>
        </div>
        <div class="col">

            <div class="field">
                <input type="text" required autocomplete="off" id="gdfg" value="" style="height: 40px;">
                <label for="gdf" title="Password" data-title="Password "></label>
            </div>
        </div>
        <div class="col">

            <div class="field">
                <input type="text" required autocomplete="off" id="gdfg" value="" style="height: 40px;">
                <label for="gdf" title="Password" data-title="Password "></label>
            </div>
        </div>
        <div class="col">

            <div class="field">
                <input type="text" required autocomplete="off" id="gdfg" value="" style="height: 40px;">
                <label for="gdf" title="Password" data-title="Password "></label>
            </div>
        </div>
        <div class="col">

            <div class="field">
                <input type="text" required autocomplete="off" id="gdfg" value="" style="height: 40px;">
                <label for="gdf" title="Password" data-title="Password "></label>
            </div>
        </div>
        <div class="col">

            <div class="field">
                <input type="text" required autocomplete="off" id="gdfg" value="" style="height: 40px;">
                <label for="gdf" title="Password" data-title="Password "></label>
            </div>
        </div>
        <div class="col">

            <div class="field">
                <input type="submit" class="submitbtn" value="Search" style="color:white;height:40px;">
            </div>
        </div>

    </div>



</section>



<section class="recent-order-table">
    <div class="row">
        <div class="col-sm-6">
            <h2>Recent Order</h2>
        </div>
        <div class="col">
            <div class="field">
                <input type="text" required autocomplete="off" id="gdfg" value="" style="height: 40px;">
                <label for="gdf" title="Password" data-title="Password "></label>
            </div>
        </div>
        <div class="col">
            <div class="field">
                <input type="text" required autocomplete="off" id="gdfg" value="" style="height: 40px;">
                <label for="gdf" title="Password" data-title="Password "></label>
            </div>
        </div>
        <div class="col">
            <p><a href="#"> <i class="fa fa-cloud-download"></i> Download Payment History</a> </p>
        </div>

    </div>

</section>

@endsection