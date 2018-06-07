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

<div class="container">
  <div class="row">       
    <div class="col-md-12" style="margin-bottom: 30px;">
      <h1 class="my-4"><i class="fas fa-shopping-cart"></i> My Shopping Cart</h1>
      <hr>
    </div>
    
    <div class="row" style="width: 100%;">       
      <div class="col-md-4">
        <a href=""><img src="/storage/designs/design1.jpg" style="max-width: 360px;" class="text-center"></a>
        <h4 class="text-center">Design Name</h4>
        <h5 class="text-center">ID: 2547</h5>
      </div>
      <div class="col-md-8">
        <h4>Sizes</h4>
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
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddSizeModal"><i class="fa fa-plus"></i> Add Size</button>
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
        <h4>User Images</h4>
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
        <button type="button" class="btn btn-primary" style="margin-top: 20px;" data-toggle="modal" data-target="#ImageUploadModal"><i class="fa fa-plus"></i> Add Images</button>
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
        <h4 style="margin-top: 30px;">Comment</h4>
        <div class="form-group">
          <textarea class="form-control" rows="4" placeholder="Tell us any modification you like to make or add to the design"></textarea>
        </div>
      </div>
    </div>
  </div>
  <!-- /.row -->
</div>
</section>
<section style="margin-top: 70px; margin-bottom: 100px;">
  <div class="container">
      <div class="row">
        <div class="col">
        <div class="card">
          <h5 class="card-header">Order #1212</h5>
          <div class="card-body">
            <h5 class="card-title">SubTotal: <span style="color: darkred">$12</span></h5>
            <p class="card-text">Shipping cost is not included.</p>
          </div>
        </div>
        <p style="margin: 40px auto;">Please fill in the form and submit the order and we will review it and contact you, Thank you for choosing us.</p>
      </div>
      <div class="col">
        
        <form action="/cart" method="POST">
          {{csrf_field()}}
          
          
          <h4>Handover Time</h4>
          <select class="form-control" style="margin-bottom: 30px;">  
            @foreach($urgents as $urgent)
            <option value="{{$urgent->id}}">{{$urgent->name}} ... <span>+{{$urgent->price}} LE</span></option>
            @endforeach    
          </select>



          <h4>Delievery Type</h4>
          <select class="form-control" style="; margin-bottom: 30px;">  
            @foreach($delivery_types as $delivery_type)
            <option value="{{$delivery_type->id}}">{{$delivery_type->name}}</option>
            @endforeach    
          </select>

          <h4>Area Location</h4>
          <select class="form-control" style="; margin-bottom: 30px;">  
            @foreach($delivery_areas as $delivery_area)
            <option value="{{$delivery_area->id}}">{{$delivery_area->name}} ... +{{$delivery_area->price}} LE</option>
            @endforeach    
          </select>

          <h4 style="margin-top: 30px;">Shipping Address</h4>
                <div class="form-group">
                  <textarea class="form-control" rows="4" placeholder="Please enter the shipping address in details"></textarea>
                </div>
          
          <button type="submit" class="btn btn-success">Submit Order</button>
        </form>
        
      </div>
    </div>
  </div>
</section>
{{-- @else
<h2 style="color: grey">Your Shopping Cart Is Empty Please Add Items To Your Shopping Cart</h2>
<a href="/" class="btn btn-success" style="margin: 20px auto; margin-bottom: 620px;"><i class="fa fa-shopping-cart"></i> Browse Products</a>
@endif --}}


@endsection