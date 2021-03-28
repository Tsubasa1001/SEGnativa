@extends('layouts.oculux')

@section('titulo')
    <title>Usuario | Index</title>
@endsection

@section('dinamico')

<?php
    $file = "usuario_index";
    if (!file_exists($file)) {
        touch($file);
        $fileO = fopen($file, "w+");
        if($fileO){
            fwrite($fileO, '0');
            fclose($fileO);
        }
    }

    $fileO = fopen($file, "r");
    if($fileO){
        $contador = fread($fileO, filesize($file));
        $contador = $contador + 1;
        fclose($fileO);
    }

    $fileO = fopen($file, "w+");
    if($fileO){
        fwrite($fileO, $contador);
        fclose($fileO);
    }
?>

<div class="block-header">
    <div class="row clearfix">
        <div class="col-md-6 col-sm-12">
            <h2>User List</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Oculux</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">User List</li>
                <span class="badge badge-success">
                    Contador de visitas :: {{$contador}}
                </span>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right hidden-xs">
            <a href="javascript:void(0);" class="btn btn-sm btn-primary btn-round" title="">Add New</a>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">

            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Users">Users</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#addUser">Add User</a></li>
            </ul>

            <div class="tab-content mt-0">

                <!-- INDEX -->
                <div class="tab-pane active show" id="Users">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    @if ($collection == 'No hay registros.')
                        <br>
                        <span class="badge badge-default">
                            <h3>'No hay registros.'</h3>
                        </span>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover table-custom spacing8">
                                <thead>
                                    <tr>
                                        <th>pk</th>
                                        <th class="w60">Name</th>
                                        <th>Rol</th>
                                        <th>PATRA</th>
                                        <th class="w100">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($collection as $item)
                                        <tr>
                                            <td>
                                                {{$item->id}}
                                            </td>
                                            <td>
                                                <h6 class="mb-0">{{$item->name}}</h6>
                                                <span>{{$item->email}}</span>
                                            </td>
                                            <td>
                                                @if ($item->privilegio == '1')
                                                    <span class="badge badge-danger">ROOT</span>
                                                @elseif ($item->privilegio == '2')
                                                    <span class="badge badge-default">Cliente</span>
                                                @elseif ($item->privilegio == '3')
                                                    <span class="badge badge-info">Trabajador</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->tipo_patra == 1)
                                                    Paciente / {{$item->id_patra}}</td>
                                                @else
                                                    Trabajador / {{$item->id_patra}}</td>
                                                @endif
                                            <td>
                                                <!-- no_habilitado_para_root -->
                                                @if ($item->privilegio != '1')

                                                    <button type="button" class="btn btn-sm btn-default"
                                                        title="Show">
                                                        <a href="{{ route('usuario_show', $item->id) }}" title="show">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </button>

                                                    <form action="{{ url("Usuario/destroy/{$item->id}")}}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-default js-sweetalert"
                                                        type="submit">
                                                            <i class="fa fa-trash-o text-danger">
                                                            </i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>

                <!-- CREATE -->
                <div class="tab-pane" id="addUser">
                    @if ($errors->any())
                        <div class="tab-pane">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>
                                        <span class="badge badge-danger">{{ $error }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="body mt-2">
                        <form action="{{route('usuario_store')}}" method="post">
                            @csrf
                            <div class="row clearfix">

                                <!-- id -->
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label for="id">id</label>
                                        <input type="text" class="form-control"
                                        placeholder="1" name='id'
                                        value="{{ old('id') }}">
                                    </div>
                                </div>

                                <!-- nombre -->
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label for="nombre">nombre</label>
                                        <input type="text" class="form-control"
                                        placeholder="Bon Jovi" name='nombre'
                                        value="{{ old('nombre') }}">
                                    </div>
                                </div>

                                <!-- privilegio -->
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label for="privilegio">privilegio</label>
                                        <select class="form-control show-tick"
                                        name='privilegio' type='text'>
                                            <option value='1'>root</option>
                                            <option value='2'>Cliente</option>
                                            <option value='3'>Trabajador</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- email -->
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label for="email">email</label>
                                        <input type="text" class="form-control"
                                        placeholder="test.01@gmail.com" name='email' type='email'
                                        value="{{ old('email') }}">
                                    </div>
                                </div>

                                <!-- tipo_patra -->
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label for="tipo_patra">tipo_patra</label>
                                        <select class="form-control show-tick"
                                        name='tipo_patra' type='text'>
                                            <option value='1'>Paciente</option>
                                            <option value='2'>Trabajador</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
