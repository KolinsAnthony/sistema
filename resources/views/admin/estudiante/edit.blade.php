<div class="modal-header">
    <h4 class="modal-title">Editar Estudiante</h4>
</div>
<form action="" id="formulario-editar" autocomplete="off">
    @method('PUT')
    <div class="modal-body">
        <div class="form-group row">
            
            <div class="col-sm-8">
                
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-6 col-form-label" for="dni">Dni:</label>
            <div class="col-sm-8">
                <input type="text" name="dni" id="dni" class="form-control" value="{{ $item->dni}}" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-6 col-form-label" for="nombre">Nombre:</label>
            <div class="col-sm-8">
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $item->nombre}}" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-6 col-form-label" for="apellido">Apellido:</label>
            <div class="col-sm-8">
                <input type="text" name="apellido" id="apellido" class="form-control" value="{{ $item->apellido}}" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-6 col-form-label" for="semestre">Semestre:</label>
            <div class="col-sm-8">
                <input type="text" name="semestre" id="semestre" class="form-control" value="{{ $item->semestre}}" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-6 col-form-label" for="programa">Programa:</label>
            <div class="col-sm-8">
                <input type="text" name="programa" id="programa" class="form-control" value="{{ $item->programa}}" />
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
