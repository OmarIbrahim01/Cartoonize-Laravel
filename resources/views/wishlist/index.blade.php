@extends('layouts.main')


@section('breadcrumbs')
<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row d-flex align-items-center flex-wrap">
      <div class="col-md-7">
        <h1 class="h2">My Wishlist</h1>
      </div>
      <div class="col-md-5">
        <ul class="breadcrumb d-flex justify-content-end">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">My Wishlist</li>
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
        

        <div class="row products products-big">
          @if($wishlists->isNotEmpty())

          @foreach($wishlists as $wishlist)
          <div class="col-lg-4 col-md-6">
            <div class="product">
              <div class="image"><a href="{{route('designs.show', $wishlist->design->id)}}"><img src="{{$wishlist->design->image_path}}" alt="" class="img-fluid image1"></a></div>
              <div class="text">
                <h3 class="h5"><a href="{{route('designs.show', $wishlist->design->id)}}">{{$wishlist->design->name}}</a></h3>
                {{-- <p class="price"></p> --}}
                <p class="text-center" style="margin-top: -25px;">
                  <button type="button" onclick="window.location.href='{{route('designs.show', $wishlist->design->id)}}'" class="btn btn-template-outlined"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                  <button type="button" onclick="window.location.href='{{route('wishlist.delete', [$wishlist->id])}}'" data-toggle="tooltip" data-placement="top" title="Remove from wishlist" class="btn btn-template-outlined"><i class="fa fa-heart"></i></button>
                </p>
              </div>
              <div class="ribbon-holder">
                @if($wishlist->design->best_selling)
                <div class="ribbon sale" style="width: 156px;">Best Selling</div>
                @endif
                @if($wishlist->design->new)
                <div class="ribbon new">NEW</div>
                @endif
              </div>
            </div>
          </div>
          @endforeach

          @else
          <h3 style="margin: auto; color: #444;" class="h3">There is Currently No Designs In Your Wishlist</h3>
          @endif

          
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
              <li class="nav-item"><a href="customer-orders.html" class="nav-link "><i class="fa fa-list"></i> My orders</a></li>
              <li class="nav-item"><a href="customer-wishlist.html" class="nav-link active"><i class="fa fa-heart"></i> My wishlist</a></li>
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