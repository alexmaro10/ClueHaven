<?php include_once '../includes/cabecera.php'?>
<?php include_once '../includes/helpers.php'?>

        
        <form action="../funciones/registro.php" method="post" id="formuS"> 
            
            <p>Únase a nosotros</p>
            
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombreS" onblur="capitalizeFirstLetter()">
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" id="apellidosS" onblur="capitalizeFirstLetter()">
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>
            
            <label for="email">Correo electrónico</label>
            <input type="email" name="email" id="emailS">
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email2') : ''; ?>

            <label for="password">Contraseña</label>
            <input type="password" name="password" id="passwordS">
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password2') : ''; ?>
            
            <label for="password2">Repetir contraseña</label>
            <input type="password" name="password2" id="password2S">
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password1') : ''; ?>
            
            <input type="submit" value="Sign-in" id="bsign">

        </form>