<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ URL::asset('vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('vendors/base/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{ URL::asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/Chart.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ URL::asset('images/logo/kreasi-kode-mini.png') }}" />
  {{-- <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/> --}}
 
</head>
<body class="sidebar-icon-only">    
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('inc.navbaradmin')
        <div class="container-fluid page-body-wrapper">
            @include('inc.sidebaradmin')
            <div class="main-panel">
                @yield('content')
                @include('inc.footeradmin')
            </div>
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    <!-- plugins:js -->
    <script src="{{ URL::asset('vendors/base/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    
    <script src="{{ URL::asset('vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ URL::asset('js/off-canvas.js') }}"></script>
    <script src="{{ URL::asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ URL::asset('js/template.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ URL::asset('js/dashboard.js') }}"></script>
    <script src="{{ URL::asset('js/data-table.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('js/dataTables.bootstrap4.js') }}"></script>
    <!-- End custom js for this page-->
    {{-- <script type="text/javascript" src="DataTables/datatables.min.js"></script> --}}
</body>

</html>