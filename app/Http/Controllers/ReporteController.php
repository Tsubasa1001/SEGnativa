<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Trabajador;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use PDF;

class ReporteController extends Controller{

    public function index(){
        $collection = [];
        return view('cu.reporte.index', compact('collection'));
    }

    public function reportePacientes(){
        $collection = Paciente::all();

        $fila = '
        <h1>NATIVA - 2021</h1>
        <h5>Reporte :: contacto de pacientes</h5>';

        $nombre = auth()->user()->name;
        $mail = auth()->user()->email;
        $fila = $fila . '<br>Usuario ::' . $nombre . '<br>Email ::' . $mail;

        $fila = $fila . '
        <table>
            <tr>
                <th>codigo</th>
                <th>ci</th>
                <th>nombre</th>
                <th>direccion</th>
                <th>email</th>
                <th>celular</th>
            </tr>';
            foreach($collection as $item){
                $fila = $fila.'<tr>
                    <td>'.$item->codigo.'</td>
                    <td>'.$item->ci.'</td>
                    <td>'.$item->nombre.'</td>
                    <td>'.$item->direccion.'</td>
                    <td>'.$item->email.'</td>
                    <td>'.$item->celular.'</td>
                </tr>';
            }
        $fila = $fila.'</table>
        <br>';

        $fecha = Carbon::parse(today())->format('d-m-Y H:m:s');
        $fila = $fila .'Generado :: '. $fecha;

        $pdf = \PDF::loadHtml($fila);

        // download PDF file with download method
        return $pdf->download('reporte_usuarios_nativa_'.$fecha.'.pdf');
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
