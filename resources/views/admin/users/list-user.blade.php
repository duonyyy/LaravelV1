@extends('admin.layouts.default')

@section('title')
@parent 
Danh Sách User
@endsection

@push('style')
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
                               Danh Sách Người dùng 
                            </span>
                        </h3>
                        <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addUsers">Thêm mới </a>
                    </div>
                </div>

                <div class="card-body pt-2">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="kt_stats_widget_16_tab_1">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered align-middle table-bordered" id="dataTables-example">
                                    <thead>
                                        <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                            <th class="p-0 pb-3 min-w-100px ">STT</th>
                                            <th class="p-0 pb-3 min-w-100px ">AVT</th>
                                            <th class="p-0 pb-3 min-w-100px  pe-13">NAME</th>
                                            <th class="p-0 pb-3 w-150px  pe-7">EMAIL</th>
                                            <th class="p-0 pb-3 w-150px  pe-7">ROLE</th>
                                            <th class="p-0 pb-3 w-100px ">ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($listuser as $key => $value)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-start">
                                                        <!-- Ảnh nhỏ -->
                                                        <img 
                                                            src="{{ asset($value->image) }}" 
                                                            alt="product-image" 
                                                            class="rounded border me-2" 
                                                            style="width: 80px; height: 80px; object-fit: cover; cursor: pointer;" 
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#imageModal{{ $value->id }}">
                                                    </div>
                                                
                                                    <!-- Modal hiển thị ảnh lớn -->
                                                    <div class="modal fade" id="imageModal{{ $value->id }}" tabindex="-1" aria-labelledby="imageModalLabel{{ $value->id }}" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="imageModalLabel{{ $value->id }}">Hình ảnh sản phẩm</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body text-center">
                                                                    <!-- Ảnh lớn -->
                                                                    <img 
                                                                        src="{{ asset($value->image) }}" 
                                                                        alt="product-image" 
                                                                        class="img-fluid rounded border">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                               
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>
                                                    @if($value->role == '1')
                                                        Admin
                                                    @elseif($value->role == '2') 
                                                        User
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="#" data-id="{{ $value->id }}"   data-bs-toggle="modal" data-bs-target="#modelEdit">
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

<!-- Modal  ADD-->
<div class="modal fade" id="addUsers" tabindex="-1" aria-labelledby="addUsersLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addUsersLabel">Thêm người dùng</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.users.addUsers') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
              <div class="mt-3">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" >
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="image" class="form-label">Hình ảnh </label>
                <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" multiple required>
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
              <div class="mt-3">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" class="form-control" >
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="mt-3">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="mt-3">
                <label for="role">Role</label>
                <select class="form-control" name="role" id="role">
                    <option value="1" >Admin</option>
                    <option value="2" >User</option>
                </select>
                @error('role')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </div>
        </form>
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
<!-- Modal  Edit-->
<div class="modal fade" id="modelEdit" tabindex="-1" aria-labelledby="modelEditLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modelEditLabel">Chỉnh sửa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.users.updateUser') }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="modal-body">
                    <input type="hidden" value="" id="idUserUpdate" name="idUser">
                    <div class="mt-3">
                        <label for="nameUpdate">Name</label>
                        <input type="text" id="nameUpdate" name="name" class="form-control" >
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="emailUpdate">Email</label>
                        <input type="text" id="emailUpdate" name="email" class="form-control" >
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="roleUpdate">Role</label>
                        <select class="form-control" name="role" id="roleUpdate">
                            <option value="1" >Admin</option>
                            <option value="2" >User</option>
                        </select>
                        @error('role')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror   
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>





@endsection

@push('script')
<script>
    var modeDelete = document.getElementById('modeDelete'); 

    modeDelete.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget; 
        var dataIdUser = button.getAttribute('data-id'); 

        var dataParts = dataIdUser.split(',');
        var userId = dataParts[0];  
        var userName = dataParts[1]; 

        var confirmMessage = document.getElementById('confirmMessage');
        confirmMessage.textContent = `Bạn có chắc chắn muốn xóa người dùng ${userName} không?`;

        var confirmDelete = document.querySelector('#deleteUserForm');
        confirmDelete.setAttribute('action', '{{ route("admin.users.deleteUser", "") }}/' + dataIdUser);
    });
    

    var modelEdit = document.getElementById('modelEdit');

        modelEdit.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var idUser  = button.getAttribute('data-id');

            let url = "{{route('admin.users.detailUser') }}?id=" + idUser;

            fetch(url, {
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
             //cosole.log(data);
                document.querySelector('#idUserUpdate').value = data.id;
                document.querySelector('#nameUpdate').value = data.name;
                document.querySelector('#emailUpdate').value = data.email;
                document.querySelector('#roleUpdate').value = data.role;
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
        });



</script>
@endpush
