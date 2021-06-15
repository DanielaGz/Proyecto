<?php
session_start();
require "logica/Usuario.php";
require "logica/Pagina.php";
require "logica/Administrador.php";
require "logica/log.php";
require "logica/usuarioLog.php";
require "logica/AdminLog.php";
$pid = "";
if (isset($_GET["pid"])) {
	$pid = base64_decode($_GET["pid"]);
} else {
	$_SESSION["id"] = "";
	$_SESSION["pag"] = "";
	$_SESSION['rol'] = "";
}
if (isset($_GET["cerrarSesion"]) || !isset($_SESSION["id"])) {
	$_SESSION["id"] = "";
	$_SESSION["pag"] = "";
	$_SESSION['rol'] = "";
}
?>
<html>

<head>
	<meta http-equiv=»Cache-Control» content=»no-cache» />
	<title>GenCoBa</title>
	<link rel="icon" type="image/png" href="img/logo2.png" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.1/css/all.css" />
	<link rel="stylesheet" href="css/estilos.css" />
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.js"></script>
	

</head>

<body>
	<?php
	$paginasSinSesion = array(
		"presentacion/inicio.php",
		"presentacion/autenticar.php",
		"presentacion/crearPagina.php",
		"presentacion/registro.php"
	);
	if ($pid == "") {
		include "presentacion/menu.php";
		include "presentacion/inicio.php";
	} else if ($_SESSION["id"] != "") {
		if($_SESSION["rol"]=='usuario'){
			include "presentacion/usuario/menu.php";
		}else{
			include "presentacion/administrador/menu.php";
		}
		include $pid;
	} else if (in_array($pid, $paginasSinSesion)) {
		include "presentacion/menu.php";
		include $pid;
	}
	?>
</body>

</html>
<script>
	$(function() {
		$('[data-toggle="popover"]').popover()
	})
</script>