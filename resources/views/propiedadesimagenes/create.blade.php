<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-create-{{ $prop->propiedadid }}">
    <?php
    $imagenes = $imagenes->where('propiedadid', '=', $prop->propiedadid)
    ?>


    {!!Form::open(array('url'=>'/PropiedadesImagenes', 'method'=>'POST', 'autocomplete'=>'off', 'files' => true))!!}
    {{Form::token()}}
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Nueva imagen</h4>
            </div>
            <div class="modal-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                    <div class="row">
                        <div class="col-md-4 col-md-offset-1">
                            <label for="" class="text-center">Imagen Principal</label>
                            <img src="{{ asset('uploads/propiedades/'. $prop->imagen) }}" alt="" class="img-responsive img-thumbnail">
                        </div>
                        <div class="col-md-5 col-md-offset-1">
                            <label for="" class="text-center">Galeria de imagenes</label>
                            @if (count($imagenes) >= 1)
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    @foreach ($imagenes as $imgs)
                                    <li data-target="#myCarousel" data-slide-to="{{ $imgs->propiedadimagenid }}"></li>
                                    @endforeach
                                </ol>

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    @foreach ($imagenes as $imgs)
                                    <div class="item @if($imgs->propiedadimagenid == $imagenes->first()->propiedadimagenid) {{ "active" }} @endif">
                                        <img src="{{ asset('uploads/propiedadesimagenes/'. $imgs->imagen) }}" class="img-responsive" style="height:200px;">
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
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="hidden" value="{{ $prop->propiedadid }}" value="propiedadid" name="propiedadid">
                            <div class="form-group">
                                <label for="imagen">Imagen</label>
                                {{  Form::file('imagen', ['id'=>'imagen']) }}
                            </div>
                        </div>                    
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Confirmar</button>
            </div>
        </div>
    </div>
    {{Form::Close()}}
</div>