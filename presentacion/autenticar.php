<?php
$correo = $_POST["correo"];
$clave = $_POST["clave"];
$usuario = new Usuario("", "", $correo, $clave);
$admin = new Administrador("", "", $correo, $clave);
$fecha = new DateTime();
$fecha->getTimestamp();
if ($usuario->autenticar()) {
    if ($usuario->getEstado() == 2) {
        header("Location: index.php?error=4");
    } else {
        $_SESSION["id"] = $usuario->getId();  /* se almacena la sesion  */
        $_SESSION["rol"] = 'usuario';
        $id = $fecha->getTimestamp();
        $log = new Log($id, 'Inicio de sesión');
        $log->insertar();
        $ulog = new UsuarioLog($usuario->getId(), $id);
        $ulog->insertar();
        header("Location: index.php?pid=" . base64_encode("presentacion/usuario/inicioU.php"));
    }
} else if ($admin->autenticar()) {
    if ($admin->getEstado() == 2) {
        header("Location: index.php?error=4");
    } else {
        $_SESSION["id"] = $admin->getId();  /* se almacena la sesion  */
        $_SESSION["rol"] = 'admin';
        $id = $fecha->getTimestamp();
        $log = new Log($id, 'Inicio de sesión');
        $log->insertar();
        $ulog = new AdminLog($admin->getId(), $id);
        $ulog->insertar();
        header("Location: index.php?pid=" . base64_encode("presentacion/administrador/inicio.php"));
    }
} else {
    header("Location: index.php?error=3");
}
