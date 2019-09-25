<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      {{ Form::label('name', 'Nombre') }}
      {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>
  </div>
  <div class="col-md-12">
    <div class="form-group">
      {{ Form::label('slug', 'URL Amigable') }}
      {{ Form::text('slug', null, ['class' => 'form-control']) }}
    </div>
  </div>
  <div class="col-md-12">
    <div class="form-group">
      {{ Form::label('description', 'Descripcion') }}
      {{ Form::textarea('description', null, ['class' => 'form-control']) }}
    </div>
  </div>

  <hr>
  <div class="col-md-12">
  <h3>Permiso especial</h3>
  <div class="form-group">
    <label>{{ Form::radio('special', 'all-access') }} Acceso Total</label>
    <label>{{ Form::radio('special', 'no-access') }} Ningún Acceso</label>
  </div>
  </div>

<div class="col-md-12">
    <h3>lista de permisos</h3>
  <div class="form-group">
    <ul class="list-unstyled">
      @foreach($permissions as $permission)
      <li>
        <label>
          {{ Form::checkbox('permissions[]', $permission->id, null) }}
          {{ $permission->name}}
          <em>({{$permission->description ?: 'Sin descripcion' }})</em>
        </label>
      </li>
      @endforeach
    </ul>
  </div>
</div>

  <div class="col-md-12">
    <div class="form-group">
      {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
    </div>
  </div>

</div>
