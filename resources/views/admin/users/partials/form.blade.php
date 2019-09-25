<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      {{ Form::label('name', 'Nombre') }}
      {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>
  </div>



<div class="col-md-12">
    <h3>lista de roles</h3>
  <div class="form-group">
    <ul class="list-unstyled">
      @foreach($roles as $role)
      <li>
        <label for="">
          {{ Form::checkbox('roles[]', $role->id, null) }}
          {{ $role->name}}
          <em>({{$role->description ?: 'N/A' }})</em>
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
