<?php

namespace App\Http\Controllers;

use App\Models\reservaCita;
use Illuminate\Http\Request;

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

        if ($collection->isEmpty()){
            $collection = 'No hay registros.';
        }

        return view('cu.reservaCita.index',compact('collection'));
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
            'id' => 'required|numeric',   
            'codigo' => 'require|alpha_num',
            'hora' => 'require|alpha_num',
            'fecha' => 'require|alpha_num',
            'motivoConsulta' => 'require|string',
            'estadoConsulta' => 'require|string',
            'pacientes_id' => 'require|string',
            'trabajadors_id' => 'require|string',
            ]
        );

        $reservaCita = new ReservaCita;
        $reservaCita->id = $request->get('id');
        $reservaCita->codigo = $request->get('codigo');
        $reservaCita->hora = $request->get('hora');
        $reservaCita->fecha = $request->get('fecha');
        $reservaCita->motivoConsulta = $request->get('motivoConsulta');
        $reservaCita->estadoConsulta = $request->get('estadoConsulta');
        $reservaCita->pacientes_id = $request->get('pacientes_id');
        $reservaCita->trabajador_id = $request->get('trabajadors_id');
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
    public function show(ReservaCita $reservaCita)
    {
        //
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
    public function update(Request $request, reservaCita $reservaCita)
    {
        //
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
