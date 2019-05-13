<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Menu Principal</title>
        <link href='http://fonts.googleapis.com/css?family=Terminal+Dosis' rel='stylesheet' type='text/css' />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="stilo.css" media="screen" />
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <ul class="ca-menu">
	<li>
            <a href="/Liceo/Alumnos.php">
			<span class="material-icons">&#xe85e;</span>
			<div class="ca-content">
				<h2 class="ca-main">Añadir<br>Alumno</h2>
			</div>
		</a>
        </li>
        <li>
                <a href="/Liceo/ListarAlumnos.php">
			<span class="material-icons">list</span>
			<div class="ca-content">
				<h2 class="ca-main">Listado</h2>
			</div>
		</a>
        </li>
        <li>
                <a href="/Liceo/Buscar.php">
			<span class="material-icons">search</span>
			<div class="ca-content">
				<h2 class="ca-main">Buscar<br>Alumnos</h2>
			</div>
		</a>
	</li>
        <li>
                <a href="#">
			<span class="material-icons">power_settings_new</span>
			<div class="ca-content">
				<h2 class="ca-main">Cerrar<br>Sesión</h2>
			</div>
		</a>
	</li>
        </ul>
    </body>
</html>
