<?php
    include_once '../includes/cabecera.php';
    include_once '../includes/helpers.php';
?>

<body>
    <div id="mis_datos">
        <h2 id="ver_datos-nombre">Nombre: <?php echo($_SESSION['usuario']['nombre'] . " " . $_SESSION['usuario']['apellido'])?></h2>
        <h2 id="ver_datos-email">Correo electrónico: <?php echo($_SESSION['usuario']['email'])?></h2>
        <a href="editar_datos.php" id="beditar_misdatos">Editar datos</a>
        <a href="#" id="eliminar-cuenta">Eliminar mi cuenta</a>
    </div>

    <script>
        document.getElementById('eliminar-cuenta').addEventListener('click', function(event) {
            event.preventDefault();
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esta acción!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminarla!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Aquí redirigimos a la URL de eliminación con el ID del usuario
                    window.location.href = '../funciones/elimina.php?mi_usuario_id=<?php echo($_SESSION['usuario']['id']); ?>';
                }
            });
        });
    </script>
</body>
</html>
    