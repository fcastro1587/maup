@extends('adminlte::layouts.app')
@section('main-content')
<div class="panel panel-default">
    <div class="panel-body">
        <div class="panel-heading">
            <h4><i class="fa fa-fw fa-image"></i>FAVORITOS</h4>
        </div>
    </div>

    <div class="panel-body">
        <div class="panel-heading">
            <button type="button" name="create_record" id="create_record" class="btn-xs btn-primary">Nuevo registro</button>
        </div>
    </div>
</div>


<table class="table table-bordered table-striped" id="fav">
    <thead>
        <tr>
            <th>IMAGEN</th>
            <th>REGULAR</th>
            <th>BLOQUEO</th>
            <th>ORDEN</th>
            <th>ACTION</th>
        </tr>
    </thead>
</table>

<div id="formModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Record</h4>
            </div>
            <div class="modal-body">
                <span id="form_result"></span>
                <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="col-md-12">
                            {{ Form::text('travel_mt', null, ['class' => 'form-control', 'id' => 'travel_mt', 'placeholder' => 'MT REGULAR']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            {{ Form::text('bloqueo_mt', null, ['class' => 'form-control', 'id' => 'bloqueo_mt', 'placeholder' => 'MT BLOQUEO']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            {{ Form::text('order_item', null, ['class' => 'form-control', 'id' => 'order_item', 'placeholder' => 'ORDEN']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4">SELECCIONE UNA IMAGEN</label>
                        <div class="col-md-8">
                            <input type="file" name="image" id="image" />
                            <span id="store_image"></span>
                        </div>
                        <br><br>
                        <div class="col-md-12">
                            {!! Form::select('type',['8' => 'panoramica fondo (1700x566)',],null, ['class' => 'form-control tipo', 'readonly' => true]) !!}
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-12">
                            {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description', 'placeholder' => 'DESCRIPCIÓN DE LA IMAGEN']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            {{ Form::select('country', $countries, null,  array('class' => 'form-control country input', 'id' => 'pais', 'placeholder' => 'Seleccione un Pais')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            {{ Form::select('city', $cities, null,  array('class' => 'form-control city input', 'id' => 'ciudad', 'placeholder' => 'Seleccione una Ciudad')) }}
                        </div>
                    </div>
                    <br />
                    <div class="form-group" align="center">
                        <input type="hidden" name="action" id="action" />
                        <input type="hidden" name="hidden_id" id="hidden_id" />
                        <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 id="delete" class="modal-title">Confirmation</h2>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Deseas eliminar esta imagen?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" name="ok_button" id="ok_button" class="btn btn-success">OK</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#fav').DataTable({
            processing: true,
            serverSide: true,
            bFilter: false,
            paging: false,
            info: false,
            ajax: {
                url: "{{ route('uploadfiles.indexfav') }}",
            },
            columns: [{
                    data: 'name',
                    name: 'multimedia.name',
                    render: function(data, type, row) {
                        return "<img src=https://img3.mtmedia.com.mx/home/favoritos/" + data + " width='120' class='img-thumbnail'/>";
                    }
                },
                {
                    data: 'travel_mt',
                    name: 'season_travels.travel_mt'
                },
                {
                    data: 'bloqueo_mt',
                    name: 'season_travels.bloqueo_mt'
                },
                {
                    data: 'order_item',
                    name: 'season_travels.order_item'
                },
                {
                    data: 'btn',
                    name: 'btn',
                    orderable: false
                }
            ]
        });

        //modal crear
        $('#create_record').click(function() {
            $('.modal-title').text("Agregar Nueva Imagen");
            $('#action_button').val("Add");
            $('#action').val("Add");
            $('#formModal').modal('show');
        });

        $('#sample_form').on('submit', function(event) {
            event.preventDefault();
            if ($('#action').val() == 'Add') {
                $.ajax({
                    url: "{{ route('upload-files.store') }}",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function(data) {
                        var html = '';
                        if (data.errors) {
                            html = '<div class="alert alert-danger">';
                            for (var count = 0; count < data.errors.length; count++) {
                                html += '<p>' + data.errors[count] + '</p>';
                            }
                            html += '</div>';
                        }
                        if (data.success) {
                            html = '<div class="alert alert-success">' + data.success + '</div>';
                            $('#sample_form')[0].reset();
                            $('#fav').DataTable().ajax.reload();
                        }
                        $('#form_result').html(html);
                    }
                })
            }

        });

        var user_id;
        $(document).on('click', '.delete', function() {
            user_id = $(this).attr('id');
            $('#delete').text("Confirmar?");
            $('#confirmModal').modal('show');
        });

        $('#ok_button').click(function() {
            $.ajax({
                url: "{{url('upload-files/destro')}}/" + user_id,
                beforeSend: function() {
                    $('#ok_button').text('Deleting...');
                    $(this).fadeOut();
                },
                success: function(data) {
                    setTimeout(function() {
                        $('#confirmModal').modal('hide');
                        $('#fav').DataTable().ajax.reload();
                    }, 2000);
                }
            })
        });

        $(".img6").select2();

    }); //FIN DOCUMENTO JQUERY
</script>

@endsection
@endsection