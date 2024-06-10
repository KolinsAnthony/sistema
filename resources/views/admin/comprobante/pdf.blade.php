<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprobantes</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            font-size: 12px; /* Tamaño de letra reducido */
        }

        header {
            background-color: #f0f0f0;
            padding: 10px;
            text-align: center;
        }

        header table {
            width: 100%;
        }

        header img {
            max-width: 100%;
            height: auto;
        }

        header hr {
            border: 1px solid #333;
            margin: 10px 0;
        }

        section {
            margin: 20px;
        }

        .card-body {
            border: 1px solid #000;
            padding: 10px;
            margin-left: 1px;
            overflow-x: auto; /* Para manejar tablas grandes en A4 */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
            max-width: 150px; /* Tamaño máximo para los campos */
            word-wrap: break-word; /* Permitir que las palabras largas se dividan en varias líneas */
        }

        th {
            background-color: #f2f2f2;
        }

        tfoot {
            font-weight: bold;
        }

        footer {
            text-align: center;
            margin-top: 10px;
            padding: 10px;
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <header>
    <table>
        <tr>
            <td><img src="../img/sallelogo.png" alt="La Salle Logo" width="100px" height="45px"></td>
            <td><h3>Instituto de Educación Superior Tecnológico La Salle</h3></td>
            <td><img src="../img/logositer.png" alt="Project Logo" width="90px" height="90px" style="border-radius: 50%;"></td>
        </tr>
        <tr>
            <td colspan="3"><hr></td>
        </tr>
    </table>
         <hr>
    </header>
    <section>
        <div class="container">
            <div class="card-body">
                <h2 style="text-align: center;">Lista de Recibos</h2>
                <table>            
                    <thead>
                        <tr>
                        <th>N°</th>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Semestre</th>
                        <th>Rubro</th>
                        <th>Programa</th>
                        <th>Área</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Monto</th>
                                           
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($comprobante as $item)
                    <tr>
                        <td>{{ $item->id}}</td>
                        <td>{{ $item->dni}}</td>
                        <td>{{ $item->nombre}}</td>
                        <td>{{ $item->apellido}}</td>
                        <td>{{ $item->semestre}}</td>
                        <td>{{ $item->nombre_rubro}}</td>
                        <td>{{ $item->programa}}</td>
                        <td>{{ $item->nombre_area}}</td>
                        <td>{{ $item->fecha}}</td>
                        <td>{{ $item->estado}}</td>
                        <td>{{ $item->monto}}</td>

                        </td>
                    </tr>
                @endforeach
                    </tbody>
                </table>
            </div>
            <div class="footer-text">
                <hr>
                <p>Responsable de Sistema de Información ISER SCR 2023 Joel & Kolins</p>
            </div>
        </div>
    </section>
</body>
</html>