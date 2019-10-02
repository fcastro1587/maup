@extends('adminlte::layouts.app')

@section('main-content')
<style>
    .btn-file {
        position: relative;
        overflow: hidden;
    }

    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }

    .input,
    .file {
        border: 1px solid rgba(0, 0, 0, .3);
        border-radius: 10px;
    }

    .input:focus {
        outline: none !important;
        border: 1px solid red;
    }

    #dropdown {
        height: 60px;
        border-radius: 10px;
        font-size: 20px;
    }

    .box {
        border: initial;
    }

    .file-preview {
        width: 95%;
    }

    #img-upload {
        border: 1px dashed #aaa;
        border-radius: 4px;
        text-align: center;
        vertical-align: middle;
        margin: 12px 15px 12px 12px;
        padding: 5px;
        width: 100%;
    }

    #img-upload:hover {
        border: 2px dashed #aaa;
    }

    .mt {
        border: solid 1px rgba(0, 0, 0, .4);
        border-radius: 10px;
    }
</style>

<div class="row">
    <div class="col-md-12">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4>Todos los campos son obligatorios</h4>
                </div>
            </div>
        </div>
        <form action="{{ route('files.store') }}" enctype="multipart/form-data" method="POST">
            @if($var == 2)

            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-success btn-file">
                                    Image… {!! Form::file('upload_image', ['id' => 'imgInp']) !!}
                                </span>
                            </span>
                            {{ Form::text('name', null, ['class' => 'form-control file', 'id' => 'urlname', 'readonly' => 'true']) }}
                            <span class="input-group-btn">
                                <span id="clear" class="btn btn-info">Limpiar</span>
                            </span>
                            </span>
                        </div>
                        <div class="file-preview">
                            <img id='img-upload' />
                        </div>
                    </div>
                </div>

                <div class=" col-md-6">
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
                        'lmiel' => 'Luna de Miel',
                        'quinceaneras' => 'Quinceañeras',
                        'desdecancun' => 'Desde Cancún',


                        'navidadyfinanio' => 'Navidad y Fin de Año',

                        ],null, ['class' => 'form-control input img2']) !!}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::select('type',['2' => 'Panoramica por destino (1918x300)',],null, ['class' => 'form-control input', 'readonly' => true]) !!}
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        {{ Form::text('mt', null, ['class' => 'form-control mt', 'placeholder' => 'MT']) }}
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-success btn-file">
                                    Img Mosaico…
                                    {!! Form::file('uploadsmall', ['id' => 'imgInp1']) !!}
                                </span>
                            </span>
                            {{ Form::text('small', null, ['class' => 'form-control file', 'id' => 'urlname1', 'readonly' => 'true']) }}
                        </div>
                    </div>
                </div>
            </div>
            @elseif($var == 7)
            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-success btn-file">
                                    Image…
                                    {!! Form::file('upload_image', ['id' => 'imgInp']) !!}
                                </span>
                            </span>
                            {{ Form::text('name', null, ['class' => 'form-control file', 'id' => 'urlname', 'readonly' => 'true']) }}
                            <span class="input-group-btn">
                                <span id="clear" class="btn btn-info">Limpiar</span>
                            </span>
                            </span>
                        </div>
                        <div class="file-preview">
                            <img id='img-upload' />
                        </div>
                    </div>
                </div>

                <div class=" col-md-12">
                    <div class="form-group">
                        {!! Form::select('title', [null => 'Seleccione un Destino'] +
                        [
                        'europa' => 'Europa',
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
                        ],null, ['class' => 'form-control input']) !!}
                    </div>
                </div>

                <div class=" col-md-12">
                    <div class="form-group">
                        {{ Form::select('country', $countries, null, array('class'=>'form-control input', 'id' => 'pais', 'placeholder'=>'Seleccione un Pais')) }}
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        {{ Form::select('city', $cities, null,  array('class' => 'form-control input', 'id' => 'ciudad', 'placeholder' => 'Seleccione una Ciudad')) }}
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        {{ Form::textarea('description', null, ['class' => 'form-control input', 'id' => 'Descripcion inputSuccess1', 'placeholder' => 'Descripcion']) }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::select('size',['665x330' => '665x330',],null, ['class' => 'form-control input', 'readonly' => true]) !!}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::select('type',['7' => 'Imagen Mosaico por destino (665x330)',],null, ['class' => 'form-control input', 'readonly' => true]) !!}
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-success btn-file">
                                    Img Mosaico…
                                    {!! Form::file('uploadsmall', ['id' => 'imgInp1']) !!}
                                </span>
                            </span>
                            {{ Form::text('small', null, ['class' => 'form-control file', 'id' => 'urlname1', 'readonly' => 'true']) }}
                        </div>
                    </div>
                </div>

                <div class=" col-md-12">
                    <div class="form-group">
                        {!! Form::select('titleother', [null => 'Seleccione un Destino'] +
                        [
                        'europa' => 'Europa',
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
                        ],null, ['class' => 'form-control input']) !!}
                    </div>
                </div>

                <div class=" col-md-12">
                    <div class="form-group">
                        {{ Form::select('countryother', $countries, null, array('class'=>'form-control input', 'id' => 'pais', 'placeholder'=>'Seleccione un Pais')) }}
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        {{ Form::select('cityother', $cities, null,  array('class' => 'form-control input', 'id' => 'ciudad', 'placeholder' => 'Seleccione una Ciudad')) }}
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        {{ Form::textarea('descriptionother', null, ['class' => 'form-control input', 'id' => 'Descripcion inputSuccess1', 'placeholder' => 'Descripcion']) }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::select('sizeother',['324x380' => '324x380',],null, ['class' => 'form-control input', 'readonly' => true]) !!}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::select('typeother',['7' => 'Imagen en listado (324x380)',],null, ['class' => 'form-control input', 'readonly' => true]) !!}
                    </div>
                </div>
            </div>
            @elseif($var==8)
            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-success btn-file">
                                    Image…
                                    {!! Form::file('upload_image', ['id' => 'imgInp']) !!}
                                </span>
                            </span>
                            {{ Form::text('name', null, ['class' => 'form-control file', 'id' => 'urlname', 'readonly' => 'true']) }}
                            <span class="input-group-btn">
                                <span id="clear" class="btn btn-info">Limpiar</span>
                            </span>
                            </span>
                        </div>
                        <div class="file-preview">
                            <img id='img-upload' />
                        </div>
                    </div>
                </div>

                <div class=" col-md-12">
                    <div class="form-group">
                        {!! Form::select('title',['main-slider' => 'Slider principal',],null, ['class' => 'form-control input', 'readonly' => true]) !!}
                    </div>
                </div>

                <div class=" col-md-12">
                    <div class="form-group">
                        {{ Form::select('country', $countries, null, array('class'=>'form-control input', 'id' => 'pais', 'placeholder'=>'Seleccione un Pais')) }}
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        {{ Form::select('city', $cities, null,  array('class' => 'form-control input', 'id' => 'ciudad', 'placeholder' => 'Seleccione una Ciudad')) }}
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        {{ Form::textarea('description', null, ['class' => 'form-control input', 'id' => 'Descripcion inputSuccess1', 'placeholder' => 'Descripcion']) }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::select('size',['1700x566' => '1700x566',],null, ['class' => 'form-control input', 'readonly' => true]) !!}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::select('type',['8' => 'Slider principal (1700x566)',],null, ['class' => 'form-control input', 'readonly' => true]) !!}
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-success btn-file">
                                    Img Mosaico…
                                    {!! Form::file('uploadsmall', ['id' => 'imgInp1']) !!}
                                </span>
                            </span>
                            {{ Form::text('small', null, ['class' => 'form-control file', 'id' => 'urlname1', 'readonly' => 'true']) }}
                        </div>
                    </div>
                </div>

                <div class=" col-md-12">
                    <div class="form-group">
                        {!! Form::select('titleother',['main-responsive' => 'Slider responsive',],null, ['class' => 'form-control input', 'readonly' => true]) !!}
                    </div>
                </div>

                <div class=" col-md-12">
                    <div class="form-group">
                        {{ Form::select('countryother', $countries, null, array('class'=>'form-control input', 'id' => 'pais', 'placeholder'=>'Seleccione un Pais')) }}
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        {{ Form::select('cityother', $cities, null,  array('class' => 'form-control input', 'id' => 'ciudad', 'placeholder' => 'Seleccione una Ciudad')) }}
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        {{ Form::textarea('descriptionother', null, ['class' => 'form-control input', 'id' => 'Descripcion inputSuccess1', 'placeholder' => 'Descripcion']) }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::select('sizeother',['320x400' => '320x400',],null, ['class' => 'form-control input', 'readonly' => true]) !!}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::select('typeother',['10' => 'Responsive (320x400)',],null, ['class' => 'form-control input', 'readonly' => true]) !!}
                    </div>
                </div>
            </div>
          <!--@else
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-success btn-file">
                                Image…
                                {!! Form::file('upload_image[]', ['id' => 'imgInp', 'multiple' => true]) !!}
                            </span>
                        </span>
                        {{ Form::text('name', null, ['class' => 'form-control file', 'id' => 'urlname', 'readonly' => 'true']) }}
                        <span class="input-group-btn">
                            <span id="clear" class="btn btn-info">Limpiar</span>
                        </span>
                        </span>
                    </div>
                    <div class="file-preview">
                        <img id='img-upload' />
                    </div>
                </div>
            </div>-->
            @endif


            @if($var == 4)

            <div class="col-md-12">
                <div class="form-group">
                    <div id="div_1">
                      cargar imagen  <input type="file" name="materiales[]" id="materiales1"/>
                   
                     <input type="text" name="cantidadmateriales[]"/>
                        <input class="bt_plus" id="1" type="button" value="+" />
                        <div class="error_form"></div>
                    </div>
                </div>
            </div>


            @elseif($var == 11)
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::select('type',['11' => 'Recomendado (324x152)',],null, ['class' => 'form-control input', 'readonly' => true]) !!}
                </div>
            </div>
            @endif

            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::submit('Upload', ['class' => 'btn btn-sm btn-success']) }}
                </div>
            </div>
            {{ csrf_field() }}
        </form>
    </div>
