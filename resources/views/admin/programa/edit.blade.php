<div class="modal-header">
    <h4 class="modal-title">Editar Programa</h4>
</div>
<form action="" id="formulario-editar" autocomplete="off">
    @method('PUT')
    <div class="modal-body">
    <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="programa">Programa:</label>
            <div class="col-sm-8">
                <input type="text" name="programa" id="programa" class="form-control" value="{{ $item->programa}}" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="nombre_programa">Nombre Programa:</label>
            <div class="col-sm-8">
                <input type="text" name="nombre_programa" id="nombre_programa" class="form-control" value="{{ $item->nombre_programa }}" />
            </div>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Cerrar</button>
        <button id="btn-submit" type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Actualizar</button>
    </div>
</form>
<script>
    document.getElementById("formulario-editar").addEventListener('submit', function(evento) {
        evento.preventDefault();
        // Suponiendo que $item->id es un valor de PHP que se debe pasar a la función actualizar
        actualizar({{ $item->id }});
    });
</script>