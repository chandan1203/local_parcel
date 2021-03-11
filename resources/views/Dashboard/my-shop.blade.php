@extends('Layout.dashboard-layout')
@section('title')Airposted local parcel - Shipping Simplified | Home @stop

@section('meta')
<meta name="description" content="Airposted is an open platform that allows buyers to shop for goods from anywhere in the world and have it delivered to them by a traveler who is already heading that way, without the cost and hassle of international shipping.">
<meta name="keywords" content="Airposted, open platform, buyers, shop, anywhere in the world, delivered, traveler, without cost, without hassle, international shipping.">
@stop


@section('merchant-dashboard')

<section class="header-section">

    <div class="row">
        <div class="col col-sm-2">
            <h2>My Shops </h2>
        </div>
        <div class="col col-sm-10">


        </div>
    </div>

    </div>

</section>



<section class="shop-section">
    <div class="row">

        <div class=" col col-sm-2  counter-div shop-info1">
            <div class="add-shop">
                <a href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"> <img src="{{asset('image/icons/add-icon.png')}}" class="img-fluid"> </a>
                <P>Add more</P>

            </div>
        </div>


      @foreach($shopinfo as $key=>$shopdata)
        <div class="col col-sm-2  {{$key % 2 ? 'oddshop': 'evenshop' }} counter-div shop-info2 ">

            <div class="shop-title">
                <div class="shop-img">
                    <img src="{{asset('image/home/shopper-logo.png')}}" class="img-fluid shoper-logo">
                </div>
                <div class="shop-text">
                    <h4>Pathabo</h4>
                    <p>online shop</p>
                </div>
                <a  href=""  onclick="editShop('{{ $shopdata }}')" data-toggle="modal" data-target="#editModal" data-whatever="@mdo"  > <i class="fas fa-edit"></i></a>
            </div>

            <div class="shop-details">
                <p>House # 43, Road# 1, BLock # I, Banani, Dhaka- 1213
                    1742618399</p>
            </div>
        </div>
      @endforeach
    </div>

</section>






<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Shop </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form id="modalform" onsubmit="event.preventDefault(); addShop()" enctype="multipart/form-data">
     
        <div class="form-group">
            <label for="recipient-name"   class="col-form-label">Shop Name</label>
            <input type="text" required  class="form-control" id="shop-name">
          </div>

          <div class="form-group">
            <label for="recipient-name"   class="col-form-label">Shop Type</label>
            <input type="text"  required  class="form-control" id="shop-type">
          </div>

          <div class="form-group">
            <label for="recipient-name"   class="col-form-label">Address</label>
            <input type="text" required  class="form-control" id="shop-address">
          </div>

          <div class="form-group">
            <label for="recipient-name"  required class="col-form-label">Emergency Number</label>
            <input type="number"  required class="form-control" id="shop-number">
          </div>

          
          <div class="form-group">
            <label for="recipient-name"  class="col-form-label"> Status</label>
            <select class="custom-select"  required id="shop-status">
                     <option> -- Select --</option>
                    <option value="1"> Active</option>
                    <option value= "0">Inactive </option>
            </select>
          </div>


          <div class="form-group">
            <label for="message-text"  class="col-form-label">logo:</label>
           <input type="file"  required id="shop-logo" class="form-control" >

          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit"   class="btn btn-primary"> Add Shop</button>
      </div>
      </form>
     
    </div>
  </div>
</div>



<div class="modal fade" id="editModal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Shop </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form id="modalform" onsubmit="event.preventDefault(); editShopdata()" enctype="multipart/form-data">
    
    <input id="feed_id" type="hidden" value=" " />

        <div class="form-group">
            <label for="recipient-name"   class="col-form-label">Shop Name</label>
            <input type="text" name="shop-name"  class="form-control" id="shop-name1">
          </div>

          <div class="form-group">
            <label for="recipient-name"   class="col-form-label">Shop Type</label>
            <input type="text"   name="shoptype"  class="form-control" id="shop-type1">
          </div>

          <div class="form-group">
            <label for="recipient-name"   class="col-form-label">Address</label>
            <input type="text"  name="address"  class="form-control" id="shop-address1">
          </div>

          <div class="form-group">
            <label for="recipient-name"   class="col-form-label">Emergency Number</label>
            <input type="number"   name ="phone-number" class="form-control" id="shop-number1">
          </div>

          
          <div class="form-group">
            <label for="recipient-name"  class="col-form-label"> Status</label>
            <select class="custom-select"  name="status"  id="shop-status1">
                     <option> -- Select --</option>
                    <option value="1"> Active</option>
                    <option value= "0">Inactive </option>
            </select>
          </div>


          <div class="form-group">
            <label for="message-text"   class="col-form-label">logo:</label>
           <input type="file" name="shoplogo"    id="shop-logo1" class="form-control" >

          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit"   class="btn btn-primary"> Edit  Shop</button>
      </div>
      </form>
     
    </div>
  </div>
</div>

@endsection