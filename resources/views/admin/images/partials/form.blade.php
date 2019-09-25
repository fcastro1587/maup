<div class="col-md-6">
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

<div class="col-md-6">
    <div class="form-group">
        <div class="input-group">
            @yield('imgmosaico')
        </div>
    </div>
</div>

<div style="clear:both"></div>

<div class="col-md-4">
    <div class="form-group">
        <!-- {{ Form::select('title', [null => 'Seleccione'] +
                        [
                        'Principal'     => 'Slider Mega en Vivo',
                        ],
                        null, ['class' => 'form-control input']) }} -->

        @yield('detail')
        @yield('panoramic')
        @yield('featured')
        @yield('otonoinvierno')
        @yield('bloqueo')
        @yield('favoritos')
        @yield('bannerlist')
    </div>
</div>

<div class=" col-md-4">
    <div class="form-group">
        {{ Form::select('country', $countries, null, array('class'=>'form-control input', 'id' => 'pais', 'placeholder'=>'Seleccione un Pais')) }}
    </div>
</div>

<div class="col-md-4">
    <div class="form-group">
        {{ Form::select('city', $cities, null,  array('class' => 'form-control input', 'id' => 'ciudad', 'placeholder' => 'Seleccione una Ciudad')) }}
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        {{ Form::textarea('description', null, ['class' => 'form-control input', 'id' => 'Descripcion inputSuccess1', 'placeholder' => 'Descripcion']) }}
    </div>
</div>

<div class="col-md-4">
    <div class="form-group">
        <!--{!! Form::select('size', [null => 'Seleccione un tamaño de imagen'] +
        [
        'Principal' => 'Slider Mega en Vivo'
        ],
        null, ['class' => 'form-control input']) !!}-->

        @yield('sizedetail')
        @yield('sizepanoramic')
        @yield('sizefeatured')
        @yield('sizeotonoinvierno')
        @yield('sizebloqueo')
        @yield('sizefavoritos')
        @yield('sizebannerlist')
    </div>
</div>

<div class="col-md-4">
    <div class="form-group">
        <!--  {!! Form::select('type', [null => 'Seleccione un tipo de Imagen'] +
        [
        '8' => 'Home Slider Principa fondo (1700x566)',
        '9' => 'Home Letras Slider principal (1700x566)',
        '10' => 'Home responsive (320x400)',
        '11' => 'Recomendado (324x152)',
        '13' => 'Slider Principal Mega en vivo',
        ],
        null, ['class' => 'form-control input']) !!}-->
        @yield('typedetail')
        @yield('typepanoramic')
        @yield('typefeatured')
        @yield('typeotonoinvierno')
        @yield('typebloqueo')
        @yield('typefavoritos')
        @yield('typebannerlist')
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        {{ Form::submit('Upload', ['class' => 'btn btn-sm btn-success']) }}
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

        //select2
        $('#pais').select2();
        $('#ciudad').select2();
    });
</script>
@endsection