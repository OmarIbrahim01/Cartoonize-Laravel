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
    <div class="row bar mb-0">
      <div id="customer-orders" class="col-md-9">
        <p class="text-muted lead">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>
        <div class="box mt-0 mb-lg-0">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Order</th>
                  <th>Date</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($orders as $order)
                
                @php
                  // Order SubTotal
                  $order_subtotal = 0;
                  foreach($order->order_designs as $order_design){
                      $order_design_faces_price = ($order_design->faces-1) * ($face_price->price);
                      
                      foreach($order_design->order_design_products as $order_design_product){
                          $size_total = ($order_design_product->product->price * $order_design_product->quantity);
                          
                          $order_subtotal += $size_total;
                      }
                      $order_subtotal += $order_design_faces_price;
                  }
                  // Delivery Fee
                  if(isset($order->delivery_area->price)){
                      $delivery_fee = $order->delivery_area->price;
                  }else{
                      $delivery_fee = 0;
                  }

                  // Urgent Fee
                  if(isset($order->urgent->price)){
                      $urgent_fee = $order->urgent->price;
                  }else{
                      $urgent_fee = 0;
                  }

                  $order_subtotal += ($delivery_fee + $urgent_fee);
                @endphp

                <tr>
                  <th># {{$order->id}}</th>
                  <td>{{ $order->created_at->format('d/m/Y') }}</td>
                  <td>$ {{$order_subtotal}}</td>
                  <td><span class="{{$order->progress->bootstrap_class}}">{{$order->progress->name}}</span></td>
                  <td><a href="{{route('my_orders.show', [$order->id])}}" class="btn btn-template-outlined btn-sm">View</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-md-3 mt-4 mt-md-0">
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