<?php require_once 'conexion.php'; ?>
<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>ClueHaven: Inicio</title>
        <link rel="stylesheet" href="../assets/css/estilo.css">
    <!-- Incluye jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Incluye DataTables CSS -->
        <link rel="stylesheet" href="../assets/css/datatable.css">
    <!-- Incluye DataTables JS -->
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    </head>
    <body>
        <!--CABECERA-->
        <header id="cabecera">
            <a href="index.php">
                <img src="../assets/img/OIG3.png" alt="">
            </a>    
            <nav id="menuNav">
                <ul>
                    <li>
                        <a href="../paginas/index.php">Inicio</a>
                    </li>
                    <li>
                        <a href="../paginas/salas.php">Nuestras Salas</a>
                    </li>
                </ul>

            </nav>
            <?php if(isset($_SESSION['usuario'])):?> <!--Comprobar si existe una sesion iniciada para mostrar el nombre del usuario-->
                <div id="nombre_cab">
                    <p><?php echo $_SESSION['usuario']['nombre']." ".$_SESSION['usuario']['apellido']?></p>
                </div>
                
            <?php endif;?>
            <nav id="menuLogin">
                <ul>
                    <!--Comprobar si existe una sesion iniciada y su rol para mostrar las diferentenes opciones-->
                    <?php if(!isset($_SESSION['usuario'])): ?>
                        <li>
                            <a href="../paginas/signin.php">Registrarse</a>
                        </li>
                        <li>
                            <a href="../paginas/login.php">Iniciar sesión</a>
                        </li>
                    <?php else: ?>
                        <?php if($_SESSION['usuario']['rol']=='user'):?>
                        <li>
                            <a href="../paginas/lista_mis_reservas.php">Mis reservas</a>
                        </li>

                        <?php else:?>
                            <li class="dropdownAdmin">
                            <a href="#" class="dropbtnAdmin">Mis acciones</a>
                            <div class="dropdown-contentAdmin">
                                <a href="../paginas/lista_mis_reservas.php">Mis reservas</a>
                                <a href="../paginas/listas_admin.php?c=salas">Gestionar salas</a>
                                <a href="../paginas/listas_admin.php?c=categorias">Gestionar categorias</a>
                                <a href="../paginas/listas_admin.php?c=reservas">Gestionar reservas</a>
                                <a href="../paginas/listas_admin.php?c=usuarios">Gestionar usuarios</a>

                            </div>
                            </li>
                        <?php endif;?>

                        <li class="dropdown">
                            <a href="#" class="dropbtn">Mis perfil</a>
                            <div class="dropdown-content">
                                <a href="../paginas/ver_datos.php">Ver datos</a>
                                <a href="../funciones/cerrar_sesion.php">Cerrar sesión</a>
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </header>