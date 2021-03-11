@extends('Layout.landing_layout')
@section('title')Airposted local parcel - Shipping Simplified | Home @stop

@section('meta')
<meta name="description" content="Airposted is an open platform that allows buyers to shop for goods from anywhere in the world and have it delivered to them by a traveler who is already heading that way, without the cost and hassle of international shipping.">
<meta name="keywords" content="Airposted, open platform, buyers, shop, anywhere in the world, delivered, traveler, without cost, without hassle, international shipping.">
@stop


@section('main')
@include('Landing.header')

<section class="sign-in">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 main">
                <h2>Merchant Account Registration</h2>
            </div>
        </div>

        <form method="POST" action="{{route('merchant-register')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-12 col-sm-12  sub-title">
                    <h2>Bussiness Information</h2>
                </div>

                <div class="col-12 col-sm-3">
                    <div class="field">
                        <input type="text" required name="bussiness-name" value="{{ old('bussiness-name') }}">
                        <label title="Bussiness Name*" data-title="Bussiness Name"></label>
                    </div>
                </div>

                <div class="col-12 col-sm-3">
                    <div class="field">
                        <select class="" id="" name="bussiness-type">
                            <option> Bussiness Type*</option>
                            <option value="{{ 2 ?? old('bussiness-type') }}">2</option>
                            <option value="{{ 3 ?? old('bussiness-type') }}">3</option>
                            <option value="{{ 4 ?? old('bussiness-type') }}">4</option>
                            <option value="{{ 5 ?? old('bussiness-type') }}">5</option>
                        </select>
                        <!-- <label title="Bussiness Type " data-title="Bussiness Type"></label> -->
                    </div>
                </div>



                <div class="col-12 col-sm-3">
                    <div class="field">
                        <input type="text" required value="" name="company-phone" value="{{old('company-phone') }}">
                        <label title="Company Phone Number*" data-title="Company Phone Number"></label>
                    </div>
                </div>

                <div class="col-12 col-sm-3">
                    <div class="field">
                        <input type="email" required value="" name="bussiness-email" value="{{old('bussiness-email') }}">
                        <label title="Email Address*" data-title="Email Address"></label>
                    </div>
                </div>

                <div class="col-12 col-sm-6">
                    <div class="field">
                        <input type="text" required value="" name="bussiness-website" value="{{old('bussiness-website') }}">
                        <label title="Bussiness Website/facebook page  Link* " data-title="Bussiness Website Link"></label>
                    </div>
                </div>

                <div class="col-12 col-sm-6">
                    <div class="image-upload-wrap3">
                        <input class="file-upload-input3" type='file' name="bussiness-logo" onchange="readLogoURL(this);" accept="image/*" />
                        <div class="drag-text">
                            <img src="{{asset('image/icons/bussiness-logo.png')}}" style="padding:9px 0;" class=" bussiness-logo img-fluid">
                        </div>
                    </div>
                    <div class="file-upload-content3">
                        <img class="file-upload-image3" src="#" alt="your image" />
                        <div class="image-title-wrap">
                            <button type="button" onclick="removeUpload(3)" class="remove-image">Remove <span class="image-title3">Uploaded Image</span></button>
                        </div>

                    </div>
                </div>




            </div>

            <div class="row">

                <div class="col-12 col-sm-12 sub-title ">


                    <h2>Bussiness Location</h2>
                </div>

                <div class="col-12 col-sm-4">
                    <div class="field">
                        <input type="text" required value="" name="bussiness-address" value="{{old('bussiness-address') }}">
                        <label title="bussiness  Address* " data-title="Bussiness Website Link"></label>
                    </div>
                </div>

                <div class="col-12 col-sm-4">
                    <div class="field">
                        <select class="" id="" name="district">
                            <option>District*</option>
                            <option value="{{ 2 ?? old('district') }}">2</option>
                            <option value="{{ 3 ?? old('district') }}">3</option>
                            <option value="{{ 4 ?? old('district') }}">4</option>
                            <option value="{{ 5 ?? old('district') }}"> 5</option>
                        </select>
                        <!-- <label title="District" data-title="District"></label> -->

                    </div>
                </div>

                <div class="col-12 col-sm-4">
                    <div class="field">
                        <select class="" id="" name="thana">
                            <option> Thana*</option>
                            <option value="{{ 1 ?? old('thana') }}">2</option>
                            <option value="{{ 2 ?? old('thana') }}">3</option>
                            <option value="{{ 3 ?? old('thana') }}">4</option>
                            <option value="{{ 4  ?? old('thana') }}">5</option>
                        </select>
                        <!-- <label title="Thana" data-title="Thana"></label> -->

                    </div>
                </div>




            </div>

            <div class="row">

                <div class="col-12 col-sm-12 sub-title">


                    <h2>Key contacts</h2>
                </div>

                <div class="col-12 col-sm-4">
                    <div class="field">
                        <input type="text" required value="" name="key-contact" value="{{old('key-contact') }}">
                        <label title="Key contact Name*" data-title="Key contact Name"></label>
                    </div>
                </div>

                <div class="col-12 col-sm-4">
                    <div class="field">
                        <input type="text" required value="" name="key-phone" value="{{ old('key-phone') }}">
                        <label title="Key Contact Phone Number* " data-title="Key Contact Phone Number"></label>
                    </div>
                </div>

                <div class="col-12 col-sm-4">
                    <div class="field">
                        <input type="text" required value="" name="designation" value="{{old('designation') }}">
                        <label title="Designation*" data-title="Designation"></label>
                    </div>
                </div>

            </div>


            <div class="row">

                <div class="col-12 col-sm-12 sub-title">


                    <h2> NID* </h2>
                </div>

                <div class="col-12 col-sm-6">
                    <div class="image-upload-wrap1">
                        <input class="file-upload-input1" type='file' name="nid-front" onchange="readFrontURL(this);" accept="image/*" />
                        <div class="drag-text">
                            <img src="{{asset('image/icons/nid-front.png')}}" class="img-fluid">
                        </div>
                    </div>
                    <div class="file-upload-content1">
                        <img class="file-upload-image1" src="#" alt="your image" />
                        <div class="image-title-wrap">
                            <button type="button" onclick="removeUpload(1)" class="remove-image">Remove <span class="image-title1">Uploaded Image</span></button>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-sm-6">
                    <div class="image-upload-wrap2">
                        <input class="file-upload-input2" type='file' name="nidback" onchange="readBackURL(this);" accept="image/*" />
                        <div class="drag-text">
                            <img src="{{asset('image/icons/nid-back.png')}}" class="img-fluid">
                        </div>
                    </div>
                    <div class="file-upload-content2">
                        <img class="file-upload-image2" src="#" alt="your image" />
                        <div class="image-title-wrap">
                            <button type="button" onclick="removeUpload(2)" class="remove-image">Remove <span class="image-title2">Uploaded Image</span></button>
                        </div>

                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-12 col-sm-4">
                    <div class="field">
                        <input type="submit" class="submitbtn" value="Done" style="color:white">
                    </div>
                </div>



            </div>

        </form>

    </div>


</section>


<script>

</script>


@endsection