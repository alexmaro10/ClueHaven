<?php
    include_once "../includes/cabecera.php";
    include_once "../includes/helpers.php";
    
    $id= decode_hash($_GET['id']);
    if(isset($_GET['c'])){
        $c = $_GET['c'];
    }
    

    $reserva=obtenerReservas($db, $id);
?>

    <div id="bloque_reserva_edit">
        <form action="horas_disponibles_edit.php" method="POST">
        <label for="fecha">Selecciona una fecha:</label>
            <input type="date" name="fecha" id="rfecha">
            <?php echo isset($_SESSION['erroresRes']) ? mostrarError($_SESSION['erroresRes'], 'fecha') : ''; ?>

            <label for="num_personas">Indica el numero de personas</label>
            <select name="num_personas" id="rnum_personas">
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            <?php echo "<input type='hidden' name='sala_id' value='".$reserva[0]['sala_id']."'>"?>
            <?php 
                if(isset($c)){
                    echo "<input type='hidden' name='c' value='".$c."'>";
                }
            ?>
            <?php echo "<input type='hidden' name='reserva_id' value='".$id."'>"?>


            <input type="submit" value="Comprobar horas disponibles" id="ebreserva">
        </form>

    </div>