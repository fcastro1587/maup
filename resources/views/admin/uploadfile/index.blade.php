@extends('adminlte::layouts.app')
@section('main-content')

<div align="right">
    <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Create Record</button>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-striped" id="user_table">
        <thead>
            <tr>
                <th width="10%">Image</th>
                <th width="35%">Temporada</th>
                <th width="35%">orden</th>
                <th width="30%">Action</th>
            </tr>
        </thead>
    </table>
</div>

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
                        <label class="control-label col-md-4">MT </label>
                        <div class="col-md-8">
                            {{ Form::text('travel_mt', null, ['class' => 'form-control', 'id' => 'travel_mt']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">BLOQUEO: </label>
                        <div class="col-md-8">
                            {{ Form::text('bloqueo_mt', null, ['class' => 'form-control', 'id' => 'bloqueo_mt']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">ORDEN: </label>
                        <div class="col-md-8">
                            {{ Form::text('order_item', null, ['class' => 'form-control', 'id' => 'order_item']) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">TIPO DE IMAGEN: </label>
                        <div class="col-md-8">
                    {!! Form::select('multimedia_id_1', [null => 'Seleccione un Destino'] +
                    [
                    '2808' => '1.jpg',
                    'moriente' => 'Medio Oriente',
                    'canada' => 'Canadá',
                    'asia' => 'Asia',
                    'africa' => 'Africa',
                    'pacifico' => 'Pacifico',
                    'sudamerica' => 'Sudamérica',
                    'usa' => 'Estados Unidos',
                    'camerica' => 'Centroamerica',
                    'caribe' => 'Caribe',
                    'mexico' => 'México',
                    'edeportivo' => 'Eventos Deportivos',
                    'cruceros' => 'Cruceros',
                    'jviajera' => 'Juventud Viajera',
                    'exoticos' => 'Exoticos',
                    ],null, ['class' => 'form-control img6']) !!}
                    </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">Select Image : </label>
                        <div class="col-md-8">
                            <input type="file" name="image" id="image" />
                            <span id="store_image"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">tipo</label>
                        <div class="col-md-8">
                            {!! Form::select('type',['4' => 'Mega Ofertas (320x400)',],null, ['class' => 'form-control input', 'readonly' => true]) !!}
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
                <h2 class="modal-title">Confirmation</h2>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".img6").select2();

        function formatState(opt) {
            if (!opt.id) {
                return opt.text.toUpperCase();
            }

            var optimage = $(opt.element).attr('data-image');
            console.log(optimage)
            if (!optimage) {
                return opt.text.toLowerCase();
            } else {
                var $opt = $(
                    '<span><img src="' + optimage + '" width="120px" /> ' + opt.text.toLowerCase() + '</span>'
                );
                return $opt;
            }
        };
    });
</script>
<script>
    $(document).ready(function() {

        $('#user_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('upload-files.index') }}",
            },
            columns: [{
                    data: 'name',
                    name: 'multimedia.name',
                    render: function(data, type, row) {
                        return "<img src=https://img3.mtmedia.com.mx/home/megaofertas/" + data + " width='80' class='img-thumbnail'/>";
                    }
                },
                {
                    data: 'season_code_season',
                    name: 'season_travels.season_code_season'
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
                            $('#user_table').DataTable().ajax.reload();
                        }
                        $('#form_result').html(html);
                    }
                })
            }

        });

        var user_id;

        $(document).on('click', '.delete', function() {
            user_id = $(this).attr('id');
            $('#confirmModal').modal('show');
        });

        $('#ok_button').click(function() {
            $.ajax({
                url: "upload-files/destroy/" + user_id,
                beforeSend: function() {
                    $('#ok_button').text('Deleting...');
                    $(this).fadeOut();
                },
                success: function(data) {
                    setTimeout(function() {
                        $('#confirmModal').modal('hide');
                        $('#user_table').DataTable().ajax.reload();
                    }, 2000);
                }
            })
        });

        $('.uploadimg').select2();

    }); //FIN DOCUMENTO JQUERY
</script>

@endsection
@endsection