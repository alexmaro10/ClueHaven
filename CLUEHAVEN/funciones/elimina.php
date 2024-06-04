<?php
include_once "../includes/helpers.php";

if(isset($_GET['usuario_id'])){
    $id=decode_hash($_GET['usuario_id']);
    $sql="DELETE FROM usuarios WHERE id='$id'";
    $resultado = mysqli_query($db, $sql);

    header('Location: ../paginas/listas_admin.php?c=usuarios');
    
}elseif(isset($_GET['mi_usuario_id'])){
    $id = $_GET['mi_usuario_id'];
    $sql="DELETE FROM usuarios WHERE id='$id'";
    $resultado = mysqli_query($db, $sql);
    
    session_destroy();
    header('Location: ../paginas/index.php');

}elseif(isset($_GET['reserva_id'])){
    
    $id=decode_hash($_GET['reserva_id']);
    
    $sql="DELETE FROM reservas WHERE id='$id'";
    $resultado = mysqli_query($db, $sql);

    header('Location: ../paginas/listas_admin.php?c=reservas');

}elseif(isset($_GET['mi_reserva_id'])){
    
    $id=decode_hash($_GET['mi_reserva_id']);
    
    $sql="DELETE FROM reservas WHERE id='$id'";
    $resultado = mysqli_query($db, $sql);

    header('Location: ../paginas/lista_mis_reservas.php');
     
}elseif(isset($_GET['sala_id'])){
    $id=decode_hash($_GET['sala_id']);
    
    $sql="DELETE FROM salas WHERE id='$id'";
    $resultado = mysqli_query($db, $sql);

    header('Location: ../paginas/listas_admin.php?c=salas');
}

?>