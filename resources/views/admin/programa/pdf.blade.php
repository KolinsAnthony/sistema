<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Programas</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            font-size: 12px;
            text-align: center;
        }

        header {
            background-color: #f0f0f0;
            padding: 10px;
        }

        header table {
            width: 100%;
            margin: 0 auto;
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
            margin: 20px auto; /* Centrar la ficha */
            max-width: 600px; /* Ancho máximo de la ficha */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
            max-width: 150px;
            word-wrap: break-word;
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
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    <header>
        <table>
            <tr>
                <td><img src="../img/sallelogo.png" alt="La Salle Logo" width="100px" height="45px"></td>
                <td>
                    <h3>Instituto de Educación Superior Tecnológico La Salle</h3>
                </td>
                <td><img src="../img/logositer.png" alt="Project Logo" width="90px" height="90px" style="border-radius: 50%;"></td>
            </tr>
            <tr>
                <td colspan="3">
                    <hr>
                </td>
            </tr>
        </table>
    </header>

    <section>
        <div class="card-body">
            <h2>LISTA DE PROGRAMAS DE ESTUDIO</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cod Programa</th>
                        <th>Nombre Programa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($programas as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->programa }}</td>
                        <td>{{ $item->nombre_programa }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Cod Programa</th>
                        <th>Nombre Programa</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>

    <footer>
        <p>Responsable de Sistema de Información ISER SCR 2023 Joel & Kolins</p>
    </footer>
</body>

</html>

