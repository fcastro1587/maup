<div class="row">
  <div class="col-md-12">
    <div class="col-md-6">
      <div class="form-group">
        {{ Form::label('Tipo de Revista', 'Tipo de Revista') }}
        {!! Form::select('tipo_revista', [null => 'Seleccione'] + ['mensual' => 'Mega Traveler',
        'magazine' => 'Mega Magazine',
        'otra' => 'Otra'],
        null, ['class' => 'form-control']) !!}
      </div>
    </div>


    <div class="col-md-3">
      <div class="form-group">
        {{ Form::label('mes', 'Mes') }}
        {!! Form::select('mes', [null => 'Seleccione Mes'] + ['Enero' => 'Enero',
        'febrero' => 'Febrero',
        'marzo' => 'Marzo',
        'abril' => 'Abril',
        'mayo' => 'Mayo',
        'junio' => 'Junio',
        'julio' => 'Julio',
        'agosto' => 'Agosto',
        'septiembre' => 'Septiembre',
        'octubre' => 'Octubre',
        'noviembre' => 'Noviembre',
        'diciembre' => 'Diciembre'],
        null, ['class' => 'form-control']) !!}
      </div>
    </div>

    <div class="col-md-3">
      <div class="form-group">
        {{ Form::label('año', 'Año') }}
        {!! Form::select('anio', ['2019' => '2019',
        '2020' => '2020',
        '2021' => '2021',
        '2022' => '2022',
        '2023' => '2023',
        '2024' => '2024',
        '2025' => '2025',
        '2026' => '2026',
        '2027' => '2027',
        '2028' => '2028',
        '2029' => '2029',
        '2030' => '2030'],
        null, ['class' => 'form-control']) !!}
      </div>
    </div>

    <div class="col-md-12">
      <div class="form-group">
        {{ Form::label('descripcion', 'Descripción') }}
        {{ Form::textarea('descripcion', null, ['class' => 'form-control tarea']) }}
      </div>
    </div>


    <div class="col-md-12">
      <div class="form-group">
        <br style="margin-top:10px;">
        http://issuu.com/mega_travel/docs/mt2019_sr?e=5196077/70102623
        {{ Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'url issu']) }}
      </div>
    </div>


    <div class="col-md-4">
      <div class="form-group">
        {{ Form::label('status', 'Status') }}
        {!! Form::select('activo', [null => 'Seleccione'] + ['1' => 'activo',
        '0' => 'inactivo'],
        null, ['class' => 'form-control']) !!}
      </div>
    </div>

    <div class="col-md-12">
      <div class="form-group">
        {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
      </div>
    </div>

  </div>