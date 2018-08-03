@extends('layouts.admin')

@section('module')
    Listado de paises
@endsection

@section('option')
    <a href="Paises/create" class="btn btn-box-tool">
        Nuevo  Registro <i class="fa fa-plus"></i>
    </a>
@endsection

@section('content')
    @if (count($paises) >= 1)
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            @include('paises.search')
        </div>
    </div>
    @endif

    <div class="row">
        @if (count($paises) >= 1)
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>ID</th>
                        <th>Pais</th>
                        <th class="text-center">Opciones</th>
                    </thead>
                    <tbody>
                        @foreach ($paises as $pai)
                            <tr>
                                <td>{{ $pai->paisid }}</td>
                                <td>{{ $pai->pais }}</td>
                                <td><div class="pull-right">
                                    <a href="{{URL::action('PaisesController@edit', $pai->paisid)}}" class="btn btn-info">
                                        Editar
                                    </a>

                                    <a href="" class="btn btn-danger" data-target="#modal-delete-{{$pai->paisid}}" data-toggle="modal">
                                        Eliminar
                                    </a>
                                    </div>
                                </td>
                            </tr>
                            @include('paises.modal')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
                {{ $paises->render() }}
        </div>
        @else
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="alert alert-dismissible alert-warning">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4 class="alert-heading">Aviso!</h4>
                <p class="mb-0">No hay registros</p>
            </div>
        </div>
        @endif
    </div>
@endsection