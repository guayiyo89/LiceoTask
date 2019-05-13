<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $conn = mysqli_connect("localhost", "guayo2", "hocicuda89", "liceo");
        
        if (mysqli_connect_errno()) {
                        echo "Connection failed: " .mysqli_connect_error();
                        }
        $consult="SELECT Apellido FROM alumno ORDER BY Apellido ASC";
        $rs = mysqli_query($conn,$consult);
        $num_filas = mysqli_num_rows($rs);
        $array=[];
        
        for($i=0; $i <= $num_filas; $i++){
        $fila = mysqli_fetch_array($rs,MYSQLI_ASSOC);
        $array[$i]=$fila["Apellido"];
        }
        mysqli_free_result($rs);
        
        mysqli_close($conn);
        
        
        $q = $_REQUEST["q"];

        $hint = "";

        // lookup all hints from array if $q is different from "" 
        if ($q !== "") {
            $q = strtolower($q);
            $len=strlen($q);
            foreach($array as $name) {
                if (stristr($q, substr($name, 0, $len))) {
                    if ($hint === "") {
                        $hint = $name;
                    } else {
                        $hint .= ", $name";
                    }
                }
            }
        }

        // Output "no suggestion" if no hint was found or output correct values 
        echo $hint === "" ? "Sin Sugerencias" : $hint;
        ?>
    </body>
</html>
