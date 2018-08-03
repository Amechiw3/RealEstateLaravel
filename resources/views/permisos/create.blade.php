@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <h3>CREATE</h3>
        {{ var_dump(Auth::user()->tiposusuarios->tipousuario) }}
    </div>
@endsection