<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="stilo.css" media="screen" />
        <meta charset="UTF-8">
        <title>Alumnos Liceo</title>
    </head>
    <body>
        <?php   
                    error_reporting(0);
                    //Capturando Valores
                    $nombreAl=$_POST['nomAlumno'];
                    $apellidoAl=$_POST['apeAlumno'];
                    $colegio=$_POST['colegio'];
                    $comuna=$_POST['comuna'];
                    $rut=$_POST['Rut1'];
                    $fNac=$_POST['fechaNac'];
                    $apoderado=$_POST['apoderado'];
                    $hermanos=$_POST['hnos'];
                    $fono1movil=$_POST['fonomovil'];
                    $fono2=$_POST['fono2'];
                    $email=$_POST['email'];
                    $genero=$_POST['gender'];
                    $prom7=$_POST['prom7'];
                    $prom8=$_POST['prom8'];
                    
                    $promedio = ($prom7 + $prom8) / 2;
                    
                    //Validar fecha
                    $fecha=explode('/',$fNac);
                    $mes=$fecha[1];
                    $dia=$fecha[0];
                    $año=$fecha[2];
                    
                    //Funcion calculo de Rut
                    include 'Menu.php';
                    include ('Rut.php');
                    //Validando

                    $Alerta='*Campos Obligatorios';
                    $AlertaMsg='';
                    if(empty($nombreAl) || empty($apellidoAl) || empty($colegio) || empty($comuna) || empty($rut) || empty($email) || empty($fono1movil) || empty($fNac) || empty($apoderado) || empty($prom7) || empty($prom8)){
                    $AlertaMsg='Rellena todos los campos';
                    $Alerta='';
                    }
                    else{
                        $mName='';
                        if (!preg_match('/^[A-Z üÜáéíóúÁÉÍÓÚúñÑ]{1,100}$/i', $nombreAl))
                                $mName='Escribe correctamente';
                        $mName1='';
                        if (!preg_match('/^[A-Z üÜáéíóúÁÉÍÓÚúñÑ]{1,100}$/i', $apellidoAl))
                                $mName1='Escribe correctamente';
                        $mNumAlerta='';
                        if (!is_numeric($prom7) || !is_numeric($prom8) || $prom7 > 7 || $prom7 < 1 || $prom8 > 7 || $prom8 < 1)//Que carajo!
                            $mNumAlerta='Los valores deben estar entre 1.0 y 7.0';
//                        else
//                            $promedio = ($prom7 + $prom8) / 2;
                        $mGenero='';
                        if (empty($genero))
                            $mGenero='Selecciona una opción';
                        
                        // Valida Rut
                        $mRut='';
                        if (ValidaRut($rut)==FALSE)
                            $mRut='Inserte RUT valido';
                        
                        //Valida Correo
                        $mEmail='';
                        if (!preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9])+([a-zA-Z0-9\._-]+)+$/', $email))
                                $mEmail='Email incorrecto';
                        
                        $ptjefinal = $promedio;
                        if ($hermanos == 'true')
                            $ptjefinal = $promedio*1.05;
                        
                        //Valida Fecha
                        if (checkdate($mes,$dia,$año)){
                                $mFecha='';
                                $fNac = preg_replace('#(\d{2})/(\d{2})/(\d{4})#', '$3-$2-$1', $fNac);
                        }
                                else {
                                    $mFecha='Coloca una fecha válida en el formato correcto.';
                                }
                                
                    }
                    
                        
                        // value="<?php echo date_format($fNAc, "d/m/Y");

        ?>
        <header id="titulin"><h1>Inscripción de Alumnos</h1></header>
        <section id="Alerta"><span class="error"><?php echo $AlertaMsg ?></span></section>
        <section id="Mensaje"><span class="alerta"><?php echo $Alerta ?></span></section>
        <section>
            <form name="FrmAlumno" method="POST" action="Alumnos.php">
                <table id="tablaingreso" border="0" cellpadding="0" cellspacing="0" align="center">
                <tr>
                <td width="200">Nombre*</td>
                <td width="200"><input type="text" name="nomAlumno"/></td>
                <td width="200"><span class="error"><?php echo $mName; ?></span></td>
                </tr>
                <tr>
                <td width="200">Apellido*</td>
                <td width="200"><input type="text" name="apeAlumno"/></td>
                <td width="200"><span class="error"><?php echo $mName1; ?></span></td>
                </tr>
                <tr>
                <td width="200">Rut* <span class="msg">(Sin puntos; con guión)</span></td>
                <td width="200"><input type="text" name="Rut1" placeholder="12345678-9"/></td>
                <td width="200"><span class="error"><?php echo $mRut; ?></span></td>
                </tr>
                <tr>
                <td width="200">Colegio*</td>
                <td width="200"><input type="text" name="colegio"/></td>
                </tr>
                <tr>
                <td width="200">Comuna*</td>
                <td width="200"><input type="text" name="comuna"/></td>
                </tr>
                <tr>
                <td width="200">Fecha Nacimiento*</td>
                <td width="200"><input type="text" name="fechaNac" placeholder="dd/mm/yyyy"/></td>
                <td width="200"><span class="error"><?php echo $mFecha; ?></span></td>
                </tr>
                <tr>
                <td width="200">Apoderado*</td>
                <td width="200"><input type="text" name="apoderado"/></td>
                </tr>
                <tr>
                <td width="200">Tiene hermanos?</td>
                <td width="200"><input type="checkbox" name="hnos" value="true"/></td>
                </tr>
                <tr>
                <td width="200">E-Mail*</td>
                <td width="200"><input type="text" name="email" placeholder="usuario@dominio"/></td>
                <td width="200"><span class="error"><?php echo $mEmail; ?></span></td>
                </tr>
                <tr>
                <td width="200">Telefono Movil*</td>
                <td width="200"><input type="text" name="fonomovil"/></td>
                <td width="200"><span class="error"><?php echo $mNumAlerta; ?></span></td>
                </tr>
                <tr>
                <td width="200">Telefono</td>
                <td width="200"><input type="text" name="fono2"/></td>
                </tr>
                <tr>
                <td width="200">Promedio Septimo*<br><span class="msg">Formato 1.0 al 7.0</span></td>
                <td width="200"><input type="text" name="prom7" size="3"/></td>
                <td width="200"><span class="error"><?php echo $mNumAlerta; ?></span></td>
                </tr>
                <tr>
                <td width="200">Promedio Octavo*<br><span class="msg">Formato 1.0 al 7.0</span></td>
                <td width="200"><input type="text" name="prom8" size="3"/></td>
                <td width="200"><span class="error"><?php echo $mNumAlerta; ?></span></td>
                </tr>
                <tr>
                <td width="200">Género*</td>
                <td width="200"><input type="radio" name="gender" value="F">Femenino
                    <input type="radio" name="gender" value="M">Masculino</td>
                <td width="200"><span class="error"><?php echo $mGenero; ?></span></td>
                </tr>
                <tr>
                <td width="200"></td>
                <td width="200"><button type="submit" name="submit" value="Enviar"><span>Enviar Datos</span></button></td>
                </tr>
                <tr>
                    <td><h3>Datos Ingresados</h3></td>
                    <td>
                        <?php
