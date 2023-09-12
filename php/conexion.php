<?php

$server="localhost";
$user="root";
$contra="";
$db="visionviajera";

$conexion = new mysqli ($server,$user,$contra,$db);

if($conexion->connect_error){
    die("connexion fallida:". $conexion->connect_error);
}

?>