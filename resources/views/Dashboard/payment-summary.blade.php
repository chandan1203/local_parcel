@extends('Layout.dashboard-layout')
@section('title')Airposted local parcel - Shipping Simplified | Home @stop

@section('meta')
<meta name="description" content="Airposted is an open platform that allows buyers to shop for goods from anywhere in the world and have it delivered to them by a traveler who is already heading that way, without the cost and hassle of international shipping.">
<meta name="keywords" content="Airposted, open platform, buyers, shop, anywhere in the world, delivered, traveler, without cost, without hassle, international shipping.">
@stop


@section('merchant-dashboard')

<section class="payment-summary-header">
    <div class="row">

        <div class="col-sm-8 ">
            <div class="row">
                <div class="col-sm-4">
                    <h2>Payments Summary </h2>
                </div>
                <div class="col-sm-3">
                    <p><a href="#"> <i class="fa fa-cloud-download"></i> Download Payment History</a> </p>
                </div>
                <div class="col-sm-3">
                   <p> <a href="#"> + Add payment Method </a></p>
                </div>
            </div>
        </div>


    </div>

    </div>

</section>



<section class="payment-info-table">

</section>


@endsection