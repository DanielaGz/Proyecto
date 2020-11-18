
<form action="index.php?pid=<?php echo base64_encode("presentacion/registro.php") ?>" method="post">
    <div class="form-group">
        <input name="usuarioR" type="text" class="form-control i letra" placeholder="Usuario" required>
    </div>
    <div class="form-group">
        <input name="correoR" type="email" class="form-control i letra" placeholder="Correo" required>
    </div>
    <div class="form-group">
        <input name="claveR" type="password" class="form-control i letra" placeholder="Clave" required>
    </div>
    <div class="form-group">
        <input name="ingresarR" type="submit" class="form-control btn text-white letra i" value="Iniciar">
    </div>
</form>
<p>¿Ya tienes un usuario? <button class="b2" onclick="Registrar(1)">Inicia sesión</button></p>