@extends('layouts.admin')

@section('module')
    Actualizar Ciudad: {{ $ciudad->ciudad }}
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

        {!!Form::model($ciudad, ['method' => 'PATCH', 'route' => ['Ciudades.update', $ciudad->ciudadid]])!!}
        {{Form::token()}}
        <div class="form-group">
            <label for="nombre">Pais</label>
            <select name="estado" id="estado" class="form-control">
                @foreach ($estados as $est)
                    <option value="{{ $est->estadoid }}" @if($est->estadoid == $ciudad->estado) {{ "selected" }} @endif >{{ $est->estado }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="ciudad" class="form-control" placeholder="Nombre..." value="{{ $ciudad->ciudad }}">
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>
        {!!Form::close()!!}		
        
    </div>
</div>
@endsection