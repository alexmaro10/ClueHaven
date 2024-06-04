<?php
if(isset($_POST)){
	
	// Conexión a la base de datos
	require_once '../includes/conexion.php';

	if(isset($_SESSION['erroress'])){
		$_SESSION['erroress']=NULL;
	}
	// Iniciar sesión
	if(!isset($_SESSION)){
		session_start();
	}
	
	// Recorger los valores del formulario de registro
	$nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
	$categoria = isset($_POST['categoria']) ? mysqli_real_escape_string($db, $_POST['categoria']) : false;
	$dimensiones = isset($_POST['dimensiones']) ? mysqli_real_escape_string($db, trim($_POST['dimensiones'])) : false;
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;
    $id = $_POST['sala_id'];
	

	 // Array de errores
     $errores = array();

	
	// Validar los datos antes de guardarlos en la base de datos
	// Validar campo nombre
    if(!empty($nombre)){
            $nombre_validado = true;	
	}else{
		    $nombre_validado = false;
		    $errores['nombre'] = "El nombre está vacía";
	}
	
	// Validar dimensiones
	if(!empty($dimensiones) && is_numeric($dimensiones)){
		    $dimensiones_validado = true;
	}else{
		    $dimensiones_validado = false;
		    $errores['dimensiones'] = "Las dimensiones no son válidos";
	}
	
	
	

	
	if(count($errores) == 0){
		
		$sql = "UPDATE salas SET nombre = '$nombre', categoria_id = '$categoria', dimensiones = '$dimensiones', descripcion='$descripcion' WHERE id = '$id'";
		$guardar = mysqli_query($db, $sql);
		
		
		if($guardar){
			$_SESSION['completado'] = "El registro se ha completado con éxito";
		}else{
			$_SESSION['erroress']['general'] = "Fallo al guardar la sala!!";
		}

		
        header('Location: ../paginas/listas_admin.php?c=salas');
		
	}else{    
		$_SESSION['erroress'] = $errores;
        
        header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
}


