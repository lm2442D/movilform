<?php
include_once('conexion.php');
//Capturando Variables

session_start();

$codigocontrato='';
$nombrecontrato=$_POST['nombrecontrato'];
$direccioncontrato=$_POST['direccioncontrato'];
$nombrecontacto=$_POST['nombrecontacto'];
$telefonocontacto=$_POST['telefonocontacto'];
$email=$_POST['email'];
$codigocliente=$_SESSION['admin'];
$latg='-33.4369436';
$long='-70.634449';


    $sql_agregar='INSERT INTO contratos(CodigoContrato, NombreContrato, DireccionContrato,LatGContrato,LonGContrato, NombreContacto,TelefonoContacto,Email,CodigoCliente)
     VALUES (?,?,?,?,?,?,?,?,?)';
    $sentencia_agregar=$pdo->prepare($sql_agregar);
    $sentencia_agregar->execute(array($codigocontrato,$nombrecontrato,$direccioncontrato,$latg,$long,$nombrecontacto,$telefonocontacto,$email,$codigocliente));
    