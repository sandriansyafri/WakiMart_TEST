 <!-- jQuery -->
 <script src="{{ asset('admin-lte') }}/plugins/jquery/jquery.min.js"></script>
 <!-- jQuery UI 1.11.4 -->
 <script src="{{ asset('admin-lte') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 <script>
     $.widget.bridge('uibutton', $.ui.button)
 </script>
 <!-- Bootstrap 4 -->
 <script src="{{ asset('admin-lte') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- ChartJS -->
 <script src="{{ asset('admin-lte') }}/plugins/chart.js/Chart.min.js"></script>
 <!-- Sparkline -->
 <script src="{{ asset('admin-lte') }}/plugins/sparklines/sparkline.js"></script>
 <!-- JQVMap -->
 <script src="{{ asset('admin-lte') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
 <script src="{{ asset('admin-lte') }}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
 <!-- jQuery Knob Chart -->
 <script src="{{ asset('admin-lte') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
 <!-- daterangepicker -->
 <script src="{{ asset('admin-lte') }}/plugins/moment/moment.min.js"></script>
 <script src="{{ asset('admin-lte') }}/plugins/daterangepicker/daterangepicker.js"></script>
 <!-- Tempusdominus Bootstrap 4 -->
 <script src="{{ asset('admin-lte') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
 <!-- Summernote -->
 <script src="{{ asset('admin-lte') }}/plugins/summernote/summernote-bs4.min.js"></script>
 <!-- overlayScrollbars -->
 <script src="{{ asset('admin-lte') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="{{ asset('admin-lte') }}/dist/js/demo.js"></script>
 <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
 <script src="{{ asset('admin-lte') }}/dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE App -->
  @stack('js-vendor')
  <script src="{{ asset('admin-lte') }}/dist/js/adminlte.js"></script>
  @stack('js')

