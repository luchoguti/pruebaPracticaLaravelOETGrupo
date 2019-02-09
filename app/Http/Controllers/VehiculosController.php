<?php

namespace ACME\Http\Controllers;

use Illuminate\Http\Request;

use ACME\Http\Controllers\Controller;
use ACME\UsuariosAcme;
use ACME\Vehiculos;
use ACME\Marcas;

use Barryvdh\DomPDF\Facade as PDF;


class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista_vehiculos=Vehiculos::join('usuarios_acme as usu_condunct','usu_condunct.id_usu_acme','=','vehiculos.id_conductor')
        ->join('usuarios_acme as usu_propie','usu_propie.id_usu_acme','=','vehiculos.id_propietario')
        ->join('marcas','marcas.id_marca','=','vehiculos.id_marca')
        ->select(
            'vehiculos.*',
            'marcas.nom_marca',
            'usu_condunct.primer_nombre as condunct_primer_nom',
            'usu_condunct.segundo_nombre as condunct_segundo_nom',
            'usu_condunct.apellidos as condunct_apellido',
            'usu_propie.primer_nombre as propie_primer_nom',
            'usu_propie.segundo_nombre as propie_segundo_nom',
            'usu_propie.apellidos as propie_apellido')
        ->orderBy('id_vehiculo','DESC')
        ->paginate(10);
        return view('vehiculos.index',compact('lista_vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas=Marcas::get();
        $propietarios=UsuariosAcme::where('tipo_usu_acme','=','propietario')->get();
        $conductores=UsuariosAcme::where('tipo_usu_acme','=','conductor')->get();
        $vehiculos=array();
        return view('vehiculos.create',compact('vehiculos','marcas','propietarios','conductores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[ 
            'placa'=>'required', 
            'color'=>'required', 
            'id_marca'=>'required', 
            'tipo_vehiculo'=>'required', 
            'id_conductor'=>'required', 
            'id_propietario'=>'required']);
            
        Vehiculos::create($request->all());
        return redirect()->route('vehiculos.index')->with('success','Registro creado satisfactoriamente')->withInput(request([$request]));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marcas=Marcas::get();
        $propietarios=UsuariosAcme::where('tipo_usu_acme','=','propietario')->get();
        $conductores=UsuariosAcme::where('tipo_usu_acme','=','conductor')->get();
        $vehiculos=Vehiculos::where('id_vehiculo', $id)->select('vehiculos.*')->first();
        return view('vehiculos.edit',compact('vehiculos','marcas','propietarios','conductores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = request()->except(['_token','_method']);    

        $this->validate($request,[ 
            'placa'=>'required', 
            'color'=>'required', 
            'id_marca'=>'required', 
            'tipo_vehiculo'=>'required', 
            'id_conductor'=>'required', 
            'id_propietario'=>'required']);
        Vehiculos::where('id_vehiculo', $id)->update($data);
        return redirect()->route('vehiculos.index')->with('success','Registro actualizado satisfactoriamente')->withInput(request([$request]));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vehiculos::where('id_vehiculo', $id)->delete();
        return redirect()->route('vehiculos.index')->with('success','Registro eliminado satisfactoriamente');
    }

    /**
     * create pdf vehiculos
     *
     * @param  
     * @return \Illuminate\Http\Response
     */
    public function pdf(){
        
        $listado_vehiculos=Vehiculos::join('usuarios_acme as usu_condunct','usu_condunct.id_usu_acme','=','vehiculos.id_conductor')
        ->join('usuarios_acme as usu_propie','usu_propie.id_usu_acme','=','vehiculos.id_propietario')
        ->join('marcas','marcas.id_marca','=','vehiculos.id_marca')
        ->select(
            'vehiculos.placa',
            'marcas.nom_marca',
            'usu_condunct.primer_nombre as condunct_primer_nom',
            'usu_condunct.segundo_nombre as condunct_segundo_nom',
            'usu_condunct.apellidos as condunct_apellido',
            'usu_propie.primer_nombre as propie_primer_nom',
            'usu_propie.segundo_nombre as propie_segundo_nom',
            'usu_propie.apellidos as propie_apellido')
        ->orderBy('id_vehiculo','DESC')->get();

        $pdf = PDF::loadView('pdf.vehiculos', compact('listado_vehiculos'));

        return $pdf->download('listado_vehiculos.pdf');
    }
}
