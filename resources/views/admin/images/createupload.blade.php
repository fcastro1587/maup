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
</style>

<div class="row">
    <div class="col-md-12">

        <form action="{{ route('files.store') }}" enctype="multipart/form-data" method="POST">
            @if($var == 2)
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
                        'gruposyfits' => 'Grupos y Fits',
                        'lmiel' => 'Luna de Miel',
                        'quinceaneras' => 'Quinceañeras',
                        'desdecancun' => 'Desde Cancún',


                        'navidadyfinanio' => 'Navidad y Fin de Año',

                        ],null, ['class' => 'form-control input']) !!}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::select('type',['2' => 'Panoramica por destino (1918x300)',],null, ['class' => 'form-control input', 'readonly' => true]) !!}
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

            <div class="col-md-6">
                <div class="form-group">
                {{ Form::text('mt', null, ['class' => 'form-control ']) }}                </div>
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
            @else
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
            </div>
            @endif


            @if($var == 4)
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::select('type',['4' => 'Mega Ofertas',],null, ['class' => 'form-control input', 'readonly' => true]) !!}
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
    });
</script>
@endsection
@endsection