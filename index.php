<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="estilosCalculadora.css" />
        <title>Calculadora</title>
    </head>
    <body>
        <?php
        spl_autoload_register(function ($clase){
        
            include_once $clase.'.php';
            
        });       
        
        if (isset($_POST['enviar'])){
            //echo '<div>Operación '.Operacion::tipoDeOperacion($_POST['operacion']).'</div>';
            switch (Operacion::tipoDeOperacion($_POST['operacion'])){
                case  "Racional":
                    $resultado = new OperacionRacional($_POST['operacion']);
                    
                    break;
                case "Real":
                    $resultado = new OperacionReal($_POST['operacion']);
                    
                    break;
            }
            echo '<div><fieldset id="rtdo"><legend>Resultado</legend>';
            echo '<div>Resultado'.$resultado->opera().'</div>';
            echo '<div>Operando1: '.$resultado->getOperando1().'</div>';
            echo '<div>Operando2: '.$resultado->getOperando2().'</div>';
            echo '<div>Operador: '.$resultado->getOperador().'</div>';
            echo '<div>Operación: '.$resultado->tipoDeOperacion($_POST['operacion']).'</div>';
            echo '<div>Operación: '.$resultado->opera().'</div>';
            echo '</fieldset></div>';
        }
        ?>
        <fieldset>
            <legend>Establece la operación</legend>
            <form action="." method="POST" enctype="multipart/form-data">
            
                <label>
                    Operación <input type="text" name="operacion" value="" size="15" />
                </label>
                <input type="submit"  name="enviar" value="Calcular"/>  
                <?php
                 /*   if (isset($_POST['enviar'])){
                        echo '<label>errores</label>';
                    }*/
                ?>
            </form>
        </fieldset>
    </body>
</html>
