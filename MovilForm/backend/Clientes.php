<?php
include_once('conexion.php');
//Capturando Variables
$razonsocial=$_POST['razonsocial'];
$password=$_POST['password'];
$password2=$_POST['password2'];
$codigocliente=$_POST['codigocliente'];
$nombrefantasia=$_POST['nombrefantasia'];
$direccioncomercial=$_POST['direccioncomercial'];

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

//Encriptar contraseña ->Hash para guardar contraseñas de forma etica
$password=password_hash($password, PASSWORD_DEFAULT);

if (password_verify($password2, $password)) {  //Comando para desencriptar contraseña ->Si coinciden contraseñas se graba registro
    //Ingresar Tabla cliente
    $sql_agregar='INSERT INTO clientes(CodigoCliente, RazonSocial, NombreFantasia, DireccionComercial) VALUES (?,?,?,?)';
    $sentencia_agregar=$pdo->prepare($sql_agregar);
    $sentencia_agregar->execute(array($codigocliente,$razonsocial,$nombrefantasia,$direccioncomercial));
    
} else {
    echo 'La contraseña no es válida.';
}