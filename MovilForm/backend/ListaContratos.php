<?php
 //header("Access-Control-Allow-Origin: *"); //Cors para compartir api.

 //Convertir arreglo de $datos en json
 header('Content-Type: application/json');
 $codigocliente=$_GET['codigo'];
if($codigocliente != '')
{
    //echo $codigocliente;
    include_once 'conexion.php';
    $sql='SELECT * FROM contratos WHERE CodigoCliente=?';
    $sentencia=$pdo->prepare($sql);
    $sentencia->execute(array($codigocliente));
    $datos=$sentencia->fetchAll();
}else{
    echo 'Solicitud no encontrada';
}

echo json_encode($datos);