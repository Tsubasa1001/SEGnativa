<?php

namespace App\Http\Controllers;

use App\Models\reservaCita;
use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Trabajador;
use Carbon\Carbon;
use Error;

class ReservaCitaController extends Controller
{
    public $table = 'ReservaCita';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = ReservaCita::all()->sortBy('id');
        $pacientes = Paciente::all()->sortBy('id');
        $trabajadors = Trabajador::all()->sortby('id');


        if ($collection->isEmpty()){
            $collection = 'No hay registros.';
        }

        return view('cu.reservaCita.index',compact('collection','pacientes','trabajadors'));
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
            'id' => 'required|numeric|unique:reservacitas',   
            'codigo' => 'required|string',
            'hora' => 'required|string',
            'fecha' => 'required|string',
            'motivoConsulta' => 'required|string',
            'estadoTratamiento' => 'required|string',
            
            ]
        );

        $reservaCita = new ReservaCita;
        $reservaCita->id = $request->get('id');
        $reservaCita->codigo = $request->get('codigo');
        $reservaCita->hora = $request->get('hora');
        $reservaCita->fecha = $request->get('fecha');
        $reservaCita->motivoConsulta = $request->get('motivoConsulta');
        $reservaCita->estadoTratamiento = $request->get('estadoTratamiento');
        $reservaCita->pacientes_id = $request->get('pacientes_id');
        $reservaCita->trabajadors_id = $request->get('trabajadors_id');
        $reservaCita->created_at = Carbon::parse(today())->format('Y-m-d');
        $reservaCita->updated_at = Carbon::parse(today())->format('Y-m-d');
        $reservaCita->save();

        return redirect(route('reservaCita_index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\reservaCita  $reservaCita
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $collection = ReservaCita::find($id);
        $pacientes = Paciente::all()->sortBy('id');
        $trabajadors = Trabajador::all()->sortBy('id');
        return view('cu.reservaCita.show',compact('collection','pacientes','trabajadors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\reservaCita  $reservaCita
     * @return \Illuminate\Http\Response
     */
    public function edit(ReservaCita $reservaCita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\reservaCita  $reservaCita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = ReservaCita::find($id);
        $request->validate([
            'codigo' => 'nullable|string',
            'hora' => 'nullable|string',
            'fecha' => 'nullable|string',
            'motivoConsulta' => 'nullable|string',
            'estadoTratamiento' => 'nullable|string',
        ]);

        $codigo = $request->get('codigo');
        $hora = $request->get('hora');
        $fecha = $request->get('fecha');
        $motivoConsulta = $request->get('motivoConsulta');
        $estadoTratamiento = $request->get('estadoTratamiento');
        $pacientes_id = $request->get('pacientes_id');
        $trabajadors_id = $request->get('trabajadors_id');
        
        if($codigo != null){
            $item->update(['codigo' => $codigo]);
        }
        
        if($hora != null){
            $item->update(['hora' => $hora]);
        }
        
        if($fecha != null){
            $item->update(['fecha' => $fecha]);
        }

        if($motivoConsulta != null){
            $item->update(['motivoConsulta' => $motivoConsulta]);
        }

        if($estadoTratamiento != null){
            $item->update(['estadoTratamiento' => $estadoTratamiento]);
        }
        
        if($pacientes_id != null){
            $item->update(['pacientes_id' => $pacientes_id]);
        }

        if($trabajadors_id != null){
            $item->update(['trabajadors_id' => $trabajadors_id]);
        }

        return redirect()->route('reservaCita_show',$id)
        ->with('success','Actualizado sin errores :D');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\reservaCita  $reservaCita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = ReservaCita::find($id);
        $item->delete();
        return redirect(route('reservaCita_index'));
    }
}
