<?php
if(isset($_POST)){
	
	// Conexión a la base de datos
	require_once '../includes/conexion.php';

	if(isset($_SESSION['errores'])){
		$_SESSION['errores']=NULL;
	}
	// Iniciar sesión
	if(!isset($_SESSION)){
		session_start();
	}
	
	// Recorger los valores del formulario de registro
	$nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
	$apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
	$email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;
    $password2 = isset($_POST['password2']) ? mysqli_real_escape_string($db, $_POST['password2']) : false;
	

	 // Array de errores
     $errores = array();

	
	// Validar los datos antes de guardarlos en la base de datos
	// Validar campo contraseña
    if(!empty($password) && !empty($password2)){
        if($password == $password2){
            $password_validado = true;
        }else{
            $password_validado = false;
            $errores['password1'] = "Las contraseñas no coinciden";
        }	
	}else{
		$password_validado = false;
		$errores['password2'] = "La contraseña está vacía";
	}
    
    // Validar campo nombre
	if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
		$nombre_validado = true;
	}else{
		$nombre_validado = false;
		$errores['nombre'] = "El nombre no es válido";
	}
	
	// Validar apellidos
	if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
		$apellidos_validado = true;
	}else{
		$apellidos_validado = false;
		$errores['apellidos'] = "Los apellidos no son válido";
	}
	
	// Validar el email
	if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
		$email_validado = true;
	}else{
		$email_validado = false;
		$errores['email'] = "El email no es válido";
	}

	// Comprobar si el email ya existe en la base de datos
	$sql_check_email = "SELECT * FROM usuarios WHERE email = '$email'";
	$check_email = mysqli_query($db, $sql_check_email);

	if(mysqli_num_rows($check_email) > 0){
    	$email_validado = false;
    	$errores['email2'] = "El email ya está registrado";
	}
	
	// Validar la contraseña
	
	
	$guardar_usuario = false;
	
	if(count($errores) == 0){
		$guardar_usuario = true;
		
		// Cifrar la contraseña
		$password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);
		
		// INSERTAR USUARIO EN LA TABLA USUARIOS DE LA BBDD
		$sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellidos', '$email', '$password_segura', 'user');";
		$guardar = mysqli_query($db, $sql);
		
//		var_dump(mysqli_error($db));
//		die();
		
		if($guardar){
			$_SESSION['completado'] = "El registro se ha completado con éxito";
		}else{
			$_SESSION['errores']['general'] = "Fallo al guardar el usuario!!";
		}

        header('Location: ../paginas/login.php');
		
	}else{    
		$_SESSION['errores'] = $errores;
        
        header('Location: ../paginas/signin.php');
	}
}


