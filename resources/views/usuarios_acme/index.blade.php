@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="float-left"><h3>Lista de Propietarios / Conductores </h3></div>
					<div class="float-right">
						<div class="btn-group">
							<a href="{{ route('usuarios_acme.create') }}" class="btn btn-info"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
						</div>
					</div>
					<div class="card-body">
						@include('modals.modalConfirm')
						<table id="mytable" class="table table-bordred table-striped" data-form="ListaForm">
							<thead>
								<th>Numero de Cedula</th>
								<th>Primer Nombre</th>
								<th>Segundo Nombre</th>
								<th>Apellidos</th>
								<th>Dirección</th>
								<th>Teléfono</th>
								<th>Ciudad</th>
							</thead>
							<tbody>
								@if($lista_usuarios->count())  
								@foreach($lista_usuarios as $usuariosAcme)  
								<tr>
									<td>{{$usuariosAcme->num_cedula}}</td>
									<td>{{$usuariosAcme->primer_nombre}}</td>
									<td>{{$usuariosAcme->segundo_nombre}}</td>
									<td>{{$usuariosAcme->direccion}}</td>
									<td>{{$usuariosAcme->telefono}}</td>
									<td>{{$usuariosAcme->nom_ciudad}}</td>
									<td><a class="btn btn-primary btn-xs" href="{{action('UsuariosAcmeController@edit', $usuariosAcme->id_usu_acme)}}" ><span class="fa fa-pencil"></span></a></td>
									<td>
										<form action="{{action('UsuariosAcmeController@destroy', $usuariosAcme->id_usu_acme)}}" method="post" class="form-inline form-delete">
											{{csrf_field()}}
											<input name="_method" type="hidden" value="DELETE">
											<button class="btn btn-danger btn-xs" type="submit"><span class="fa fa-trash"></span></button></form>
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
