<?php
 require "presentacion/edicion/editarArchivo.php";
clearstatcache();
$pid = base64_decode($_GET["pid"]);
include $pid;
?>
 