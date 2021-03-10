<form action="index.php?pid=<?php echo base64_encode("presentacion/autenticar.php") ?>" method="post">
    <div class="form-group">
        <input name="correo" type="email" class="form-control i letra" placeholder="Correo" required>
    </div>
    <div class="form-group">
        <input name="clave" type="password" class="form-control i letra" placeholder="Clave" required>
    </div>
    <div class="form-group">
        <input name="ingresar" type="submit" class="form-control btn text-white letra i" value="Iniciar">
    </div>
    <?php
    if (isset($_GET["error"]) && $_GET["error"] == 1) {
        echo "<div class=\"alert alert-danger\" role=\"alert\">El correo ya existe</div>";
    } else if (isset($_GET["error"]) && $_GET["error"] == 2) {
        echo "<div class=\"alert alert-success\" role=\"alert\">Usuario Registrado, inicie sesión</div>";
    } else if (isset($_GET["error"]) && $_GET["error"] == 3) {
        echo "<div class=\"alert alert-danger\" role=\"alert\">Correo o clave erroneos</div>";
    }
    ?>
</form>
<p class="letra">¿Eres nuevo? <button class="b2" onclick="Registrar(0)">Registrate</button></p>