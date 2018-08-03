@extends('layouts.admin')

@section('module')
    Listado de ciudades
@endsection

@section('option')
    <a href="Ciudades/create" class="btn btn-box-tool">
        Nuevo <i class="fa fa-plus"></i>
    </a>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            @include('ciudades.search')
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
                        @foreach ($ciudades as $ciu)
                            <tr>
                                <td>{{ $ciu->ciudadid }}</td>
                                <td>{{ $ciu->estado }}</td>
                                <td>{{ $ciu->ciudad }}</td>
                                <td><div class="pull-right">
                                    
                                    <a href="{{URL::action('CiudadesController@edit', $ciu->ciudadid)}}" class="btn btn-info">
                                        Editar
                                    </a>

                                    <a href="" class="btn btn-danger" data-target="#modal-delete-{{$ciu->ciudadid}}" data-toggle="modal">
                                        Eliminar
                                    </a>
                                    </div>
                                </td>
                            </tr>
                            @include('ciudades.modal')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
                {{ $ciudades->render() }}
        </div>
    </div>
@endsection