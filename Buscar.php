<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="stilo.css" media="screen" />
        <title>Buscador</title>
        <script>
            function showHint(str) {
            if (str.length == 0) { 
                document.getElementById("txtHint").innerHTML = "";
                return;
                }
                else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "ArrayCoso.php?q=" + str, true);
                xmlhttp.send();
            }
            }
        </script>
    </head>
    <?php
    error_reporting(0);
    $clavebusqueda=$_POST['txtWordClave'];
    $catbusqueda=$_POST['selCategoria'];
    include 'Menu.php';
    ?>
    <body>
        <header id="titulin"><h1>Buscar</h1></header>
        <section>
            <form name="BuscaAlumno" method="POST" action="Buscar.php">
                <table id="tablaingreso" border="0" cellpadding="0" cellspacing="0" align="center">
                    <tr>
                        <td width="200">Ingrese Palabra Clave</td>
                        <td width="250"><input type="text" name="txtWordClave" onkeyup="showHint(this.value)"/></td>
                    </tr>
                    <tr>
                        <td width="200">Buscar Por:</td>
                        <td width="250">
                            <select name="selCategoria">
                                <option value="Apellido"> Apellido</option>
                                <option value="Colegio"> Escuela</option>
                                <option value="Comuna"> Ciudad</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="200">Sugerencia:</td>
                        <td width="200"><span id="txtHint"></span></td>
                    </tr>
                    <tr>
                        <td width="200"></td>
                        <td width="250"><button type="submit" name="submit" value="Enviar"><span>Buscar</span></button></td>
                    </tr>
                </table>
            </form>
        </section>
        <?php
        if(!empty($clavebusqueda)){
        $conn = new mysqli('localhost', 'guayo2', 'hocicuda89', 'liceo');
        
        if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                        } 
                        
                
        //Variables paginacion
        $consulta = "SELECT Nombre, Apellido, Rut, Colegio, Comuna, FechaNac, Apoderado FROM alumno WHERE ".$catbusqueda." = '".$clavebusqueda."'";
        $rs = $conn->query($consulta);
        $numero_filas = $rs->num_rows;
            
        $ptotal=10; //total de filas por paginas
        $num_paginas=ceil($numero_filas/$ptotal);
        if (isset($_GET["pagina"]))
            $pagina = $_GET["pagina"];
            else{
                $pagina=1;
                $pinicio=0;
            }
        
        $pinicio=($pagina-1)*$ptotal;
        $sql = "SELECT * FROM alumno WHERE ".$catbusqueda." = '".$clavebusqueda."' LIMIT ".$pinicio."," .$ptotal;
//        $sql = "SELECT Nombre, Apellido, Rut, Colegio, Comuna, FechaNac, Apoderado FROM alumno WHERE '$catbusqueda' = '$clavebusqueda' ORDER BY Apellido LIMIT ".$pinicio."," .$ptotal;
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0){
            echo '<table id="listado" align="center"><tr><th width="200">Nombre</th><th width="200">Apellido</th><th>Rut</th><th width="200">Colegio</th><th width="80">Comuna</th><th>Fecha Nac.</th>.'
            . '<th width="200">Apoderado</th><th>Promedio</th><th>Puntaje</th>';
            echo '<tr><td width="200">'.$row["Nombre"].'</td><td width="200">'.$row["Apellido"].'</td><td>'.$row["Rut"].'</td><td width="200">'.$row["Colegio"].
            '</td><td width="80">'.$row["Comuna"].'</td><td>'.$row["FechaNac"].'</td><td>'.$row["Promedio"].'</td><td>'.$row["PtjeFinal"].'</td></tr>';}
            echo'</table>';
        }
        else{
            echo 'No se encontraron resultados<br>';
        }
        $url='http://localhost/Liceo/Buscar.php';
        
        //Mostrar paginación
        if($num_paginas>1){
            echo '<ul class="paginacion">';
            if($pagina != 1)
                 echo '<li><a href="'.$url.'?pagina='.($pagina-1).'"><</a></li>';
            for($i=1;$i<=$num_paginas;$i++){
                if($pagina==$i)
                    echo '<li class="selected">'.$pagina.'</li>';
                else {
                    echo '<li><a href="'.$url.'?pagina='.$i.'">'.$i.'</a></li>';
                }
            }
            if($pagina != $num_paginas)
                echo '<li><a href="'.$url.'?pagina='.($pagina+1).'">></a></li>';
            
            
            echo '</ul>';
        }

        
else{
echo 'nada';}// put your code here
        ?>
    </body>
</html>
