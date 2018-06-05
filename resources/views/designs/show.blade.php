@extends('layouts.main')


@section('breadcrumbs')
<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row d-flex align-items-center flex-wrap">
      <div class="col-md-7">
        <h1 class="h2">{{$design->name}}</h1>
      </div>
      <div class="col-md-5">
        <ul class="breadcrumb d-flex justify-content-end">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Product Name</li>
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
      <!-- LEFT COLUMN _________________________________________________________-->
      <div class="col-lg-12">
        
        
        <div id="productMain" class="row">
          <div class="col-sm-6">
            <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
              <div> <img src="{{$design->image_path}}" alt="" class="img-fluid"></div>

            </div>
            <div class="ribbon-holder">
                @if($design->best_selling)
                <div class="ribbon sale" style="width: 156px; z-index: 1;">Best Selling</div>
                @endif
                @if($design->new)
                <div class="ribbon new" style="z-index: 1;">NEW</div>
                @endif
              </div>
          </div>
          <div class="col-sm-6">
            <h3>{{$design->name}}</h3>
            <h5 style="color: #444">Code: {{$design->id}}</h5>
            <div class="box">

              <form>
                
                <h4>Available sizes</h4>
                <select class="form-control">
                  @foreach($products as $product)
                  <option value="{{$product->id}}">{{$product->name}} <span style="color: green;">({{$product->dimensions}} cm) ... </span> <span style="color: red;">{{$product->price}} LE</span></option>
                  @endforeach
                </select>
             
                <h4 style="margin-top: 30px;">How Many People in The Design</h4>
                <select class="form-control">
                  @for($count=1; $count <= 10; $count++)
                  <option value="">{{$count}} ... <span style="color: red;">+{{($count-1)*$face_price->price}} LE</span></option>
                  @endfor
                </select>
                
                <h4 style="margin-top: 30px;">Comment</h4>
                <div class="form-group">
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Tell us any modification you like to make"></textarea>
                </div>

                <h4 style="margin-top: 30px;">Quantity</h4>
                <div class="form-group">
                  <input type="text" class="form-control">
                </div>
                
                <p class="text-center" style="margin-top: 50px;">
                  <button type="submit" class="btn btn-template-outlined"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                  <button type="submit" data-toggle="tooltip" data-placement="top" title="Add to wishlist" class="btn btn-template-outlined"><i class="fa fa-heart-o"></i></button>
                </p>
              </form>
            </div>
            
          </div>
        </div>
        
      </div>
      
    </div>
  </div>
</div>
@endsection