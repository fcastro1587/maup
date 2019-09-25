@extends('adminlte::layouts.app')

@section('main-content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <i class="fa fa-fw fa-edit"></i>
            <strong>Modificar MT</strong>
          </div>
          <div class="panel-body">
            {!! Form::model($bloqueo, ['route' => ['bloqueos.update', $bloqueo->id], 'method' => 'PUT']) !!}

            <div class="row">

                  <div class="col-md-4">
                    <div class="form-group">
                    {{ Form::label('bloqueo', 'MT Bloqueo') }}
                    {{ form::text('bloqueo_mt', null, ['class' => 'form-control'])}}
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div>
                    <i class="fa fa-fw fa-plane"></i>
                    {{ Form::label('Imagen para bloqueos')}}
                    <br>
                    <select class="img3 form-control" name="multimedia_id" multiple required>
                      @foreach($multimedia as $multi)
                      @if($multi->type == 1)
                      <option value="{{$multi->id}}" data-image="{{asset('https://img1.mtmedia.com.mx/covers').'/'.$multi->name}}" @if($multi->id == $bloqueo->multimedia_id) selected @endif>{{$multi->name}}</option>
                      @endif
                      @endforeach
                    </select>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div>
                    <i class="fa fa-fw fa-plane"></i>
                    {{ Form::label('Campo opcional segunda imagen o video')}}
                    <br>
                    <select class="img3 form-control" name="multimedia_id_2" multiple>
                      @foreach($multimedia as $multi)
                      @if($multi->type == 1)
                      <option value="{{$multi->id}}" data-image="{{asset('https://img1.mtmedia.com.mx/covers').'/'.$multi->name}}" @if($multi->id == $bloqueo->multimedia_id_2) selected @endif>{{$multi->name}}</option>
                      @elseif($multi->video_type == 1)
                      <option value="{{$multi->id}}" data-image="{{asset('https://img1.mtmedia.com.mx/covers').'/'.$multi->name}}" @if($multi->id == $bloqueo->multimedia_id_2) selected @endif>{{$multi->name}}</option>
                      @endif
                      @endforeach
                    </select>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      {{ Form::submit('Guardar', ['class' => 'btn btn-primary'])}}
                    </div>
                  </div>
            </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $(".img3").select2({
        templateResult: formatState,
        templateSelection: formatState
    });

  function formatState(opt){
      if(!opt.id){
          return opt.text.toUpperCase();
         }

  var optimage = $(opt.element).attr('data-image');
  console.log(optimage)
  if(!optimage){
     return opt.text.toLowerCase();
     }else{
      var $opt = $(
         '<span><img src="' + optimage + '" width="120px" /> ' + opt.text.toLowerCase() + '</span>'
      );
      return $opt;
  }
};
});
</script>
@endsection
