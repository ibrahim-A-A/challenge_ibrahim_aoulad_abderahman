<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible"content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Coding Challenge </title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <!-- Tag Header -->
          @include('layouts.tagheader')
          
         
        <!-- Scripts -->
        @routes
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        @inertia

        
        
<!-- jQuery -->
<script src="{{asset("assets/plugins/jquery/jquery.min.js")}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset("assets/plugins/jquery-ui/jquery-ui.min.js")}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- DataTables -->
<script src="{{asset("assets/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{asset("assets/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{asset("assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset("assets/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>

<!-- ChartJS -->
<script src="{{asset("assets/plugins/chart.js/Chart.min.js")}}"></script>
<!-- Sparkline -->
<script src="{{asset("assets/plugins/sparklines/sparkline.js")}}"></script>
<!-- JQVMap -->
{{--<script src="{{asset("assets/plugins/jqvmap/jquery.vmap.min.js")}}"></script>--}}
{{--<script src="{{asset("assets/plugins/jqvmap/maps/jquery.vmap.usa.js")}}"></script>--}}
<!-- jQuery Knob Chart -->
<script src="{{asset("assets/plugins/jquery-knob/jquery.knob.min.js")}}"></script>
<!-- daterangepicker -->
<script src="{{asset("assets/plugins/moment/moment.min.js")}}"></script>
<script src="{{asset("assets/plugins/daterangepicker/daterangepicker.js")}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset("assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js")}}"></script>
<!-- Summernote -->
<script src="{{asset("assets/plugins/summernote/summernote-bs4.min.js")}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset("assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}"></script>
<!-- AdminLTE App -->
<script src="{{asset("assets/dist/js/adminlte.js")}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset("assets/dist/js/pages/dashboard.js")}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset("assets/dist/js/demo.js")}}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
   


<!-- Select2 -->
<script src="{{asset("assets/plugins/select2/js/select2.full.min.js")}}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{asset("assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js")}}"></script>
<!-- InputMask -->
<script src="{{asset("assets/plugins/moment/moment.min.js")}}"></script>
<script src="{{asset("assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js")}}"></script>

<!-- bootstrap color picker -->
<script src="{{asset("assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js")}}"></script>

<!-- Bootstrap Switch -->
<script src="{{asset("assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js")}}"></script>
<!-- AdminLTE App -->
{{--<script src=".{{asset("assets/dist/js/adminlte.min.js")}}"></script> --}}

<!-- Page script -->


</body>
</html>
