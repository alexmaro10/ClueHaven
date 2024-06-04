<?php
    include_once '../includes/cabecera.php';
    include_once '../includes/helpers.php';

    if(isset($_GET)){
        $id_sala = $_GET['id_sala'];
        $sala = obtenerSalas_id($db, $id_sala);
    }
?>

<div id="valoracion">
    <h3><?php echo $sala['nombre']?></h3>
    <form action="../funciones/valoracion.php" method="POST">
        <label for="valor">Calificación</label>
        <select name="valor" id="valor">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <label for="comentario">Comentario (max. 250 car.)</label>
        <textarea type="text" name="comentario" id="comentario" maxlength="255"></textarea>

        <?php echo "<input type='hidden' name='sala_id' value='".$id_sala."'>"?>
        <?php echo "<input type='hidden' name='usuario_id' value='".$_SESSION['usuario']['id']."'>"?>

        <input id="bvalorar" type="submit" value="Enviar valoración">
    </form>

</div>
