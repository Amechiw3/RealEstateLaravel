@extends('layouts.admin3')

@section('stylecustom')
<style>
</style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#Propiedad" data-toggle="tab">Propiedad</a></li>
                    <li><a href="#Agente" data-toggle="tab">Agente</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="Propiedad">
                        <div class="row">
                            <div id="myCarousel" class="carousel slide col-md-6 col-md-push-3" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    @foreach ($imagenes as $imgs)
                                    <li data-target="#myCarousel" data-slide-to="{{ $propiedad->propiedadimagenid }}"></li>
                                    @endforeach
                                </ol>
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img src="{{ asset('uploads/propiedades/'. $propiedad->imagen) }}" class="img-responsive img-thumbnail">
                                    </div> 
                                    @foreach ($imagenes as $imgs)
                                    <div class="item">
                                        <img src="{{ asset('uploads/propiedadesimagenes/'. $imgs->imagen) }}" class="img-responsive img-thumbnail">
                                    </div> 
                                    @endforeach                                   
                                </div>
                                <!-- Left and right controls -->
                                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                    <span class="fa fa-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                    <span class="fa fa-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <hr>
                        <dl class="dl-horizontal">
                            <dt>Fecha de construccion</dt>
                            <dd>{{ $propiedad->propiedadfecha }}</dd>

                            <dt>Tipo de propiedad</dt>
                            <dd>{{ $propiedad->tipospropiedades->nombre }}</dd>

                            <dt>Direccion</dt>
                            <dd>{{ $propiedad->calle.', '.$propiedad->codigopostal.', '. $propiedad->colonia }}</dd>
                            <dd>{{ $propiedad->ciudades->ciudad.', '.$propiedad->estados->estado.', '.$propiedad->paises->pais }}</dd>
                            
                            <dt>Hectareas</dt>
                            <dd>{{ $propiedad->area }}</dd>

                            <dt>Numero de habitaciones</dt>
                            <dd>{{ $propiedad->numerohab }}</dd>
                        
                            <dt>Informacion Adicional</dt>
                            <dd>{{ $propiedad->informacionadic }}</dd>                            

                            <dt>Precio</dt>
                            <dd><h4 style="margin: 0;" class="display-4">{{ number_format( $propiedad->precio, 2, '.', ',' ) }}</h4></dd>

                        </dl>
                    </div>
                    <div class="tab-pane" id="Agente">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Name</label>

                                <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputName" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Name</label>

                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputName" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                                <div class="col-sm-10">
                                <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                    <label>
                                    <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                    </label>
                                </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        
@endsection