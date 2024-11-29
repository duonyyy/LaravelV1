@extends('user.layouts.default')
@section('title')
  CheckOut
@endsection

@section('content')

<!--====== Checkout Form Steps Part Start ======-->
<section class="checkout-wrapper py-5 bg-light">
    <div class="container">
        <form action="{{ route('users.processCheckout') }}" method="POST" class="needs-validation" novalidate>
            @csrf
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                    <div class="checkout-steps-form-style-1 bg-white p-4 rounded shadow-sm">
                        <ul id="accordionExample">
                            <li>
                                <h6 class="text-lg font-weight-bold" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                    Your Personal Details
                                </h6>
                                <section class="checkout-steps-form-content collapse show" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="row g-3 mt-4">
                                        <!-- Full Name -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="recipient_name" class="form-label">Họ và tên</label>
                                                <input type="text" id="recipient_name" class="form-control" name="recipient_name" placeholder="Nhập họ và tên" required>
                                            </div>
                                        </div>

                                        <!-- Phone Number -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone" class="form-label">Số điện thoại</label>
                                                <input type="text" id="phone" class="form-control" name="phone" placeholder="Nhập số điện thoại" required>
                                            </div>
                                        </div>

                                        <!-- Address -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="address" class="form-label">Địa chỉ</label>
                                                <textarea id="address" name="address" class="form-control" rows="3" placeholder="Nhập địa chỉ" required></textarea>
                                            </div>
                                        </div>

                                        <!-- Note -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="note" class="form-label">Note</label>
                                                <textarea id="note" name="note" class="form-control" rows="3" placeholder="Nhập ghi chú"></textarea>
                                            </div>
                                        </div>

                                        <!-- Next Step Button -->
                                        <div class="col-md-12">
                                            <div class="form-group text-end">
                                                <button class="btn btn-primary px-4 py-2" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                    Next Step
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </li>
                        </ul>
                    </div>
                
            </div>

            <!-- Checkout Sidebar -->
            <div class="col-lg-4">
                <div class="checkout-sidebar">
                    <!-- Pricing Table -->
                    <div class="checkout-sidebar-price-table p-3 bg-light rounded shadow-sm">
                        <h5 class="title font-weight-bold mb-3">Pricing Table</h5>
                        <div class="sub-total-price">
                            <div class="total-price d-flex justify-content-between">
                                <p class="value">Subtotal Price:</p>
                                <p class="price">{{ number_format($subtotal, 0, ',', '.') }} VNĐ</p>
                            </div>
                            <div class="total-price shipping d-flex justify-content-between">
                                <p class="value">Shipping:</p>
                                <p class="price">{{ number_format($shippingFee, 0, ',', '.') }} VNĐ</p>
                            </div>
                        </div>

                        <div class="total-payable">
                            <div class="payable-price d-flex justify-content-between">
                                <p class="value font-weight-bold">Total Price:</p>
                                <p class="price font-weight-bold">{{ number_format($subtotal + $shippingFee, 0, ',', '.') }} VNĐ</p>
                            </div>
                        </div>
                        <div class="price-table-btn mt-3">
                            <button type="submit" class="btn btn-primary w-100 py-2">Checkout</button>
                        </div>
                    </div>
                </div>
        
            </form>    </div>
        </div>
    </div>
</section>
@endsection
