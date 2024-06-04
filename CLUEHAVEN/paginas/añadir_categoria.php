<?php 
    include_once '../includes/cabecera.php';
    include_once '../includes/helpers.php';

    $categorias=obtenerCategorias($db);

?>

        
        <form action="../funciones/categoria_añadida.php" method="post" class="formuEC"> 
            
            <p>Datos de la Categoria</p>
            
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="ec_nombre">
            <?php echo isset($_SESSION['erroress']) ? mostrarError($_SESSION['erroress'], 'nombre') : ''; ?>     
                 
            <input type="submit" value="Añadir Categoria" class="ebcategoria">

        </form>