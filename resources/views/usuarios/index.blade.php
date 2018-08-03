@extends('layouts.admin')

@section('module')
    Listado de usuarios
@endsection

@section('option')
    <a href="Usuarios/create" class="btn btn-box-tool">
        Nuevo <i class="fa fa-user-plus"></i>
    </a>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            @include('usuarios.search')
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
                <!-- table-bordered -->
                <table class="table table-striped table-condensed table-hover">
                    <thead>
                        <th>ID</th>
                        <th>Rol / Usuario</th>
                        <th>Nombre</th>
                        <th>Correo electronico</th>
                        <th class="text-center">Opciones</th>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usu)
                            <tr @if($usu->estado == 0) {!! 'class="danger"' !!} @endif>
                                <td>{{ $usu->id }}</td>
                                <td>{{ $usu->tipousuario .' / '.$usu->usuario }}</td>
                                <td>{{ $usu->name .' '. $usu->appaterno .' '. $usu->apmaterno}}</td>
                                <td>{{ $usu->email }}</td>
                                <td><div class="pull-right">
                                    
                                    <a href="{{URL::action('UsuariosController@edit', $usu->id)}}" class="btn btn-info">
                                        Editar
                                    </a>

                                    <a href="" class="btn btn-danger" data-target="#modal-delete-{{ $usu->id }}" data-toggle="modal">
                                        Eliminar
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @include('usuarios.modal')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
                {{ $usuarios->render() }}
        </div>
    </div>
@endsection