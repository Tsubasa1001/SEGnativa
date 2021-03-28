<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PacienteController extends Controller{
    public $tabla = 'Paciente';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $collection = Paciente::all()->sortBy('id');

        if ($collection->isEmpty()){
            $collection = 'No hay registros.';
        }

        return view('cu.paciente.index', compact('collection'));
    }

    public function create(){
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
            'direccion' => 'required|string',
            'email' => 'required|email|unique:trabajadors',
            'celular' => 'required|numeric|min:60000000|max:79999999',
            'edad' => 'required|min:1|max:150',
            'genero' => 'required|string',
        ]);

        $paciente = new Paciente;

        $paciente->id = $request->get('id');
        $paciente->codigo = $request->get('codigo');
        $paciente->ci = $request->get('ci');
        $paciente->nombre = $request->get('nombre');
        $paciente->nacionalidad = $request->get('nacionalidad');
        $paciente->especialidad = $request->get('especialidad');
        $paciente->direccion = $request->get('direccion');
        $paciente->email = $request->get('email');
        $paciente->celular = $request->get('celular');
        $paciente->edad = $request->get('edad');
        $paciente->genero = $request->get('genero');
        $paciente->created_at = Carbon::parse(today())->format('Y-m-d');
        $paciente->updated_at = Carbon::parse(today())->format('Y-m-d');
        $paciente->save();

        return redirect(route('paciente_index'));
    }

    public function show($paciente){
        $collection = Paciente::find($paciente);
        return view('cu.paciente.show', compact('collection'));
    }

    public function edit(Paciente $paciente){}

    public function update(Request $request, Paciente $paciente){
        return redirect(route('paciente_index'));
    }

    public function destroy($paciente){
        $item = Paciente::find($paciente);
        $item->delete();
        return redirect(route('paciente_index'));
    }
}
