@extends('user.layouts.default')
  @section('title')
     {{$product->name}}
  @endsection

@section('content')
     <!-- Start Item Details -->
     <section class="item-details section">
        <div class="container">
            <div class="top-area">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-images">
                            <!-- Carousel Component -->
                            <div id="product-image-{{ $product->id }}" class="carousel slide" data-bs-ride="carousel">
                                <!-- Carousel Indicators -->
                                <div class="carousel-indicators">
                                    @foreach($product->images as $index => $image)
                                        <button 
                                            type="button" 
                                            data-bs-target="#product-image-{{ $product->id }}" 
                                            data-bs-slide-to="{{ $index }}" 
                                            class="{{ $index == 0 ? 'active' : '' }}" 
                                            aria-label="Slide {{ $index + 1 }}">
                                        </button>
                                    @endforeach
                                </div>
                        
                                <!-- Carousel Inner -->
                                <div class="carousel-inner">
                                    @foreach($product->images as $index => $image)
                                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                            <img src="{{ asset($image->image_url) }}" 
                                                 class="d-block w-100" 
                                                 style="height: 600px; object-fit: cover;" 
                                                 alt="{{ $image->image_type == 'main' ? 'Main Image of ' . $product->name : 'Secondary Image of ' . $product->name }}">
                                        </div>
                                    @endforeach
                                </div>
                        
                                <!-- Carousel Controls -->
                                <button 
                                    class="carousel-control-prev" 
                                    type="button" 
                                    data-bs-target="#product-image-{{ $product->id }}" 
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button 
                                    class="carousel-control-next" 
                                    type="button" 
                                    data-bs-target="#product-image-{{ $product->id }}" 
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        
                            <!-- Thumbnails Gallery -->
                            <main id="gallery" class="mt-3">
                                <div class="row g-2">
                                    @foreach($product->images as $index => $image)
                                        <div class="col-3">
                                            <img src="{{ asset($image->image_url) }}" 
                                                 class="img-thumbnail" 
                                                 style="cursor: pointer; height: 100px; object-fit: cover;" 
                                                 data-bs-target="#product-image-{{ $product->id }}" 
                                                 data-bs-slide-to="{{ $index }}" 
                                                 alt="{{ $image->image_type == 'main' ? 'Main Thumbnail' : 'Secondary Thumbnail' }}">
                                        </div>
                                    @endforeach
                                </div>
                            </main>
                        </div>
                        
                        
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-info">
                            <h2 class="title">{{$product->name}}</h2>
                            <p class="category"><i class="lni lni-tag"></i> Category:<a href="javascript:void(0)">{{$product->category->name}}</a></p>
                           
                            
                            <h3 class="price">{{number_format($product->price)}}đ </h3>
                           
                           
                            <div class="row align-items-end">
                               
                                <form action="{{ route('users.addToCart')}}" method="POST">
                                    @csrf
                              <input type="hidden" name="productId" value="{{$product->id}}">
                              <div class="col-lg-4 col-md-4 col-12" style="margin-bottom:5px;">
                                    <div class="form-group quantity">
                                        <label for="quantity">Quantity</label>
                                        <input type="number"name="quantity" class="form-control form-control-lg" min="1" value="1">
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-12">
                                    <div class="button cart-button">
                                        
                                        <button class="btn" style="width: 100%;">Add to Cart</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-details-info">
                <div class="single-block">
                    <h4>Details</h4>
                    <p class="card-text ">{{ strip_tags($product->description) }}</p>
                    <div class="row">
                       
                    </div>
                   
                </div>
                <div class="col-12">
                    <!-- Bình luận -->
                    <div class="card mt-3 border-0">
                        <div class="card-body p-5">
                            <!-- Tiêu đề -->
                            <h4 class="mb-4 text-dark">Recent Comments</h4>
                            <p class="text-muted mb-5">Latest comments section by users</p>
    
                            <!-- Danh sách bình luận -->
                            @forelse($product->comments as $comment)
                                <div class="mb-4 p-3 rounded bg-white shadow-sm">
                                    <div class="d-flex align-items-start mb-3">
                                        <img class="rounded-circle shadow-1-strong me-3"
                                        src="{{ asset($comment->user->image) }}" alt="avatar"
                                            style="width: 80px; height: 80px; object-fit: cover; cursor: pointer;" >
                                        <div>
                                            <h6 class="fw-bold mb-1 text-dark">{{ $comment->user->name ?? 'Anonymous' }}</h6>
                                            <small class="text-muted d-block mb-2">{{ $comment->created_at->format('F d, Y') }}</small>
                                        </div>
                                    </div>
                                    <p class="text-muted">{{ $comment->comment }}</p>
                                    <div class="d-flex justify-content-end">
                                        @if(auth()->id() === $comment->user_id)
                                            {{-- <a href="{{ route('users.updateComment', $comment->id) }}" class="btn btn-outline-secondary btn-sm me-2">
                                                <i class="fas fa-pencil-alt"></i> Edit
                                            </a> --}}
                                            <form action="{{ route('users.deleteComment', $comment->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </button>
                                            </form>
                                        @endif
                                       
                                    </div>
                                </div>
                            @empty
                                <p class="text-muted">No comments yet. Be the first to comment!</p>
                            @endforelse
    
                            <!-- Form thêm bình luận -->
                            <h5 class="mb-4">Add a Comment</h5>
                            <form action="{{ route('users.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" name="comment" placeholder="Leave a comment here" id="commentTextarea" style="height: 120px" required></textarea>
                                    <label for="commentTextarea">Your Comment</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <!-- End Item Details -->

    <!-- Review Modal -->
    <div class="modal fade review-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Leave a Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="review-name">Your Name</label>
                                <input class="form-control" type="text" id="review-name" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="review-email">Your Email</label>
                                <input class="form-control" type="email" id="review-email" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="review-subject">Subject</label>
                                <input class="form-control" type="text" id="review-subject" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="review-rating">Rating</label>
                                <select class="form-control" id="review-rating">
                                    <option>5 Stars</option>
                                    <option>4 Stars</option>
                                    <option>3 Stars</option>
                                    <option>2 Stars</option>
                                    <option>1 Star</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="review-message">Review</label>
                        <textarea class="form-control" id="review-message" rows="8" required></textarea>
                    </div>
                </div>
                <div class="modal-footer button">
                    <button type="button" class="btn">Submit Review</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Review Modal -->
@endsection  

