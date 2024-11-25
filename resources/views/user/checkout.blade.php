<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h2 class="text-center mb-4">Thông tin thanh toán</h2>
        <form action="{{ route('users.processCheckout')}}" method="POST" class="needs-validation" novalidate>
            @csrf
            <div class="row">
                <!-- Thông tin người nhận -->
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5>Thông tin người nhận</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="recipient_name" class="form-label">Họ và tên</label>
                                <input type="text" class="form-control" id="recipient_name" name="recipient_name" placeholder="Nhập họ và tên" required>
                                <div class="invalid-feedback">Vui lòng nhập họ và tên.</div>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại" required>
                                <div class="invalid-feedback">Vui lòng nhập số điện thoại hợp lệ.</div>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Địa chỉ</label>
                                <textarea class="form-control" id="address" name="address" rows="3" placeholder="Nhập địa chỉ" required></textarea>
                                <div class="invalid-feedback">Vui lòng nhập địa chỉ.</div>
                            </div>
                            <div class="mb-3">
                                <label for="note" class="form-label">Chú Thích</label>
                                <textarea class="form-control" id="note" name="note" rows="3" placeholder="Nhập chú thích" required></textarea>
                                <div class="invalid-feedback">Vui lòng nhập chú thích.</div>
                            </div>
                        </div>
                    </div>
                </div>

             <!-- Tổng tiền và xác nhận -->
<div class="col-md-4">
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-success text-white">
            <h5>Chi tiết đơn hàng</h5>
        </div>
        <div class="card-body">
            @foreach ($cart->cartDetails as $cartDetail)
                <div class="d-flex mb-3 align-items-center">
                    <!-- Hiển thị hình ảnh sản phẩm hoặc ảnh mặc định -->
                    <img src="{{ asset($cartDetail->product->images->first()->image_url ?? 'default-image.jpg') }}" 
                         class="rounded border me-3" 
                         style="width: 60px; height: 60px; object-fit: cover;">
                    <div>
                        <p class="mb-1"><strong>{{ $cartDetail->product->name }}</strong></p>
                        <p class="mb-0 text-muted">Số lượng: {{ $cartDetail->quantity }}</p>
                        <p class="mb-0 text-muted">Giá: {{ number_format($cartDetail->product->price, 0, ',', '.') }} VNĐ</p>
                    </div>
                </div>
            @endforeach

            <!-- Tổng tiền -->
            <p class="d-flex justify-content-between">
                <span>Tạm tính:</span>
                <strong>{{ number_format($subtotal, 0, ',', '.') }} VNĐ</strong>
            </p>
            <!-- Phí vận chuyển -->
            <p class="d-flex justify-content-between">
                <span>Phí vận chuyển:</span>
                <strong>{{ number_format($shippingFee, 0, ',', '.') }} VNĐ</strong>
            </p>
            <!-- Tổng cộng -->
            <hr>
            <p class="d-flex justify-content-between text-danger">
                <span>Tổng cộng:</span>
                <strong>{{ number_format($subtotal + $shippingFee, 0, ',', '.') }} VNĐ</strong>
            </p>
        </div>
        <button type="submit" class="btn btn-primary w-100 py-2">Đặt hàng</button>
    </div>
</div>

            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // JavaScript for Bootstrap validation
        (function () {
            'use strict'
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
</body>
</html>
