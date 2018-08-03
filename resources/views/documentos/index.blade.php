@extends('layouts.admin')

@section('module')
    Listado de documentos
@endsection

@section('option')
    <a href="Ciudades/create" class="btn btn-box-tool">
        Nuevo <i class="fa fa-plus"></i>
    </a>
@endsection

@section('content')
    @if (count($documentos) >= 1)
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            @include('documentos.search')
        </div>
    </div>
    @endif

    <div class="row">
        @if (count($documentos) >= 1)
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>ID</th>
                        <th>Documento</th>
                        <th>Descripcion</th>
                        <th class="text-center">Opciones</th>
                    </thead>
                    <tbody>
                        @foreach ($documentos as $doc)
                            <tr>
                                <td>{{ $doc->documentoid }}</td>
                                <td>{{ $doc->documento }}</td>
                                <td>{{ $doc->descripcion }}</td>
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
            {{ $documentos->render() }}
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