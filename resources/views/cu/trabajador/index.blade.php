@extends('layouts.oculux')

@section('titulo')
    <title>Trabajador | Index</title>
@endsection

@section('dinamico')

    <div class="block-header">
        <div class="row clearfix">
            <div class="col-md-6 col-sm-12">
                <h2>User List</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Oculux</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">User List</li>
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

                    <div class="tab-pane active show" id="Users">
                        <div class="table-responsive">
                            <table class="table table-hover table-custom spacing8">
                                <thead>
                                    <tr>
                                        <th>pk</th>
                                        <th class="w60">Nombre</th>
                                        <th>Nacionalidad</th>
                                        <th>Cargo/Ocupación</th>
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
                                            <td>
                                                @if ($item->especialidad == '1')
                                                    {{$item->cargo}}
                                                @else
                                                    {{$item->ocupacion}}
                                                @endif
                                            </td>
                                            <td>{{$item->genero}}</td>
                                            <td>
                                                @if ($item->privilegio != '1')
                                                    <button type="button" class="btn btn-sm btn-default" title="Edit"><i class="fa fa-edit"></i></button>
                                                    <button type="button" class="btn btn-sm btn-default js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o text-danger"></i></button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane" id="addUser">
                        <div class="body mt-2">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="First Name *">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Last Name">
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Email ID *">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Confirm Password">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Mobile No">
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Employee ID *">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Username *">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <select class="form-control show-tick">
                                            <option>Select Role Type</option>
                                            <option>Super Admin</option>
                                            <option>Admin</option>
                                            <option>Employee</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <h6>Module Permission</h6>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Read</th>
                                                    <th>Write</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Super Admin</td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" name="checkbox" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" name="checkbox" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" name="checkbox" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Admin</td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" name="checkbox" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" name="checkbox" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" name="checkbox">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Employee</td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" name="checkbox" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" name="checkbox">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" name="checkbox">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>HR Admin</td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" name="checkbox" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" name="checkbox" checked="">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" name="checkbox">
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <button type="button" class="btn btn-primary">Add</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
