@extends('admin.layouts.default')

@section('title')
@parent 
Danh Sách Sản Phẩm
@endsection

@push('style')
    
@endpush

@section('content')
<div class="d-flex">
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="col-xl-12 mb-5 mb-xl-10">
            <div class="card card-flush h-xl-100">
                <div class="card-header pt-5 w-100">
                    <div class="d-flex justify-content-between mb-10 w-100">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-800">
                                Quản lý tiêu chuẩn tiêu chí
                            </span>
                        </h3>
                        <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                            data-bs-target="#kt_modal_new_target">Add Target</a>
                    </div>
                </div>

                <div class="card-body pt-2">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="kt_stats_widget_16_tab_1">
                            <div class="table-responsive">
                                <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                    <thead>
                                        <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                            <th class="p-0 pb-3 min-w-100px text-center">
                                                AUTHOR
                                            </th>
                                            <th class="p-0 pb-3 min-w-100px text-center pe-13">
                                                CONV.
                                            </th>
                                            <th class="p-0 pb-3 w-150px text-center pe-7">
                                                CHART
                                            </th>
                                            <th class="p-0 pb-3 w-100px text-center">ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="symbol symbol-50px me-3">
                                                        <img src="assets/media/avatars/300-3.jpg"
                                                            class="" alt="" />
                                                    </div>
                                                    <div
                                                        class="d-flex justify-content-start flex-column">
                                                        <a href="pages/user-profile/overview.html"
                                                            class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Guy
                                                            Hawkins</a>
                                                        <span
                                                            class="text-gray-500 fw-semibold d-block fs-7">Haiti</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center pe-13">
                                                <span
                                                    class="text-gray-600 fw-bold fs-6">78.34%</span>
                                            </td>
                                            <td class="text-center pe-0">
                                                Content Chart
                                            </td>
                                            <td class="text-center d-flex justify-content-center">
                                                <a href="#"
                                                    class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                                    <i
                                                        class="fa-solid fa-arrow-right text-gray-500"></i>
                                                </a>
                                                <a href="#"
                                                    class="btn btn-sm btn-icon btn-bg-success btn-active-color-success w-30px h-30px">
                                                    <i class="fa-solid fa-pen text-light"></i>
                                                </a>
                                                <a href="#"
                                                    class="btn btn-sm btn-icon btn-bg-danger btn-active-color-danger w-30px h-30px">
                                                    <i class="fa-solid fa-trash text-light"></i>
                                                </a>
                                            </td>
                                        </tr>
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
@endsection


@push('script')
    
@endpush