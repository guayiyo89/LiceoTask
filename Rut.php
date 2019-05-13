
        <?php
        function ValidaRut($unRut) {
            $nRut =  explode('-', $unRut);
            $numerosRut = $nRut[0];
            $dgVerificador = $nRut [1];
            
            $largoRut = strlen($numerosRut);
            
            $serie = [2, 3, 4, 5, 6, 7, 2];
            
            $inversoRut = strrev($numerosRut);
            
            //echo 'Su Rut Inverso es: ' .$inversoRut .'<br>';
            //echo 'Su vdigit es: ' .$dgVerificador .'<br>';
            //echo $largoRut .'<br>La wea es<br>';
            
            if($largoRut==8)
                $serie[7] = 3;
            
            $serieNueva = implode($serie);
            $suma=0;
            
            for($i=0; $i < $largoRut; $i++){
                $verifica[$i] = $inversoRut[$i]*$serieNueva[$i];
                //echo $verifica[$i] .'<br>';
                $suma=$suma+$verifica[$i];    
            }
            $restoRut = $suma % 11;
            $compRut = 11-$restoRut;
            //echo 'La suma es: ' .$suma .'<br>';
            //echo 'El resto es '.$restoRut .'<br>';
            //echo 'El vdigit comprobado es '.$compRut .'<br>';
            if($compRut==11)
                $compRut=0;
            if($compRut==10)
                $compRut='K';
            if($compRut==$dgVerificador)
                return TRUE;
            else
                return FALSE;
        }
//        ValidaRut($rut);
//        if(ValidaRut($rut)==TRUE)
//            echo 'El rut es correcto';
//        else {
//            echo 'Intente otra vez';}
        // put your code here
        ?>

