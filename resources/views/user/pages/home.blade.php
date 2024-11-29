@extends('user.layouts.default')
  @section('title')
      Trang Chủ 
  @endsection



  @section('content')

    
<!-- Start Hero Area -->
<section class="hero-area">
<div class="container">
    <div class="row">
        <!-- Slider Section -->
        <div class="col-lg-8 col-12 custom-padding-right">
            <div class="slider-head">
                <!-- Hero Slider -->
                <div id="heroSlider" class="carousel slide shadow-sm rounded" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($listSlider as $index => $slider)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <img src="{{ asset($slider->image) }}" class="d-block w-100 rounded" style="height: 400px; object-fit: cover;" alt="Slider Image">
                        </div>
                        @endforeach
                    </div>
                    <!-- Carousel Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#heroSlider" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#heroSlider" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    
        <!-- Banner Section -->
        <div class="col-lg-4 col-12">
            <div class="row g-3">
                <!-- Small Banner 1 -->
                <div class="col-12">
                    <div class="hero-small-banner shadow-sm rounded overflow-hidden position-relative" 
                        style="background-image: url('{{ asset('/') }}images/hero/slider-bg2.jpg'); background-size: cover; background-position: center;">
                        <div class="content p-3 text-white text-center bg-dark bg-opacity-50">
                            <h2 class="mb-2">
                                <span class="d-block text-uppercase small">Thiết Bị</span>
                                Camara Tốt
                            </h2>
                            <h3 class="fw-bold">259.99</h3>
                        </div>
                    </div>
                </div>
    
                <!-- Small Banner 2 -->
                <div class="col-12">
                    <div class="hero-small-banner style2 shadow-sm rounded overflow-hidden bg-light p-3">
                        <div class="content text-center">
                            <h2 class="fw-bold text-dark">Weekly Sale!</h2>
                            <p class="text-muted">Save up to <span class="fw-bold text-danger">50% off</span> on all items this week.</p>
                            <div class="button mt-3">
                                <a class="btn btn-primary btn-sm" href="product-grids.html">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
</section>
<!-- End Hero Area -->

<!-- Start Trending Product Area -->
<section class="trending-product section" style="margin-top: 12px;">
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="section-title">
                <h2>Trending Product</h2>
                <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                    suffered alteration in some form.</p>
            </div>
        </div>
    </div>
    <div class="row" >
        @foreach ($products as $product)
        <div class="col-lg-3 col-md-6 col-12"  >
            <!-- Start Single Product -->
            <div class="single-product" >
                <div class="product-image d-flex justify-content-center">
                    <!-- Check if the product has images -->
                   
                        <img src="{{ asset($product->images->first()->image_url) }}" alt="{{ $product->name }}"   style="width: 200px; height: 200px; object-fit: cover;">
                   
                    <div class="button">
                        <a href="{{ route('users.detailProduct', ['id' => $product->id]) }}"  class="btn">
                            <i class="lni lni-cart"></i> Add to Cart
                        </a>
                    </div>
                </div>
                <div class="product-info">
                    <!-- Check if the product has a category -->
                    <span class="category">{{ $product->category->name ?? 'Uncategorized' }}</span>
                    <h4 class="title">
                        <a href="{{ route('users.detailProduct', ['id' => $product->id]) }}" >{{ $product->name }}</a>
                    </h4>
                    <div class="price">
                        <span>{{ number_format($product->price) }}đ</span>
                    </div>
                </div>
            </div>
            <!-- End Single Product -->
        </div>
        @endforeach
    </div>
    
</div>
</section>
<!-- End Trending Product Area -->

<!-- Start Call Action Area -->
<section class="call-action section">
<div class="container">
    <div class="row ">
        <div class="col-lg-8 offset-lg-2 col-12">
            <div class="inner">
                <div class="content">
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Currently You are using free<br>
                        Lite version of ShopGrids</h2>
                    <p class="wow fadeInUp" data-wow-delay=".6s">Please, purchase full version of the template
                        to get all pages,<br> features and commercial license.</p>
                    <div class="button wow fadeInUp" data-wow-delay=".8s">
                        <a href="javascript:void(0)" class="btn">Purchase Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- End Call Action Area -->



<!-- Start Shipping Info -->
<section class="shipping-info">
<div class="container">
    <ul>
        <!-- Free Shipping -->
        <li>
            <div class="media-icon">
                <i class="lni lni-delivery"></i>
            </div>
            <div class="media-body">
                <h5>Free Shipping</h5>
                <span>On order over $99</span>
            </div>
        </li>
        <!-- Money Return -->
        <li>
            <div class="media-icon">
                <i class="lni lni-support"></i>
            </div>
            <div class="media-body">
                <h5>24/7 Support.</h5>
                <span>Live Chat Or Call.</span>
            </div>
        </li>
        <!-- Support 24/7 -->
        <li>
            <div class="media-icon">
                <i class="lni lni-credit-cards"></i>
            </div>
            <div class="media-body">
                <h5>Online Payment.</h5>
                <span>Secure Payment Services.</span>
            </div>
        </li>
        <!-- Safe Payment -->
        <li>
            <div class="media-icon">
                <i class="lni lni-reload"></i>
            </div>
            <div class="media-body">
                <h5>Easy Return.</h5>
                <span>Hassle Free Shopping.</span>
            </div>
        </li>
    </ul>
</div>
</section>
<!-- End Shipping Info -->
@endsection