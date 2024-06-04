<?php 
    include_once '../includes/cabecera.php';
    include_once '../includes/helpers.php';

    $categorias=obtenerCategorias($db);

?>
    
        
        <form action="../funciones/sala_añadida.php" method="post" id="formuAS"> 
            
            <p>Datos de la Sala</p>
            
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="a_nombre">
            <?php echo isset($_SESSION['erroress']) ? mostrarError($_SESSION['erroress'], 'nombre') : ''; ?>

            <label for="categoria">Categoria</label>
            <select name="categoria" id="a_categoria">
                <?php foreach($categorias as $categoria):?>
                    <option value="<?php echo $categoria['id']?>"><?php echo $categoria['nombre']?></option>
                <?php endforeach; ?>
            </select>
            
            <label for="dimensiones">Dimensiones</label>
            <input type="number" name="dimensiones" id="a_dimensiones">
            <?php echo isset($_SESSION['erroress']) ? mostrarError($_SESSION['erroress'], 'dimensiones') : ''; ?>

            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="a_descripcion" maxlength="255"></textarea>
        
            
            <input type="submit" value="Añadir Sala" id="bañadir">

        </form>