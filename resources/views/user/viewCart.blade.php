<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="mb-n10 mb-10 z-2">
    <div class="container mb-10">
        <div class="text-center mb-17">
            <h3 class="fs-2hx text-gray-900 mb-5" id="how-it-works" data-kt-scroll-offset="{default: 100, 1g: 150}">
                Giỏ Hàng
            </h3>
        </div>
        <div class="row w-100 gy-10 mb-md-20">
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Anh</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Danh Muc</th>
                        <th>Số Lượng</th>
                        <th>Giá Tiền </th>
                        <th>Thành Tiền</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart->cartDetails as $key => $cartDetail)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                               <img src="{{ asset($cartDetail->product->images->first()->image_url) }}" style="width: 100px; height: auto;" class="mb-9" />

                            </td>
                            <td>{{ $cartDetail->product->name }}</td>
                            <td>{{ $cartDetail->product->category->name }}</td>
                            <td>{{ $cartDetail->quantity }}</td>
                            <td>{{ $cartDetail->product->price }}</td>
                            <td>
                                {{-- Assuming the product price is available as $cartDetail->product->price --}}
                                {{ number_format($cartDetail->product->price * $cartDetail->quantity, 0, ',', '.') }} VNĐ
                            </td>
                            <td>
                                <button type="submit" class="btn btn-danger">Xóa</button>
                               
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>