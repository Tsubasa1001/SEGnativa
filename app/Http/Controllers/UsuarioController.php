<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Trabajador;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller{
    public $tabla = 'Usuario';

    public function index(){
        $collection = User::all()->sortBy('id');

        if ($collection->isEmpty()){
            $collection = 'No hay registros.';
        }

        return view('cu.usuario.index', compact('collection'));
    }

    public function create(){}

    public function store(Request $request){
        /**validar las entradas */
        $gandalf = $request->validate([
            'id' => 'nullable|unique:users',
            'nombre' => 'required|string',
            'privilegio' => 'required|numeric',
            'email' => 'required|email|unique:users',
            'tipo_patra' => 'required'
        ]);
        $nombre = $request->get('nombre');
        $email = $request->get('email');
        $privilegio = $request->get('privilegio');

        /**crear [paciente/trabajador] */
        if (Paciente::all()->isEmpty()){
            $pk_last_pa = 1;
        }else{
            $pk_last_pa = Paciente::all()->sortBy('id')->last()['id'];
            $pk_last_pa = $pk_last_pa + 1;
        }

        if (Trabajador::all()->isEmpty()){
            $pk_last_tra = 1;
        }else{
            $pk_last_tra = Trabajador::all()->sortBy('id')->last()['id'];
            $pk_last_tra = $pk_last_tra + 1;
        }

        if ($request->get('tipo_patra') == '1'){
            DB::table('pacientes')->insert([
                'id' => $pk_last_pa,
                'nombre' => $nombre,
                'email' => $email,
                'codigo' => 'NPA'.$pk_last_pa,
                'created_at' => Carbon::parse(today())->format('Y-m-d'),
                'updated_at' => Carbon::parse(today())->format('Y-m-d')
            ]);
        }else{
            DB::table('trabajadors')->insert([
                'id' => $pk_last_tra,
                'codigo' => 'NTR'.$pk_last_tra,
                'nombre' => $nombre,
                'email' => $email,
                'created_at' => Carbon::parse(today())->format('Y-m-d'),
                'updated_at' => Carbon::parse(today())->format('Y-m-d')
            ]);
        }

        /**asignar pk si esta vacio */
        $pk_last_user = User::all()->sortBy('id')->last()['id'];
        $pk_last_user = $pk_last_user + 1;

        /**creacion del paciente/trabajador */

        /**creacion del usuario */
        $usuario = new User;
        if ($request->get('id') == null){
            $usuario->id = $pk_last_user;
        }else{
            $usuario->id = $request->get('id');
        }
        $usuario->name = $request->get('nombre');
        $usuario->privilegio = $request->get('privilegio');
        $usuario->email = $request->get('email');
        $usuario->password = Hash::make($email);
        $usuario->tipo_patra = $request->get('tipo_patra');
        if ($request->get('tipo_patra') == 1){
            $usuario->id_patra = $pk_last_pa;
        }else{
            $usuario->id_patra = $pk_last_tra;
        }
        $usuario->created_at = Carbon::parse(today())->format('Y-m-d');
        $usuario->updated_at = Carbon::parse(today())->format('Y-m-d');

        $usuario->save();

        return redirect(route('usuario_index'));
    }

    public function show($usuario){
        $collection = User::find($usuario);
        return view('cu.usuario.show', compact('collection'));
    }

    public function edit($id){}
    public function update(Request $request, $id){}

    public function destroy($usuario){
        /**busco el usuario a eliminar */
        $item = User::find($usuario);

        /**guardo los valores que relacionan a [paciente/trabajador] */
        $item_nombre = $item['name'];
        $tipo_patra = $item['tipo_patra'];
        $id_patra = $item['id_patra'];

        /**elimino el usuario */
        $item->delete();

        /**si corresponde, elimino al [paciente/trabajador] */
        $tmpP = Paciente::find($id_patra);
        $tmpT = Trabajador::find($id_patra);

        if (
            ($tipo_patra == 1) &&
            (Paciente::find($id_patra) != null)
        ){
            $tmpP->delete();
        }else if (
            ($tipo_patra == 2) &&
            (Trabajador::find($id_patra) != null)
        ){
            $tmpT->delete();
        }
        return redirect(route('usuario_index'));
    }

    public function logout () {
        Auth::logout();
        return redirect('/');
    }
}
