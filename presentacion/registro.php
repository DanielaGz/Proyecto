<?php
$nombre = $_POST["usuarioR"];
$correo = $_POST["correoR"];
$clave = $_POST["claveR"];
$usuario = new Usuario("", $nombre, $correo, $clave);
if ($usuario->existeCorreo() == 0) {
    $usuario->insertar();
    $usuario -> autenticar();
    $fecha = new DateTime();
    $id = $fecha->getTimestamp();
    $log = new Log($id, 'El usuario se unio al aplicativo ');
    $log->insertar();
    $ulog = new UsuarioLog($usuario -> getId(), $id);
    $ulog->insertar();

    header("Location: index.php?error=2");
} else {
    header("Location: index.php?error=1");
}
