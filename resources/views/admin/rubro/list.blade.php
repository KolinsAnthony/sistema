<div class="card">
    <div class="card-header">
        <h3 class="card-title">Resultado de búsqueda</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                   
                    <th>N⁰</th>
                    <th>Rubro</th>
                    <th>Monto</th>
                    <th>Opciones</th>
                    
                    

                    
                </tr>
            </thead>
            <tbody>
                @foreach ($listado as $item)
                    <tr>
                       
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nombre_rubro }}</td>
                        <td>{{ $item->monto }}</td>
                        <td class="text-center">
                            <button onclick="modalEditar({{ $item->id }})" class="btn btn-warning">Editar</button>
                            <button onclick="confirmarEliminar({{ $item->id }})"
                                class="btn btn-danger">Eliminar</button>
                        </td>
                @endforeach
            </tbody>
           
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
<script>
    $('#example2').DataTable({
        // "paging": true,
        // "lengthChange": false,
        // "searching": false,
        // "ordering": true,
        // "info": true,
        // "autoWidth": false,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
        },
        "responsive": true,
        "columnDefs": [{
            targets: 1,
            orderable: false,
            searchable: false
        }]
    });
</script>