//                        echo $nombreAl; echo '<br>';
//                        echo $apellidoAl; echo '<br>';
//                        echo $colegio; echo '<br>';
//                        echo $fNac; echo '<br>';
//                        echo $promedio; echo '<br>';// put your code here
                        if ($mName == '' && $mName1 == '' && $mFecha == '' && $mNumAlerta == '' && $AlertaMsg == '' && $mGenero == '' && $mRut == '' && $mEmail == '')
                        {
                        echo 'Los datos fueron ingresados correctamente'; echo '<br>';
                        echo $nombreAl .'<br>';
                        echo $apellidoAl .'<br>';
                        echo $colegio .'<br>';
                        echo $rut. '<br>';
                        echo $comuna .'<br>';
                        echo $fNac .'<br>';
                        echo $promedio .'<br>';
                        
                        $conn = new mysqli('localhost', 'guayo2', 'hocicuda89', 'liceo');
                        
                        if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                        } 
                        
                        $sql = "INSERT INTO `alumno`(`Nombre`, `Apellido`, `Rut`, `Colegio`, `Comuna`, `FechaNac`, `Genero`, `Apoderado`, `Email`, `Fono1`, `Fono2`, `Prom7`, `Prom8`, `Promedio`, `PtjeFinal`) "
                                . "VALUES ('$nombreAl', '$apellidoAl', '$rut', '$colegio', '$comuna', '$fNac', '$genero', '$apoderado', '$email', '$fono1movil', '$fono2', '$prom7', '$prom8', '$promedio', '$ptjefinal')";
                        
                        //mysqli_query($mysqli, "INSERT INTO `alumno`(`Nombre`, `Apellido`, `Colegio`, `Comuna`, `FechaNac`, `Genero`, `Prom7`, `Prom8`, `Promedio`) VALUES ('$nombreAl', '$apellidoAl', '$colegio', '$comuna', '$fNac', '$genero', '$prom7', '$prom8', '$promedio)");
                        //INSERT INTO `alumno`(`Nombre`, `Apellido`, `Colegio`, `Comuna`, `FechaNac`, `Genero`, `Prom7`, `Prom8`, `Promedio`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])
                        if ($conn -> query($sql) === TRUE)
                            echo "Oh Yeah";
                        else {
                            echo "Error" . $sql . "<br>" . $conn->error;
                        }
                        $conn->close();
                        //(Nombre, Apellido, Colegio, Comuna, FechaNAc, Genero, Prom7, Prom8, Promedio) 
                        }
                        else { echo 'error';}
                        ?>
                    </td>
                </tr>
                </table>
            </form>
        </section>
     
    </body>
</html>
