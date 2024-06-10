<div class="modal-header">
    <h4 class="modal-title">Registrar Programa</h4>
</div>
<form action="" id="formulario-crear" autocomplete="off">
    <div class="modal-body">
   
    <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="programa">Programa:</label>
            <div class="col-sm-8">
                <input type="text" name="programa" id="programa" class="form-control" />
            </div>
            </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="nombre_programa">Nombre Programa:</label>
            <div class="col-sm-8">
                <input type="text" name="nombre_programa" id="nombre_programa" class="form-control" />
            </div>
        
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Cerrar
        </button>
        <button id="btn-submit" type="submit" class="btn btn-primary"><i class="fas fa-save"></i>
            Registrar</button>
    </div>
</div>
</form>
<script>
    document.getElementById("formulario-crear").addEventListener('submit', function(evento) {
        evento.preventDefault();
        guardar();
    });
</script>
