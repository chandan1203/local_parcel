@extends('Layout.dashboard-layout')
@section('title')Airposted local parcel - Shipping Simplified | Home @stop

@section('meta')
<meta name="description" content="Airposted is an open platform that allows buyers to shop for goods from anywhere in the world and have it delivered to them by a traveler who is already heading that way, without the cost and hassle of international shipping.">
<meta name="keywords" content="Airposted, open platform, buyers, shop, anywhere in the world, delivered, traveler, without cost, without hassle, international shipping.">
@stop


@section('merchant-dashboard')


<section class="sign-in">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-8">

                <div class="row">
                    <div class="col-12 col-sm-8  ">
                        <h2> Active Shop </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col  counter-div shop-info2 ">

                        <div class="shop-title">
                            <div class="shop-img">
                                <img src="{{asset('image/home/shopper-logo.png')}}" class="img-fluid shoper-logo">
                            </div>
                            <div class="shop-text">
                                <h4>Pathabo</h4>
                                <p>online shop</p>
                            </div>
                        </div>

                        <div class="shop-details">
                            <p>House # 43, Road# 1, BLock # I, Banani, Dhaka- 1213
                                1742618399
                                House # 43, Road# 1, BLock # I, Banani, Dhaka- 1213
                                1742618399</p>
                        </div>
                    </div>
                </div>

                <div class="row"> 
                    <div class="col-12 col-sm-8 main ">
                        <h2> Create a new parcel </h2>
                        <h3> <a href="#"><i class="fas fa-edit"></i> create bulk parcel</a> </h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="field">
                            <input type="text" required value="">
                            <label title="Customer Name" data-title="Customer Name"></label>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="field">
                            <input type="number" required value="" min="0">
                            <label title="Customer Phone Number" data-title="Customer Phone Number "></label>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-12 col-sm-12">
                        <div class="field">
                            <input type="text" required value="">
                            <label title="Customer Address" data-title="Customer Adress"></label>
                        </div>
                    </div>

                </div>
                <div class="row">

                    <div class="col-12 col-sm-6">
                        <div class="field">
                            <input type="text" required value="">
                            <label title="Marchent Invoice Id" data-title=" Merchant Invoice Id"></label>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="field">
                            <select class="" id="">
                                <option></option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                            <label title="Weight" data-title="weight"></label>
                        </div>
                    </div>

                </div>
                <div class="row">

                    <div class="col-12 col-sm-6">
                        <div class="field">
                            <input type="text" required value="">
                            <label title="Area" data-title="Area"></label>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="">

                            <label class="form-check-label" for="inlineRadio1">Select ones that apply to your parcel</label>
                            </br>

                            <input type="radio" id="fragile" value=1>
                            <label class="form-check-label" for="fragile">Fragile</label>

                            <input type="radio" id="liquid" value=0>
                            <label class="form-check-label" for="liquid">Liquid</label>

                        </div>
                    </div>

                </div>
                <div class="row">

                    <div class="col-12 col-sm-6">
                        <div class="field">
                            <input type="text" required value="">
                            <label title="Cash Amount" data-title="Cash Amount"></label>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="field">
                            <input type="text" required value="">
                            <label title="Product Price" data-title="Product Price"></label>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-12 col-sm-12">

                        <div class="field2">
                            <div class="col-sm-2">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            </div>

                            <div class="col-sm-10">
                                <label class="">I acknowledge that the sale price of the said product is correct and this amount will be used in the refund process if the product is lost or damaged.</label>

                            </div>
                        </div>

                    </div>

                </div>


                <div class="row">

                    <div class="col-12 col-sm-4">
                        <div class="field">
                            <input type="submit" class="submitbtn" value="Create Parcel" style="color:white">
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-12 col-sm-4  charge-section ">


                <div class="row">

                    <div class="col-12 col-sm-12 charge-title">
                        <h3> Delivery order summary </h3>
                        </hr>
                    </div>
                    <table class="table borderless">
                        <tbody>
                            <tr>

                                <td>Cash Collection </td>
                                <td>Tk 0.00</td>

                            </tr>
                            <tr>

                                <td>Delivery Charge</td>
                                <td>Tk 0.00</td>

                            </tr>
                            <tr>

                                <td>COD Charge</td>
                                <td>Tk 0.00</td>

                            </tr>
                            <tr>

                                <td>Discount</td>
                                <td>Tk 0.00</td>

                            </tr>


                            </hr>

                            <tr>

                                <td style="font-weight:bold">Total Payable Amount</td>
                                <td>Tk 0.00</td>

                            </tr>



                        </tbody>
                    </table>
                    <p class="warning-text">Pickup Request after 3pm will be tomorrow </p>



                </div>
            </div>

        </div>


</section>


<script>

</script>


@endsection