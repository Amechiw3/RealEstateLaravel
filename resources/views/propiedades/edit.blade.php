@extends('layouts.admin')

@section('module')
    Actualizar Propiedad: {{ $propiedad->propiedadid }}
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

        {!!Form::model($propiedad, ['method' => 'PATCH', 'route' => ['Propiedades.update', $propiedad->propiedadid]])!!}
        {{Form::token()}}
        
        <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tipopropiedad">Tipo de Propiedad</label>
                        <select name="tipopropiedad" id="tipopropiedad" class="form-control">
                            @foreach ($tipospropiedades as $tprop)
                                <option value="{{ $tprop->tipopropiedadid }}" @if($tprop->tipopropiedadid == $propiedad->tipopropiedad) {{ "selected" }} @endif>{{$tprop->nombre }}</option>
                            @endforeach
                        </select>    
                    </div>
                </div>
                <div class="col-md-4">
                <div class="form-group">
                    <label for="tipocontrato">Tipo de Contrato</label>
                    <select name="tipocontrato" id="tipocontrato" class="form-control">
                        @foreach ($tiposcontratos as $tcon)
                            <option value="{{ $tcon->tipocontratoid }}" @if($tcon->tipocontratoid == $propiedad->tipocontrato) {{ "selected" }} @endif>{{ $tcon->tipocontrato }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="propiedadfecha">Fecha de construcción</label>
                        {{Form::date('propiedadfecha', $propiedad->propiedadfecha, ['id'=>'propiedadfecha','class'=>'form-control'])}}
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="pais">Pais</label>
                        <select name="pais" id="pais" class="form-control">
                            @foreach ($paises as $pai)
                                <option value="{{ $pai->paisid }}" @if($pai->paisid == $propiedad->pais) {{ "selected" }} @endif>{{$pai->pais }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="estado">Estados</label>
                        <select name="estado" id="estado" class="form-control">
                            @foreach ($estados as $est)
                                <option value="{{ $est->estadoid }}" @if($est->estadoid == $propiedad->estado) {{ "selected" }} @endif>{{$est->estado }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="ciudad">Ciudades</label>
                        <select name="ciudad" id="ciudad" class="form-control">
                            @foreach ($ciudades as $ciu)
                                <option value="{{ $ciu->ciudadid }}" @if($ciu->ciudadid == $propiedad->ciudad) {{ "selected" }} @endif>{{$ciu->ciudad }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="calle">Calle</label>
                        {{Form::text('calle', $propiedad->calle, ['id'=>'calle','class'=>'form-control'])}}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="colonia">Colonia</label>
                        {{Form::text('colonia', $propiedad->colonia, ['id'=>'colonia','class'=>'form-control'])}}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="codigopostal">Codigo Postal</label>
                        {{Form::text('codigopostal', $propiedad->codigopostal, ['id'=>'codigopostal','class'=>'form-control'])}}
                    </div>
                </div>
            </div>
    
            <hr>
            <!-- MAPA -->
            {!! $maps['html'] !!}
            <!-- MAPA -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="latitud">Latitud</label>
                        <input class="form-control" type="text" name="latitud" id="latitud" readonly value="{{ $propiedad->latitude }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="longitud">Longitud</label>
                        <input class="form-control" type="text" name="longitud" id="longitud" readonly value="{{ $propiedad->longitude }}">
                    </div>
                </div>
            </div>
            <hr>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="numerohab">Numero de Habitaciones</label>
                        {{ Form::number('numerohab', $propiedad->numerohab, ['id'=>'numerohab','class'=>'form-control', 'min'=>'0']) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="area">Area (metros)</label>
                        <input class="form-control" type="text" name="area" id="area" value="{{ $propiedad->area }}">
                    </div>
                </div>
            </div>
    
            <div class="form-group">
                <label for="precio">Precio</label>
                <input class="form-control" type="text" name="precio" id="precio" value="{{ $propiedad->precio }}">
            </div>
    
            <div class="form-group">
                <label for="imagen">Imagen Principal</label>
                {{  Form::file('imagen', ['id'=>'imagen']) }}
            </div>
    
            <div class="form-group">
                <label for="informacionadic">Informacion Adicional</label>
                <textarea name="informacionadic" id="informacionadic" cols="12" class="form-control">{{ $propiedad->informacionadic }}</textarea>            
            </div>
        
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>
        {!!Form::close()!!}
    </div>
</div>
@endsection

@section('customScript')
{!! $maps['js'] !!}
<script>
    jQuery(document).ready(function($){  	   
        /*
        $.get("{{ url('dropdownEstados')}}", 
			{ option: $('#pais').val() }, 
			function(data) {
				var model = $('#estado');
                model.empty();
                if(data.length > 0){
                    $.each(data, function(index, element) {
                        model.append("<option value='"+ element.estadoid +"'>" + element.estado + "</option>");
                    });
                } else {
                    model.append("<option value='0'>El pais no tiene estados asignado</option>");
                    $('#ciudad').empty();
                    $('#ciudad').append("<option value='0'>El estado no tiene ciudades asignadas</option>");
                }
            
            $.get("{{ url('dropdownCiudades')}}", 
			    { option: $('#estado').val() }, 
			    function(data) {
				    var model = $('#ciudad');
				    model.empty();
                    if(data.length > 0){
                        $.each(data, function(index, element) {
                            model.append("<option value='"+ element.ciudadid +"'>" + element.ciudad + "</option>");
                        });
                    } else {
                        model.append("<option value='0'>El estado no tiene ciudades asignadas</option>");
                    }
		    });
        });
        */

        $('#pais').change(function(){
			$.get("{{ url('dropdownEstados')}}", 
				{ option: $(this).val() }, 
				function(data) {
					var model = $('#estado');
					model.empty();
 
					$.each(data, function(index, element) {
			            model.append("<option value='"+ element.estadoid +"'>" + element.estado + "</option>");
                    });
                    $.get("{{ url('dropdownCiudades')}}", 
                        { option: $('#estado').val() }, 
                        function(data) {
                            var model = $('#ciudad');
                            model.empty();
        
                            $.each(data, function(index, element) {
                                model.append("<option value='"+ element.ciudadid +"'>" + element.ciudad + "</option>");
                        });
                    });
                });
        });

        $('#estado').change(function(){
			$.get("{{ url('dropdownCiudades')}}", 
				{ option: $(this).val() }, 
				function(data) {
					var model = $('#ciudad');
					model.empty();
 
					$.each(data, function(index, element) {
			            model.append("<option value='"+ element.ciudadid +"'>" + element.ciudad + "</option>");
			    });
			});
        });
	});
</script>
<script>
    function placeMarker(location) {
        if (markerx) {
            //if marker already was created change positon
            markerx.setPosition(location);
            document.getElementById("latitud").value = location.lat();
            document.getElementById("longitud").value = location.lng();
        } 
    }
</script>
@endsection
