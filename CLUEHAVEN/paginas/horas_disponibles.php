<?php
    $horas_disponibles= ["10:00:00","11:30:00","13:00:00","14:30:00","16:00:00","17:30:00","19:00:00","20:30:00", "20"];
    include_once "../includes/cabecera.php";
    if(isset($_POST)){
        $num_personas=$_POST['num_personas'];
        $fecha = $_POST['fecha'];
        $id_sala = $_POST['sala_id'];

    }
    
    if(isset($_SESSION['erroresRes'])){
		$_SESSION['erroresRes']=NULL;
	}

    $errores = array();

    $fecha_actual = new DateTime();
    $fechaActualStr = $fecha_actual->format('Y-m-d');

    if($fecha<=$fechaActualStr){
        $errores['fecha'] = "La fecha no está disponible";
    }

    if(empty($errores)){

    
    $sql = "SELECT TIME(fecha) AS hora FROM reservas WHERE DATE(fecha)='$fecha' AND sala_id='$id_sala'";
    $result = mysqli_query($db, $sql);

    // Crear un array para almacenar los resultados
    $salas = array();

    // Verificar si hay resultados y guardarlos en el array
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $salas[] = $row;
        }
    }


    for($i=0; $i<sizeof($salas); $i++){
        $horas_disponibles = array_diff($horas_disponibles, $salas[$i]);
    }

    for($i=0; $i<sizeof($horas_disponibles); $i++){
        $horas_disponibles[$i]=substr($horas_disponibles[$i], 0, -3);
    }

    echo "<form action='../funciones/registro_reserva.php' method='POST' class='formHD'>";
    echo "<div class='grid-container'>";
    echo "<p>Selecciona una hora</p>";
    if(!empty($horas_disponibles[0])){
        echo    "<input type='radio' class='hora' name='hora' value=".$horas_disponibles[0].">
                <label for='hora'>".$horas_disponibles[0]."</label><br>";
    }
    if(!empty($horas_disponibles[1])){
        echo    "<input type='radio' class='hora' name='hora' value=".$horas_disponibles[1].">
                <label for='hora'>".$horas_disponibles[1]."</label><br>";
    }
    if(!empty($horas_disponibles[2])){
        echo    "<input type='radio' class='hora' name='hora' value=".$horas_disponibles[2].">
                <label for='hora'>".$horas_disponibles[2]."</label><br>";
    }
    if(!empty($horas_disponibles[3])){
        echo    "<input type='radio' class='hora' name='hora' value=".$horas_disponibles[3].">
                <label for='hora'>".$horas_disponibles[3]."</label><br>";
    }
    if(!empty($horas_disponibles[4])){
        echo    "<input type='radio' class='hora' name='hora' value=".$horas_disponibles[4].">
                <label for='hora'>".$horas_disponibles[4]."</label><br>";
    }
    if(!empty($horas_disponibles[5])){
        echo    "<input type='radio' class='hora' name='hora' value=".$horas_disponibles[5].">
                <label for='hora'>".$horas_disponibles[5]."</label><br>";
    }
    if(!empty($horas_disponibles[6])){
        echo    "<input type='radio' class='hora' name='hora' value=".$horas_disponibles[6].">
                <label for='hora'>".$horas_disponibles[6]."</label><br>";
    }
    if(!empty($horas_disponibles[7])){
        echo    "<input type='radio' class='hora' name='hora' value=".$horas_disponibles[7].">
                <label for='hora'>".$horas_disponibles[7]."</label><br>";
    }
    if(!empty($horas_disponibles[8])){
        echo    "<input type='radio' class='hora' name='hora' value=".$horas_disponibles[8].">
                <label for='hora'>".$horas_disponibles[8]."</label><br>";
    }

    echo "<input name='sala_id' type='hidden' value='".$id_sala."'>";
    echo "<input name='fecha' type='hidden' value='".$fecha."'>";
    echo "<input name='num_personas' type='hidden' value='".$num_personas."'>";
    echo "<input type='submit' value='Hacer Reserva'>";
    echo "</div>";
    echo "</form>";
    }else{
        $_SESSION['erroresRes'] = $errores;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>

