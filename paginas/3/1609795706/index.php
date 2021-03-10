<?php
clearstatcache();
$pid = "";
if (isset($_GET["pid"])) {
	$pid = base64_decode($_GET["pid"]);
} else {
	$_SESSION["id"] = "";
}
?>

<html>

<head>
	<meta http-equiv=»Cache-Control» content=»no-cache» />
	<title>Pagina</title>
	<link rel="icon" type="image/png" href="img/logo.png" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.1/css/all.css" />
	<link rel="stylesheet" href="css/estilos.css?var=0" />
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
</head>
<style>

</style>

<body>
	<?php
	include "header.php";
	include "menu.php";
	if ($pid != "") {
		clearstatcache();
		include $pid;
	} else {
		clearstatcache();
		include "presentacion/inicio.php";
	}

	?>
</body>

</html>