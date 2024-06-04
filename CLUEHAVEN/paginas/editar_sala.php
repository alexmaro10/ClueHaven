<?php 
    include_once '../includes/cabecera.php';
    include_once '../includes/helpers.php';

    $categorias=obtenerCategorias($db);
    $sala = obtenerSalas_id($db, decode_hash($_GET['id']));

?>

        
        <form action="../funciones/sala_editada.php" method="post" id="formuES"> 
            
            <p>Datos de la Sala</p>
            
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="e_nombre" value="<?php echo $sala['nombre']?>">
            <?php echo isset($_SESSION['erroress']) ? mostrarError($_SESSION['erroress'], 'nombre') : ''; ?>

            <label for="categoria">Categoria</label>
            <select name="categoria" id="e_categoria">
                <option value="<?php echo $sala['categoria_id']?>"><?php echo obtenerCategoria($db, $sala['categoria_id'])?></option>
                <?php foreach($categorias as $categoria):?>
                    <?php if($categoria['id'] != $sala['categoria_id']): ?>
                    <option value="<?php echo $categoria['id']?>"><?php echo $categoria['nombre']?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
            
            <label for="dimensiones">Dimensiones</label>
            <input type="number" name="dimensiones" id="e_dimensiones" value = "<?php echo $sala['dimensiones'] ?>">
            <?php echo isset($_SESSION['erroress']) ? mostrarError($_SESSION['erroress'], 'dimensiones') : ''; ?>

            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="e_descripcion" maxlength="255"><?php echo $sala['descripcion']?></textarea>
        
            <input type="hidden" name="sala_id" value="<?php echo $sala['id'] ?>">
            
            <input type="submit" value="Editar Sala" id="beditar">

        </form>