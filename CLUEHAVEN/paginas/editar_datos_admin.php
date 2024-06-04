<?php 
        include_once '../includes/cabecera.php';
        include_once '../includes/helpers.php';

        $usuario = obtenerUsuario($db, decode_hash($_GET['id']));


?>

<form action="../funciones/edicion_datos_admin.php" method="POST" id="formu-editar_datos">
        
                <p>Edita tus datos</p>
                
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre-editar_datos" value="<?php echo $usuario[0]['nombre']?>">
                <?php echo isset($_SESSION['errorese']) ? mostrarError($_SESSION['errorese'], 'nombre') : ''; ?>

                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos" id="apellidos-editar_datos" value="<?php echo $usuario[0]['apellido']?>">
                <?php echo isset($_SESSION['errorese']) ? mostrarError($_SESSION['errorese'], 'apellidos') : ''; ?>
                
                <label for="email">Correo electrónico</label>
                <input type="email" name="email" id="email-editar_datos" value="<?php echo $usuario[0]['email']?>">
                <?php echo isset($_SESSION['errorese']) ? mostrarError($_SESSION['errorese'], 'email') : ''; ?>
                <?php echo isset($_SESSION['errorese']) ? mostrarError($_SESSION['errorese'], 'email2') : ''; ?>

                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password-editar_datos">
                <?php echo isset($_SESSION['errorese']) ? mostrarError($_SESSION['errorese'], 'password2') : ''; ?>

                <label for="rol">Rol</label>
                <select name="rol" id="rol-editar_datos">
                
                    <?php if($usuario[0]['rol']=="user"):?>
                            
                            <option value="user">user</option>
                    <?php else: ?>
                            <option value="adm">adm</option>
                    <?php endif; ?>

                    <?php if($usuario[0]['rol']=="user"):?>
                            <option value="adm">adm</option>
                    <?php else: ?>
                            <option value="user">user</option>
                    <?php endif; ?>
                </select>

                <input type="hidden" name="id_usuario" value = "<?php echo $usuario[0]['id'] ?>">

                <input type="submit" value="Editar" id= "b-editar_datos">

</form>