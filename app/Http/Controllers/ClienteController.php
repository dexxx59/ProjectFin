<?php

namespace App\Http\Controllers;

use App\Models\ClienteModel;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public $datosValidar=[
        'nombre'=>'required',
        'ci'=>'required',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista=ClienteModel::where('estado', 1)->paginate(5);
        return view('cliente.index',compact('lista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->datosValidar);
        try{
            $nuevo=new ClienteModel($request->input());
            $nuevo->save();
            return redirect()->route('cliente.index')->with('msg','Dato guardado');
        }catch(exception $e){
            return redirect()->route('cliente.index')->with('error','Fallo en el servidor!! OOps!!.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dato=ClienteModel::find($id);
        return view('cliente.show',compact('dato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dato=ClienteModel::find($id);
        return view('cliente.edit',compact('dato'));
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
        $request->validate($this->datosValidar);
        try{
            $nuevo=ClienteModel::find($id);
            $nuevo->update($request->input());
            return redirect()->route('cliente.index')->with('msg','Dato editado');
        }catch(exception $e){
            return redirect()->route('cliente.index')->with('error','Fallo en el servidor!! OOps!!.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $nuevo=ClienteModel::find($id);
            $nuevo->estado=0;
            $nuevo->update();
            return redirect()->route('cliente.index')->with('msg','Dato Eliminado');
        }catch(exception $e){
            return redirect()->route('cliente.index')->with('error','Fallo en el servidor!! OOps!!.');
        }
    }
}
