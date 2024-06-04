<?php
        include_once "../includes/cabecera.php";
        include_once "../includes/helpers.php";

        $id = $_SESSION['usuario']['id'];
        $reservas = obtenerReservasUsuario($db, $id);
?>

<div id="mis_reservas">

<h1>Mis reservas</h1>

<?php if($reservas=="Aún no tienes reservas"): ?>
    <h2>Aún no tienes reservas</h2>
<?php else: ?>
    <table id="misTablaReservas" class="display">
        <thead>
            <tr>
                <th>SALA</th>
                <th>FECHA</th>
                <th>NÚMERO DE PERSONAS</th>
                <th>PRECIO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
    <?php foreach($reservas as $reserva): ?>
        <?php $nombre_sala=obtenerNombreSalas_id($db,$reserva['sala_id'])?>
        <tr>
            <td><?php echo $nombre_sala['nombre'] ?></td>
            <td><?php echo $reserva['fecha'] ?></td>
            <td><?php echo $reserva['num_personas'] ?></td>
            <td><?php echo $reserva['precio']."€" ?></td>
            <td><a href="editar_reserva.php?id=<?php echo hash('sha224',$reserva['id'].'frasequesolotusepas')?>">Modificar</a> <a href="#" class="eliminar-reserva" data-id="<?php echo hash('sha224',$reserva['id'].'frasequesolotusepas')?>">Eliminar</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
<?php endif;?>
</div>

<script>
    $(document).ready(function() {
        $('#misTablaReservas').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
            }
        });

        // Confirmación de eliminación con SweetAlert
        function confirmarEliminacion(selector, url) {
            $(selector).on('click', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminarlo!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url + id;
                    }
                });
            });
        }

        confirmarEliminacion('.eliminar-reserva', '../funciones/elimina.php?mi_reserva_id=');
    });
</script>
