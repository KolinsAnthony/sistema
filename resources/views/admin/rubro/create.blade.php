<div class="modal-header">
    <h4 class="modal-title">Registrar Rubro</h4>
</div>
<form action="" id="formulario-crear" autocomplete="off">
    <div class="modal-body">
    
    <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="nombre_rubro">Rubro:</label>
            <div class="col-sm-8">
                <input type="text" name="nombre_rubro" id="nombre_rubro" class="form-control" />
            </div>
    </div>
    <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="monto">Monto:</label>
            <div class="col-sm-8">
                <input type="text" name="monto" id="monto" class="form-control" />
            </div>
    </div>
         
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Cerrar
        </button>
        <button id="btn-submit" type="submit" class="btn btn-primary"><i class="fas fa-save"></i>
            Registrar</button>
    </div>
</form>
<script>
    document.getElementById("formulario-crear").addEventListener('submit', function(evento) {
        evento.preventDefault();
        guardar();
    });
</script>
