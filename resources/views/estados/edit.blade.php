@extends('layouts.admin')

@section('module')
    Actualizar Estado: {{ $estado->estado }}
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

        {!!Form::model($estado, ['method' => 'PATCH', 'route' => ['Estados.update', $estado->estadoid]])!!}
        {{Form::token()}}
        <div class="form-group">
            <label for="nombre">Pais</label>
            <select name="pais" id="pais" class="form-control">
                @foreach ($paises as $pai)
                    <option value="{{ $pai->paisid }}" @if($pai->paisid == $estado->pais) {{ "selected" }} @endif>{{$pai->pais }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="estado" class="form-control" placeholder="Nombre..." value="{{ $estado->estado }}">
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>
        {!!Form::close()!!}		
        
    </div>
</div>
@endsection