@extends('admin.layouts.default')

@section('title')
@parent 
Danh Sách Product
@endsection

@push('style')

@endpush

@section('content')   
<div class="h1">

</div>
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
                               Danh Sách San Pham
                            </span>
                        </h3>
                        <a href="{{ route('admin.products.updatePatchProduct')}}" class="btn btn-sm fw-bold btn-primary" >Thêm mới </a>
                    </div>
                </div>

                <div class="card-body pt-2">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="kt_stats_widget_16_tab_1">
                            <div class="table-responsive">
                                <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                    <thead>
                                        <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                            <th class="p-0 pb-3 min-w-100px ">STT</th>
                                            <th class="p-0 pb-3 min-w-100px  pe-13">NAME</th>
                                            <th class="p-0 pb-3 min-w-100px  pe-13">PRICE</th>
                                            <th class="p-0 pb-3 min-w-100px  pe-13">CATEGOIES</th>
                                            <th class="p-0 pb-3 min-w-100px  pe-13">DESCRIPTION</th>
                                            <th class="p-0 pb-3 min-w-100px  pe-13">IMAGE</th>
                                            <th class="p-0 pb-3 w-100px ">ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach( $products as $key => $value)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->price }}</td>
                                                <td>{{ $value->category->name }}</td>
                                                <td>{{ $value->description }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        @foreach($value->images->take(3) as $image)
                                                            <img src="{{ asset($image->image_url) }}" alt="" class="img-thumbnail me-2" style="width: 50px; height: 50px; object-fit: cover;">
                                                        @endforeach
                                                    </div>
                                                </td>                                                                                             
                                                <td>
                                                    <a href="{{route('admin.products.updateProduct', $value->id)}}" >
                                                        <i class="fas fa-pencil-alt fs-4"></i>
                                                    </a>
                                                    <a href="#" data-id="{{ $value->id }},{{ $value->name }}" class="ms-3" data-bs-toggle="modal" data-bs-target="#modeDelete">
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
                <p id="confirmMessage">Bạn có chắc chắn muốn xóa người dùng này không?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <form id="deleteUserForm" method="POST">
                    @csrf
                    @method('DELETE')
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
        var button = event.relatedTarget;
        var dataIdProduct = button.getAttribute('data-id');

        var dataParts = dataIdProduct.split(',');
        var productId = dataParts[0];
        var productName = dataParts[1];

        var confirmMessage = document.getElementById('confirmMessage');
        confirmMessage.textContent = `Bạn có chắc chắn muốn xóa danh mục ${productName} không?`;

        var confirmDelete = document.querySelector('#deleteUserForm');
        confirmDelete.setAttribute('action', '{{ route("admin.products.deleteProduct", "") }}/' + productId);
    });
</script>
@endpush

