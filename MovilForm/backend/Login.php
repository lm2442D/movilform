<?php

include_once('conexion.php');
//Capturando Variables¡
$password=$_POST['password'];
$password2=$_POST['password2'];
$codigocliente=$_POST['codigocliente'];


//Filtrando si existe el usuario
$sql='SELECT * FROM clientes WHERE CodigoCliente=?';
$sentencia=$pdo->prepare($sql);
$sentencia->execute(array($codigocliente));
$resultado=$sentencia->fetch();
if($resultado) //Sí usuario existe no se guarda
{   
    echo 'Usuario Existente';
    die(); //muere el proceso
}


$password=password_hash($password, PASSWORD_DEFAULT);

if (password_verify($password2, $password)) {  //Comando para desencriptar contraseña ->Si coinciden contraseñas se graba registro
    $sql_agregarL='INSERT INTO logueo (CodigoCliente,Contrasena) VALUES (?,?)';
    $sentencia_agregarL=$pdo->prepare($sql_agregarL);
    $sentencia_agregarL->execute(array($codigocliente,$password2));
    //echo 'holaass';
    //cerrar conexion
    $sentencia_agregar=null;
    //$sentencia_agregarL=null;
    $pdo=null;
} else {
    echo 'La contraseña no es válida.';
}