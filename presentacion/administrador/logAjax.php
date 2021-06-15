<?php
$log = new Log();
if (isset($_GET['user'])) {
    $logs = $log->consultarFiltro($_GET['filtro']);
    foreach ($logs as $ls) {
        $u = new Usuario($ls->getIdU());
        $u->consultar();
?>
        <tr>
            <td><?php echo $ls->getIdU(); ?></td>
            <td><?php echo $u->getNombre(); ?></td>
            <td><?php echo $ls->getAccion(); ?></td>
            <td><?php echo $ls->getFecha(); ?></td>
        </tr>
    <?php
    }
} else {
    $logs = $log->consultarFiltroAdmin($_GET['filtro']);
    foreach ($logs as $ls) {
        $u = new Administrador($ls->getIdU());
        $u->consultar();
    ?>
        <tr>
            <td><?php echo $ls->getIdU(); ?></td>
            <td><?php echo $u->getNombre(); ?></td>
            <td><?php echo $ls->getAccion(); ?></td>
            <td><?php echo $ls->getFecha(); ?></td>
        </tr>
<?php
    }
}