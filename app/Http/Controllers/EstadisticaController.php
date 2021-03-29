<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class EstadisticaController extends Controller{

    public function index(){
        $ENERO = Paciente::whereMonth('created_at', '=', 1)->count();
        $FEBRERO = Paciente::whereMonth('created_at', '=', 2)->count();
        $MARZO = Paciente::whereMonth('created_at', '=', 3)->count();
        $ABRIL = Paciente::whereMonth('created_at', '=', 4)->count();
        $MAYO = Paciente::whereMonth('created_at', '=', 5)->count();
        $JUNIO = Paciente::whereMonth('created_at', '=', 6)->count();
        $JULIO = Paciente::whereMonth('created_at', '=', 7)->count();
        $AGOSTO = Paciente::whereMonth('created_at', '=', 8)->count();
        $SEPTIEMBRE = Paciente::whereMonth('created_at', '=', 9)->count();
        $OCTUBRE = Paciente::whereMonth('created_at', '=', 10)->count();
        $NOVIEMBRE = Paciente::whereMonth('created_at', '=', 11)->count();
        $DICIEMBRE = Paciente::whereMonth('created_at', '=', 12)->count();

        $collection = [
            $ENERO,
            $FEBRERO,
            $MARZO,
            $ABRIL,
            $MAYO,
            $JUNIO,
            $JULIO,
            $AGOSTO,
            $SEPTIEMBRE,
            $OCTUBRE,
            $NOVIEMBRE,
            $DICIEMBRE,
        ];
        $MAX = array_sum($collection);
        $refactor = [];

        foreach ($collection as $key) {
            $tmp = ($key*100)/$MAX;
            $tmp = number_format($tmp, 2);
            array_push($refactor, $tmp);
        }

        $collection = json_encode($refactor);
        return view('cu.estadistica.index', compact('collection'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
