<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Estudiantes</title>
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
</header>
    <section>
        <div class="container">
            <div class="card-body">
                <h2 style="text-align: center;">Lista de Usuarios</h2>
                <table>            
                    <thead>
                        <tr>
                            
                            <th>Nombre de usuario</th>
                            <th>Email</th>
            
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($usuarios as $item)
                    <tr>
                       
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        
                    </tr>
                @endforeach

                    </tbody>
                </table>
            </div>
            <footer>
                    <p>Responsable de Sistema de Información ISER SCR 2023 Joel & Kolins</p>
            </footer>
        </div>
    </section>
</body>
</html>