<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PacienteController extends Controller{
    public $tabla = 'Paciente';

    public function index(){
        $collection = Paciente::all()->sortBy('id');

        if ($collection->isEmpty()){
            $collection = 'No hay registros.';
        }

        return view('cu.paciente.index', compact('collection'));
    }

    public function create(){}

    public function store(Request $request){
        $gandalf = $request->validate([
            'id' => 'required|numeric|unique:pacientes',
            'codigo' => 'nullable|alpha_num',
            'ci' => 'nullable|alpha_num',
            'nombre' => 'required|string',
            'nacionalidad' => 'nullable|string',
            'especialidad' => 'nullable|string',
            'direccion' => 'nullable|string',
            'email' => 'required|email|unique:pacientes',
            'celular' => 'nullable|numeric|min:60000000|max:79999999',
            'edad' => 'nullable|min:1|max:150',
            'genero' => 'nullable|string',
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

        return redirect(route('paciente_index'))
            ->with('success', 'Creado sin errores :D');
    }

    public function show($paciente){
        $collection = Paciente::find($paciente);
        return view('cu.paciente.show', compact('collection'));
    }

    public function edit(Paciente $paciente){}

    public function update(Request $request, $id){
        $item = Paciente::find($id);

        if ($request->get('email') == $item['email']){
            $request->validate([
                'codigo' => 'nullable|alpha_num',
                'ci' => 'nullable|alpha_num',
                'nombre' => 'nullable|string',
                'nacionalidad' => 'nullable|string',
                'especialidad' => 'nullable|string',
                'direccion' => 'nullable|string',
                'celular' => 'nullable|numeric|min:6000000|max:7999999',
                'edad' => 'nullable|min:1|max:150',
                'genero' => 'nullable|string',
            ]);
        }else{
            $request->validate([
                'codigo' => 'nullable|alpha_num',
                'ci' => 'nullable|alpha_num',
                'nombre' => 'nullable|string',
                'nacionalidad' => 'nullable|string',
                'especialidad' => 'nullable|string',
                'direccion' => 'nullable|string',
                'email' => 'nullable|email|unique:trabajadors',
                'celular' => 'nullable|numeric|min:6000000|max:7999999',
                'edad' => 'nullable|min:1|max:150',
                'genero' => 'nullable|string',
            ]);
        }

        $codigo = $request->get('codigo');
        $ci = $request->get('ci');
        $nombre = $request->get('nombre');
        $nacionalidad = $request->get('nacionalidad');
        $especialidad = $request->get('especialidad');
        $direccion = $request->get('direccion');
        $email = $request->get('email');
        $celular = $request->get('celular');
        $edad = $request->get('edad');
        $genero = $request->get('genero');

        if ($codigo != null) {
            $item->update(['codigo' => $codigo]);
        }
        if ($ci != null) {
            $item->update(['ci' => $ci]);
        }
        if ($nombre != null) {
            $item->update(['nombre' => $nombre]);
        }
        if ($nacionalidad != null) {
            $item->update(['nacionalidad' => $nacionalidad]);
        }
        if ($especialidad != null) {
            $item->update(['especialidad' => $especialidad]);
        }
        if ($direccion != null) {
            $item->update(['direccion' => $direccion]);
        }
        if ($email != null) {
            $item->update(['email' => $email]);
        }
        if ($celular != null) {
            $item->update(['celular' => $celular]);
        }
        if ($edad != null) {
            $item->update(['edad' => $edad]);
        }
        if ($genero != null) {
            $item->update(['genero' => $genero]);
        }

        return redirect()->route('paciente_show', $id)
            ->with('success', 'Actualizado sin errores :D');
    }

    public function destroy($paciente){
        $item = Paciente::find($paciente);
        $item->delete();
        return redirect(route('paciente_index'))
            ->with('success', 'Eliminado sin errores :D');
    }
}
