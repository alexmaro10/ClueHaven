<?php include_once '../includes/cabecera.php'?>
<?php if(!isset($_SESSION)){session_start();}?>
        <!--PORTADA-->

        <div id="portada">
            <p id="titulo1">Bienvenido a ClueHaven</p>
            <p id="subtitulo">Dejate atrapar por nuestras salas</p>
            <a href="index.php"><input type="button" value="Conócenos" id="bSobreNosotros"></a>
        </div>
        
        <div id="descripción">
            <p id="dTitulo">¿Podrás pasar la prueba?</p>
            <hr id="separador1">
            <p id="dTexto">¡Desafía tus habilidades y descubre si tienes lo necesario para superar nuestra emocionante prueba! Sumérgete en una aventura llena de misterios, acertijos y enigmas que pondrán a prueba tu ingenio y destreza. ¿Tienes lo que se necesita para escapar a tiempo? ¡Ven y demuestra tu valía!</p>
        </div>

        <div id="reglas">
            <p id="pTitulo">Reglas</p>
            <hr id="separador2">
            <img id="ireglas" src="../assets/img/reglas.png" alt="">
        </div>

        <div id="precios">
            <p>Precios</p>
            <hr id="separador3">
            <ul>
                <li>2 personas: 19€ por persona</li>
                <li>3 personas: 15€ por persona</li>
                <li>4 personas: 13€ por persona</li>
            </ul>
        </div>
        <?php include_once '../includes/pie.php'?>