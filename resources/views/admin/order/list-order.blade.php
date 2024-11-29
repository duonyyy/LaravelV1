@extends('admin.layouts.default')

@section('title')
@parent 
Danh Sách Đơn Hàng
@endsection

@push('style')
<!-- Thêm CSS tùy chỉnh nếu cần -->
@endpush

@section('content')
<div class="d-flex">
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="col-xl-12 mb-5 mb-xl-10">
            @if (session('message'))
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                    <div class="toast align-items-center text-bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body">
                                {{ session('message') }}
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            @endif

            <div class="card card-flush h-xl-100">
                <div class="card-header pt-5 w-100">
                    <div class="d-flex justify-content-between mb-10 w-100">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-800">
                               Danh Sách Đơn Hàng
                            </span>
                        </h3>
                    </div>
                </div>

                <div class="card-body pt-2">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="kt_stats_widget_16_tab_1">
                            <div class="table-responsive">
                                <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                    <thead>
                                        <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                            <th class="p-0 pb-3 min-w-100px">STT</th>
                                            <th class="p-0 pb-3 min-w-100px pe-13">Người dùng</th>
                                            <th class="p-0 pb-3 min-w-100px pe-13">Dia chi</th>
                                            <th class="p-0 pb-3 min-w-200px">Chi tiết đơn hàng</th>
                                            <th class="p-0 pb-3 w-100px">Tổng tiền</th>
                                            <th class="p-0 pb-3 w-100px">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $key => $order)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $order->recipient_name ?? 'N/A' }}</td>
                                                <td>{{ $order->address }}</td>
                                                <td>
                                                    <ul>
                                                        @foreach($order->orderDetails as $detail)
                                                            <li>
                                                                {{ $detail->product->name ?? 'Sản phẩm không tồn tại' }} 
                                                                (x{{ $detail->quantity }}) - 
                                                                Giá: {{ number_format($detail->price) }} VND
                                                                Tổng: {{ number_format($detail->total) }} VND
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td>{{ number_format($order->orderDetails->sum('total')) }} VND</td>
                                                <td>
                                                    {{-- <a href="{{ route('admin.orders.show', $order->id) }}">
                                                        <i class="fas fa-eye fs-4"></i>
                                                    </a> --}}
                                                    <a href="#" data-id="{{ $order->id }}" class="ms-3" data-bs-toggle="modal" data-bs-target="#modeDelete">
                                                        <i class="fa-solid fa-trash text-danger fs-4"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  

<!-- Delete Modal -->
<div class="modal fade" id="modeDelete" tabindex="-1" aria-labelledby="modeDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modeDeleteLabel">Xác nhận xóa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="confirmMessage">Bạn có chắc chắn muốn xóa đơn hàng này không?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <form id="deleteOrderForm" method="POST">
                    @csrf
                    @method('DELETE') <!-- Sử dụng phương thức DELETE -->
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')
<script>
    var modeDelete = document.getElementById('modeDelete');

    modeDelete.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget; // Lấy button vừa được click
        var dataIdOrder = button.getAttribute('data-id'); // Lấy ID đơn hàng từ data-id

        var confirmDelete = document.querySelector('#deleteOrderForm');
        // Cập nhật action của form với đường dẫn xóa đơn hàng đúng
        confirmDelete.setAttribute('action', '{{ route("admin.orders.deleteOrder", "") }}/' + dataIdOrder);
    });
</script>
@endpush
