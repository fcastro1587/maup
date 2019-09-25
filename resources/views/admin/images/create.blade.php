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

        <form action="{{ route('file.store') }}" enctype="multipart/form-data" method="POST">

            <!--tipo 1-->
            @if($var == 1)
            @section('imgmosaico')
            <span class="input-group-btn">
                <span class="btn btn-success btn-file">
                    Img Mosaico…
                    {!! Form::file('small', ['id' => 'imgInp1']) !!}
                </span>
            </span>
            {{ Form::text('small', null, ['class' => 'form-control file', 'id' => 'urlname1', 'readonly' => 'true']) }}
            @endsection
            <!--titulo-->
            @section('detail')
            {!! Form::select('title',['default-image' => 'Default Image',],null, ['class' => 'form-control input', 'readonly' => true]) !!}
            @endsection

            <!--tamaño de imagen-->
            @section('sizedetail')
            {!! Form::select('size',['844x474' => '844x474',],null, ['class' => 'form-control input', 'readonly' => true]) !!}
            @endsection

            <!--tipo de imagen-->
            @section('typedetail')
            {!! Form::select('type',['1' => 'Detalle (844x474)',],null, ['class' => 'form-control input', 'readonly' => true]) !!}
            @endsection

            <!--tipo 3-->
            @elseif($var == 3)
            <!--titulo-->
            @section('featured')
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
            @endsection

            <!--tamaño de imagen-->
            @section('sizefeatured')
            {!! Form::select('size',['230x300' => '230x300',],null, ['class' => 'form-control input', 'readonly' => true]) !!}
            @endsection

            <!--tipo de imagen-->
            @section('typefeatured')
            {!! Form::select('type',['3' => 'Destacados por depto (230x300)',],null, ['class' => 'form-control input', 'readonly' => true]) !!}
            @endsection

            <!--tipo 5-->
            @elseif($var == 5)
            <!--titulo-->
            @section('otonoinvierno')
            {!! Form::select('title', ['otono-invierno' => 'Otoño Invierno',],null, ['class' => 'form-control input', 'readonly' => 'true']) !!}
            @endsection

            <!--tamaño de imagen-->
            @section('sizeotonoinvierno')
            {!! Form::select('size',['267x160' => '267x160',],null, ['class' => 'form-control input', 'readonly' => true]) !!}
            @endsection

            <!--tipo de imagen-->
            @section('typeotonoinvierno')
            {!! Form::select('type',['5' => 'Otoño-Invierno (267x160)',],null, ['class' => 'form-control input', 'readonly' => true]) !!}
            @endsection

            <!--tipo 6-->
            @elseif($var == 6)
            <!--titulo-->
            @section('bloqueo')
            {!! Form::select('title', ['bloqueo' => 'Bloqueos',],null, ['class' => 'form-control input', 'readonly' => 'true']) !!}
            @endsection

            <!--tamaño de imagen-->
            @section('sizebloqueo')
            {!! Form::select('size',['291x384' => '291x384',],null, ['class' => 'form-control input', 'readonly' => true]) !!}
            @endsection

            <!--tipo de imagen-->
            @section('typebloqueo')
            {!! Form::select('type',['6' => 'Bloqueos (291x384)',],null, ['class' => 'form-control input', 'readonly' => true]) !!}
            @endsection

            <!--tipo 12-->
            @elseif($var == 12)
            <!--titulo-->
            @section('favoritos')
            {!! Form::select('title', ['favoritos' => 'Favoritos',],null, ['class' => 'form-control input', 'readonly' => 'true']) !!}
            @endsection

            <!--tamaño de imagen-->
            @section('sizefavoritos')
            {!! Form::select('size',['291x384' => '291x384',],null, ['class' => 'form-control input', 'readonly' => true]) !!}
            @endsection

            <!--tipo de imagen-->
            @section('typefavoritos')
            {!! Form::select('type',['12' => 'Favoritos (291x384)',],null, ['class' => 'form-control input', 'readonly' => true]) !!}
            @endsection

            <!--tipo 7 aun esta pendiente, no esta al 100-->
            @elseif($var == 7)
            @section('imgbannerlist')
            <span class="input-group-btn">
                <span class="btn btn-success btn-file">
                    Img Mosaico…
                    {!! Form::file('small', ['id' => 'imgInp1']) !!}
                </span>
            </span>
            {{ Form::text('small', null, ['class' => 'form-control file', 'id' => 'urlname1', 'readonly' => 'true']) }}
            @endsection
            <!--titulo-->
            @section('bannerlist')
            @section('featured')
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
            @endsection
            @endsection

            <!--tamaño de imagen-->
            @section('sizebannerlist')
            {!! Form::select('size',['291x384' => '291x384',],null, ['class' => 'form-control input', 'readonly' => true]) !!}
            @endsection

            <!--tipo de imagen-->
            @section('typebannerlist')
            {!! Form::select('type',['7' => 'banner en listado de cada destino',],null, ['class' => 'form-control input', 'readonly' => true]) !!}
            @endsection




            @endif

            @include('admin.images.partials.form')

            {{ csrf_field() }}
        </form>
    </div>
</div>


@endsection