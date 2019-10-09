<?php
require_once("conexion.php");
$idVariable = $_POST['idVariable'];
$pregunta = $_POST['pregunta'];

try {
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $cnx->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $sql = "insert into pregunta(id_variable,nombre) values ($idVariable,'$pregunta')";
    $cnx->query($sql) or die("error");

    echo 0;

} catch (Exception $e) {
    echo 'Agregar_test Exception -> ';
    var_dump($e->getMessage());
}

?>