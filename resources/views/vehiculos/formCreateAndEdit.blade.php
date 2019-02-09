{{ csrf_field() }}
<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6">
		<div class="form-group">
			<label for="placa">Placa:</label>
			<input type="text" name="placa" value="{{ !empty($vehiculos)?$vehiculos->placa:'' }}" class="form-control input-sm" placeholder="">
		</div>
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6">
		<div class="form-group">
			<label for="color">Color:</label>
			<input type="text" name="color" value="{{ $errors->has('color')? old('color'): !empty($vehiculos)?$vehiculos->color:''}}" class="form-control input-sm" placeholder="">
		</div>
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6">
		<div class="form-group">
			<label for="id_marca">Marca:</label>
			<select class="form-control" name="id_marca">
			@foreach($marcas as $marca)
				<option value="{{$marca->id_marca }}" {{ !empty($vehiculos)?$vehiculos->id_marca==$marca->id_marca ?'selected': '':'' }}>{{ $marca->nom_marca }}</option>
			@endforeach 
			</select>
		</div>
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6">
		<div class="form-group">
			<label for="tipo_vehiculo">Tipo de Vehiculo:</label>
			<select class="form-control" name="tipo_vehiculo">
				<option value="1" {{ !empty($vehiculos)?$vehiculos->tipo_vehiculo=='particular' ?'selected': '':'' }}>Particular</option>
				<option value="2" {{ !empty($vehiculos)?$vehiculos->tipo_vehiculo=='publico'?'selected': '':''}}>Publico</option>
			</select>
		</div>
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6">
		<div class="form-group">
			<label for="id_conductor">Conductor:</label>
			<select class="form-control" name="id_conductor">
			@foreach($conductores as $conductor)
				<option value="{{$conductor->id_usu_acme }}" {{ !empty($vehiculos)?$vehiculos->id_conductor==$conductor->id_usu_acme ?'selected': '':'' }}>{{ $conductor->primer_nombre }} {{ $conductor->segundo_nombre }} {{ $conductor->apellidos }}</option>
			@endforeach 
			</select>
		</div>
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6">
		<div class="form-group">
			<label for="id_propietario">Propietario:</label>
			<select class="form-control" name="id_propietario">
			@foreach($propietarios as $propietario)
				<option value="{{$propietario->id_usu_acme }}" {{ !empty($vehiculos)?$vehiculos->id_propietario==$propietario->id_usu_acme ?'selected': '':'' }}>{{ $propietario->primer_nombre }} {{ $propietario->segundo_nombre }} {{ $propietario->apellidos }}</option>
			@endforeach 
			</select>
		</div>
	</div>
</div>