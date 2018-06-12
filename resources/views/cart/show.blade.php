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
                <li class="nav-item"><a href="{{route('shopping_cart.show')}}" class="nav-link active"> <i class="fa fa-map-marker"></i><br>My Order</a></li>
                <li class="nav-item"><a href="{{route('shopping_cart.preferences')}}" class="nav-link"><i class="fa fa-truck"></i><br>Delivery Options</a></li>
                <li class="nav-item"><a href="{{route('shopping_cart.review')}}" class="nav-link"><i class="fa fa-eye"></i><br>Order Review</a></li>
              </ul>
            </form>
            <div class="content">





              <div class="container">
                <div class="row">       
                  <div class="col-md-12" style="margin-bottom: 30px;">
                    <h1 class="my-4"><i class="fas fa-shopping-cart"></i> My Shopping Cart</h1>
                    <hr>
                  </div>
                  

                  {{-- ////////////////////////////// --}}
                  <div class="row" style="width: 100%; border-bottom: 1.3px solid; margin-bottom: 50px; border-color: #ddd;">       
                    <div class="col-md-4">
                      <a href=""><img src="/storage/designs/design1.jpg" style="max-width: 250px;" class="text-center"></a>
                      <h4 class="text-center">Design Name</h4>
                      <h5 class="text-center">ID: 2547</h5>
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
                          <tr>
                            <td>qweqweqwe</td>
                            <td>12.00</td>
                            <td>2</td>
                            <td>12.00</td>
                            <td>
                              <a href="#" onclick="event.preventDefault(); document.getElementById('cancel_item').submit();"><i class="fas fa-times-circle" style="color: darkred; font-size: 20px;"></i></a>
                              <form id="cancel_item" action="/item/1" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                                  {{ method_field('DELETE') }}
                              </form>         
                            </td>
                          </tr>
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
                                  <div class="form-group">
                                    <label for="exampleFormControlSelect1">Select Size</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                      <option>1</option>
                                      <option>2</option>
                                      <option>3</option>
                                      <option>4</option>
                                      <option>5</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label for="exampleFormControlInput1">Quantity</label>
                                    <input type="number" class="form-control" value="1">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--End Modal -->
                      <hr>
                      <h3>User Images</h3>
                      <div class="row">
                        <div class="col-md-3">
                          <a href=""><img src="/storage/designs/design1.jpg" style="max-width: 100px;"></a>
                          <a href="#" style="color: darkred; margin-top: 20px;"><i class="fas fa-times-circle" style="color: darkred; font-size: 20px; margin: auto;"></i> Remove</a>
                        </div>
                        <div class="col-md-3">
                          <a href=""><img src="/storage/designs/design1.jpg" style="max-width: 100px;"></a>
                          <a href="#" style="color: darkred; margin-top: 20px;"><i class="fas fa-times-circle" style="color: darkred; font-size: 20px; margin: auto;"></i> Remove</a>
                        </div>
                        <div class="col-md-3">
                          <a href=""><img src="/storage/designs/design1.jpg" style="max-width: 100px;"></a>
                          <a href="#" style="color: darkred; margin-top: 20px;"><i class="fas fa-times-circle" style="color: darkred; font-size: 20px; margin: auto;"></i> Remove</a>
                        </div>

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
                              <form action="/file_upload" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                  <label for="file">File Upload</label>
                                  <input type="file" name="file[]" class="form-control-file btn-primary" id="file" multiple>
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
                        <textarea class="form-control" rows="4" placeholder="Tell us any modification you like to make or add to the design"></textarea>
                      </div>
                    </div>
                  </div>
                  {{-- ///////////////////////// --}}
                </div>
                <!-- /.row -->
                
              </div>
            </section>

            </div>
            <div class="box-footer d-flex flex-wrap align-items-center justify-content-between">
              <div class="left-col"><a href="{{route('designs.index')}}" class="btn btn-secondary mt-0"><i class="fa fa-chevron-left"></i>Back to Shopping</a></div>
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

{{-- @else
<h2 style="color: grey">Your Shopping Cart Is Empty Please Add Items To Your Shopping Cart</h2>
<a href="/" class="btn btn-success" style="margin: 20px auto; margin-bottom: 620px;"><i class="fa fa-shopping-cart"></i> Browse Products</a>
@endif --}}


@endsection