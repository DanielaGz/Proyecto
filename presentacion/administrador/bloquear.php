<?php 

$user = new Usuario($_GET['id']);
$user ->consultar();

$alerta = ($user ->getEstado()==1)?'Usuario bloqueado correctamente':'Usuario desbloqueado correctamente';

$estado = ($user ->getEstado()==1)?'2':'1';

$usser = new Usuario($_GET['id'],'','','','',$estado);
$usser -> Estado();

?>


<div class="alert alert-success" role="alert">
    <strong><?php echo $alerta; ?></strong>
</div>