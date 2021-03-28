@extends('layouts.oculux')

@section('titulo')
    <title>Trabajador | Show</title>
@endsection

@section('dinamico')

<?php
    $file = "trabajador_show";
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
            <h2>Trabajador Show</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Oculux</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Trabajador Show</li>
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
                        <form action="{{route('trabajador_update', $collection->id)}}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="row clearfix">

                                <!--nombre-->
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <label for="nombre">nombre</label>
                                        <input type="text" name="nombre" class="form-control"
                                        value="{{$collection->nombre}}" disabled>
                                    </div>
                                </div>

                                <!--codigo-->
                                <div class="col-lg-2 col-md-12">
                                    <div class="form-group">
                                        <label for="codigo">codigo</label>
                                        <input type="text" name="codigo" class="form-control"
                                        value="{{$collection->codigo}}" disabled>
                                    </div>
                                </div>

                                <!--ci-->
                                <div class="col-lg-2 col-md-12">
                                    <div class="form-group">
                                        <label for="ci">ci</label>
                                        <input type="text" name="ci" class="form-control"
                                        value="{{$collection->ci}}">
                                    </div>
                                </div>

                                <!--nacionalidad-->
                                <div class="col-lg-3 col-md-12">
                                    <div class="form-group">
                                        <label for="nacionalidad">nacionalidad</label>
                                        <select class="form-control show-tick"
                                        name='nacionalidad' type='text'>
                                            <option value='{{$collection->nacionalidad}}'>{{$collection->nacionalidad}}</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Aruba">Aruba</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Austria">Austria</option>
                                            <option value="Azerbaijan">Azerbaijan</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Belize">Belize</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Bermuda">Bermuda</option>
                                            <option value="Bhutan">Bhutan</option>
                                            <option value="Bolivia">Bolivia</option>
                                            <option value="Bonaire">Bonaire</option>
                                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                            <option value="Botswana">Botswana</option>
                                            <option value="Bouvet Island">Bouvet Island</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                                            <option value="Bulgaria">Bulgaria</option>
                                            <option value="Burkina Faso">Burkina Faso</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Cambodia">Cambodia</option>
                                            <option value="Cameroon">Cameroon</option>
                                        </select>
                                    </div>
                                </div>

                                <!--cargo-->
                                <div class="col-lg-2 col-md-12">
                                    <div class="form-group">
                                        <label for="cargo">cargo</label>
                                        <input type="text" name="cargo" class="form-control"
                                        value="{{$collection->cargo}}">
                                    </div>
                                </div>

                                <!--ocupacion-->
                                <div class="col-lg-2 col-md-12">
                                    <div class="form-group">
                                        <label for="ocupacion">ocupacion</label>
                                        <input type="text" name="ocupacion" class="form-control"
                                        value="{{$collection->ocupacion}}">
                                    </div>
                                </div>

                                <!--direccion-->
                                <div class="col-lg-2 col-md-12">
                                    <div class="form-group">
                                        <label for="direccion">direccion</label>
                                        <input type="text" name="direccion" class="form-control"
                                        value="{{$collection->direccion}}">
                                    </div>
                                </div>

                                <!--email-->
                                <div class="col-lg-5 col-md-12">
                                    <div class="form-group">
                                        <label for="email">email</label>
                                        <input type="text" name="email" class="form-control"
                                        value="{{$collection->email}}">
                                    </div>
                                </div>

                                <!--celular-->
                                <div class="col-lg-2 col-md-12">
                                    <div class="form-group">
                                        <label for="celular">celular</label>
                                        <input type="text" name="celular" class="form-control"
                                        value="{{$collection->celular}}">
                                    </div>
                                </div>

                                <!--genero-->
                                <div class="col-lg-2 col-md-12">
                                    <div class="form-group">
                                        <label for="genero">genero</label>
                                        <select class="form-control show-tick"
                                        name='genero' type='text'>
                                            <option value='{{$collection->genero}}'>{{$collection->genero}}</option>
                                            <option value='F'>F</option>
                                            <option value='M'>M</option>
                                        </select>
                                    </div>
                                </div>

                                <!--edad-->
                                <div class="col-lg-2 col-md-12">
                                    <div class="form-group">
                                        <label for="edad">edad</label>
                                        <input type="text" name="edad" class="form-control"
                                        value="{{$collection->edad}}">
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-round btn-primary">Update</button> &nbsp;&nbsp;
                            <button type="reset" class="btn btn-round btn-default">
                                <a href="{{ route('trabajador_show', $collection->id) }}" title="show">
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
