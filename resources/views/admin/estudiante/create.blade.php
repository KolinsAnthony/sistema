<div class="modal-header">
    <h4 class="modal-title">Registrar Estudiante</h4>
</div>
<form action="" id="formulario-crear" autocomplete="off">
    <div class="modal-body">
    
    <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="dni">Dni:</label>
            <div class="col-sm-8">
                <input type="text" name="dni" id="dni" class="form-control" />
            </div>
    </div>
    
    <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="nombre">Nombre:</label>
            <div class="col-sm-8">
                <input type="text" name="nombre" id="nombre" class="form-control" />
            </div>
    </div>
    <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="apellido">Apellido:</label>
            <div class="col-sm-8">
                <input type="text" name="apellido" id="apellido" class="form-control" />
            </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="semestre">Semestre:</label>
        <div class="col-sm-8"> 
            <select  name="semestre" id="semestre" class="form-control">
            <option value="semestre">[------Seleccioner Semestre-------]</option>
            <option value="I">Semestre-I</option>
            <option value="II">Semestre-II</option>
            <option value="III">Semestre-III</option>
            <option value="IV">Semestre-IV</option>
            <option value="VI">Semestre-VI</option>
            <option value="VII">Semestre-VII</option>
            <option value="VIII">Semestre-VIII</option>
            <option value="IX">Semestre-IX</option>
            <option value="X">Semestre-X</option>
            </select>


        </div>
</div>



<div class="form-group row">
        <label class="col-sm-4 col-form-label" for="programa">programa:</label>
        <div class="col-sm-8"> 
            <select  name="programa" id="programa" class="form-control">
            <option value="programa">[------Seleccioner Semestre-------]</option>
            <option value="DSI">DSI</option>
            <option value="CO">CO</option>
            <option value="GOT">GOT</option>
            <option value="ASH">ASH</option>
            <option value="ASHR">ASHR</option>
            <option value="PA">PA</option>
            <option value="IA">IA</option>
            <option value="EIB">EIB</option>
            <option value="EF">EF</option>
            <option value="CC">CC</option>
        </select>


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
