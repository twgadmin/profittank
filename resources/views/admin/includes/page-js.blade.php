<!-- ================== BEGIN BASE JS ================== -->
<script src="{!! asset('assets/js/app.min.js') !!}"></script>
<script src="{!! asset('assets/js/theme/default.min.js') !!}"></script>
<!-- ================== END BASE JS ================== -->


<!-- =================== DATA-TABLES =========================== -->
<script src="{!! asset('assets/plugins/datatables.net/js/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js') !!}"></script>
<script src="{!! asset('assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js') !!}"></script>
<script src="{!! asset('assets/plugins/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') !!}"></script>
<script src="{!! asset('assets/plugins/datatables.net-buttons/js/buttons.html5.min.js') !!}"></script>
<script src="{!! asset('assets/plugins/datatables.net-buttons/js/buttons.print.min.js') !!}"></script>
<script src="{!! asset('assets/plugins/pdfmake/build/pdfmake.min.js') !!}"></script>
<script src="{!! asset('assets/plugins/pdfmake/build/vfs_fonts.js') !!}"></script>
<script src="{!! asset('assets/plugins/jszip/dist/jszip.min.js') !!}"></script>
<script src="{!! asset('assets/js/demo/table-manage-combine.demo.js') !!}"></script>

<!-- ================== END DATA-TABLES JS ================== -->

<!-- =================== Sweat-Alert =========================== -->
<script src="{!! asset('assets/plugins/sweetalert/js/sweet-alert.min.js') !!}"></script>
<!-- ================== END Sweat-Alert JS ================== -->
@stack('scripts')