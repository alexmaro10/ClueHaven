<?php
include_once "../includes/cabecera.php";
include_once "../includes/helpers.php";
$salas = obtenerSalas($db);

if(isset($_SESSION['erroresRes'])){
    $_SESSION['erroresRes']=NULL;
}

?>

<div id="salas">
    
    <h1>Listado de Salas</h1>
    <table border="0">
        <?php foreach ($salas as $sala): ?>
            <?php $id_sala = $sala['id']?>
           <div class="bloque_salas">
            <h3 class="nombre_sala"><?php echo $sala['nombre']?></h3>
            <p class="dimensiones_sala"><?php echo $sala['dimensiones']?> m<sup>2</sup></p>
            <p class="categoria_sala"><?php obtenerCategoria($db, $sala['categoria_id'])?></p>
            <p class="descripción_sala"><?php echo $sala['descripcion']?></p>
            <div class="botones_salas">
                <?php if(!isset($_SESSION['usuario'])): ?>
                        <li>
                            <?php echo '<a href="ver_sala.php?id=' . $id_sala . '">Ver Sala</a>'?>
                        </li>
                <?php else: ?>
                        <li>
                        <?php echo '<a href="reservar_sala.php?id=' . $id_sala . '">Reservar Sala</a>'?>
                        </li>
                        <li>
                        <?php echo '<a href="ver_sala.php?id=' . $id_sala . '">Ver Sala</a>'?>
                        </li>
                <?php endif; ?>
                </div>

           </div>
        <?php endforeach; ?>

        
    </table>
</div>

