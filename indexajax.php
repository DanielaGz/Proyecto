<?php
require "logica/Usuario.php";
require "logica/Pagina.php";
require "presentacion/edicion/editarArchivo.php";
clearstatcache();
$pid = base64_decode($_GET["pid"]);
include $pid;
