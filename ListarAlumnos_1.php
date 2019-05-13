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
        <title>Listado de Alumnos</title>
    </head>
    <body>
        <?php
        include 'Menu.php';
        ?>
        <header id="titulin"><h1>Listado de Alumnos</h1></header>
        <?php
        
        
        $conn = new mysqli('localhost', 'guayo2', 'hocicuda89', 'liceo');
        
        if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                        } 
                        
                
        //Variables paginacion
        $consulta = "SELECT * FROM alumno";
        $rs = $conn->query($consulta);
        $numero_filas = $rs->num_rows;
            
        $ptotal=5; //total de filas por paginas
        $num_paginas=ceil($numero_filas/$ptotal);
        if (isset($_GET["pagina"]))
            $pagina = $_GET["pagina"];
            else{
                $pagina=1;
                $pinicio=0;
            }
        
        $pinicio=($pagina-1)*$ptotal;
        $sql = "SELECT * FROM alumno ORDER BY Apellido LIMIT ".$pinicio."," .$ptotal;
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0){
            echo '<table id="listado" align="center"><tr><th width="200">Nombre</th><th width="200">Apellido</th><th>Rut</th><th width="200">Colegio</th><th width="80">Comuna</th><th>Fecha Nac.</th><th>Apoderado</th></tr>';
            while($row = $result->fetch_assoc()) {
            echo '<tr><td width="200">'.$row["Nombre"].'</td><td width="200">'.$row["Apellido"].'</td><td>'.$row["Rut"].'</td><td width="200">'.$row["Colegio"].
            '</td><td width="80">'.$row["Comuna"].'</td><td>'.$row["FechaNac"].'</td><td>'.$row["Apoderado"].'</td><td>'.$row["PtjeFinal"].'</td></tr>';}
            echo'</table>';
        }
        else{
            echo 'No se encontraron resultados';
        }
        $url='http://localhost/Liceo/ListarAlumnos.php';
        
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
        
        ?>
    </body>
</html>
