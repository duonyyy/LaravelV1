<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f5f5f5;
            font-family: 'Roboto', sans-serif;
            color: #333;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .quantity-input {
            width: 70px;
            text-align: center;
            border-radius: 5px;
        }
        .btn-custom {
            font-size: 0.9rem;
            border-radius: 5px;
        }
        .cart-item-card {
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }
        .cart-item-card:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }
        .cart-item-card img {
            border-radius: 8px;
            object-fit: cover;
            max-width: 100%;
            height: 80px;
        }
        .cart-item-card .card-body {
            padding: 15px;
        }
        .cart-item-card .card-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #555;
        }
        .btn-custom:hover {
            opacity: 0.85;
        }
        .modal-content {
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .modal-header {
            background-color: #007bff;
            color: white;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .modal-footer .btn {
            border-radius: 5px;
        }
        .alert {
            border-radius: 8px;
        }
        .text-primary {
            color: #007bff !important;
        }
        .fw-bold {
            font-weight: 600;
        }
        .btn-outline-secondary {
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <!-- Page Title -->
        <div class="text-center mb-4">
            <h3 class="text-primary fw-bold">Giỏ Hàng</h3>
        </div>

        <!-- Notification Messages -->
        @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- Cart Content -->
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
                <table class="table table-bordered text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Ảnh</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Danh Mục</th>
                            <th>Số Lượng</th>
                            <th>Giá</th>
                            <th>Thành Tiền</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $tongtien = 0; @endphp
                        @foreach ($cart->cartDetails as $key => $cartDetail)
                        <tr class="cart-item-card">
                            <td>{{ $key + 1 }}</td>
                            <td>
                                @if ($cartDetail->product->images->isNotEmpty())
                                <img src="{{ asset($cartDetail->product->images->first()->image_url) }}" 
                                     class="img-fluid" alt="Product Image">
                                @else
                                <span class="text-muted">Không có ảnh</span>
                                @endif
                            </td>
                            <td>{{ $cartDetail->product->name }}</td>
                            <td>{{ $cartDetail->product->category->name }}</td>
                            <td>
                                <input type="hidden" name="cartDetailId[]" value="{{ $cartDetail->id }}">
                                <div class="d-flex justify-content-center align-items-center">
                                    <button type="button" class="btn btn-outline-secondary btn-sm decrement-btn">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <input type="number" name="quantity[]" 
                                           value="{{ $cartDetail->quantity }}" 
                                           class="form-control form-control-sm mx-2 quantity-input" 
                                           min="1">
                                    <button type="button" class="btn btn-outline-secondary btn-sm increment-btn">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </td>
                            <td>{{ number_format($cartDetail->product->price, 0, ',', '.') }} VNĐ</td>
                            <td>
                                @php
                                    $thanhtien = $cartDetail->product->price * $cartDetail->quantity;
                                    $tongtien += $thanhtien;
                                @endphp
                                {{ number_format($thanhtien, 0, ',', '.') }} VNĐ
                            </td>
                            <td>
                                <a href="#" 
                                   data-id="{{ $cartDetail->id }}" 
                                   data-product-name="{{ $cartDetail->product->name }}" 
                                   class="text-danger fs-5" 
                                   data-bs-toggle="modal" 
                                   data-bs-target="#modeDelete">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="table-light">
                        <tr>
                            <td colspan="6" class="text-end fw-bold">Tổng Tiền:</td>
                            <td colspan="2" class="text-primary fw-bold">{{ number_format($tongtien, 0, ',', '.') }} VNĐ</td>
                        </tr>
                        <tr>
                            <td colspan="6" class="text-end">
                                <button type="submit" class="btn btn-primary btn-sm btn-custom">Cập Nhật</button>
                            </td>
                            <td colspan="2">
                                <a href="{{ route('users.showCheckout') }}" class="btn btn-success btn-sm btn-custom w-100">Thanh Toán</a>
                            </td>
                        </tr>
                    </tfoot>
                </table>
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

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('.increment-btn').forEach(btn => btn.addEventListener('click', () => {
            const input = btn.closest('.d-flex').querySelector('.quantity-input');
            input.value = parseInt(input.value || 1) + 1;
        }));

        document.querySelectorAll('.decrement-btn').forEach(btn => btn.addEventListener('click', () => {
            const input = btn.closest('.d-flex').querySelector('.quantity-input');
            if (parseInt(input.value) > 1) input.value = parseInt(input.value) - 1;
        }));
    </script>
</body>
</html>
