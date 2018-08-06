@extends('layouts.admin3')

@section('stylecustom')
<style>
    .skin-trans .main-header .navbar {
        background-color: #00000000;
    }
</style>
@endsection

@section('content')
<div class="banner-center">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-push-2 findhouse">
                <h1>Encuentra la casa de tus sueños</h1>
                <button class="btn btn-success btn-flat">Comencemos</button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <h1 class="text-center">Propiedades</h1>
    {!! $maps['html'] !!}
</div>
<div id="mision">
    <div class="row">
        <div class="col-md-8 col-md-push-2">
            <h1 class="text-center">Nuestra Mision</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem quisquam dolorum, recusandae placeat odit cumque ipsum sapiente deserunt iure rem sint perferendis eius laboriosam magni, fugiat optio provident vel sequi.</p>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-lg">
                <form action="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" id="name" placeholder="Nombre Completo" required="required" />
                            </div>
                            <div class="form-group">
                                <label for="email">Correo Electronico</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <span class="fa fa-envelope"></span>
                                    </span>
                                    <input type="email" class="form-control" id="email" placeholder="Direccion de correo electronico" required="required" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="telefono">Telefono</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <span class="fa fa-phone"></span>
                                    </span>
                                    <input type="email" class="form-control" id="email" placeholder="Telefono movil" required="required" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Mensaje</label>
                                <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required" placeholder="Mensaje"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary pull-right btn-flat" id="btnContactUs">
                                Enviar Mensaje</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('customScript')
{!! $maps['js'] !!}
@endsection