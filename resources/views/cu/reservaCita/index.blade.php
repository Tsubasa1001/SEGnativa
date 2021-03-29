@extends('layouts.oculux')

@section('titulo')
    <title>ReservaCita | Index</title>
@endsection

@section('dinamico')

<?php
    $file = "reservaCita_index";
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
                <h2>ReservaCita List</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Oculux</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ReservaCita List</li>
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
                    <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#ReservaCitas">Reserva citas</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#addReservaCita">Add ReservaCita</a></li>
                </ul>

                <div class="tab-content mt-0">

                    <!-- INDEX -->
                    <div class="tab-pane active show" id="ReservaCitas">
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
                                        <th class="w60">Hora</th>
                                        <th>Fecha</th>
                                        <th>Estado</th>
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
                                                <h6 class="mb-0">{{$item->hora}}</h6>
                                                
                                            </td>
                                            <td>{{$item->fecha}}</td>
                                            <td>{{$item->estadoTratamiento}}</td>
                                            <td>

                                                @if ($item->privilegio != '1')
                                                    <button type="button" class="btn btn-sm btn-default"
                                                        title="Show">
                                                        <a href="{{ route('reservaCita_show', $item->id) }}" title="show">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </button>

                                                    <form action="{{ url("ReservaCita/destroy/{$item->id}")}}"
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
                    <div class="tab-pane" id="addReservaCita">
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
                            <form action="{{route('reservaCita_store')}}" method="post">
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
                                            placeholder="RC0001" name='codigo'
                                            value="{{ old('codigo') }}">
                                        </div>
                                    </div>

                                    <!-- hora -->
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label for="hora">hora</label>
                                            <input type="text" class="form-control"
                                            placeholder="02:30:00" name='hora'
                                            value="{{ old('hora') }}">
                                        </div>
                                    </div>

                                    <!-- fecha -->
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label for="fecha">fecha</label>
                                            <input type="text" class="form-control"
                                            placeholder="2021-03-29" name='fecha'
                                            value="{{ old('fecha') }}">
                                        </div>
                                    </div>

                                    

                                    <!-- motivo consulta -->
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label for="motivoConsulta">motivo Consulta</label>
                                            <input type="text" class="form-control"
                                            placeholder="dolor de cuello" name='motivoConsulta'
                                            value="{{ old('motivoConsulta') }}">
                                        </div>
                                    </div>

                                    <!-- estado tratamiento -->
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label for="estadoTratamiento">estado tratamiento</label>
                                            <input type="text" class="form-control"
                                            placeholder="iniciando" name='estadoTratamiento'
                                            value="{{ old('estadoTratamiento') }}">
                                        </div>
                                    </div>

                                    <!-- pacientes_id -->
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label for="pacientes_id">Paciente</label>
                                        <select name="pacientes_id" class="form-control">

                                            @foreach ($pacientes as $pac)
                                                <option value="{{$pac->id}}">
                                                    {{$pac->nombre}}
                                                </option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>

                                <!-- trabajadors_id -->
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label for="trabajadors_id">Trabajador</label>
                                        <select name="trabajadors_id" class="form-control">

                                            @foreach ($trabajadors as $trab)
                                                <option value="{{$trab->id}}">
                                                    {{$trab->nombre}}
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