<?php 
    include_once '../includes/cabecera.php';
    include_once '../includes/helpers.php';

    $id_categoria = decode_hash($_GET['id']);
    $categoria = obtenerCategoria($db, $id_categoria);

?>

        
        <form action="../funciones/edicion_categoria.php" method="post" class="formuEC"> 
            
            <p>Datos de la Categoria</p>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="ec_nombre" value ="<?php obtenerCategoria($db, $id_categoria) ?>">
            <?php echo isset($_SESSION['erroress']) ? mostrarError($_SESSION['erroress'], 'nombre') : ''; ?>     
                 
            <input type="submit" value="Modificar" class="ebcategoria">

            <input type="hidden" name="id_categoria" value="<?php echo $id_categoria ?>">

        </form>