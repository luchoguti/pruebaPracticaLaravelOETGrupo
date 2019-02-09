<?php

namespace ACME\Http\Controllers;

use Illuminate\Http\Request;

use ACME\Http\Controllers\Controller;
use ACME\UsuariosAcme;
use ACME\Ciudades;

class UsuariosAcmeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista_usuarios=UsuariosAcme::join('ciudades','ciudades.id_ciudad','=','usuarios_acme.id_ciudad')
        ->select('usuarios_acme.*', 'ciudades.nom_ciudad')
        ->orderBy('num_cedula','DESC')
        ->paginate(10);
        return view('usuarios_acme.index',compact('lista_usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $ciudades=Ciudades::all();
        $usuarios_acme=array();
        return view('usuarios_acme.create',compact('usuarios_acme','ciudades'));
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
            'num_cedula'=>'required|unique:usuarios_acme', 
            'primer_nombre'=>'required', 
            'segundo_nombre'=>'required', 
            'apellidos'=>'required', 
            'direccion'=>'required', 
            'telefono'=>'required', 
            'tipo_usu_acme'=>'required', 
            'id_ciudad'=>'required']);
        UsuariosAcme::create($request->all());
        return redirect()->route('usuarios_acme.index')->with('success','Registro creado satisfactoriamente')->withInput(request([$request]));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ciudades=Ciudades::all();
        $usuarios_acme=UsuariosAcme::where('id_usu_acme', $id)->select('usuarios_acme.*')->first();
        return view('usuarios_acme.edit ',compact('usuarios_acme','ciudades'));
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
            'num_cedula'=>'required', 
            'primer_nombre'=>'required', 
            'segundo_nombre'=>'required', 
            'apellidos'=>'required', 
            'direccion'=>'required', 
            'telefono'=>'required', 
            'tipo_usu_acme'=>'required', 
            'id_ciudad'=>'required']);
        UsuariosAcme::where('id_usu_acme', $id)->update($data);
        return redirect()->route('usuarios_acme.index')->with('success','Registro actualizado satisfactoriamente')->withInput(request([$request]));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UsuariosAcme::where('id_usu_acme', $id)->delete();
        return redirect()->route('usuarios_acme.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
