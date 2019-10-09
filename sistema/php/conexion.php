<?php
    $motor = "mysql";
    $base = "tesisKevin";
    $usuario = "root";
    $clave = "root";
    $servidor = "localhost";
 //Clave 502: 45h227{E 


    $cadena="$motor:host=$servidor;dbname=$base";
    $cnx = new pdo($cadena,$usuario,$clave);
?>