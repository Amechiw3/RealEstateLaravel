@extends('layouts.admin')

@section('module')
    Listado de propiedades
@endsection

@section('option')
    <a href="Propiedades/create" class="btn btn-box-tool">
        Nuevo <i class="fa fa-plus-circle"></i>
    </a>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            @include('propiedades.search')
        </div>
    </div>

    <div class="row">
        @if (count($propiedades) >= 1)
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>ID</th>
                        <th>Direccion</th>
                        <th class="text-center">Opciones</th>
                    </thead>
                    <tbody>
                        @foreach ($propiedades as $prop)
                            <tr>
                                <td>{{ $prop->propiedadid }}</td>
                                <td>{{ $prop->calle.', '.$prop->colonia.', '.$prop->ciudad.', '.$prop->estado.', '.$prop->pais }}</td>
                                <td><div class="pull-right">
                                        <a href="" class="btn btn-primary"  data-target="#modal-documento-{{$prop->propiedadid}}" data-toggle="modal">
                                                Entrega Documento
                                            </a>
                                        <a href="" class="btn btn-primary"  data-target="#modal-create-{{$prop->propiedadid}}" data-toggle="modal">
                                            Añadir Imagen
                                        </a>
                                        <a href="{{URL::action('PropiedadesController@edit', $prop->propiedadid)}}" class="btn btn-info">
                                            Editar
                                        </a>
                                        <a href="" class="btn btn-danger" data-target="#modal-delete-{{$prop->propiedadid}}" data-toggle="modal">
                                            Eliminar
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @include('propiedades.modal')
                            @include('propiedadesimagenes.create')
                            @include('documentosentregados.create')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
                {{ $propiedades->render() }}
        </div>
        @else
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-gutters">
            <div class="alert alert-dismissible alert-warning">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4 class="alert-heading">Aviso!</h4>
                <p class="mb-0">No hay registros</p>
            </div>
        </div>
        @endif
    </div>
@endsection