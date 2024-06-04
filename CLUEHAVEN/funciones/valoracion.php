<?php
    include_once '../includes/helpers.php';

    if(isset($_POST)){
        $id_sala = $_POST['sala_id'];
        $id_usuario = $_POST['usuario_id'];
        $valor = $_POST['valor'];
        $comentario = $_POST['comentario'];
    }

    $sql = "INSERT INTO valoraciones (valor, comentario, sala_id, usuario_id) VALUES ('$valor','$comentario', '$id_sala', '$id_usuario')";
    $resultado = mysqli_query($db, $sql);

    header('Location: ../paginas/ver_sala.php?id='.$id_sala);
?>