@extends('layouts.oculux')

@section('titulo')
    <title>Consulta | Index</title>
@endsection

@section('dinamico')

<?php
    $file = "consulta_index";
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
                <h2>Consulta List</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Oculux</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Consulta List</li>
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
                    <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Consultas">Consultas</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#addConsulta">Add consulta</a></li>
                </ul>

                <div class="tab-content mt-0">

                    <!-- INDEX -->
                    <div class="tab-pane active show" id="Consultas">
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
                                        <th class="w60">Hora entrada</th>
                                        <th>Hora salida</th>
                                        <th>Precio</th>
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
                                                <h6 class="mb-0">{{$item->horaentrada}}</h6>
                                                
                                            </td>
                                            <td>{{$item->horasalida}}</td>
                                            <td>{{$item->precio}}</td>
                                            <td>

                                                @if ($item->privilegio != '1')
                                                    <button type="button" class="btn btn-sm btn-default"
                                                        title="Show">
                                                        <a href="{{ route('consulta_show', $item->id) }}" title="show">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </button>

                                                    <form action="{{ url("Consulta/destroy/{$item->id}")}}"
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
                    <div class="tab-pane" id="addConsulta">
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
                            <form action="{{route('consulta_store')}}" method="post">
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

                                    <!-- horaentrada -->
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label for="horaentrada">hora entrada</label>
                                            <input type="text" class="form-control"
                                            placeholder="02:30:15" name='horaentrada'
                                            value="{{ old('horaentrada') }}">
                                        </div>
                                    </div>

                                    <!-- horasalida -->
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label for="horasalida">hora salida</label>
                                            <input type="text" class="form-control"
                                            placeholder="02:50:00" name='horasalida'
                                            value="{{ old('horasalida') }}">
                                        </div>
                                    </div>

                                    <!-- precio -->
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label for="precio">precio</label>
                                            <input type="text" class="form-control"
                                            placeholder="25" name='precio'
                                            value="{{ old('precio') }}">
                                        </div>
                                    </div>

                                    

                                    <!-- nota -->
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label for="nota">nota</label>
                                            <input type="text" class="form-control"
                                            placeholder="El paciente no es cumplido" name='nota'
                                            value="{{ old('nota') }}">
                                        </div>
                                    </div>

                                    <!-- diagnosticofinal -->
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label for="diagnosticofinal">diagnostico final</label>
                                            <input type="text" class="form-control"
                                            placeholder="acne tipo 2" name='diagnosticofinal'
                                            value="{{ old('diagnosticofinal') }}">
                                        </div>
                                    </div>

                                    <!-- reservaCitas_id -->
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label for="reservaCitas_id">ReservaCita codigo</label>
                                        <select name="reservaCitas_id" class="form-control">

                                            @foreach ($reservaCitas as $reserva)
                                                <option value="{{$reserva->id}}">
                                                    {{$reserva->codigo}}
                                                </option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>

                                <!-- servicios_id -->
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label for="servicios_id">Servicio</label>
                                        <select name="servicios_id" class="form-control">

                                            @foreach ($servicios as $serv)
                                                <option value="{{$serv->id}}">
                                                    {{$serv->nombre}}
                                                </option>
                                            @endforeach
                                            
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