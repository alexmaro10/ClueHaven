<?php
// Iniciar la sesión y la conexión a bd
require_once '../includes/conexion.php';

// Recoger datos del formulario
if(isset($_POST)){
	
	// Borrar error antiguo
	if(isset($_SESSION['erroresl'])){
		$_SESSION['erroresl']=NULL;
	}
			
	// Recoger datos del formulario
	$email = trim($_POST['email']);
	$password = $_POST['password'];
	
	$errores = array();

	// Consulta para comprobar las credenciales del usuario
	$sql = "SELECT * FROM usuarios WHERE email = '$email'";
	$login = mysqli_query($db, $sql);
	
	if($login && mysqli_num_rows($login) == 1){
		$usuario = mysqli_fetch_assoc($login);
		
		// Comprobar la contraseña
		$verify = password_verify($password, $usuario['contrasena']);
		
		if($verify){
			// Utilizar una sesión para guardar los datos del usuario logueado
			$_SESSION['usuario'] = $usuario;
			// Redirigir al index.php
            header('Location: ../paginas/index.php');
		}else{
			// Si algo falla enviar una sesión con el fallo
			$errores['password'] = "Contraseña incorrecta";
			$_SESSION['erroresl'] = $errores;
        	header('Location: ../paginas/login.php');
		}
	}else{
		// mensaje de error
		$errores['email'] = "El correo no exite";
		$_SESSION['erroresl'] = $errores;
        header('Location: ../paginas/login.php');
	}
	
}