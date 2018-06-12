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
                      <li class="nav-item"><a href="{{route('shopping_cart.preferences')}}" class="nav-link"><i class="fa fa-truck"></i><br>Delivery Options</a></li>
                      <li class="nav-item"><a href="{{route('shopping_cart.review')}}" class="nav-link active"><i class="fa fa-eye"></i><br>Order Review</a></li>
                    </ul>
                  </form>
                  <div class="content">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th colspan="2">Product</th>
                            <th>Quantity</th>
                            <th>Unit price</th>
                            <th>Discount</th>
                            <th>Total</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><a href="#"><img src="img/detailsquare.jpg" alt="White Blouse Armani"></a></td>
                            <td><a href="#">White Blouse Armani</a></td>
                            <td>2</td>
                            <td>$123.00</td>
                            <td>$0.00</td>
                            <td>$246.00</td>
                          </tr>
                          <tr>
                            <td><a href="#"><img src="img/basketsquare.jpg" alt="Black Blouse Armani"></a></td>
                            <td><a href="#">Black Blouse Armani</a></td>
                            <td>1</td>
                            <td>$200.00</td>
                            <td>$0.00</td>
                            <td>$200.00</td>
                          </tr>
                        </tbody>
                        
                      </table>
                    </div>
                  </div>
                  <div >
                    <h4>Payment Methods</h4>
                    <select class="form-control" style="; margin-bottom: 30px;">  
                      <option selected>Cash On Delivery</option>
                    </select>
                  </div>
                  <div class="box-footer d-flex flex-wrap align-items-center justify-content-between">
                    <div class="left-col"><a href="shop-checkout3.html" class="btn btn-secondary mt-0"><i class="fa fa-chevron-left"></i>Back to payment method</a></div>
                    <div class="right-col">
                      <button type="submit" class="btn btn-template-main">Place the order<i class="fa fa-chevron-right"></i></button>
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