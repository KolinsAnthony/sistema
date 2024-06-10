<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ISER_SCR_PROYECTO</title>
    <link rel="viewport" href="../resources/views/dist/css/adminlte.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="../resources/views/dist/css/adminlte.css">
</head>




<body>


<header class="header">
    <nav class="navbar">
        <a href="#">Inicio</a>
        <a href="#">Portafolio</a>
          <a href="#">Acerca de</a>
          <a href="#">Contactos</a>
          <a href="#">Ayuda</a>
    </nav>
    <form action="" class="search-bar">
       <input type="text" placeholder="Buscar">
       <button><i class='bx bx-search'></i></button>
    </form>
   </header>
    <!-- LOGIN FORM CREATION -->
    <div class="background"></div>
    <div class="container">
        <div class="item">
            <img src="../img/logositer.png" width="100px" height="100px" style="border-radius: 50%;">
            <h1 style="margin-top: -150px; color: black;">&nbsp;SITER</h1>
            <div class="text-item">
                <h2>                        <br><span>
					
					
                    "Sistema para la Emisión de Recibos"
                </span></h2>
                <p>                                 </p>
                <div class="social-icon">
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-twitter'></i></a>
                    <a href="#"><i class='bx bxl-youtube'></i></a>
                    <a href="#"><i class='bx bxl-instagram'></i></a>
                    <a href="#"><i class='bx bxl-linkedin'></i></a>
                </div>
            </div>
        </div>
        <div class="login-section">
            <div class="form-box login">










            
<form method="POST" action="{{ route('login') }}">
@csrf

      




			<div class="input-box">
            
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                 <label>Usuario</label>
                <i></i>
			</div>


			<div class="input-box">
            

                <x-text-input id="password" 
                type="password"
                name="password"
                required autocomplete="current-password" />

                  <x-input-error :messages="$errors->get('password')" class="mt-2" />
                  <label>Contraseña</label>
                  <i></i>
 			</div>
			
            <br>
            <br>
			<input class="btn"type="submit"  value="Iniciar Sesion" >
            </form>     
            </div>
          



        </div>
	</div>
    </form>
    <body>


