@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					<div class="float-left"><h3>Nuevo Propietarios / Conductores</h3></div>	
				</div>
				<div class="card-body">
					@if (count($errors) > 0)
					<div class="alert alert-danger">
						<strong>Error!</strong> Revise los campos obligatorios.<br><br>
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
					@if(Session::has('success'))
					<div class="alert alert-info">
						{{Session::get('success')}}
					</div>
					@endif
					<form method="POST" action="{{ route('usuarios_acme.store') }}"  role="form">
						@include('usuarios_acme.formCreateAndEdit')
						<div class="col-xs-12 col-sm-12 col-md-12">
							<input type="submit"  value="Guardar" class="btn btn-success btn-block">
							<a href="{{ route('usuarios_acme.index') }}" class="btn btn-info btn-block" >Atrás</a>
						</div>	
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
