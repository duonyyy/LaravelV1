@extends('user.layouts.default')

@section('title', 'Giỏ Hàng')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center">Giỏ Hàng</h2>
    @if ($cart->cartDetails->isEmpty())
        <div class="text-center text-muted my-5">
            <i class="fas fa-shopping-cart fa-3x mb-3"></i>
            <p>Giỏ hàng của bạn đang trống. Hãy thêm sản phẩm để tiếp tục mua sắm!</p>
        </div>
    @else
        <form action="{{ route('users.updateCart') }}" method="post">
            @csrf
            @method('patch')
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light text-center">
                        <tr>
                            <th>STT</th>
                            <th>Hình Ảnh</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Số Lượng</th>
                            <th>Thành Tiền</th>
                            <th>Tổng</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart->cartDetails as $key => $cartDetail)
                        <tr>
                            <td class="text-center">{{$key + 1}}</td>
                            <td class="text-center">
                                <img src="{{ asset($cartDetail->product->images->first()->image_url ?? 'default-image.jpg') }}" 
                                     alt="Product Image" class="img-thumbnail" style="max-width: 80px;">
                            </td>
                            <td>
                                <strong>{{ $cartDetail->product->name }}</strong>
                                <br>
                                <small class="text-muted">Danh Mục: {{ $cartDetail->product->category->name }}</small>
                            </td>
                            <td class="text-center">
                                <input type="number" name="quantity[]" value="{{ $cartDetail->quantity }}" 
                                       class="form-control form-control-sm text-center mx-auto" min="1" style="max-width: 80px;">
                                <input type="hidden" name="cartDetailId[]" value="{{ $cartDetail->id }}">
                            </td>
                            <td class="text-center">{{number_format($cartDetail->product->price, 0, ',', '.')}} VNĐ</td>
                            <td class="text-center">
                                {{ number_format($cartDetail->product->price * $cartDetail->quantity, 0, ',', '.') }} VNĐ
                            </td>
                            <td class="text-center">
                                <a class="remove-item" data-id="{{ $cartDetail->id }}" data-product-name="{{ $cartDetail->product->name }}" data-bs-toggle="modal" data-bs-target="#modeDelete" href="javascript:void(0)" title="Xóa sản phẩm">
                                    <i class="lni lni-close text-danger"></i>
                                </a>
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-4 p-4 border rounded shadow-sm bg-white">
                <!-- Tổng Cộng -->
                <div>
                    <ul class="list-unstyled mb-0">
                        <li class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-muted fs-5">Tổng Tiền:</span>
                            <span class="fw-bold fs-5">{{ number_format($cart->cartDetails->sum(fn($item) => $item->product->price * $item->quantity), 0, ',', '.') }} VNĐ</span>
                        </li>
                        <li class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-muted fs-5">Shipping:</span>
                            <span class="text-success fs-5">Miễn phí</span>
                        </li>
                        <li class="d-flex justify-content-between align-items-center border-top pt-3">
                            <span class="fs-4 fw-bold">Tổng Cộng:</span>
                            <span class="fs-4 fw-bold text-primary">{{ number_format($cart->cartDetails->sum(fn($item) => $item->product->price * $item->quantity), 0, ',', '.') }} VNĐ</span>
                        </li>
                    </ul>
                </div>
            
                <!-- Hành Động -->
                <div class="d-flex gap-3 mt-3 mt-md-0">
                    <button type="submit" class="btn btn-outline-primary btn-lg px-4 d-flex align-items-center">
                        <i class="lni lni-reload me-2"></i> Cập Nhật
                    </button>
                    <a href="{{ route('users.showCheckout') }}" class="btn btn-primary btn-lg px-4 d-flex align-items-center">
                        <i class="lni lni-credit-cards me-2"></i> Thanh Toán
                    </a>
                </div>
            </div>
        </form>
    @endif
</div>

 <!-- Delete Modal -->
 <div class="modal fade" id="modeDelete" tabindex="-1" aria-labelledby="modeDeleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modeDeleteLabel">Xác nhận xóa sản phẩm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p id="confirmMessage" class="mb-3">Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?</p>
                <p class="fw-bold text-danger" id="productName"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Hủy</button>
                <form id="deleteUserForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

<script>
    var modeDelete = document.getElementById('modeDelete');

modeDelete.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget; // lấy button vừa được click
    var dataIdCart = button.getAttribute('data-id'); // lấy ID sản phẩm từ data-id
    var productName = button.getAttribute('data-product-name'); // lấy tên sản phẩm từ data-product-name

    // Cập nhật tên sản phẩm trong modal
    document.getElementById('productName').textContent = productName;

    var confirmDelete = document.querySelector('#deleteUserForm');
    // Cập nhật action của form với đường dẫn xóa sản phẩm đúng
    confirmDelete.setAttribute('action', '{{ route("users.deleteCart", "") }}/' + dataIdCart);
});

// $('.remove-item').on('click', function (e) {
//     e.preventDefault();

//     var cartDetailId = $(this).data('id'); // Get the cart item ID
//     var productName = $(this).data('product-name'); // Get the product name for confirmation

//     // Display the confirmation modal (this part remains the same)
//     $('#productName').text(productName);
//     $('#deleteUserForm').data('id', cartDetailId); // Store ID in the form's data attribute

//     // Handle the actual delete operation when the form is submitted
//     $('#deleteUserForm').on('submit', function (event) {
//         event.preventDefault();

//         var id = $(this).data('id'); // Get the ID to delete

//         $.ajax({
//             url: '/delete-cart/' + id,  // The route for deleting cart item
//             type: 'DELETE',             // Using DELETE method
//             data: {
//                 '_token': '{{ csrf_token() }}', // CSRF token for security
//             },
//             success: function (response) {
//                 alert(response.message);  // Show success message
//                 location.reload(); // Reload the page to update the cart
//             },
//             error: function (response) {
//                 alert('Có lỗi xảy ra, vui lòng thử lại.');
//             }
//         });
//     });
// });

</script>
