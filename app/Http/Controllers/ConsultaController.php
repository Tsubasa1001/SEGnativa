<?php

namespace App\Http\Controllers;

use App\Models\consulta;
use Illuminate\Http\Request;
use App\Models\reservaCita;
use App\Models\Servicio;
use Carbon\Carbon;
use Error;

class ConsultaController extends Controller
{
    public $table = 'Consulta';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = consulta::all()->sortBy('id');
        $reservaCitas = ReservaCita::all()->sortBy('id');
        $servicios = Servicio::all()->sortby('id');


        if ($collection->isEmpty()){
            $collection = 'No hay registros.';
        }

        return view('cu.consulta.index',compact('collection','reservaCitas','servicios'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gandalf = $request-> validate([
            'id' => 'required|numeric|unique:consultas',   
            'horaentrada' => 'required|string',
            'horasalida' => 'required|string',
            'precio' => 'required|string',
            
            ]
        );

        $consulta = new Consulta;
        $consulta->id = $request->get('id');
        $consulta->horaentrada = $request->get('horaentrada');
        $consulta->horasalida = $request->get('horasalida');
        $consulta->precio = $request->get('precio');
        $consulta->nota = $request->get('nota');
        $consulta->diagnosticofinal = $request->get('diagnosticofinal');
        $consulta->reservaCitas_id = $request->get('reservaCitas_id');
        $consulta->servicios_id = $request->get('servicios_id');
        $consulta->created_at = Carbon::parse(today())->format('Y-m-d');
        $consulta->updated_at = Carbon::parse(today())->format('Y-m-d');
        $consulta->save();

        return redirect(route('consulta_index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $collection = Consulta::find($id);
        $reservaCitas = ReservaCita::all()->sortBy('id');
        $servicios = Servicio::all()->sortBy('id');
        return view('cu.consulta.show',compact('collection','reservaCitas','servicios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function edit(consulta $consulta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Consulta::find($id);
        $request->validate([
            'horaentrada' => 'nullable|string',
            'horasalida' => 'nullable|string',
            'precio' => 'nullable|string',
            'nota' => 'nullable|string',
            'diagnosticofinal' => 'nullable|string',
        ]);

        $horaentrada = $request->get('horaentrada');
        $horasalida = $request->get('horasalida');
        $precio = $request->get('precio');
        $nota = $request->get('nota');
        $diagnosticofinal = $request->get('diagnosticofinal');
        $reservaCitas_id = $request->get('reservaCitas_id');
        $servicios_id = $request->get('servicios_id');
        
        if($horaentrada != null){
            $item->update(['horaentrada' => $horaentrada]);
        }
        
        if($horasalida != null){
            $item->update(['horasalida' => $horasalida]);
        }
        
        if($precio != null){
            $item->update(['precio' => $precio]);
        }

        if($nota != null){
            $item->update(['nota' => $nota]);
        }

        if($diagnosticofinal != null){
            $item->update(['diagnosticofinal' => $diagnosticofinal]);
        }
        
        if($reservaCitas_id != null){
            $item->update(['reservaCitas_id' => $reservaCitas_id]);
        }

        if($servicios_id != null){
            $item->update(['servicios_id' => $servicios_id]);
        }

        return redirect()->route('consulta_show',$id)
        ->with('success','Actualizado sin errores :D');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Consulta::find($id);
        $item->delete();
        return redirect(route('consulta_index'));
    }
}
