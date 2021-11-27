<?php

namespace App\Http\Controllers;

use App\Models\PersonalModel;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public $datosValidar=[
        'latitud'=>'required',
        'longitud'=>'required',
        'fecha'=>'required',
        'hora'=>'required',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $re)
    {
        if($re->buscar){
            $lista=PersonalModel::where('estado',1)
            ->where('personal','like','%'.$re->buscar.'%')->paginate(5);    
            //dd("sss");
            return view('personal.index',compact('lista'))
            ->with('buscar',$re->buscar);
        }else{
            $lista=PersonalModel::where('estado',1)->paginate(5);
            return view('personal.index',compact('lista'))
            ->with('buscar','');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cliente=PersonalModel::where('estado',1)->get();
        return  view('personal.create',compact('cliente'));
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
            $nuevo=new PersonalModel($request->input());
            $nuevo->save();
            return redirect()->route('personal.index')->with('msg','Dato guardado');
        }catch(exception $e){
            return redirect()->route('personal.index')->with('error','Fallo en el servidor!! OOps!!.');
        }
    }
    public function show($id)
    {
        $dato=PersonalModel::find($id);
        return  view('personal.show',compact('dato'));
    }
}
