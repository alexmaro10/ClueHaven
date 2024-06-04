<?php
require_once 'conexion.php';



if(!isset($_SESSION)){
	session_start();
}

/*Diferentes funciones para conectar con la base de datos y realizar pequeños detalles*/ 

function mostrarError($errores, $campo) /*Mostrar errores en formularios*/{
	$alerta = '';
	if(isset($errores[$campo]) && !empty($campo)){
		$alerta = "<div class='alerta alerta-error'>".$errores[$campo].'</div>';
	}
	
	return $alerta;
}

function decode_hash($dato) /*Decodificar las id codificadas enviadas por metodo GET*/{
    $id=0;
    while(true){
        if(hash('sha224',(++$id).'frasequesolotusepas')==$dato)
            return $id;
    }
}


function obtenerSalas($db){ /*Obtener toda la información de todas las salas*/
    $sql = "SELECT * FROM salas";
    $result = mysqli_query($db, $sql);

    // Crear un array para almacenar los resultados
    $salas = array();

    // Verificar si hay resultados y guardarlos en el array
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $salas[] = $row;
        }
    }

    return $salas;
}

function obtenerUsuarios($db){ /*Obtener toda la información de todas los usuarios*/
    $sql = "SELECT * FROM usuarios";
    $result = mysqli_query($db, $sql);

    // Crear un array para almacenar los resultados
    $usuarios = array();

    // Verificar si hay resultados y guardarlos en el array
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $usuarios[] = $row;
        }
    }

    return $usuarios;
}

function obtenerReservas($db){ /*Obtener toda la información de todas las reservas*/
    $sql = "SELECT * FROM reservas";
    $result = mysqli_query($db, $sql);

    // Crear un array para almacenar los resultados
    $reservas = array();

    // Verificar si hay resultados y guardarlos en el array
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $reservas[] = $row;
        }
    }

    return $reservas;
}

function obtenerCategorias($db){ /*Obtener toda la información de todas las categorias*/
    $sql = "SELECT * FROM categorias";
    $result = mysqli_query($db, $sql);

    // Crear un array para almacenar los resultados
    $categorias = array();

    // Verificar si hay resultados y guardarlos en el array
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $categorias[] = $row;
        }
    }

    return $categorias;
}

function obtenerSalas_id($db, $id){/*Obtener toda la información de la sala con el id indicado*/
    $sql = "SELECT * FROM salas WHERE id = '$id'";
    $result = mysqli_query($db, $sql);

    // Crear un array para almacenar los resultados
    $sala;

    // Verificar si hay resultados y guardarlos en el array
    if ($result->num_rows > 0) {
        $sala = $result->fetch_assoc();
            
    }

    return $sala;
}

function obtenerNombreSalas_id($db, $id){/*Obtener el nombre de la sala con el id indicado*/
    $sql = "SELECT nombre FROM salas WHERE id = '$id'";
    $result = mysqli_query($db, $sql);

    // Crear un array para almacenar los resultados
    $sala;

    // Verificar si hay resultados y guardarlos en el array
    if ($result->num_rows > 0) {
        $sala = $result->fetch_assoc();
            
    }

    return $sala;
}

function obtenerCategoria($db, $id){ /*Obtener el nombre de la categoría con el id indicado*/
    $sql = "SELECT nombre FROM categorias WHERE id='$id'";
    $result = mysqli_query($db, $sql);

	
	$categoria;

    // Verificar si hay resultados y guardarlos en el array
    if ($result->num_rows == 1) {
        $categoria = $result->fetch_assoc();
    }

    echo $categoria['nombre'];
}

function obtenerMediaSala($db, $id){ /*Obtener la valoración media de la sala con el id indicado*/
    $sql = "SELECT valor FROM valoraciones WHERE sala_id='$id'";
    $result = mysqli_query($db, $sql);
    
    

    $valoraciones;
    $media=0;

    if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) {
            $valoraciones[] = $row;
        }

        for($i=0; $i<sizeof($valoraciones); $i++){
            $media=$media+(int)$valoraciones[$i]['valor'];
            
        }

        $media=$media/sizeof($valoraciones);

        return $media;
    }else{
        return "No";
    }

}

function obtenerReseñasSala($db, $id){ /*Obtener toda la información de las reseñas de la sala con el id indicado*/
    $sql = "SELECT * FROM valoraciones WHERE sala_id='$id'";
    $result = mysqli_query($db, $sql);

    $resenas;

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $resenas[] = $row;
        }

        return $resenas;
    }else{
        return 0;
    }
}

function obtenerReseñasUsuario($db, $id){ /*Obtener toda la información de las reseñas del usuario con el id indicado*/
    $sql = "SELECT * FROM valoraciones WHERE usuario_id='$id'";
    $result = mysqli_query($db, $sql);

    $resenas;

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $resenas[] = $row;
        }

        return $resenas;
    }else{
        return 0;
    }
}

function obtenerUsuario($db, $id){ /*Obtener toda la información del usuario con el id indicado*/
    $sql = "SELECT * FROM usuarios WHERE id='$id'";
    $result = mysqli_query($db, $sql);

    $nombre;

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $nombre[] = $row;
        }
    }

    return $nombre;
}

function obtenerNombreUsuario($db, $id){ /*Obtener el nombre del usuario con el id indicado*/
    $sql = "SELECT nombre FROM usuarios WHERE id='$id'";
    $result = mysqli_query($db, $sql);

    $nombre;

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $nombre[] = $row;
        }
    }

    return $nombre;
}

function obtenerReservasUsuario($db, $id_usuario){ /*Obtener toda la información de todas las reservas del usuario con el id indicado*/
    $sql = "SELECT * FROM reservas WHERE usuario_id='$id_usuario'";
    $result = mysqli_query($db, $sql);

    $reservas;

    if($result -> num_rows >0){
        while($row = $result->fetch_assoc()){
            $reservas[] = $row;
            
        }
        return $reservas;
    }else{
        return "Aún no tienes reservas";
    }

    

}

function obtenerReserva($db, $id){/*Obtener toda la información de la reserva con el id indicado*/
    $sql = "SELECT * FROM reservas WHERE id='$id'";
    $result = mysqli_query($db, $sql);

    $reserva;

    if($result -> num_rows >0){
        while($row = $result->fetch_assoc()){
            $reserva = $row;
            
        }
        return $reserva;
    }

    

}