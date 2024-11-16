<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


<div class="product-detail py-5">
    <div class="container">
        <div class="row">
            <!-- Product Images Section -->
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="product-images-frame border rounded shadow-sm p-3">
                    <!-- Main Image - Larger and at the top -->
                    <div class="product-image-main mb-4">
                        @foreach($product->images as $image)
                            @if($image->image_type == 'main')
                                <img src="{{ asset($image->image_url) }}" class="d-block  img-fluid rounded-lg" alt="Main Image of {{ $product->name }}" style="height:100px; width:100px object-fit: cover;">
                            @endif
                        @endforeach
                    </div>

                    <!-- Secondary Images - Smaller and below the main image -->
                    <div class="product-image-secondary">
                        <div class="row row-cols-3 g-2">
                            @foreach($product->images as $image)
                                @if($image->image_type == 'secondary')
                                    <div class="col">
                                        <img src="{{ asset($image->image_url) }}" class="d-block  img-fluid rounded" alt="Secondary Image of {{ $product->name }}" style="max-height: 80px; object-fit: cover;">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Details Section -->
            <div class="col-md-6">
                <h1 class="mb-4 text-uppercase text-dark">{{ $product->name }}</h1>
                <p class="text-muted mb-3">
                    <strong>Category: </strong>
                    @foreach($categories as $category)
                        @if($category->id == $product->category_id)
                            <span class="badge bg-info">{{ $category->name }}</span>
                        @endif
                    @endforeach
                </p>
                <p class="mb-3">{{ $product->description }}</p>
                
                <h3 class="mb-4 text-primary">
                    <strong>{{ number_format($product->price, 0, ',', '.') }} VND</strong>
                </h3>
                
                <!-- Add to Cart Button -->
               <form action="{{ route('users.addToCart')}}" method="POST">
               
                @csrf
                <input type="hidden" name="productId" value="{{$product->id}}">
                <input type="number" name="quantity" value="1" min="1">
                <button class="btn btn-success mt-3 w-100">Add to Cart</button>
               </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>