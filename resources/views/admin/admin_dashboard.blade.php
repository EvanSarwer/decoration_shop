<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  //Alpine JS CDN
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.3/dist/cdn.min.js"></script>


  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  
  <!-- Favicons -->
  <link href="{{ asset('admin_assets/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('admin_assets/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('admin_assets/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('admin_assets/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('admin_assets/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('admin_assets/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('admin_assets/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('admin_assets/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('admin_assets/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('admin_assets/assets/css/style.css') }}" rel="stylesheet">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  
  @include('admin.layout.header')

  <!-- End Header -->

  <!-- ======= Sidebar ======= -->

  @include('admin.layout.sidebar')
  
  <!-- End Sidebar-->

  <!-- ======= Main page ==== -->

  @yield('admin')

  <!-- End #main -->

  <!-- ======= Footer ======= -->
  
  @include('admin.layout.footer')

  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('admin_assets/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('admin_assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('admin_assets/assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('admin_assets/assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('admin_assets/assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('admin_assets/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('admin_assets/assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('admin_assets/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('admin_assets/assets/js/main.js') }}"></script>


  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


  
  @if(Session::has('message'))
  <script>
  var type = "{{ Session::get('alert-type','info') }}"
  switch(type){
      case 'info':
      toastr.info(" {{ Session::get('message') }} ");
      break;

      case 'success':
      toastr.success(" {{ Session::get('message') }} ");
      break;

      case 'warning':
      toastr.warning(" {{ Session::get('message') }} ");
      break;

      case 'error':
      toastr.error(" {{ Session::get('message') }} ");
      break; 
  }
  </script>
  @endif 



</body>

</html>