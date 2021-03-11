@extends('Layout.dashboard-layout')
@section('title')Airposted local parcel - Shipping Simplified | Home @stop

@section('meta')
<meta name="description" content="Airposted is an open platform that allows buyers to shop for goods from anywhere in the world and have it delivered to them by a traveler who is already heading that way, without the cost and hassle of international shipping.">
<meta name="keywords" content="Airposted, open platform, buyers, shop, anywhere in the world, delivered, traveler, without cost, without hassle, international shipping.">
@stop


@section('merchant-dashboard')

<section class="payment-header">

    <div class="row">
        <div classs="col-sm-12">
            
            <a href=""><i class="fas fa-long-arrow-alt-left"></i> back</a>
            <h2>Add Payment Method</h2>
            <h3>Through which you want to transact </h3>
        </div>
    </div>
</section>


<section class="payment-info">
    <div class="row">

        <div class="col">
            <div class="field">
                <input type="text" required value="">
                <label title="Customer Name" data-title="Customer Name"></label>
            </div>
        </div>

        <div class="col">
            <div class="field">
                <input type="text" required value="">
                <label title="Customer Name" data-title="Customer Name"></label>
            </div>
        </div>
        <div class="col">
            <div class="field">
                <input type="text" required value="">
                <label title="Customer Name" data-title="Customer Name"></label>
            </div>
        </div>
        <div class="col">
            <div class="field">
                <input type="text" required value="">
                <label title="Customer Name" data-title="Customer Name"></label>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col">
            <div class="field">
                <input type="text" required value="">
                <label title="Customer Name" data-title="Customer Name"></label>
            </div>
        </div>
        <div class="col">
            <div class="field">
                <input type="text" required value="">
                <label title="Customer Name" data-title="Customer Name"></label>
            </div>
        </div>
        <div class="col">
            <div class="field">
                <input type="text" required value="">
                <label title="Customer Name" data-title="Customer Name"></label>
            </div>
        </div>


    </div>

    <div class="row">
        <div class="col col-sm-2">
            <div class="field">
                <input type="submit" class="submitbtn" value="Create Parcel" style="color:white">
            </div>
        </div>
    </div>


</section>


@endsection