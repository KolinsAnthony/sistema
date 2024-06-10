<div class="modal-header">
    <h4 class="modal-title"><Em>Emitir Boleta</Em></h4>
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
            <select name="semestre" id="semestre" class="form-control">
                <option value="">[------Seleccione el semestre ------]</option>
                <option value="I">I</option>
                <option value="II">II</option>
                <option value="III">III</option>
                <option value="IV">IV</option>
                <option value="V">V</option>
                <option value="VI">VI</option>
                <option value="VII">VII</option>
                <option value="VIII">VIII</option>
                <option value="IX">IX</option>
                <option value="X">X</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="programa">Programa:</label>
        <div class="col-sm-8">
            <input type="text" name="programa" id="programa" class="form-control" />
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="nombre_rubro">Rubro:</label>
        <div class="col-sm-8"> 
            <select name="nombre_rubro" id="nombre_rubro" class="form-control">
                <option value="">[------Seleccione el Tipo de Rubro------]</option>
                <option value="Alquileres">Alquileres</option>
                <option value="Autenticar Título / Certificado de Estudios">Autenticar Título / Certificado de Estudios</option>
                <option value="Certificado de Estudios">Certificado de Estudios</option>
                <option value="Constancia / Certificado">Constancia / Certificado</option>
                <option value="Cursos de Subsanación">Cursos de Subsanación</option>
                <option value="Fotocopia / Impresiones">Fotocopia / Impresiones</option>
                <option value="Inscripción de Postulantes">Inscripción de Postulantes</option>
                <option value="Matricula">Matrícula</option>
                <option value="Nivelación Academica">Nivelación Académica</option>
                <option value="Otros">Otros</option>
                <option value="Practicas Profesionales">Prácticas Profesionales</option>
                <option value="Sílabus">Sílabus</option>
                <option value="Titulación">Titulación</option>
                <option value="Traslados Internos o Externos">Traslados Internos o Externos</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="nombre_area">Area:</label>
        <div class="col-sm-8"> 
            <select name="nombre_area" id="nombre_area" class="form-control">
                <option value="">[------Seleccione el Área ------]</option>
                <option value="Pedagogico">Pedagógico</option>
                <option value="Tecnologico">Tecnológico</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="fecha">Fecha</label>
        <div class="col-sm-8">
            <input type="text" name="fecha" id="fecha" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly />
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="estado">Estado:</label>
        <div class="col-sm-8"> 
            <select name="estado" id="estado" class="form-control">
                <option value="">[------Seleccione el Estado ------]</option>
                <option value="PAGADO">PAGADO</option>
                <option value="NO PAGADO">NO PAGADO</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="monto">Monto:</label>
        <div class="col-sm-8">
            <input type="text" name="monto" id="monto" class="form-control" />
        </div>
    </div>

</form>

    
   

         
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
