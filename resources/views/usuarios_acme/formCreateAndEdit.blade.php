{{ csrf_field() }}
<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6">
		<div class="form-group">
			<label for="num_cedula">Numero de Cedula:</label>
			<input type="number" name="num_cedula" value="{{ !empty($usuarios_acme)?$usuarios_acme->num_cedula:'' }}" class="form-control input-sm" placeholder="">
		</div>
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6">
		<div class="form-group">
			<label for="primer_nombre">Primer Nombre:</label>
			<input type="text" name="primer_nombre" value="{{ $errors->has('primer_nombre')? old('primer_nombre'): !empty($usuarios_acme)?$usuarios_acme->primer_nombre:''}}" class="form-control input-sm" placeholder="">
		</div>
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6">
		<div class="form-group">
			<label for="segundo_nombre">Segundo Nombre:</label>
			<input type="text" name="segundo_nombre" value="{{ $errors->has('segundo_nombre')? old('segundo_nombre'): !empty($usuarios_acme)?$usuarios_acme->segundo_nombre:''}}" class="form-control input-sm" placeholder="">
		</div>
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6">
		<div class="form-group">
			<label for="apellidos">Apellidos:</label>
			<input type="text" name="apellidos" value="{{ $errors->has('apellidos')? old('apellidos'): !empty($usuarios_acme)?$usuarios_acme->apellidos:''}}" class="form-control input-sm" placeholder="">
		</div>
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6">
		<div class="form-group">
			<label for="direccion">Dirección:</label>
			<input type="text" name="direccion" value="{{ $errors->has('direccion')? old('direccion'): !empty($usuarios_acme)?$usuarios_acme->direccion:''}}" class="form-control input-sm" placeholder="">
		</div>
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6">
		<div class="form-group">
			<label for="telefono">Télefono:</label>
			<input type="tel" name="telefono" value="{{ $errors->has('telefono')? old('telefono'): !empty($usuarios_acme)?$usuarios_acme->telefono:''}}" class="form-control input-sm" placeholder="">
		</div>
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6">
		<div class="form-group">
			<label for="tipo_usu_acme">Tipo Usuario:</label>
			<select class="form-control" name="tipo_usu_acme">
				<option value="1" {{ !empty($usuarios_acme)?$usuarios_acme->tipo_usu_acme=='conductor' ?'selected': '':'' }}>Conductor</option>
				<option value="2" {{ !empty($usuarios_acme)?$usuarios_acme->tipo_usu_acme=='propietario'?'selected': '':''}}>Propietario</option>
			</select>
		</div>
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6">
		<div class="form-group">
			<label for="id_ciudad">Ciudad:</label>
			<select class="form-control" name="id_ciudad">
			@foreach($ciudades as $ciudad)
				<option value="{{$ciudad->id_ciudad }}" {{ !empty($usuarios_acme)?$usuarios_acme->id_ciudad==$ciudad->id_ciudad ?'selected': '':'' }}>{{ $ciudad->nom_ciudad }}</option>
			@endforeach 
			</select>
		</div>
	</div>
</div>