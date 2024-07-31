<?php 
    $mesage1 = "Hola, esta es una configuracion de un servidor local!"."<br>";
    $mesage2 = "Ejecuta tu archivo php, para verificar que el contenido sale en la consola: php test.php!"."<br>";
    $mesage3 = "Para iniciar un servidor web local: php -S localhost:8000"."<br>";
    $mesage4 = "Para verificar el despliegue, agregue el nombre del archivo al final: http://localhost:8000/test.php<br>";
    $mesage5 = "Sino usa PHP Server";

    //Creamos la data para usarlo en html

    $data = [$mesage1, $mesage2, $mesage3, $mesage5];

    include "template.php";