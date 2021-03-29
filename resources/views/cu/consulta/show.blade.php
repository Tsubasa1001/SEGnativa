@extends('layouts.oculux')

@section('titulo')
    <title>Consulta | Show</title>
@endsection

@section('dinamico')

<?php
    $file = "consulta_show";
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
            <h2>Show Consulta</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Oculux</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Show Consulta</li>
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

            <!-- formulario__show_edit -->
            <div class="col-xl-12 col-lg-12 col-md-7">
                <div class="card">
                    <div class="header">
                        <h2>Information</h2>
                        <!--mensaje_success-->
                        @if(session()->has('success'))
                            <br>
                            <div class="tab-pane">
                                <ul>
                                    <li>
                                        <span class="badge badge-success">
                                        {{ session()->get('success') }}
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        @endif
                        <!-- mensaje_error -->
                        @if ($errors->any())
                            <br>
                            <div class="tab-pane">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>
                                            <span class="badge badge-danger">
                                                {{ $error }}
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <ul class="header-dropdown dropdown">
                            <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another Action</a></li>
                                    <li><a href="javascript:void(0);">Something else</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <div class="body">
                        <form action="{{route('consulta_update', $collection->id)}}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="row clearfix">
                                
                                <!--id-->
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <label for="id">id</label>
                                        <input type="text" name="id" class="form-control"
                                        value="{{$collection->id}}" disabled>
                                    </div>
                                </div>

                                <!--horaentrada-->
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <label for="horaentrada">horaentrada</label>
                                        <input type="text" name="horaentrada" class="form-control"
                                        value="{{$collection->horaentrada}}" >
                                    </div>
                                </div>

                                <!--horasalida-->
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <label for="horasalida">horasalida</label>
                                        <input type="text" name="horasalida" class="form-control"
                                        value="{{$collection->horasalida}}" >
                                    </div>
                                </div>

                                <!--precio-->
                                <div class="col-lg-2 col-md-12">
                                    <div class="form-group">
                                        <label for="precio">precio</label>
                                        <input type="text" name="precio" class="form-control"
                                        value="{{$collection->precio}}">
                                    </div>
                                </div>

                                <!--nota-->
                                <div class="col-lg-2 col-md-12">
                                    <div class="form-group">
                                        <label for="nota">nota</label>
                                        <input type="text" name="nota" class="form-control"
                                        value="{{$collection->nota}}">
                                    </div>
                                </div>

                                <!--diagnostico final-->
                                <div class="col-lg-2 col-md-12">
                                    <div class="form-group">
                                        <label for="diagnosticofinal">diagnosticofinal</label>
                                        <input type="text" name="diagnosticofinal" class="form-control"
                                        value="{{$collection->diagnosticofinal}}">
                                    </div>
                                </div>

                                <!-- reservaCitas_id -->
                                <div class="col-lg-2 col-md-12">
                                    <div class="form-group">
                                        <label for="reservaCitas_id">reservaCitas_id</label>
                                        <select name="reservaCitas_id" class="form-control">

                                            @foreach ($reservaCitas as $reserva)
                                                <option value="{{$reserva->id}}" {{$reserva->id == $collection->reservaCitas_id ? 'selected' : ''}}>
                                                    {{$reserva->codigo}}
                                                </option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>

                                <!-- servicios_id -->
                                <div class="col-lg-2 col-md-12">
                                    <div class="form-group">
                                        <label for="servicios_id">servicio</label>
                                        <select name="servicios_id" class="form-control">

                                            @foreach ($servicios as $serv)
                                                <option value="{{$serv->id}}" {{$serv->id == $collection->servicios_id ? 'selected' : ''}}>
                                                    {{$serv->nombre}}
                                                </option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-round btn-primary">Update</button> &nbsp;&nbsp;
                            <button type="reset" class="btn btn-round btn-default">
                                <a href="{{ route('consulta_show', $collection->id) }}" title="show">
                                    <i class="fa fa-refresh">
                                        Reset
                                    </i>
                                </a>
                            </button>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
