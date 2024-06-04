<?php
if(isset($_POST)){
	
	// Conexión a la base de datos
	require_once '../includes/conexion.php';

	if(isset($_SESSION['erroress'])){
		$_SESSION['erroresc']=NULL;
	}
	// Iniciar sesión
	if(!isset($_SESSION)){
		session_start();
	}
	
	// Recorger los valores del formulario de registro
	$nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
	
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
	
	if(count($errores) == 0){

		
		$sql = "INSERT INTO categorias VALUES(null, '$nombre');";
		$guardar = mysqli_query($db, $sql);
		
		
		if($guardar){
			$_SESSION['completado'] = "El registro se ha completado con éxito";
		}else{
			$_SESSION['erroress']['general'] = "Fallo al guardar la sala!!";
		}

        header('Location: ../paginas/listas_admin.php?c=categorias');
		
	}else{    
		$_SESSION['erroress'] = $errores;
        
        header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
}


