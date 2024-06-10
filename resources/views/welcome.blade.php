<!DOCTYPE html> 
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> 
    <head> 
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <title>Laravel</title> 
        <!-- Fonts --> 
        <link rel="preconnect" href="https://fonts.bunny.net"> 
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /> 
    <!-- Styles --> 
    <style> 
        * { 
            margin: 0; 
            padding: 0; 
            font-family: 'Poppins', sans-serif; 
            box-sizing: border-box; 
        } 
        body { 
            background: url("https://ieslasalle.edu.pe/portal/wp-content/uploads/2022/11/ImagenVision1.jpeg") no-repeat; 
            background-size: cover; /* Ajusta la imagen para cubrir toda el área del fondo */ 
        } 
        .container { 
            padding: 10px 10%; 
             
             
        } 
        nav { 
            display: flex; 
            align-items: center; 
            justify-content: space-between; 
            flex-wrap: wrap; 
        } 
        /* Estilos previos */ 
        .boton-ingresar { 
            position: fixed; /* Posicionamiento fijo para mantener el botón en una ubicación específica en la ventana del navegador */ 
            left: 150px; /* Posición a 20px del borde izquierdo de la ventana */ 
            top: 75%; /* Desciende el botón hasta un 60% de la altura de la pantalla */ 
            transform: translateY(-50%); /* Centrar verticalmente el botón */ 
            color: #fff; /* Texto negro */ 
            padding: 10px 20px; /* Relleno del botón */ 
            font-size: 30px; /* Tamaño del texto */ 
            cursor: pointer; /* Cambiar cursor al pasar el mouse */ 
        } 
        .logo { 
            width: 140px; 
        } 
        nav ul { 
            list-style: none; 
            display: flex; 
            align-items: center; 
        } 
        nav ul li { 
            margin: 10px 20px; 
        } 
        nav ul li a { 
            color: #fff; 
            text-decoration: none; 
            font-size: 18px; 
            position: relative; 
        } 
        nav ul li a::after { 
            content: ''; 
            width: 0; 
            height: 3px; 
            background: #ff004f; 
            position: absolute; 
            left: 0; 
            bottom: -6px; 
            transition: 0.5s; 
        } 
        nav ul li a:hover::after { 
            width: 100%; 
        } 
        .header-text { 
            margin-top: 20%; 
            font-size: 30px; 
        } 
        .header-text h1 { 
            font-size: 60px; 
            margin-top: 20px; 
        } 

        .header-text h1 span { 
            color: #ff004f; 
        } 
 
        /* Mobile Navigation Styles */ 
        @media screen and (max-width: 768px) { 
            nav ul { 
                display: none; 
                width: 100%; 
                flex-direction: column; 
                align-items: center; 
                position: absolute; 
                top: 60px; 
                left: 0; 
                background: #080808; 
            } 
 
            nav ul.show { 
                display: flex; 
            } 
 
            nav ul li { 
                margin: 10px 0; 
            } 
 
            .fas.fa-bars, 
            .fas.fa-times { 
                display: block; 
                cursor: pointer; 
            } 
 
            .fas.fa-times { 
                display: none; 
                position: absolute; 
                top: 20px; 
                right: 20px; 
            } 
        } 
    </style> 
</head> 
<body class="antialiased"> 
    <div class="container"> 
        <nav> 
               <!-- <img src="path/to/your/logo.png" class="logo" alt="Logo"> --> 
            <ul> 
                <li><a href="#">Inicio</a></li> 
                <li><a href="#">Portafolio</a></li> 
                <li><a href="#">Acerca de</a></li> 
                <li><a href="#">Contactos</a></li> 
                <li><a href="#">Ayuda</a></li>
</ul> 
            <i class="fas fa-times"></i> 
            <i class="fas fa-bars"></i> 
        </nav> 
 
        <div class="header-text"> 
    <p>LA SALLE URUBAMBA</p> 
    <h1>Sistema para <span>la Emisión</span><br>de Recibos</h1> 
</div> 
 
<div> 
    @if (Route::has('login')) 
        <div > 
            @auth 
                 <a href="{{ route('login') }}" class="boton-ingresar">INGRESAR</a> 
            @else 
                <a href="{{ route('login') }}" class="boton-ingresar"><B>INGRESAR</B></a> 
            @endauth 
        </div> 
    @endif 
</div> 

<div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
</div>
 
    <script> 
        // JavaScript for handling the mobile navigation menu 
        document.querySelector('.fas.fa-bars').addEventListener('click', function () { 
            document.querySelector('nav ul').classList.toggle('show'); 
        }); 
 
        document.querySelector('.fas.fa-times').addEventListener('click', function () { 
            document.querySelector('nav ul').classList.remove('show'); 
        }); 
    </script> 
</body> 
</html>