</div>

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $(document).on('change', '.btn-file :file', function() {
            var input = $(this),
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [label]);
        });

        $('.btn-file :file').on('fileselect', function(event, label) {
            var input = $(this).parents('.input-group').find(':text'),
                log = label;
            if (input.length) {
                input.val(log);
            } else {
                if (log) alert(log);
            }
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#img-upload').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function() {
            readURL(this);
        });

        $("#clear").click(function() {
            $('#img-upload').attr('src', '');
            $('#urlname').val('');
        });

        $('#pais').select2();
        $('#ciudad').select2();
        $('.img2').select2();
    });

    $(document).ready(function() {
        //ACA le asigno el evento click a cada boton de la clase bt_plus y llamo a la funcion agregar
        $(".bt_plus").each(function(el) {
            $(this).bind("click", agregar);
        });
    });

    function agregar() {
        // ID del elemento div quitandole la palabra "div_" de delante. Pasi asi poder aumentar el número. Esta parte no es necesaria pero yo la utilizaba ya que cada campo de mi formulario tenia un autosuggest , así que dejo como seria por si a alguien le hace falta.

        var clickID = parseInt($(this).parent('div').attr('id').replace('div_', ''));

        // Genero el nuevo numero id
        var newID = (clickID + 1);

        // Creo un clon del elemento div que contiene los campos de texto
        $newClone = $('#div_' + clickID).clone(true);

        //Le asigno el nuevo numero id
        $newClone.attr("id", 'div_' + newID);

        //Asigno nuevo id al primer campo input dentro del div y le borro cualquier valor que tenga asi no copia lo ultimo que hayas escrito.(igual que antes no es necesario tener un id)
        $newClone.children("input").eq(0).attr("id", 'materiales' + newID).val('');

        //Borro el valor del segundo campo input(este caso es el campo de cantidad)
        $newClone.children("input").eq(1).val('');

        //Asigno nuevo id al boton
        $newClone.children("input").eq(2).attr("id", newID)

        //Inserto el div clonado y modificado despues del div original
        $newClone.insertAfter($('#div_' + clickID));

        //Cambio el signo "+" por el signo "-" y le quito el evento agregar
        $("#" + clickID).val('-').unbind("click", agregar);

        //Ahora le asigno el evento delRow para que borre la fial en caso de hacer click
        $("#" + clickID).bind("click", delRow);
    }

    function delRow() {
        // Funcion que destruye el elemento actual una vez echo el click
        $(this).parent('div').remove();

    }
</script>


@endsection
@endsection