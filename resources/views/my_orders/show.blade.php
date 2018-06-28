@extends('layouts.main')


@section('breadcrumbs')
<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row d-flex align-items-center flex-wrap">
      <div class="col-md-7">
        <h1 class="h2">My Orders</h1>
      </div>
      <div class="col-md-5">
        <ul class="breadcrumb d-flex justify-content-end">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">My Orders</li>
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection


@section('content')
<div id="content">
  <div class="container">
    <div class="row bar">
      <div id="customer-order" class="col-lg-9">
        <p class="lead">Order #{{$order->id}} was placed on <strong>{{$order->created_at->format('d/m/Y')}}</strong> and is currently <strong class="{{$order->progress->bootstrap_class}}">{{$order->progress->name}}</strong>.</p>
        
        <div class="box">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Design</th>
                  <th>Size</th>
                  <th>Quantity</th>
                  <th>People</th>
                  <th>Price</th>
                </tr>
              </thead>
              <tbody>
                @foreach($order->order_designs as $order_design)
                  @foreach($order_design->order_design_products as $product)
                  <tr>
                    <td><a href="{{$order_design->design->image_path}}"><img src="{{$order_design->design->image_path}}"></a></td>
                    <td>{{$product->product->name}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$order_design->faces}}</td>
                    <td>{{ ($product->product->price * $product->quantity) + (($order_design->faces-1) * $face_price->price) }} LE</td>
                  </tr>
                  @endforeach
                @endforeach
              </tbody>
              
            </table>
          </div>
          <br>
          <div class="row addresses">
            <div class="col-md-6 ">
              <h3 class="text-uppercase">Shipping Info</h3>
              <p>
                Customer Name: {{$order->user->name}}<br>
                Delivery Type: {{$order->delivery_type->name}}<br>         
                @if($order->delivery_type->name == 'Home Delivery')   
                  {{$order->delivery_area->name}}<br>
                  {{$order->delivery_address}}<br>
                @elseif($order->delivery_type->name == 'Pick Up From Store')
                  Store: {{$order->store->name}}<br>
                @endif  
                Egypt
              </p>
            </div>
            <div class="col-md-6">
              
              <div id="order-summary" class="box mb-4 p-0" style="margin-top: 0">
                <div class="box-header mt-0">
                  <h3>Order summary</h3>
                </div>
                <p class="text-muted text-small">Shipping and additional costs are calculated based on the values you have entered.</p>
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>Order subtotal</td>
                        <th>{{$order_subtotal}} LE</th>
                      </tr>
                      <tr>
                        <td>Shipping and handling</td>
                        <th>{{$delivery_fee}} LE</th>
                      </tr>
                      <tr>
                        <td>Handover Time</td>
                        <th>{{$urgent_fee}} LE</th>
                      </tr>
                      <tr class="total">
                        <td>Final Total</td>
                        <th style="color: darkred;">{{$order_subtotal + $delivery_fee + $urgent_fee}} LE</th>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 mt-4 mt-lg-0">
        <!-- CUSTOMER MENU -->
        <div class="panel panel-default sidebar-menu">
          <div class="panel-heading">
            <h3 class="h4 panel-title">Customer section</h3>
          </div>
          <div class="panel-body">
            <ul class="nav nav-pills flex-column text-sm">
              <li class="nav-item"><a href="customer-orders.html" class="nav-link active"><i class="fa fa-list"></i> My orders</a></li>
              <li class="nav-item"><a href="customer-wishlist.html" class="nav-link"><i class="fa fa-heart"></i> My wishlist</a></li>
              <li class="nav-item"><a href="customer-account.html" class="nav-link"><i class="fa fa-user"></i> My account</a></li>
              <li class="nav-item"><a href="index.html" class="nav-link"><i class="fa fa-sign-out"></i> Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection