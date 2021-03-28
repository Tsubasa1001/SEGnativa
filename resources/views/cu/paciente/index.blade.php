@extends('layouts.oculux')

@section('titulo')
    <title>Paciente | Index</title>
@endsection

@section('dinamico')

<?php
    $file = "paciente_index";
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
            <h2>Paciente List</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Oculux</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Paciente List</li>
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
                <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Pacientes">Pacientes</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#addPaciente">Add Paciente</a></li>
            </ul>

            <div class="tab-content mt-0">

                <!-- INDEX -->
                <div class="tab-pane active show" id="Pacientes">
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
                                    <th class="w60">Nombre</th>
                                    <th>Nacionalidad</th>
                                    <th>Genero</th>
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
                                            <h6 class="mb-0">{{$item->nombre}}</h6>
                                            <span>{{$item->email}}</span>
                                        </td>
                                        <td>{{$item->nacionalidad}}</td>
                                        <td>{{$item->genero}}</td>
                                        <td>

                                            @if ($item->privilegio != '1')
                                                <button type="button" class="btn btn-sm btn-default"
                                                title="Show">
                                                    <a href="{{ route('paciente_show', $item->id) }}" title="show">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </button>

                                                <form action="{{ url("Paciente/destroy/{$item->id}")}}"
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
                <div class="tab-pane" id="addPaciente">
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
                        <form action="{{route('paciente_store')}}" method="post">
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

                                <!-- codigo -->
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label for="codigo">codigo</label>
                                        <input type="text" class="form-control"
                                        placeholder="NTRA001" name='codigo'
                                        value="{{ old('codigo') }}">
                                    </div>
                                </div>

                                <!-- ci -->
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label for="ci">ci</label>
                                        <input type="text" class="form-control"
                                        placeholder="95959595" name='ci'
                                        value="{{ old('ci') }}">
                                    </div>
                                </div>

                                <!-- nacionalidad -->
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label for="nacionalidad">nacionalidad</label>
                                        <input type="text" class="form-control"
                                        placeholder="Bolivia" name='nacionalidad'
                                        value="{{ old('nacionalidad') }}">
                                    </div>
                                </div>

                                <!-- nombre -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="nombre">nombre</label>
                                        <input type="text" class="form-control"
                                        placeholder="Bon Jovi" name='nombre'
                                        value="{{ old('nombre') }}">
                                    </div>
                                </div>

                                <!-- especialidad -->
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label for="especialidad">especialidad</label>
                                        <input type="text" class="form-control"
                                        placeholder="1" name='especialidad'
                                        value="{{ old('especialidad') }}">
                                    </div>
                                </div>

                                <!-- direccion -->
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label for="direccion">direccion</label>
                                        <input type="text" class="form-control"
                                        placeholder="C/ Taperas #44" name='direccion'
                                        value="{{ old('direccion') }}">
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

                                <!-- celular -->
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label for="celular">celular</label>
                                        <input type="text" class="form-control"
                                        placeholder="65258545" name='celular' type='number'
                                        value="{{ old('celular') }}">
                                    </div>
                                </div>

                                <!-- edad -->
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label for="edad">edad</label>
                                        <input type="text" class="form-control"
                                        placeholder="18" name='edad' type='number'
                                        value="{{ old('edad') }}">
                                    </div>
                                </div>

                                <!-- genero -->
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label for="genero">genero</label>
                                        <select class="form-control show-tick"
                                        name='genero' type='text'>
                                            <option>F</option>
                                            <option>M</option>
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
