@extends('layouts.oculux')

@section('titulo')
    <title>Usuario | Index</title>
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
                                                    <span class="badge badge-default">Empleado</span>
                                                @elseif ($item->privilegio == '3')
                                                    <span class="badge badge-info">Cliente</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->tipo_patra == 1)
                                                    Paciente / {{$item->id_patra}}</td>
                                                @else
                                                    Trabajador / {{$item->id_patra}}</td>
                                                @endif
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

<!-- INDEX -->
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

            <div class="col-12">
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
