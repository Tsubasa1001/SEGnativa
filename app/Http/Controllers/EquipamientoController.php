<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipamiento;
use Carbon\Carbon;
use Error;
class EquipamientoController extends Controller
{
    public function index(){
        $collection = Equipamiento::all()->sortBy('id');

        if ($collection->isEmpty()){
            $collection = 'No hay registros.';
        }

        return view('cu.equipamiento.index', compact('collection'));
    }

    public function create(){}

    public function store(Request $request){
        $gandalf = $request->validate([
            'id' => 'required|numeric|unique:equipamientos',
            'codigo' => 'nullable|alpha_num',
            'nombre' => 'required|string',
        ]);

        $equipamiento = new Equipamiento;
        $equipamiento->id = $request->get('id');
        $equipamiento->codigo = $request->get('codigo');
        $equipamiento->nombre = $request->get('nombre');
        $equipamiento->created_at = Carbon::parse(today())->format('Y-m-d');
        $equipamiento->updated_at = Carbon::parse(today())->format('Y-m-d');
        $equipamiento->save();

        return redirect(route('equipamiento_index'));
    }

    public function show($promocion){
        $collection = Equipamiento::find($promocion);
        return view('cu.equipamiento.show', compact('collection'));
    }

    public function edit(Equipamiento $equipamiento){}

    public function update(Request $request, $id){
        $item = Equipamiento::find($id);

        $request->validate([
            'codigo' => 'nullable|alpha_num',
            'nombre' => 'nullable|string',
        ]);
        

        $nombre = $request->get('nombre');
        $codigo = $request->get('codigo');

        if ($codigo != null) {
            $item->update(['codigo' => $codigo]);
        }
        if ($nombre != null) {
            $item->update(['nombre' => $nombre]);
        }

        return redirect()->route('equipamiento_show', $id)
            ->with('success', 'Actualizado sin errores :D');
    }

    public function destroy($equipamiento){
        $item = Equipamiento::find($equipamiento);
        $item->delete();
        return redirect(route('equipamiento_index'));
    }
}
