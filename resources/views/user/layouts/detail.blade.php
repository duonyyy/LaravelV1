
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
                                <img src="{{ asset($image->image_url) }}" class="d-block w-100 img-fluid rounded-lg" alt="Main Image of {{ $product->name }}" style="max-height: 100px; object-fit: cover;">
                            @endif
                        @endforeach
                    </div>

                    <!-- Secondary Images - Smaller and below the main image -->
                    <div class="product-image-secondary">
                        <div class="row row-cols-3 g-2">
                            @foreach($product->images as $image)
                                @if($image->image_type == 'secondary')
                                    <div class="col">
                                        <img src="{{ asset($image->image_url) }}" class="d-block w-100 img-fluid rounded" alt="Secondary Image of {{ $product->name }}" style="max-height: 80px; object-fit: cover;">
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
                <button class="btn btn-lg btn-success mt-3 w-100">Add to Cart</button>
            </div>
        </div>
    </div>
</div>
