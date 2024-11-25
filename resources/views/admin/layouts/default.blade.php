<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        @section('title')
            Shoppe | 
        @endsection
    </title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}" />

    <!-- Global Stylesheets -->
    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">
    
    <!-- Bootstrap CSS (ensure using correct version) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" rel="stylesheet" />

    <meta name='csrf-token' content="{{ csrf_token() }}" />
    
    @stack('style')
</head>

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default dark-sidebar">

    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!-- Page -->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">

            <!-- Header -->
            @include('admin.layouts.header')
            <!-- End Header -->

            <!-- Wrapper -->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">

                <!-- Sidebar -->
                @include('admin.layouts.sidebar')
                <!-- End Sidebar -->

                <!-- Main Content -->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    @yield('content')

                    <!-- Footer -->
                    @include('admin.layouts.footer')
                    <!-- End Footer -->
                </div>
                <!-- End Main Content -->
            </div>
            <!-- End Wrapper -->

        </div>
        <!-- End Page -->
    </div>

    <!-- Chat Drawer -->
    @include('admin.layouts.chat')
    <!-- End Chat Drawer -->

    <!-- Global Javascript Bundle -->
    <script src="{{asset('assets/js/jquery-1.10.2.js')}}"></script>
    <script src="{{asset('assets/js/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset('assets/js/scripts.bundle.js')}}"></script>

    <!-- DataTables Scripts -->
    <script src="{{asset('assets/js/dataTables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/js/dataTables/dataTables.bootstrap.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').DataTable({
                responsive: true,
                paging: true,
                language: {
                    paginate: {
                        previous: "Trang trước",  // Thay đổi nút Previous
                        next: "Trang sau"        // Thay đổi nút Next
                    }
                }
            });
        });
    </script>

    <!-- Summernote Scripts -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Nhập mô tả sản phẩm...',
                tabsize: 2,
                height: 100
            });
        });
    </script>

    <!-- FontAwesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js" integrity="sha512-6sSYJqDreZRZGkJ3b+YfdhB3MzmuP9R7X1QZ6g5aIXhRvR1Y/N/P47jmnkENm7YL3oqsmI6AK+V6AD99uWDnIw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- End Global Javascript Bundle -->
    @stack('script')
</body>

</html>
