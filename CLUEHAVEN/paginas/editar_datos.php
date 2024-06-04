<?php 
        include_once '../includes/cabecera.php';
        include_once '../includes/helpers.php';


?>

<form action="../funciones/edición_datos.php" method="POST" id="formu-editar_datos">
        
                <p>Edita tus datos</p>
                
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre-editar_datos" value="<?php echo($_SESSION['usuario']['nombre'])?>">
                <?php echo isset($_SESSION['errorese']) ? mostrarError($_SESSION['errorese'], 'nombre') : ''; ?>

                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos" id="apellidos-editar_datos" value="<?php echo($_SESSION['usuario']['apellido'])?>">
                <?php echo isset($_SESSION['errorese']) ? mostrarError($_SESSION['errorese'], 'apellidos') : ''; ?>
                
                <label for="email">Correo electrónico</label>
                <input type="email" name="email" id="email-editar_datos" value="<?php echo($_SESSION['usuario']['email'])?>">
                <?php echo isset($_SESSION['errorese']) ? mostrarError($_SESSION['errorese'], 'email') : ''; ?>
                <?php echo isset($_SESSION['errorese']) ? mostrarError($_SESSION['errorese'], 'email2') : ''; ?>

                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password-editar_datos">
                <?php echo isset($_SESSION['errorese']) ? mostrarError($_SESSION['errorese'], 'password2') : ''; ?>

                <input type="submit" value="Editar" id= "b-editar_datos">

</form>