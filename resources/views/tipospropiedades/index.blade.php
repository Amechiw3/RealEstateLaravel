@extends('layouts.admin')

@section('module')
    Listado de tipos de propiedades
@endsection

@section('option')
    <a href="TiposPropiedades/create" class="btn btn-box-tool">
        Nuevo <i class="fa fa-plus"></i>
    </a>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            @include('TiposPropiedades.search')
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Descripcion</th>
                        <th class="text-center">Opciones</th>
                    </thead>
                    <tbody>
                        @foreach ($tipospropiedades as $tp)
                            <tr>
                                <td>{{ $tp->tipopropiedadid }}</td>
                                <td>{{ $tp->nombre }}</td>
                                <td>{{ $tp->descripcion }}</td>
                                <td><div class="pull-right">
                                    
                                    <a href="{{URL::action('TiposPropiedadesController@edit', $tp->tipopropiedadid)}}" class="btn btn-info">
                                        Editar
                                    </a>

                                    <a href="" class="btn btn-danger" data-target="#modal-delete-{{$tp->tipopropiedadid}}" data-toggle="modal">
                                        Eliminar
                                    </a>
                                    </div>
                                </td>
                            </tr>
                            @include('tipospropiedades.modal')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
                {{ $tipospropiedades->render() }}
        </div>
    </div>
@endsection