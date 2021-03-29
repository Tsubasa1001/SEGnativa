<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use App\Models\Equipamiento;
use App\Models\Promocion;
use Carbon\Carbon;
use Error;

class ServicioController extends Controller
{
    public function index(){
        $collection = Servicio::all()->sortBy('id');
        $equipamientos = Equipamiento::all()->sortBy('id');
        $promociones = Promocion::all()->sortBy('id');

        if ($collection->isEmpty()){
            $collection = 'No hay registros.';
        }

        return view('cu.servicio.index', compact('collection', 'equipamientos', 'promociones'));
    }

    public function create(){}

    public function store(Request $request){
        $gandalf = $request->validate([
            'id' => 'required|numeric|unique:servicios',
            'nombre' => 'required|string',
            'precio' => 'required',
        ]);

        $servicio = new Servicio;
        $servicio->id = $request->get('id');
        $servicio->nombre = $request->get('nombre');
        $servicio->precio = $request->get('precio');
        $servicio->id_equipamiento = $request->get('id_equipamiento');
        $servicio->id_promocion = $request->get('id_promocion');
        $servicio->created_at = Carbon::parse(today())->format('Y-m-d');
        $servicio->updated_at = Carbon::parse(today())->format('Y-m-d');
        $servicio->save();

        return redirect(route('servicio_index'));
    }

    public function show($servicio){
        $collection = Servicio::find($servicio);
        $equipamientos = Equipamiento::all()->sortBy('id');
        $promociones = Promocion::all()->sortBy('id');
        return view('cu.servicio.show', compact('collection', 'equipamientos', 'promociones'));
    }

    public function edit(Promocion $promocion){}

    public function update(Request $request, $id){
        $item = Servicio::find($id);

        $request->validate([
            'nombre' => 'nullable|string',
            'precio' => 'nullable',
        ]);
        

        $nombre = $request->get('nombre');
        $precio = $request->get('precio');
        $id_equipamiento = $request->get('id_equipamiento');
        $id_promocion = $request->get('id_promocion');

        if ($nombre != null) {
            $item->update(['nombre' => $nombre]);
        }
        if ($precio != null) {
            $item->update(['precio' => $precio]);
        }
        if ($id_equipamiento != null) {
            $item->update(['id_equipamiento' => $id_equipamiento]);
        }
        if ($id_promocion != null) {
            $item->update(['id_promocion' => $id_promocion]);
        }

        return redirect()->route('servicio_show', $id)
            ->with('success', 'Actualizado sin errores :D');
    }

    public function destroy($servicio){
        $item = Servicio::find($servicio);
        $item->delete();
        return redirect(route('servicio_index'));
    }
}
