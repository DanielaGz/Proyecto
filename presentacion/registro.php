<?php
$nombre = $_POST["usuarioR"];
$correo = $_POST["correoR"];
$clave = $_POST["claveR"];
$usuario = new Usuario("", $nombre, $correo, $clave);
if ($usuario->existeCorreo()==0) {
    $usuario-> insertar();
    header("Location: index.php?error=2");
} else {
    header("Location: index.php?error=1");
}
