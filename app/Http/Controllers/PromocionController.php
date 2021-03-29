<?php

namespace App\Http\Controllers;

use App\Models\Promocion;
use Carbon\Carbon;
use Error;
use Illuminate\Http\Request;

class PromocionController extends Controller
{
    public function index(){
        $collection = Promocion::all()->sortBy('id');

        if ($collection->isEmpty()){
            $collection = 'No hay registros.';
        }

        return view('cu.promocion.index', compact('collection'));
    }

    public function create(){}

    public function store(Request $request){
        $gandalf = $request->validate([
            'id' => 'required|numeric|unique:promocions',
            'nombre' => 'required|string',
            'cantidad' => 'required|numeric|min:1',
            'precio' => 'required',
        ]);

        $promocion = new Promocion;
        $promocion->id = $request->get('id');
        $promocion->nombre = $request->get('nombre');
        $promocion->cantidad = $request->get('cantidad');
        $promocion->precio = $request->get('precio');
        $promocion->created_at = Carbon::parse(today())->format('Y-m-d');
        $promocion->updated_at = Carbon::parse(today())->format('Y-m-d');
        $promocion->save();

        return redirect(route('promocion_index'));
    }

    public function show($promocion){
        $collection = Promocion::find($promocion);
        return view('cu.promocion.show', compact('collection'));
    }

    public function edit(Promocion $promocion){}

    public function update(Request $request, $id){
        $item = Promocion::find($id);

        $request->validate([
            'nombre' => 'nullable|string',
            'cantidad' => 'nullable|numeric|min:1',
            'precio' => 'nullable',
        ]);
        

        $nombre = $request->get('nombre');
        $cantidad = $request->get('cantidad');
        $precio = $request->get('precio');

        if ($nombre != null) {
            $item->update(['nombre' => $nombre]);
        }
        if ($cantidad != null) {
            $item->update(['cantidad' => $cantidad]);
        }
        if ($precio != null) {
            $item->update(['precio' => $precio]);
        }

        return redirect()->route('promocion_show', $id)
            ->with('success', 'Actualizado sin errores :D');
    }

    public function destroy($promocion){
        $item = Promocion::find($promocion);
        $item->delete();
        return redirect(route('promocion_index'));
    }
}
