<?php
    include_once "../includes/cabecera.php";
    include_once "../includes/helpers.php";
    
    $id= $_GET['id'];

    $sala=obtenerSalas_id($db, $id);
?>

    <div id="bloque_reserva">
        <?php echo "<h3>".$sala['nombre']."</h3>"?>
        <form action="horas_disponibles.php?" method="POST"">
            <label for="fecha">Selecciona una fecha:</label>
            <input type="date" name="fecha" id="rfecha">
            <?php echo isset($_SESSION['erroresRes']) ? mostrarError($_SESSION['erroresRes'], 'fecha') : ''; ?>

            <label for="num_personas">Indica el numero de personas</label>
            <select name="num_personas" id="rnum_personas">
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            <?php echo "<input type='hidden' name='sala_id' value='".$id."'>"?>

            <input type="submit" value="Comprobar horas disponibles" id="breserva">
        </form>

    </div>