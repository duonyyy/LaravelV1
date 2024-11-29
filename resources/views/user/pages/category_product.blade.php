@extends('user.layouts.default')
  @section('title')
    
  @endsection



  @section('content')



<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <div class="section-title">
                <h2>Category Product</h2>
                
            </div>
        </div>
    </div>
    <div class="row" >
        @foreach ($category_products as $product)
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

@endsection
