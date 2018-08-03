<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-documento-{{ $prop->propiedadid }}">
    <?php
    $imagenes = $imagenes->where('propiedadid', '=', $prop->propiedadid)
    ?>

    {!!Form::open(array('url'=>'/DocumentosEntregados', 'method'=>'POST', 'autocomplete'=>'off', 'files' => true))!!}
    {{Form::token()}}
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Entrega documento</h4>
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
                        <div class="col-sm-12">
                            <input type="hidden" value="{{ $prop->propiedadid }}" value="propiedadid" name="propiedadid">
                            <div class="form-group">
                                <select name="documento" id="documento" class="form-control">
                                    @foreach ($documentos as $doc)
                                        <option value="{{ $doc->documentoid }}">{{$doc->documento }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="documento">Documento</label>
                                {{  Form::file('documento', ['id'=>'documento']) }}
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