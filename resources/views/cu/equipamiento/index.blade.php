@extends('layouts.oculux')

@section('titulo')
    <title>Equipamiento | Index</title>
@endsection

@section('dinamico')

<?php
    $file = "equipamiento_index";
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
            <h2>Equipamiento List</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Oculux</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Equipamiento List</li>
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
                <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Equipamientos">Equipamientos</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#addEquipamiento">Add Equipamiento</a></li>
            </ul>

            <div class="tab-content mt-0">

                <!-- INDEX -->
                <div class="tab-pane active show" id="Equipamientos">
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
                                        <th>Codigo</th>
                                        <th class="w60">Nombre</th>
                                        <th class="w100">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($collection as $item)
                                        <tr>
                                            <td>
                                                {{$item->id}}
                                            </td>

                                            <td>{{$item->codigo}}</td>

                                            <td>
                                                <h6 class="mb-0">{{$item->nombre}}</h6>
                                            </td>
                                        
                                            <td>
                                                @if ($item->privilegio != '1')
                                                    <button type="button" class="btn btn-sm btn-default"
                                                    title="Show">
                                                        <a href="{{ route('equipamiento_show', $item->id) }}" title="show">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </button>

                                                    <form action="{{ url("Equipamiento/destroy/{$item->id}")}}"
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
                <div class="tab-pane" id="addEquipamiento">
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
                        <form action="{{route('equipamiento_store')}}" method="post">
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
                                        placeholder="COD01" name='codigo'
                                        value="{{ old('codigo') }}">
                                    </div>
                                </div>

                                <!-- nombre -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="nombre">nombre</label>
                                        <input type="text" class="form-control"
                                        placeholder="Equipo" name='nombre'
                                        value="{{ old('nombre') }}">
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
