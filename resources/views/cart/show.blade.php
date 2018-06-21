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
@if(!empty($cart))
<div id="content">
  <div class="container">
    <div class="row">
      <div id="checkout" class="col-lg-9">
        <div class="box">
          <form method="POST" id="submit_first" name="submit_first" action="{{route('SubmitCart.first')}}">
        
              <ul class="nav nav-pills nav-fill">
                <li class="nav-item"><a href="{{route('shopping_cart.show')}}" class="nav-link active"> <i class="fa fa-map-marker"></i><br>My Order</a></li>
                <li class="nav-item"><a href="{{route('shopping_cart.preferences')}}" class="nav-link"><i class="fa fa-truck"></i><br>Delivery Options</a></li>
                <li class="nav-item"><a href="{{route('shopping_cart.review')}}" class="nav-link"><i class="fa fa-eye"></i><br>Order Review</a></li>
              </ul>
         
            <div class="content">





              <div class="container">
                <div class="row">       
                  <div class="col-md-12" style="margin-bottom: 30px;">
                    <h1 class="my-4"><i class="fas fa-shopping-cart"></i> My Shopping Cart</h1>
                    <hr>
                  </div>
                  
                  
                  @foreach($order_designs as $order_design)
                  {{-- ////////////////////////////// --}}
                  <input type="hidden" name="order_design_id[]" multiple value="{{$order_design->id}}">
                  <div class="row" style="width: 100%; border-bottom: 1.3px solid; margin-bottom: 50px; border-color: #ddd;">       
                    <div class="col-md-4">
                      <a href="{{$order_design->design->image_path}}"><img src="{{$order_design->design->image_path}}" style="max-width: 250px;" class="text-center"></a>
                      <h4 class="text-center">{{$order_design->design->name}}</h4>
                      <h5 class="text-center">Code: {{$order_design->design->id}}</h5>
                    </div>
                    <div class="col-md-8" style="margin-bottom: 50px;">
                      <h3>Sizes</h3>
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">Item Name</th>
                            <th scope="col">Price/Item</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Remove</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($order_design->order_design_products as $order_design_product)
                          <tr>
                            <td>{{$order_design_product->product->name}}</td>
                            <td>{{$order_design_product->product->price}}</td>
                            <td>{{$order_design_product->quantity}}</td>
                            <td>{{$order_design_product->product->price*$order_design_product->quantity}}</td>
                            <td>
                              <a href="#" onclick="event.preventDefault(); document.getElementById('cancel_item').submit();"><i class="fas fa-times-circle" style="color: darkred; font-size: 20px;"></i></a>
                              <form id="cancel_item" action="{{route('shopping_cart.delete_design_product', [$order_design_product->id])}}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                                  {{ method_field('DELETE') }}
                              </form>         
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                       <!-- Button trigger Add Size Modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddSizeModal"><i class="fa fa-plus"></i> Add More Size</button>
                      <!-- Add Size Modal -->
                      <div class="modal fade" id="AddSizeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Add Sizes</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-9">
                                  <form action="{{route('addToCart.product', [$order_design->id])}}" method="POST">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                      <label for="exampleFormControlSelect1">Select Size</label>
                                      <select class="form-control" name="product">
                                        @foreach($products as $product)
                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label for="exampleFormControlInput1">Quantity</label>
                                      <input type="number" name="quantity" class="form-control" value="1">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add Size</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!--End Modal -->
                      <hr>

                      <h3>User Images</h3>
                      <div class="row">

                        @foreach($order_design->user_images as $user_image)
                        <div class="col-md-3">
                          <a href="{{$user_image->full_path}}"><img src="{{$user_image->full_path}}" style="max-width: 100px;"></a>

                          <a href="#" onclick="event.preventDefault(); document.getElementById('delete_image').submit();"><i class="fas fa-times-circle" style="color: darkred; font-size: 20px; margin: auto;"></i> Remove</a>
                          
                          
                        </div>
                        @if(!empty($user_image))
                          <form id="delete_image" action="{{route('addToCart.deleteUserImage', [$user_image->id])}}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                          </form>  
                        @endif
                        @endforeach

                        

                      </div>

                      <!-- Button trigger Add Image Modal -->
                      <button type="button" class="btn btn-primary" style="margin-top: 20px;" data-toggle="modal" data-target="#ImageUploadModal"><i class="fa fa-plus"></i> Add More Images</button>
                      <!-- Add Image Modal -->
                      <div class="modal fade" id="ImageUploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="{{route('addToCart.add_user_image')}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="order_design_id" value="{{$order_design->id}}">
                                <input type="hidden" name="order_id" value="{{$cart->id}}">
                                <div class="form-group">
                                  <label for="file">File Upload</label>
                                  <input type="file" name="user_image[]" class="form-control-file btn-primary" id="file" multiple style="display: block;">
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Upload Images</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--End Modal -->
                      <hr>
                      <h3 style="margin-top: 30px;">Comment</h3>
                      <div class="form-group">
                        <textarea class="form-control" rows="4" name="comment[]" placeholder="Tell us any modification you like to make or add to the design">{{$order_design->note}}</textarea>
                      </div>
                    </div>
                  </div>
                  {{-- ///////////////////////// --}}
                  @endforeach
                  
                </div>
                <!-- /.row -->
                
              </div>
            </section>

            </div>
            <div class="box-footer d-flex flex-wrap align-items-center justify-content-between">
              <div class="left-col"><a href="{{route('designs.index')}}" class="btn btn-secondary mt-0"><i class="fa fa-chevron-left"></i>Back to Shopping</a></div>
              <div class="right-col">
                <button type="submit" form="submit_first" class="btn btn-template-main">Choose Delivery Options<i class="fa fa-chevron-right"></i></button>
              </div>
            </div>
            {{csrf_field()}}
            {{ method_field('POST') }}
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

@else
<div class="container">
  <div class="row">       
    <div class="col-md-12" style="margin-bottom: 30px;">
      <h1 class="my-4"><i class="fas fa-shopping-cart"></i> My Shopping Cart</h1>
      <hr>
      <h2 style="text-align: center; margin: 150px auto">It Appears You Haven't Added Any Thing To Your Shopping Cart Yet.</h2>
      <a href="/" class="btn btn-success" style=""><i class="fa fa-shopping-cart"></i> Browse Products</a>
    </div>
  </div>
  <!-- /.row -->
</div>
@endif
{{-- @else
<h2 style="color: grey">Your Shopping Cart Is Empty Please Add Items To Your Shopping Cart</h2>
<a href="/" class="btn btn-success" style="margin: 20px auto; margin-bottom: 620px;"><i class="fa fa-shopping-cart"></i> Browse Products</a>
@endif --}}


@endsection