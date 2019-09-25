<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://adminlte.io/themes/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<script src="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="https://adminlte.io/themes/AdminLTE/dist/js/adminlte.min.js"></script>
<script type="text/javascript" src='{{ asset('vendor/stringToSlug/jquery.stringToSlug.min.js') }}'></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
</script>
