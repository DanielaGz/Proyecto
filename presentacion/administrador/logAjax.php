<?php 
$log = new Log();
$logs = $log -> consultarFiltro($_GET['filtro']);

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

?>
