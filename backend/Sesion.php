<?php
session_start();

$login=$_POST['codigocli'];

//$login='nacho';




$_SESSION['admin']=$login;

if (isset($_SESSION['admin']))
{
    header('Location:http://localhost/movilform/index.php');
}
