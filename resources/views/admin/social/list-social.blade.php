    @extends('admin.layouts.default')

    @section('title')
        @parent 
        Danh Sách Social
    @endsection

    @push('style')
    {{-- Thêm style nếu cần --}}
    @endpush

    @section('content')
    <div class="d-flex">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="col-xl-12 mb-5 mb-xl-10">
                
                {{-- Toast thông báo --}}
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
                    {{-- Header --}}
                    <div class="card-header pt-5 w-100">
                        <div class="d-flex justify-content-between mb-10 w-100">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-800">Danh Sách Social</span>
                            </h3>
                            <a href="{{ route('admin.socials.addSocial') }}" class="btn btn-sm fw-bold btn-primary">Thêm mới</a>
                        </div>
                    </div>

                    {{-- Body --}}
                    <div class="card-body pt-2">
                        <div class="table-responsive">
                            <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                <thead>
                                    <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                        <th class="p-0 pb-3 min-w-100px">STT</th>
                                        <th class="p-0 pb-3 min-w-100px pe-13">Title</th>
                                        <th class="p-0 pb-3 min-w-100px pe-13">URL</th>
                                        <th class="p-0 pb-3 min-w-100px pe-13">Icon</th>
                                        <th class="p-0 pb-3 w-100px">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listSocial as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $value->title }}</td>
                                            <td><a href="{{ $value->url }}" target="_blank">{{ $value->url }}</a></td>
                                            <td>{!! $value->icon !!}</td>


                                            <td>
                                                <!-- Edit Link -->
                                                <a href="{{ route('admin.socials.updateSocial', $value->id) }}" title="Chỉnh sửa">
                                                    <i class="fas fa-pencil-alt fs-4"></i>
                                                </a>
                                                
                                                <!-- Delete Link -->
                                                <a href="#" 
                                                   data-id="{{ $value->id }}" 
                                                   class="ms-3 text-danger" 
                                                   data-bs-toggle="modal" 
                                                   data-bs-target="#modeDelete" 
                                                   title="Xóa">
                                                    <i class="fa-solid fa-trash fs-4"></i>
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

    {{-- Modal Xóa --}}
    <div class="modal fade" id="modeDelete" tabindex="-1" aria-labelledby="modeDeleteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modeDeleteLabel">Xác nhận xóa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="confirmMessage">Bạn có chắc chắn muốn xóa mục này không?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <form id="deleteSocialForm" method="POST">
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
        document.addEventListener('DOMContentLoaded', () => {
            const deleteModal = document.getElementById('modeDelete');
            deleteModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;  // Lấy button đã được click
                const socialId = button.getAttribute('data-id'); // Lấy id của social từ data-id

                const deleteForm = document.getElementById('deleteSocialForm');
                const actionUrl = '{{ route("admin.socials.deleteSocial", ":id") }}'.replace(':id', socialId);
                deleteForm.setAttribute('action', actionUrl);  // Cập nhật action của form
            });
        });
    </script>
    @endpush
