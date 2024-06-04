<?php 
    include_once '../includes/cabecera.php';
    include_once '../includes/helpers.php'

?>

    <div id="login">

        <form id="formuL" action="../funciones/inicio_sesion.php" method="POST">
            <p>Inicio de sesión</p>

            <label for="email">Correo electrónico</label>
            <input type="email" name="email" id="email">
            <?php echo isset($_SESSION['erroresl']) ? mostrarError($_SESSION['erroresl'], 'email') : ''; ?>

            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password">
            <?php echo isset($_SESSION['erroresl']) ? mostrarError($_SESSION['erroresl'], 'password') : ''; ?>

            <input id="blogin" type="submit" value="Login">
        </form>
        
    </div>
</body>
    