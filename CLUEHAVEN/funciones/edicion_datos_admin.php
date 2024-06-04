<?php
if(isset($_POST)){
	
	// Conexión a la base de datos
	require_once '../includes/conexion.php';
    include_once '../includes/helpers.php';
    var_dump($_POST);
    $usuario = obtenerUsuario($db, $_POST['id_usuario']);


	if(isset($_SESSION['errorese'])){
		$_SESSION['errorese']=NULL;
	}

	// Iniciar sesión
	if(!isset($_SESSION)){
		session_start();
	}
	
	// Recorger los valores del formulario de registro
	$nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
	$apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
	$email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $rol = isset($_POST['rol']) ? mysqli_real_escape_string($db, trim($_POST['rol'])) : false;
    
    if(!empty($_POST['password'])){
        $password=$_POST['password'];
    }
	

	 // Array de errores
     $errorese = array();

	
	// Validar los datos antes de guardarlos en la base de datos
	
    
    // Validar campo nombre
	if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
		$nombre_validado = true;
	}else{
		$nombre_validado = false;
		$errorese['nombre'] = "El nombre no es válido";
	}
	
	// Validar apellidos
	if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
		$apellidos_validado = true;
	}else{
		$apellidos_validado = false;
		$errorese['apellidos'] = "Los apellidos no son válido";
	}
	
	// Validar el email
	if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
		$email_validado = true;
	}else{
		$email_validado = false;
		$errorese['email'] = "El email no es válido";
	}

	// Comprobar si el email ya existe en la base de datos
    $email_usuario = $usuario[0]['email'];
    var_dump($email_usuario);
    var_dump($email);
    if($email==$email_usuario){

    }else{
        var_dump($email==$email_usuario);
        $sql_check_email = "SELECT * FROM usuarios WHERE email = '$email'";
	    $check_email = mysqli_query($db, $sql_check_email);

	    if(mysqli_num_rows($check_email) > 0){
    	$email_validado = false;
    	$errorese['email2'] = "El email ya está registrado";
	}
    }
	
	
	// Validar la contraseña
	
	
	$guardar_usuario = false;
	
	if(count($errorese) == 0){
		$guardar_usuario = true;
		
        // INSERTAR USUARIO EN LA TABLA USUARIOS DE LA BBDD
            $usuario_id=$_POST['id_usuario'];
			if(empty($_POST['password'])){
				$sql = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellidos', email = '$email', rol='$rol' WHERE id = '$usuario_id'";
				$guardar = mysqli_query($db, $sql);
			}else{
				// Cifrar la contraseña
				$password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);
				$sql = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellidos', email = '$email', rol='$rol', contrasena = '$password_segura' WHERE id = '$usuario_id'";
				$guardar = mysqli_query($db, $sql);
			}
        
        
		
//		var_dump(mysqli_error($db));
//		die();
		
		if($guardar){
			$_SESSION['completado'] = "El registro se ha completado con éxito";
		}else{
			$_SESSION['errores']['general'] = "Fallo al guardar los cambios!!";
		}

		
		header('Location: ../paginas/listas_admin.php?c=usuarios');
		

		
	}else{    
		$_SESSION['errorese'] = $errorese;
        
        header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
}


