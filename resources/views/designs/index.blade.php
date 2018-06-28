@extends('layouts.main')


@section('breadcrumbs')
<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row d-flex align-items-center flex-wrap">
      <div class="col-md-7">
        <h1 class="h2">Category</h1>
      </div>
      <div class="col-md-5">
        <ul class="breadcrumb d-flex justify-content-end">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Category</li>
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection


@section('content')

  <div class="container">
    <div class="row bar">
      <div class="col-md-3">
        <!-- MENUS AND FILTERS-->
        <div class="panel panel-default sidebar-menu">
          <div class="panel-heading">
            <h3 class="h4 panel-title">Category</h3>
            {{-- <h1>{{Request::getPathInfo()}}</h1> --}}
          </div>
          <div class="panel-body">
            <ul class="nav nav-pills flex-column text-sm category-menu">
            	<li class="nav-item"><a href="{{route('designs.index')}}" class="nav-link @if($cat == 'all') active @endif d-flex align-items-center justify-content-between"><span>All </span></a>
              </li>

              @foreach($categories as $category)
              <li class="nav-item"><a href="{{route('designs.category', $category->id)}}" class="nav-link @if($subcat == null && $cat == $category) active @endif d-flex align-items-center justify-content-between"><span>{{$category->name}} </span><span class="badge badge-secondary">{{$category->designs->count()}}</span></a>
                <ul class="nav nav-pills flex-column">

                	@foreach($category->subCategory as $sub_category)
                  <li class="nav-item"><a href="{{route('designs.sub_category', [$category->id, $sub_category->id])}}" class="nav-link @if($subcat == $sub_category) active @endif ">{{$sub_category->name}}</a></li>
                  @endforeach

                </ul>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
        
      </div>
      <div class="col-md-9">
        {{-- <p class="text-muted lead">In our Ladies department we offer wide selection of the best products we have found and carefully selected worldwide. Pellentesque habitant morbi tristique senectus et netuss.</p> --}}
        <div class="row products products-big">
          @if($designs->isNotEmpty())

        	@foreach($designs as $design)
          <div class="col-lg-4 col-md-6">
            <div class="product">
              <div class="image"><a href="{{route('designs.show', $design->id)}}"><img src="{{$design->image_path}}" alt="" class="img-fluid image1"></a></div>
              <div class="text">
                <h3 class="h5"><a href="{{route('designs.show', $design->id)}}">{{$design->name}}</a></h3>
                {{-- <p class="price"></p> --}}

                <p class="text-center" style="margin-top: -25px;">
                  <button type="button" onclick="window.location.href='{{route('designs.show', $design->id)}}'" class="btn btn-template-outlined"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                  <button type="button" onclick="window.location.href='{{route('wishlist.store', [$design->id])}}'" data-toggle="tooltip" data-placement="top" title="Add to wishlist" class="btn btn-template-outlined"><i class="fa fa-heart"></i></button>
                </p>

              </div>
              <div class="ribbon-holder">
              	@if($design->best_selling)
                <div class="ribbon sale" style="width: 156px;">Best Selling</div>
                @endif
                @if($design->new)
                <div class="ribbon new">NEW</div>
                @endif
              </div>
            </div>
          </div>
          @endforeach

          @else
          <h3 style="margin: auto; color: #444;" class="h3">There is Currently No Designs In this Category</h3>
          @endif

          
        </div>
        
        
      </div>
    </div>
  </div>

@endsection