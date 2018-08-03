@extends('layouts.admin')

@section('module')
    Listado de Imagenes de Propiedades
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            @include('propiedadesimagenes.search')
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>ID</th>
                        <th>Direccion</th>
                        <th>Usuario</th>
                        <th>Imagen</th>
                        <th class="text-center">Opciones</th>
                    </thead>
                    <tbody>
                        @foreach ($propiedadesimagenes as $proimg)
                            <tr>
                                <td>{{ $proimg->propiedadimagenid }}</td>
                                <td>{{ $proimg->calle.', '.$proimg->colonia.', '.$proimg->ciudad.', '.$proimg->estado.', '.$proimg->pais }}</td>
                                <td>{{ $proimg->usuario }}</td>
                                <td>{{ $proimg->imagen }}</td>
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
                {{ $propiedadesimagenes->render() }}
        </div>
    </div>
@endsection