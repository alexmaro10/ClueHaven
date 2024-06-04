<?php
    include_once "../includes/cabecera.php";
    include_once "../includes/helpers.php";

    $controlador = $_GET['c'];
    $fecha_actual = new DateTime();
    $fecha_actual_str = $fecha_actual->format('Y-m-d');

    if(isset($_SESSION['errorese'])){
        $_SESSION['errorese']=NULL;
    }
    if(isset($_SESSION['erroress'])){
        $_SESSION['erroress']=NULL;
    }
    if(isset($_SESSION['erroresRes'])){
		$_SESSION['erroresRes']=NULL;
	}
?>

<?php if($controlador=="salas"):?>
    <?php $salas = obtenerSalas($db); ?>
    <h1>Listas de salas</h1>
    <a href="añadir_sala.php">+ Añadir sala</a>
    <table id="tablaSalas" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>CATEGORIA</th>
                <th>DIMENSIONES</th>
                <th>DESCRIPCIÓN</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($salas as $sala):?>
                <tr>
                    <td><?=$sala['id']?></td>
                    <td><?=$sala['nombre']?></td>
                    <td><?=obtenerCategoria($db,$sala['categoria_id'])?></td>
                    <td><?=$sala['dimensiones']?></td>
                    <td style="text-align: left;"><?=$sala['descripcion']?></td>
                    <td><a href="editar_sala.php?id=<?php echo hash('sha224', $sala['id'].'frasequesolotusepas')?>">Modificar</a> <a href="#" class="eliminar-sala" data-id="<?php echo hash('sha224', $sala['id'].'frasequesolotusepas')?>">Eliminar</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php elseif ($controlador == "usuarios"):?>
    <?php $usuarios = obtenerUsuarios($db); ?>
    <h1>Listas de usuarios</h1>
    <table id="tablaUsuarios" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>APELLIDOS</th>
                <th>EMAIL</th>
                <th>ROL</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($usuarios as $usuario):?>
            
            <?php if($_SESSION['usuario']['id']==$usuario['id']):?>
                <tr style= "background: #555;">
                    <td><?=$usuario['id']?></td>
                    <td><?=$usuario['nombre']?></td>
                    <td><?=$usuario['apellido']?></td>
                    <td><?=$usuario['email']?></td>
                    <?php if($usuario['rol']=="adm"):?>
                        <td style="color: #00ff00;"><?=$usuario['rol']?></td>
                    <?php else: ?>
                        <td><?=$usuario['rol']?></td>
                    <?php endif; ?>
                    <td><a href="editar_datos_admin.php?id=<?php echo hash('sha224', $usuario['id'].'frasequesolotusepas')?>">Modificar</a> <a href="#" class="eliminar-mi-usuario" data-id="<?php echo $usuario['id']?>">Eliminar</a></td>
                </tr>
            <?php else: ?>
                <tr>
                    <td><?=$usuario['id']?></td>
                    <td><?=$usuario['nombre']?></td>
                    <td><?=$usuario['apellido']?></td>
                    <td><?=$usuario['email']?></td>
                    <?php if($usuario['rol']=="adm"):?>
                        <td style="color: #00ff00;"><?=$usuario['rol']?></td>
                    <?php else: ?>
                        <td><?=$usuario['rol']?></td>
                    <?php endif; ?>
                    <td><a href="editar_datos_admin.php?id=<?php echo hash('sha224', $usuario['id'].'frasequesolotusepas')?>">Modificar</a> <a href="#" class="eliminar-usuario" data-id="<?php echo hash('sha224', $usuario['id'].'frasequesolotusepas')?>">Eliminar</a></td>
                </tr>
            <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php elseif ($controlador == "categorias"):?>
    <?php $categorias = obtenerCategorias($db); ?>
    <h1>Listas de Categorias</h1>
    <a href="añadir_categoria.php">+ Añadir categoria</a>
    <table id="tablaCategorias" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($categorias as $categoria):?>
                <tr>
                    <td><?=$categoria['id']?></td>
                    <td><?=$categoria['nombre']?></td>
                    <td><a href="editar_categoria_admin.php?id=<?php echo hash('sha224', $categoria['id'].'frasequesolotusepas')?>">Modificar</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php else: ?>
    <h1>Listas de reservas</h1>
    <?php $reservas = obtenerReservas($db); ?>
    <table id="tablaReservas" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>SALA</th>
                <th>USUARIO</th>
                <th>FECHA</th>
                <th>NÚMERO DE PERSONAS</th>
                <th>PRECIO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($reservas as $reserva):?>
                <?php   $fecha_reserva = new DateTime($reserva['fecha']);
                        $fecha_reserva_str = $fecha_reserva->format('Y-m-d');
                ?>
                <?php if($fecha_reserva_str>=$fecha_actual_str): ?>
                <tr>
                    <td><?=$reserva['id']?></td>
                    <td><?=$reserva['sala_id']?></td>
                    <td><?=$reserva['usuario_id']?></td>
                    <td><?=$reserva['fecha']?></td>
                    <td><?=$reserva['num_personas']?></td>
                    <td><?=$reserva['precio']?> €</td>
                    <td><a href="editar_reserva.php?c=adm&id=<?php echo hash('sha224',$reserva['id'].'frasequesolotusepas')?>">Modificar</a> <a href="#" class="eliminar-reserva" data-id="<?php echo hash('sha224',$reserva['id'].'frasequesolotusepas')?>">Eliminar</a></td>
                </tr>
                <?php else: ?>
                    <tr style="background: #990000;">
                    <td><?=$reserva['id']?></td>
                    <td><?=$reserva['sala_id']?></td>
                    <td><?=$reserva['usuario_id']?></td>
                    <td><?=$reserva['fecha']?></td>
                    <td><?=$reserva['num_personas']?></td>
                    <td><?=$reserva['precio']?> €</td>
                    <td>CADUCADA</td>
                </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php endif; ?>

<script>
    $(document).ready(function() {
        $('#tablaSalas').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
            }
        });
        $('#tablaUsuarios').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
            }
        });
        $('#tablaCategorias').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
            }
        });
        $('#tablaReservas').DataTable({
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

        confirmarEliminacion('.eliminar-sala', '../funciones/elimina.php?sala_id=');
        confirmarEliminacion('.eliminar-usuario', '../funciones/elimina.php?usuario_id=');
        confirmarEliminacion('.eliminar-mi-usuario', '../funciones/elimina.php?mi_usuario_id=');
        confirmarEliminacion('.eliminar-categoria', 'eliminar_categoria.php?id=');
        confirmarEliminacion('.eliminar-reserva', '../funciones/elimina.php?reserva_id=');
    });
</script>

</body>
</html>