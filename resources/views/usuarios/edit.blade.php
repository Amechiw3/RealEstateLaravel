@extends('layouts.admin')

@section('module')
    Actualizar Usuario: {{ $usuario->usuario }}
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

        {!!Form::model($usuario, ['method' => 'PATCH', 'route' =>['Usuarios.update', $usuario->id]])!!}
        {{Form::token()}}

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{$usuario->name}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="appaterno">Apellido Paterno</label>
                    <input type="text" name="appaterno" id="appaterno" class="form-control" value="{{$usuario->appaterno}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="apmaterno">Apellido Materno</label>
                    <input type="text" name="apmaterno" id="apmaterno" class="form-control" value="{{$usuario->apmaterno}}">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="tel" name="telefono" id="telefono" class="form-control" value="{{$usuario->telefono}}">
                </div>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" id="usuario" class="form-control" value="{{$usuario->usuario}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tipousuario">Nivel de acceso</label>
                    <select name="tipousuario" id="tipousuario" class="form-control">
                        @foreach ($tipousuario as $tusu)
                            <option value="{{ $tusu->tipousuarioid }}" @if($tusu->tipousuarioid == $usuario->tipousuario) {{ "selected" }} @endif>{{$tusu->tipousuario}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="repassword">Repite la contraseña</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="email">Corre Electronico</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{$usuario->email}}">
                </div>
            </div>
        </div>

        <div class="form-group">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>
        {!!Form::close()!!}	
        
    </div>
</div>
@endsection