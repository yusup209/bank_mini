<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>bankMini</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/bootstrap4/css/bootstrap.min.css') }}" >
  <link rel="stylesheet" href="{{ asset('assets/datatable/css/datatable.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/select2/css/select2.min.css') }}" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" >

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/stisla/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/stisla/assets/css/components.css') }}">
  <script src="{{ asset('assets/jquery/jquery-3.3.1.min.js') }}"></script>

  <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <!-- topnav -->
      @include('layouts.topnav')
      <!-- end -->

      <!-- aside -->
      @include('layouts.aside')
      <!-- end -->

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>

      <!-- footer -->
      @include('layouts.footer')
      <!-- end -->
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('assets/bootstrap4/js/popper.min.js') }}"></script>
  <script src="{{ asset('assets/bootstrap4/js/bootstrap4.min.js') }}"></script>
  <script src="{{ asset('assets/nicescroll/js/nicescroll.min.js') }}"></script>
  <script src="{{ asset('assets/momentjs/js/moment.min.js') }}"></script>
  <script src="{{ asset('assets/stisla/assets/js/stisla.js') }}"></script>
  <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="{{ asset('assets/stisla/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('assets/stisla/assets/js/custom.js') }}"></script>
  <script src="{{ asset('assets/datatable/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/datatable/js/dataTables.bootstrap4.min.js') }}"></script>
  <script>
    $(document).ready(function(){
      $('.select2').select2();
      $('.table').DataTable();
    });
  </script>
  <!-- Page Specific JS File -->
</body>

</html>