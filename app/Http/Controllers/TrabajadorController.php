<?php

namespace App\Http\Controllers;

use App\Models\Trabajador;
use Carbon\Carbon;
use Error;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class TrabajadorController extends Controller{
    public $tabla = 'Trabajador';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $collection = Trabajador::all();

        if ($collection->isEmpty()){
            $collection = 'No hay registros.';
        }

        return view('cu.trabajador.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request){
        $gandalf = $request->validate([
            'id' => 'required|numeric|unique:trabajadors',
            'codigo' => 'required|alpha_num',
            'ci' => 'required|alpha_num',
            'nombre' => 'required|string',
            'nacionalidad' => 'required|string',
            'especialidad' => 'required|string',
            'cargo' => 'required|string',
            'ocupacion' => 'required|string',
            'direccion' => 'required|string',
            'email' => 'required|email|unique:trabajadors',
            'celular' => 'required|numeric|min:60000000|max:79999999',
            'edad' => 'required|min:1|max:150',
            'genero' => 'required|string',
        ]);

        $trabajador = new Trabajador;
        $trabajador->id = $request->get('id');
        $trabajador->codigo = $request->get('codigo');
        $trabajador->ci = $request->get('ci');
        $trabajador->nombre = $request->get('nombre');
        $trabajador->nacionalidad = $request->get('nacionalidad');
        $trabajador->especialidad = $request->get('especialidad');
        $trabajador->cargo = $request->get('cargo');
        $trabajador->ocupacion = $request->get('ocupacion');
        $trabajador->direccion = $request->get('direccion');
        $trabajador->email = $request->get('email');
        $trabajador->celular = $request->get('celular');
        $trabajador->edad = $request->get('edad');
        $trabajador->genero = $request->get('genero');
        $trabajador->created_at = Carbon::parse(today())->format('Y-m-d');
        $trabajador->updated_at = Carbon::parse(today())->format('Y-m-d');
        $trabajador->save();

        return redirect(route('trabajador_index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trabajador  $trabajador
     * @return \Illuminate\Http\Response
     */
    public function show(Trabajador $trabajador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trabajador  $trabajador
     * @return \Illuminate\Http\Response
     */
    public function edit(Trabajador $trabajador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trabajador  $trabajador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trabajador $trabajador)
    {
        //
    }

    public function destroy($trabajador){
        $item = Trabajador::find($trabajador);
        $item->delete();
        return redirect(route('trabajador_index'));
    }
}
