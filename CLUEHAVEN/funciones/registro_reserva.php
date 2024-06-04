<?php
include_once "../includes/conexion.php";

if(isset($_POST)){
    $num_personas = $_POST['num_personas'];
    $sala_id=$_POST['sala_id'];
    $fecha=$_POST['fecha'];
    $hora = $_POST['hora'];
    $usuario_id = $_SESSION['usuario']['id'];
    $_precio;
    $fecha_hora=$fecha." ".$hora.":00";
}
if($num_personas == 2){
    $precio=$num_personas*19;
}elseif($num_personas==3){
    $precio=$num_personas*15;
}else{
    $precio=$num_personas*13;
}

if(!isset($_POST['edit'])){
    $sql = "INSERT INTO reservas VALUES(null, '$usuario_id', '$sala_id', '$num_personas', '$fecha_hora', '$precio');";
    $guardar = mysqli_query($db, $sql);
    header('Location: ../paginas/lista_mis_reservas.php');
}else{
    $id_reserva = $_POST['edit'];
    $sql = "UPDATE reservas SET fecha = '$fecha_hora', num_personas='$num_personas',precio='$precio' WHERE id = '$id_reserva'";
    $guardar = mysqli_query($db, $sql);
    if(isset($_POST['c'])){
        header('Location: ../paginas/listas_admin.php?c=reservas');
    }else{
        header('Location: ../paginas/lista_mis_reservas.php');
    }
   
}


