<?php
require "logica/Usuario.php";
require "logica/Pagina.php";
require "presentacion/edicionUsuario/editarArchivo.php";
require "logica/Administrador.php";
require "logica/log.php";
require "logica/usuarioLog.php";
require "logica/AdminLog.php";
clearstatcache();
$pid = base64_decode($_GET["pid"]);
include $pid;
