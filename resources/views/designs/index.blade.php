@extends('layouts.main')


@section('breadcrumbs')
<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row d-flex align-items-center flex-wrap">
      <div class="col-md-7">
        <h1 class="h2">Category with left sidebar</h1>
      </div>
      <div class="col-md-5">
        <ul class="breadcrumb d-flex justify-content-end">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Category with left sidebar</li>
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
            <h3 class="h4 panel-title">Categories</h3>
          </div>
          <div class="panel-body">
            <ul class="nav nav-pills flex-column text-sm category-menu">
              <li class="nav-item"><a href="shop-category.html" class="nav-link d-flex align-items-center justify-content-between"><span>Men </span><span class="badge badge-secondary">42</span></a>
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item"><a href="shop-category.html" class="nav-link">T-shirts</a></li>
                  <li class="nav-item"><a href="shop-category.html" class="nav-link">Shirts</a></li>
                  <li class="nav-item"><a href="shop-category.html" class="nav-link">Pants</a></li>
                  <li class="nav-item"><a href="shop-category.html" class="nav-link">Accessories</a></li>
                </ul>
              </li>
              <li class="nav-item"><a href="shop-category.html" class="nav-link active d-flex align-items-center justify-content-between"><span>Ladies</span></a>
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item"><a href="shop-category.html" class="nav-link">T-shirts</a></li>
                  <li class="nav-item"><a href="shop-category.html" class="nav-link">Skirts</a></li>
                  <li class="nav-item"><a href="shop-category.html" class="nav-link">Pants</a></li>
                  <li class="nav-item"><a href="shop-category.html" class="nav-link">Accessories</a></li>
                </ul>
              </li>
              <li class="nav-item"><a href="shop-category.html" class="nav-link d-flex align-items-center justify-content-between"><span>Kids  </span><span class="badge badge-secondary">11</span></a>
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item"><a href="shop-category.html" class="nav-link">T-shirts</a></li>
                  <li class="nav-item"><a href="shop-category.html" class="nav-link">Skirts</a></li>
                  <li class="nav-item"><a href="shop-category.html" class="nav-link">Pants</a></li>
                  <li class="nav-item"><a href="shop-category.html" class="nav-link">Accessories</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
        
      </div>
      <div class="col-md-9">
        <p class="text-muted lead">In our Ladies department we offer wide selection of the best products we have found and carefully selected worldwide. Pellentesque habitant morbi tristique senectus et netuss.</p>
        <div class="row products products-big">
          <div class="col-lg-4 col-md-6">
            <div class="product">
              <div class="image"><a href="shop-detail.html"><img src="img/product1.jpg" alt="" class="img-fluid image1"></a></div>
              <div class="text">
                <h3 class="h5"><a href="shop-detail.html">Fur coat with very but very very long name</a></h3>
                <p class="price">$143.00</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="product">
              <div class="image"><a href="shop-detail.html"><img src="img/product2.jpg" alt="" class="img-fluid image1"></a></div>
              <div class="text">
                <h3 class="h5"><a href="shop-detail.html">White Blouse Armani</a></h3>
                <p class="price">
                  <del>$280</del> $143.00
                </p>
              </div>
              <div class="ribbon-holder">
                <div class="ribbon sale">SALE</div>
                <div class="ribbon new">NEW</div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="product">
              <div class="image"><a href="shop-detail.html"><img src="img/product3.jpg" alt="" class="img-fluid image1"></a></div>
              <div class="text">
                <h3 class="h5"><a href="shop-detail.html">Black Blouse Versace</a></h3>
                <p class="price">$143.00</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="product">
              <div class="image"><a href="shop-detail.html"><img src="img/product4.jpg" alt="" class="img-fluid image1"></a></div>
              <div class="text">
                <h3 class="h5"><a href="shop-detail.html">Black Blouse Versace</a></h3>
                <p class="price">$143.00</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="product">
              <div class="image"><a href="shop-detail.html"><img src="img/product3.jpg" alt="" class="img-fluid image1"></a></div>
              <div class="text">
                <h3 class="h5"><a href="shop-detail.html">White Blouse Armani</a></h3>
                <p class="price">
                  <del>$280</del> $143.00
                </p>
              </div>
              <div class="ribbon-holder">
                <div class="ribbon sale">SALE</div>
                <div class="ribbon new">NEW</div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="product">
              <div class="image"><a href="shop-detail.html"><img src="img/product4.jpg" alt="" class="img-fluid image1"></a></div>
              <div class="text">
                <h3 class="h5"><a href="shop-detail.html">White Blouse Versace</a></h3>
                <p class="price">$143.00</p>
              </div>
              <div class="ribbon-holder">
                <div class="ribbon new">NEW</div>
              </div>
            </div>
          </div>
        </div>
        
        
      </div>
    </div>
  </div>

@endsection