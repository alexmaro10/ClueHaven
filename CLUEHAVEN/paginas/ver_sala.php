<?php 
    include_once "../includes/cabecera.php";
    include_once "../includes/helpers.php";

    if(isset($_GET)){
        $id_sala = $_GET['id'];

        $sala=obtenerSalas_id($db, $id_sala);
        $media = obtenerMediaSala($db, $id_sala);
        $resenas = obtenerReseñasSala($db, $id_sala);
    }
?>
<h1 id="titulo_ver_sala"><?php echo $sala['nombre']?></h1> 
<div id="ver_sala">

    <div class="datos_sala">
        <p class="vdimensiones_sala"><?php echo "Dimensiones de la sala: ".$sala['dimensiones']?> m<sup>2</sup></p>
        <p class="vcategoria_sala"><?php obtenerCategoria($db, $sala['categoria_id'])?></p>
    </div>

    
    <div class="valoracion_media">
        <?php if($media=="No"):?>
            <p class="valoracion_sala">S/C</p>
        <?php else:?>
            <p class="valoracion_sala"><?php echo round($media, 2)."/5"?></p> 
        <?php endif; ?>
        <?php 
        
        if(isset($_SESSION['usuario'])){
            echo "<a class='bvalorar' href='valorar_salas.php?id_sala=".$id_sala."'>Valorar Sala</a>";
        }
        
        ?>
        
    </div>

    <div class="descripcion">

    <h2>Descripción</h2>
    <hr>
    <p class="vdescripción_sala"><?php echo $sala['descripcion']?></p> 

    </div>
    

   
</div>

<div id="reseñas">
    <h2>Reseñas</h2>

    <?php if($resenas==0): ?>
        <p>Aun no hay reseñas</p>
    <?php else:?>
        <?php foreach ($resenas as $resena): ?>
            
            <?php $nombre_usuario = obtenerNombreUsuario($db, $resena['usuario_id'])?>
            <h3> <?php echo $nombre_usuario[0]['nombre']?></h3>
            <h3> <?php echo "Valor: ".$resena['valor']."/5"?></h3>
            <h3> <?php echo $resena['comentario']?></h3>
            <hr>
        <?php endforeach;?>
    <?php endif; ?>
</div>