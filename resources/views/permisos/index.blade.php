@extends('layouts.admin')

@section('module')
    Listado de permisos
@endsection

@section('option')
    <a href="Ciudades/create" class="btn btn-box-tool">
        Nuevo <i class="fa fa-plus"></i>
    </a>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            @include('permisos.search')
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>ID</th>
                        <th>Estado</th>
                        <th>Ciudad</th>
                        <th class="text-center">Opciones</th>
                    </thead>
                    <tbody>
                        @foreach ($permisos as $per)
                            <tr>
                                <td>{{ $per->permisoid }}</td>
                                <td>{{ $per->permiso }}</td>
                                <td>{{ $per->descripcion }}</td>
                                <td><div class="pull-right">
                                    
                                    <a href="" class="btn btn-info">
                                        Editar
                                    </a>

                                    <a href="" class="btn btn-danger">
                                        Eliminar
                                    </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
                {{ $permisos->render() }}
        </div>
    </div>
@endsection