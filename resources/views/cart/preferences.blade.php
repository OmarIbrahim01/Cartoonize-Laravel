@extends('layouts.main')


@section('breadcrumbs')
<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row d-flex align-items-center flex-wrap">
      <div class="col-md-7">
        <h1 class="h2">Shopping Cart</h1>
      </div>
      <div class="col-md-5">
        <ul class="breadcrumb d-flex justify-content-end">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Shopping Cart</li>
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection


@section('content')

<div id="content">
  <div class="container">
    <div class="row">
      <div id="checkout" class="col-lg-9">
        <div class="box">
          <form method="post" action="shop-checkout4.html">
            <form method="post" action="shop-checkout4.html">
              <ul class="nav nav-pills nav-fill">
                <li class="nav-item"><a href="{{route('shopping_cart.show')}}" class="nav-link"> <i class="fa fa-map-marker"></i><br>My Order</a></li>
                <li class="nav-item"><a href="{{route('shopping_cart.preferences')}}" class="nav-link active"><i class="fa fa-truck"></i><br>Delivery Options</a></li>
                <li class="nav-item"><a href="{{route('shopping_cart.review')}}" class="nav-link"><i class="fa fa-eye"></i><br>Order Review</a></li>
              </ul>
            </form>
            <div class="content">

              <section style="margin-top: 70px; margin-bottom: 45px;">
                <div class="container">
                    <div class="row">
                      
                    <div class="col-md-12" >
                      <h1 style="float: none; margin: 0 auto; width: 90%; margin-bottom: 40px; color: #333">Order Options</h1>
                      
                      <form action="/cart" method="POST" style="float: none; margin: 0 auto; width: 90%;">
                        {{csrf_field()}}
                        
                        <div id="time">
                          <h4>Handover Time</h4>
                          <select class="form-control" style="margin-bottom: 30px;">  
                            @foreach($urgents as $urgent)
                            <option value="{{$urgent->id}}">{{$urgent->name}} ... <span>+{{$urgent->price}} LE</span></option>
                            @endforeach    
                          </select>
                        </div>

                        <div >
                          <h4>Delievery Type</h4>
                          <select id="delievery_type" class="form-control" style="; margin-bottom: 30px;">  
                            <option disabled selected>Select Option</option>
                            @foreach($delivery_types as $delivery_type)
                            <option value="{{$delivery_type->id}}">{{$delivery_type->name}}</option>
                            @endforeach    
                          </select>
                        </div>

                        <div id="store">
                          <h4>Store</h4>
                          <select  class="form-control" style="; margin-bottom: 30px;">  
                            @foreach($stores as $store)
                            <option value="{{$store->id}}">{{$store->name}}</option>
                            @endforeach    
                          </select>
                        </div>

                        <div id="location">
                          <h4>Area Location</h4>
                          <select  class="form-control" style="; margin-bottom: 30px;">  
                            @foreach($delivery_areas as $delivery_area)
                            <option value="{{$delivery_area->id}}">{{$delivery_area->name}} ... +{{$delivery_area->price}} LE</option>
                            @endforeach    
                          </select>
                        </div>

                        <div id="address">
                          <h4 style="margin-top: 30px;">Shipping Address</h4>
                          <div class="form-group">
                            <textarea  class="form-control" rows="4" placeholder="Please enter the shipping address in details"></textarea>
                          </div>
                        </div>
                        
                       
                      
                      
                    </div>
                  </div>
                </div>
              </section>
            </div>
            <div class="box-footer d-flex flex-wrap align-items-center justify-content-between">
              <div class="left-col"><a href="shop-checkout3.html" class="btn btn-secondary mt-0"><i class="fa fa-chevron-left"></i>Back to Cart</a></div>
              <div class="right-col">
                <button type="button" class="btn btn-template-main">Review order<i class="fa fa-chevron-right"></i></button>
                </form>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-lg-3">
        <div id="order-summary" class="box mb-4 p-0">
          <div class="box-header mt-0">
            <h3>Order summary</h3>
          </div>
          <p class="text-muted text-small">Shipping and additional costs are calculated based on the values you have entered.</p>
          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <td>Order subtotal</td>
                  <th>$446.00</th>
                </tr>
                <tr>
                  <td>Shipping and handling</td>
                  <th>$10.00</th>
                </tr>
                <tr>
                  <td>Tax</td>
                  <th>$0.00</th>
                </tr>
                <tr class="total">
                  <td>Total</td>
                  <th>$456.00</th>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')

<script>
  $("#store").hide();
  $("#location").hide();
  $("#address").hide();

  $('#delievery_type').on('change', function () {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    if(valueSelected == 1){
      $("#store").fadeIn();
      $("#location").fadeOut();
      $("#address").fadeOut();
    } else if(valueSelected == 2){
      $("#location").fadeIn();
      $("#address").fadeIn();
      $("#store").fadeOut();
    }
  });

</script>

@endsection