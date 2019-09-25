@extends('adminlte::layouts.app')

@section('main-content')
<link rel="stylesheet" href="{{asset('css/multiselect.css')}}">
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<i class="fa fa-fw fa-edit"></i>
				<strong>MODIFICAR PROGRAMA</strong>
			</div>
			<div class="panel-body">
				{!! Form::model($viaje, ['route' => ['viaje.update', $viaje->id], 'method' => 'PUT']) !!}

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<i class="fa fa-fw fa-key"></i>
							{{ Form::hidden('mt', null, ['class' => 'form-control', 'id' => 'mt']) }}
							{{ Form::label('MT', 'MT') }}
							<p>{{ $viaje->mt}}</p>
						</div>
					</div>

					@section('deparedit')
					<select class="form-control" name="department">
						@foreach ($deparment as $status)
						@if($viaje->mt >= $status->initial_range and $viaje->mt <= $status->final_range )
							<option value="{{ $status->code }}">{{ $status->name }}</option>
							@endif
							@endforeach
					</select>
					@endsection

					@section('bloqueselectedit')
					<div class="col-md-12">
						<div class="form-group">
							<i class="fa fa-fw fa-plane"></i>
							{{ Form::label('Aerolineas')}}
							<br>
							<select class="js-example-basic-multiple form-control" name="airline[]" multiple="multiple">
								@foreach($airlines as $air)
								@php
								$collection_air = [];
								foreach ($viaje->airlines as $viaje_air) {
								$collection_air[] = $viaje_air->code_iata;
								}
								@endphp
								<option value="{{$air->code_iata}}" {!! (in_array($air->code_iata, $collection_air)) ? ' selected' : '' !!}>
									{{$air->airline}}
								</option>
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
								<select multiple class="presenterlistcountry form-control" name="countri[]" id="countrymultiple">
									@foreach($viaje->countries as $viaje_country)
									<option style="margin-bottom: 4px;padding: 5px 15px;border-radius: 10px;" value="{{$viaje_country->code_iata}}" selected>
										{{$viaje_country->name_country}}
									</option>
									@endforeach
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
									@foreach($viaje->cities as $viaje_city)
									<option style="margin-bottom: 4px;padding: 5px 15px;border-radius: 10px;" value="{{$viaje_city->id}}" selected="selected">
										{{$viaje_city->name}}
									</option>
									@endforeach
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

					@section('multiedit')
					@foreach($multimedia as $video)
					@php
					$collection_video = [];
					foreach ($viaje->multimedia as $viaje_multi) {
					$collection_video[] = $viaje_multi->id;
					}
					@endphp
					<option value="{{$video->id}}" data-image="{{asset('https://img2.mtmedia.com.mx/thumbnails/').'/'.$video->name}}" {!! (in_array($video->id, $collection_video)) ? ' selected' : '' !!}>
						{{$video->name}}
					</option>
					@endforeach
					@endsection

					@section('ecedit')
					<div class="col-md-4">
						<div class="form-group">
							{{ Form::label('Europa y cruceros', 'Operadores de Europa y Cruceros') }}
							<select class="form-control" name="operator" id="mtec">
								@foreach($opera as $oper)
								@if($oper->code_department==$viaje->department)
								<option value="{{$oper->code}}" @if($oper->code == $viaje->operator) selected @endif>{{$oper->name}}</option>
								@elseif($oper->code==$viaje->operator)
								<option value="{{$oper->code}}" @if($oper->code == $viaje->operator) selected @endif>{{$oper->name}}</option>
								@endif

								@endforeach
							</select>
						</div>
					</div>
					@endsection

					@section('sectionedit')
					<select class="js-example-basic-multiple2 form-control" name="section[]" multiple>
						@foreach($section as $section)
						@php
						$collection_section = [];
						foreach ($viaje->sections as $viaje_secc) {
						$collection_section[] = $viaje_secc->id;
						}
						@endphp

						@if($viaje->department==$section->departament_code)
						<option value="{{ $section->id }}" {!! (in_array($section->id, $collection_section)) ? ' selected' : '' !!}>
							{{$section->name}}
						</option>
						<br>
						@endif


						@endforeach
					</select>
					@endsection

					@section('seasonsedit')
					@foreach($season as $season)
					@php
					$collection_season = [];
					foreach ($viaje->seasons as $viaje_sea) {
					$collection_season[] = $viaje_sea->code_season;
					}
					@endphp
					<input type="checkbox" name="season[]" value="{{ $season->code_season }}" {!! (in_array($season->code_season, $collection_season)) ? ' checked' : '' !!}>
					{{$season->name}}
					<br>
					@endforeach
					@endsection

					@section('touredit')
					<select class="js-example-basic-multiple5 form-control" name="tours[]" multiple>
						@foreach($tour as $to)
						@php
						$collection_to = [];
						foreach ($viaje->tours as $viaje_to) {
						$collection_to[] = $viaje_to->id;
						}
						@endphp

						@if($viaje->department==$to->department)
						<option value="{{ $to->id }}" {!! (in_array($to->id, $collection_to)) ? ' selected' : '' !!}>
							{{$to->title}}
						</option>
						<br>
						@endif


						@endforeach
					</select>
					@endsection

					@section('checkedit')
					@if($viaje->status==1)
					{{ Form::hidden('status', 0) }}
					{{ Form::checkbox('status', '1', 'true', ['class'=>'flat-red'] )}}
					@else
					{{ Form::hidden('status', 0) }}
					{{ Form::checkbox('status', '1', null, ['class'=>'flat-red'] )}}
					@endif
					@endsection

					@include('admin.travels.partials.form')
				</div>

				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection