<?php
require_once("conexion.php");
$idTest = $_POST['idTest'];
$dni = $_POST['dni'];
$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$correo = $_POST['correo'];
$sexo = $_POST['sexo'];
$alimentacion = $_POST['alimentacion'];
$genetica = $_POST['genetica'];
$glucosa = $_POST['glucosa'];
$actividadFisica = $_POST['actividadFisica'];
$riesgo = $_POST['riesgo'];

try {
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $cnx->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    //Comprobar que no este registrado
    $sql = "select * from estudiante where dni='$dni'";
    $result = $cnx->query($sql) or die("error");

    if(!$reg=$result->fetchObject()){
        $sql = "insert into estudiante(dni,nombre,correo,sexo,edad) values
                ('$dni','$nombre','$correo','$sexo',$edad)";
        $cnx -> query($sql);        
    };

    $sql = "select * from  estudiante_test where id_estudiante='$dni' and id_test=$idTest";
    $result = $cnx -> query($sql);

    if($reg=$result->fetchObject()){
        //Si está registrado
        echo '100';
        return;
    }else{
        $sql = "insert into estudiante_test(id_estudiante,id_test,resultado)
                values ('$dni',$idTest,$riesgo)";
        $cnx -> query($sql);
        $estudianteTest = $cnx->lastInsertId();
        // echo $estudianteTest;

        // Alimentacion
        $sql = "insert into estudiante_test_variable(id_test_estudiante,id_variable,resultado)
                values($estudianteTest,1,$alimentacion)";
        $cnx -> query($sql);   
        // Genetica 
        $sql = "insert into estudiante_test_variable(id_test_estudiante,id_variable,resultado)
        values($estudianteTest,2,$genetica)";
        $cnx -> query($sql);  
        //Glucosa
        $sql = "insert into estudiante_test_variable(id_test_estudiante,id_variable,resultado)
        values($estudianteTest,3,$glucosa)";
        $cnx -> query($sql); 
        //Actividad fisica
        $sql = "insert into estudiante_test_variable(id_test_estudiante,id_variable,resultado)
        values($estudianteTest,4,$actividadFisica)";
        $cnx -> query($sql);
        echo '200'; 

        session_start();
        $_SESSION['nombre'] = $nombre;
    }




} catch (Exception $e) {
    echo 'Agregar_test Exception -> ';
    var_dump($e->getMessage());
}    
?>