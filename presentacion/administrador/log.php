<?php
$log = new log();
$l = $log->consultar();

?>


<div class="container mt-5">
    <div class="card borde">
        <div class="card-header borde1 encabezado text-white">
            <center><h6>Log de usuarios</h6></center>
        </div>
        <div class="card-body">
            <div class="mb-3 row">
                <input type="text" id="busqueda" class="form-control letra rounded-pill" placeholder="Buscar..." onkeyup="buscar()">
            </div>

            <div  style="height: 500px;" class="overflow-auto">
                <table class="table" >
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Id usuario</th>
                            <th scope="col">Nombre </th>
                            <th scope="col">Acción </th>
                            <th scope="col">Fecha </th>
                        </tr>
                    </thead>
                    <tbody id="logs">
                        <?php
                        foreach ($l as $ls) {
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

                    </tbody>
                </table>
            </div>



        </div>
        <div class="card-footer">

        </div>
    </div>
</div>

<script>
    function buscar() {
        var url = "indexAjax.php?pid=<?php echo base64_encode("presentacion/administrador/logAjax.php") . "&sec=" . $_SESSION["id"] ?>" + "&filtro=" + $("#busqueda").val();
        $("#logs").load(url);
    }
</script>