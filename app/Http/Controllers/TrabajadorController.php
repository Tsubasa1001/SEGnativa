<?php

namespace App\Http\Controllers;

use App\Models\Trabajador;
use Carbon\Carbon;
use Error;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class TrabajadorController extends Controller{
    public $tabla = 'Trabajador';

    public function index(){
        $collection = Trabajador::all()->sortBy('id');

        if ($collection->isEmpty()){
            $collection = 'No hay registros.';
        }

        return view('cu.trabajador.index', compact('collection'));
    }

    public function create(){}

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

    public function show($trabajador){
        $collection = Trabajador::find($trabajador);
        return view('cu.trabajador.show', compact('collection'));
    }

    public function edit(Trabajador $trabajador){}

    public function update(Request $request, $id){
        $item = Trabajador::find($id);

        if ($request->get('email') == $item['email']){
            $request->validate([
                'codigo' => 'nullable|alpha_num',
                'ci' => 'nullable|alpha_num',
                'nombre' => 'nullable|string',
                'nacionalidad' => 'nullable|string',
                'especialidad' => 'nullable|string',
                'cargo' => 'nullable|string',
                'ocupacion' => 'nullable|string',
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
                'cargo' => 'nullable|string',
                'ocupacion' => 'nullable|string',
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
        $cargo = $request->get('cargo');
        $ocupacion = $request->get('ocupacion');
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
        if ($cargo != null) {
            $item->update(['cargo' => $cargo]);
        }
        if ($ocupacion != null) {
            $item->update(['ocupacion' => $ocupacion]);
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

        return redirect()->route('trabajador_show', $id)
            ->with('success', 'Actualizado sin errores :D');
    }

    public function destroy($trabajador){
        $item = Trabajador::find($trabajador);
        $item->delete();
        return redirect(route('trabajador_index'));
    }
}
