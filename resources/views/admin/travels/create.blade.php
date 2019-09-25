@extends('adminlte::layouts.app')

@section('main-content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<strong>Agregar Programa</strong>
			</div>
			<div class="panel-body">
				{!! Form::open(['route' => 'viaje.store']) !!}
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							{{ Form::label('MT', 'MT') }}
							{{ Form::text('mt', null, ['minlength' => '5','maxlength' => '5', 'class' => 'form-control', 'id' => 'mt', 'onkeyup' => 'consultadepto();']) }}
						</div>
					</div>

					@section('deparcreate')
					<select class="form-control valor3" name="department" id="arrojarmt"></select>
					@endsection

					@section('bloqueselectcreate')
					<div class="col-md-12">
						<div class="form-group">
							<i class="fa fa-fw fa-plane"></i>
							{{ Form::label('Aerolineas')}}
							<br>
							<select class="js-example-basic-multiple form-control" name="airline[]" multiple="multiple">
								@foreach($airlines as $air)
								<option value="{{$air->code_iata}}">{{$air->airline}}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="col-md-12">
						<div class="col-md-6">
							<i class="fa fa-fw fa-map-o"></i>
							{{ Form::label('Paises')}}
							<br>

							<div class="form-group">
								<div class="input-group">
									<select class="form-control" id="listconutry">
										@foreach($countries as $con)
										<option value="{{$con->code_iata}}">
											{{$con->name_country}}
										</option>
										@endforeach
									</select>
									<div class="input-group-btn">
										<button type="button" id="btncountry" class="btn btn-info"><i class="fa fa-plus"></i></button>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<label class="control-label">Lista de Paises</label>

							<div class="selected-left">
								<select multiple="multiple" class="presenterlistcountry form-control" name="countri[]" id="countrymultiple">
								</select>
							</div>

							<div class="selected-right">
								<button type="button" class="btn btn-default btn-sm" id="btnupcountry">
									<span class="glyphicon glyphicon-chevron-up"></span>
								</button>
								<button type="button" class="btn btn-default btn-sm" id="btncountrydown">
									<span class="glyphicon glyphicon-chevron-down"></span>
								</button>
								<button type="button" class="btn btn-default btn-sm" id="btnremovecountry">
									<span class="glyphicon glyphicon-remove"></span>
								</button>
								<input type="button" value="seleccionar todo" onclick="selectcountry('countrymultiple')">
							</div>
						</div>

					</div>



					<div class="col-md-12">
						<div class="col-md-6">
							<div class="form-group">
								<i class="fa fa-fw fa-map-o"></i>
								{{ Form::label('Ciudades')}}
								<br>
								<div class="form-group">
									<div class="input-group">
										<select class="form-control" id="listcity">
											@foreach($cities as $city)
											<option value="{{$city->id}}">
												{{$city->name}}
											</option>
											@endforeach
										</select>
										<div class="input-group-btn">
											<button type="button" id="btncity" class="btn btn-info"><i class="fa fa-plus"></i></button>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<label class="control-label">Lista de Ciudades</label>

							<div class="selected-left">
								<select multiple="multiple" class="presenterlistcity form-control" name="cities[]" id="citiesmultiple">
								</select>
							</div>

							<div class="selected-right">
								<button type="button" class="btn btn-default btn-sm" id="btnupcity">
									<span class="glyphicon glyphicon-chevron-up"></span>
								</button>
								<button type="button" class="btn btn-default btn-sm" id="btncitydown">
									<span class="glyphicon glyphicon-chevron-down"></span>
								</button>
								<button type="button" class="btn btn-default btn-sm" id="btnremovecity">
									<span class="glyphicon glyphicon-remove"></span>
								</button>
								<input type="button" value="seleccionar todo" onclick="selectcity('citiesmultiple')">
							</div>
						</div>
					</div>
					@endsection

					@section('multicreate')
					@foreach($multimedia as $video)
					<option value="{{$video->id}}" data-image="{{asset('https://img2.mtmedia.com.mx/thumbnails/').'/'.$video->name}}">
						{{$video->name}}
					</option>
					@endforeach
					@endsection



					@section('eccreate')
					<div class="col-md-4">
						<div class="form-group">
							{{ Form::label('Operador', 'Operador') }}
							<select class="form-control" name="operator" id="mtec"></select>
						</div>
					</div>
					@endsection

					@section('sectioncreate')
					<select class="js-example-basic-multiple2 form-control" name="section[]" id="filters" multiple>
					</select>
					@endsection

					@section('seasoncreate')
					@foreach($season as $season)
					{{ Form::checkbox('season[]', $season->code_season,null) }}
					{{ $season->name}}
					<br>
					@endforeach
					@endsection

					@section('tourcreate')
					<select class="js-example-basic-multiple5 form-control" name="tours[]" id="toursmt" multiple>
					</select>
					@endsection

					@section('checkcreate')
					{{ Form::hidden('status', 0) }}
					{{ Form::checkbox('status', '1', 'true', ['class'=>'flat-red'] )}}
					@endsection

					@include('admin.travels.partials.form')

				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection