<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <style>
            #Navbar{
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: #333;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                font-family: Trebuchet MS;
                }
            #Navbar li{float:left}
            #Navbar li a{
                display: block;
                color: white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }
            
            #Navbar li a:hover:not(.active), .dropdown:hover {
                background-color: #111;
                }
            
            #Navbar .active{
                background-color: #4CAF50;
                }
                
            li .dropdown{display: inline-block; color: red}
            
            .dropcontent{
                float: right;
                margin: 0;
                display: none;
                position: fixed;
                width: 160px;
                right: 0px;
                text-align: center;
                background-color: #333;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
/*                z-index: 1;*/
                }
                
            .dropcontent a{
                padding: 5px 4px;
                text-decoration: none;
                text-align: center;
                display: block;
                text-align: left;
                z-index: 1;
                }
                
            .dropdown:hover .dropcontent {
                display: block;
                }
        </style>
        <title></title>
    </head>
    <body>
        <ul id="Navbar">
            <li><a href="/Liceo/MenuPrincipal.php">Home</a></li>
            <li><a href="/Liceo/Alumnos.php">Añadir Alumno</a></li>
            <li><a href="/Liceo/ListarAlumnos.php">Listado</a></li>
            <li><a href="/Liceo/Buscar.php">Buscar</a></li>
            <li class="dropdown" style="float: right"><a href="#" class="dropbtn">Usuario</a>
                <div class="dropcontent">
                    <a href="#">Cerrar Sesión</a>
                </div>
            </li>
        </ul>
    </body>
</html>
