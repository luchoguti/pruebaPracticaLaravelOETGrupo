@extends('layouts.app_pdfs')
@section('content')
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Placa</th>
                <th>Marca</th>
                <th>Nombre Conductor</th>
                <th>Nombre Propietario</th>
            </tr>                            
        </thead>
        <tbody>
            @foreach($listado_vehiculos as $vehiculos)
            <tr>
                <td>{{$vehiculos->placa }}</td>
                <td>{{$vehiculos->nom_marca }}</td>
				<td>{{$vehiculos->condunct_primer_nom}} {{ $vehiculos->condunct_segundo_nom }} {{ $vehiculos->condunct_apellido }}</td>
				<td>{{$vehiculos->propie_primer_nom}} {{$vehiculos->propie_segundo_nom}} {{$vehiculos->propie_apellido}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection