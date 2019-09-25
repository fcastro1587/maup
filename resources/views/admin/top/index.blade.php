
@extends('adminlte::layouts.app')

@section('main-content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

    <div class="container">
<div class="form-group">
    <div class="col-md-4 col-md-offset-4">
          <a onclick="addForm()" class="btn btn-primary btn-sm">crear</a>
    </div>
</div>

      <table id="top-table" class="table">
        <thead>
          <tr>
            <td>N°</td>
            <td>MT</td>
            <td>DEPTO</td>
            <td>ORDER</td>
            <td>&nbsp;</td>
          </tr>
        </thead>
        <tbody></tbody>
      </table>

      @include('admin.top.form')
    </div>


@section('script')
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

<script src="{{ asset('plugins/validator/validator.min.js') }}"></script>

    <script>
    var table = $('#top-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{ route('api.toptravels') }}",
      columns: [
        {data: 'id',              name: 'id'},
        {data: 'top_travel_mt',   name: 'top_travel_mt'},
        {data: 'top_travel_code', name: 'top_travel_code'},
        {data: 'order',           name: 'order'},
        {data: 'action',          name: 'action', orderable: false, searchable: false}
      ]
    });

    function addForm(){
       save_method= "add";
       $('input[name=_method]').val('POST');
       $('#modal-form').modal('show');
       $('#modal-form form')[0].reset();
       $('.modal-title').text('Agregar Nuevo MT');
 }


    $(function(){
    $('#modal-form form').validator().on('submit', function (e) {
    if(!e.isDefaultPrevented()){
      var id = $('#id').val();
      if (save_method == 'add') url = "{{ url('toptravels') }}";
      else url = "{{  url('toptravels') . '/' }}" + id;

      $.ajax({
        url: url,
        type: "POST",
        data: $('#modal-form form').serialize(),
        success: function($data){
          $('#modal-form').modal('hide');
          table.ajax.reload();
        },
        error: function(){
          alert('Upss! Ocurrio un Error');
        }
      });
      return false;
    }
  });
});
    </script>
@endsection
@endsection
