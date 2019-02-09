@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="float-left"><h3>Lista de Vehiculos </h3></div>
					<div class="float-right">
						<div class="btn-group">
							<a href="{{ route('vehiculos.create') }}" class="btn btn-info"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
						</div>
						<div class="btn-group">
							<a class="btn btn-success btn-xs" href="{{ route('informe_vehiculos.pdf') }}" ><span class="fa fa-file-pdf-o"></span></a>
						</div>
					</div>
					<div class="card-body">
						@include('modals.modalConfirm')
						<table id="mytable" class="table table-bordred table-striped" data-form="ListaForm">
							<thead>
								<th>Placa</th>
								<th>Color</th>
								<th>Marca</th>
								<th>Tipo de Vehiculo</th>
								<th>Conductor</th>
								<th>Propitario</th>
							</thead>
							<tbody>
								@if($lista_vehiculos->count())  
								@foreach($lista_vehiculos as $listadoVehiculos)  
								<tr>
									<td>{{$listadoVehiculos->placa}}</td>
									<td>{{$listadoVehiculos->color}}</td>
									<td>{{$listadoVehiculos->nom_marca}}</td>
									<td>{{$listadoVehiculos->tipo_vehiculo}}</td>
									<td>{{$listadoVehiculos->condunct_primer_nom}} {{ $listadoVehiculos->condunct_segundo_nom }} {{ $listadoVehiculos->condunct_apellido }}</td>
									<td>{{$listadoVehiculos->propie_primer_nom}} {{$listadoVehiculos->propie_segundo_nom}} {{$listadoVehiculos->propie_apellido}}</td>
									<td><a class="btn btn-primary btn-xs" href="{{action('VehiculosController@edit', $listadoVehiculos->id_vehiculo)}}" ><span class="fa fa-pencil"></span></a></td>
									<td>
										<form action="{{action('VehiculosController@destroy', $listadoVehiculos->id_vehiculo)}}" method="post" class="form-inline form-delete">
											{{csrf_field()}}
											<input name="_method" type="hidden" value="DELETE">
											<button class="btn btn-danger btn-xs" type="submit"><span class="fa fa-trash"></span></button>
										</form>
									</td>
									</tr>
									@endforeach 
									@else
									<tr>
										<td colspan="8">No hay registro de productos !!</td>
									</tr>
									@endif
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection
