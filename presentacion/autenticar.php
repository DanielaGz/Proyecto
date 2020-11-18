<?php
$correo = $_POST["correo"];
$clave = $_POST["clave"];
$usuario = new Usuario("", "", $correo, $clave);
if ($usuario->autenticar()) {
    $_SESSION["id"] = $usuario->getId();  /* se almacena la sesion  */
    header("Location: index.php?pid=" . base64_encode("presentacion/usuario/inicioU.php"));
} else {
    header("Location: index.php?error=3");
}
