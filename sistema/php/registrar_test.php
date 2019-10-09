<?php
require_once("conexion.php");
$nombre = $_POST['txtNombre'];
$fechaActual = date('Y-m-d');

$sql = "insert into test(nombre,fecha) values ('$nombre','$fechaActual')";
$cnx -> query($sql);
header("location: ../listaTest.php");

?>