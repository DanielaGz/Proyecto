<?php
$user = new Usuario();

$users = $user->consultarFiltro($_GET['filtro']);

foreach ($users as $u) {
?>
    <tr>
        <td><?php echo $u->getId(); ?></td>
        <td><?php echo $u->getNombre(); ?></td>
        <td><?php echo $u->getCorreo(); ?></td>
        <td><button class="btn rounded-pill text-white" title="Ver información" onclick="ver(<?php echo $u->getId(); ?>)"><i class="fas fa-eye"></i></button> <button title="bloquear / desbloquear" class="btn rounded-pill text-white" onclick="Bloquear(<?php echo $u->getId(); ?>)"><i class="fas fa-user-check"></i></a></button>
    </tr>
<?php
}

?>