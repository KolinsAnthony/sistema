<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Resultado de búsqueda</h3>
            <details class="dropdown">
                <summary>Buscar por fecha</summary>
                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <label for="fechaInicio" class="col-form-label">Fecha de inicio:</label>
                        <input type="date" id="fechaInicio" class="form-control" style="margin-right: 10px;">
                    </div>
                    <div class="col-auto">
                        <label for="fechaFin" class="col-form-label">Fecha de fin:</label>
                        <input type="date" id="fechaFin" class="form-control" style="margin-right: 20px;">
                    </div>
                    <div class="col-auto">
                        <button id="sumaMontos" onclick="calcularSumaMontos()"  class="btn btn-primary">Calcular</button>
                    </div>
                </div>
            </details>
            <div class="total-registros">
                <h4 id="totalRegistros" class="mb-0">Matriculados: </h4>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Dni</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Semestre</th>
                    <th>Programa</th>
                    <th>Rubro</th>
                    <th>Area</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Monto</th>
                    <th>boleta</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listado as $item)
                <tr>        
                    <td>{{ $item->dni}}</td>
                    <td>{{ $item->nombre}}</td>
                    <td>{{ $item->semestre}}</td>
                    <td>{{ $item->apellido}}</td>
                    <td>{{ $item->programa}}</td>
                    <td>{{ $item->nombre_rubro}}</td>
                    <td>{{ $item->nombre_area}}</td>
                    <td>{{ $item->fecha}}</td>                
                    <td>{{ $item->estado}}</td>
                    <td>{{ $item->monto}}</td>
                    <td class="text-center">
                        <button onclick="exportarComprobante({{ $item->id }})" class="btn btn-success">Comprobante</button>             
                    </td>
                    <td class="text-center">
                        <button onclick="modalEditar({{ $item->id }})" class="btn btn-warning">Editar</button>
                        <button onclick="confirmarEliminar({{ $item->id }})" class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Script para calcular la suma de montos -->
<script>
    function calcularSumaMontos() {
        var suma = 0;
        var fechaInicio = new Date($('#fechaInicio').val());
        var fechaFin = new Date($('#fechaFin').val());

        $('#example2 tbody tr').each(function() {
            var monto = parseFloat($(this).find('td:eq(9)').text().replace(',', '.')); // Asegurando que se interpreta como número
            var fecha = new Date($(this).find('td:eq(7)').text());

            if (fecha >= fechaInicio && fecha <= fechaFin) {
                suma += monto;
            }
        });

        $('#sumaMontos').text('Total: ' + suma.toFixed(2));
    }
</script>

<script>
    $(document).ready(function() {
        contarRegistros();
    });

    function contarRegistros() {
        var totalRegistros = $('#example2 tbody tr').length;
        $('#totalRegistros').text('Matriculados: ' + totalRegistros);
    }
</script>

<!-- /.card -->
<script>
    $(document).ready(function() {
        $('#example2').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
            },
            "responsive": true,
            "columnDefs": [{
                targets: 3,
                orderable: false,
                searchable: false
            }]
        });
    });

    function exportarComprobante(id) {
        // Redirige a la ruta del controlador que genera el PDF individual
        window.open("{{ route('comprobante.pdf2', ['id' => ':id']) }}".replace(':id', id), '_blank');
    }
</script>
