@extends('adminlte::layouts.app')
@section('main-content')
<div class="panel panel-default">
    <div class="panel-body">
        <div class="panel-heading">
            <h4><i class="fa fa-fw fa-image"></i>IMAGENES DESTACADOS POR DEPARTAMENTO</h4>
        </div>
    </div>

    <div class="panel-body">
        <div class="panel-heading">
            <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Nuevo registro</button>
        </div>
    </div>
</div>


<table class="table table-bordered table-striped" id="dept">
    <thead>
        <tr>
            <th>IMAGEN</th>
            <th>REGULAR</th>
            <th>BLOQUEO</th>
            <th>DESTINO</th>
            <th>ORDEN</th>
            <th>ACTIVO</th>
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
                            {{ Form::text('travel_mt', null, ['class' => 'form-control', 'id' => 'travel_mt', 'placeholder' => 'REGULAR']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            {{ Form::text('bloqueo_mt', null, ['class' => 'form-control', 'id' => 'travel_mt', 'placeholder' => 'BLOQUEO']) }}
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-4">SELECCIONAR IMAGEN</label>
                        <div class="col-md-8">
                            <input type="file" name="image" id="image" />
                            <span id="store_image"></span>
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

                    <div class=" col-md-12">
                        <div class="form-group">
                            {!! Form::select('title', [null => 'Seleccione un Destino'] +
                            [
                            'europa' => 'Europa',
                            'canada' => 'Canadá',
                            'usa' => 'Estados Unidos',
                            'mexico' => 'México',
                            'sudamerica' => 'Sudamérica',
                            'camerica' => 'Centroamerica',
                            'caribe' => 'Caribe',
                            'pacifico' => 'Pacifico',
                            'moriente' => 'Medio Oriente',
                            'asia' => 'Asia',
                            'africa' => 'Africa',
                            'edeportivo' => 'Eventos Especiales',
                            'cruceros' => 'Cruceros',
                            'exoticos' => 'Exoticos',
                            'jviajera' => 'Juventud Viajera',
                            ],null, ['class' => 'form-control input img2']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            {{ Form::text('order', null, ['class' => 'form-control', 'id' => 'travel_mt', 'placeholder' => 'ORDEN']) }}
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-12">
                            {!! Form::select('type',['3' => 'Destacado por depto (230x300)',],null, ['class' => 'tipo form-control input', 'readonly' => true]) !!}
                        </div>
                    </div>

                    <br /><br />
                    <div class="form-group" align="center">
                        <input type="hidden" name="action" id="action" />
                        <input type="hidden" name="hidden_id" id="hidden_id" />
                        <input type="submit" name="action_button" id="action_button" class="btn btn-primary" value="Add" />
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
        $('#dept').DataTable({
            processing: true,
            serverSide: true,
            info: false,
            ajax: {
                url: "{{ route('uploadfiles.indexdeptos') }}",
            },
            columns: [{
                    render: function(data, type, row) {
                        return "<img src=https://img3.mtmedia.com.mx/promos/" + row.carousel_travel_code + '/' + row.name + " width='130' class='img-thumbnail'/>";
                    }
                },
                {
                    data: 'carousel_travel_mt',
                    name: 'carousel_travels.carousel_travel_mt',
                },
                {
                    data: 'bloqueo_mt',
                    name: 'carousel_travels.bloqueo_mt',
                },
                {
                    data: 'carousel_travel_code',
                    name: 'carousel_travels.carousel_travel_code',
                },
                {
                    data: 'order',
                    name: 'carousel_travels.order',
                },
                {
                    data: 'active',
                    name: 'carousel_travels.active',
                    render: function(data) {
                        if(data) {
                  return '<small class="label bg-green">Activo</small>'
                }
                else {
                  return '<small class="label bg-red">Inactivo</small>'
                }
                    }
                },
                {
                    data: 'btn',
                    name: 'btn',
                    orderable: false
                }
            ],
            "lengthMenu": [
                [30, 40, 50, -1],
                [30, 40, 50, "Todos"]
            ],
            "language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
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
                            $('#dept').DataTable().ajax.reload();
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
                url: "{{url('upload-files/destrodeptos')}}/" + user_id,
                beforeSend: function() {
                    $('#ok_button').text('Deleting...');
                    $(this).fadeOut();
                },
                success: function(data) {
                    setTimeout(function() {
                        $('#confirmModal').modal('hide');
                        $('#dept').DataTable().ajax.reload();
                    }, 2000);
                }
            })
        });

        $(".country").select2();
        $(".city").select2();
        $(".img2").select2();

    }); //FIN DOCUMENTO JQUERY
</script>

@endsection
@endsection