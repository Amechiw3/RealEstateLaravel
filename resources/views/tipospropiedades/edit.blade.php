@extends('layouts.admin')

@section('module')
    Actualizar Tipo de Propiedad: {{ $tipopropiedad->nombre }}
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        </div>
        @endif

        {!!Form::model($tipopropiedad, ['method' => 'PATCH', 'route' => ['TiposPropiedades.update', $tipopropiedad->tipopropiedadid]])!!}
        {{Form::token()}}
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" placeholder="Nombre..." value="{{ $tipopropiedad->nombre }}">
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>
        {!!Form::close()!!}		
        
    </div>
</div>
@endsection