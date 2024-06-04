<?php
// Realizar la conexión con la base de datos
$servidor = 'localhost';
$usuario = 'root';
$password = '';
$basededatos = 'cluehaven';
$db = mysqli_connect($servidor, $usuario, $password, $basededatos);

mysqli_query($db, "SET NAMES 'utf8'");

// Iniciar la sesión
if(!isset($_SESSION)){
	session_start();
}