<div class="modal-header">
    <h4 class="modal-title">Editar Rubro</h4>
</div>
<form action="" id="formulario-editar" autocomplete="off">
    @method('PUT')
    <div class="modal-body">
        
    </div>
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="nombre_rubro">Rubro:</label>
            <div class="col-sm-8">
                <input type="text" name="nombre_rubro" id="nombre_rubro" class="form-control" value="{{ $item->nombre_rubro }}" />
            </div>
        </div>
    </div>
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="nombre">Monto:</label>
            <div class="col-sm-8">
                <input type="text" name="monto" id="monto" class="form-control" value="{{ $item->monto }}" />
            </div>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Cerrar
        </button>
        <button id="btn-submit" type="submit" class="btn btn-primary"><i class="fas fa-save"></i>
            Actualizar</button>
    </div>
</form>
<script>
    document.getElementById("formulario-editar").addEventListener('submit', function(evento) {
        evento.preventDefault();
        actualizar({{ $item->id }});
    });
</script>