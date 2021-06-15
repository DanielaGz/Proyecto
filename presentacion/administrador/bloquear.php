<?php

$user = new Usuario($_GET['id']);
$user->consultar();

$alerta = ($user->getEstado() == 1) ? 'Usuario bloqueado correctamente' : 'Usuario desbloqueado correctamente';

$estado = ($user->getEstado() == 1) ? '2' : '1';

$texto = ($user->getEstado() == 1) ? 'Bloqueo' : 'Desbloqueo';

$usser = new Usuario($_GET['id'], '', '', '', '', $estado);
$usser->Estado();

$fecha = new DateTime();
$id = $fecha->getTimestamp();
$log = new Log($id, $texto.' el usuario cliente '.$user ->getNombre().' con id '.$user -> getId());
$log->insertar();
$ulog = new AdminLog($_GET["idu"], $id);
$ulog->insertar();

?>


<div class="alert alert-success" role="alert">
    <strong><?php echo $alerta; ?></strong>
</div>