<?php
$user = new Administrador();
$users = $user->consultarTodos();

?>


<div class="container mt-5">
    <div class="card borde">
        <div class="card-header borde1 encabezado text-white">
            <center>
                <h6>Usuarios administradores</h6>
            </center>
        </div>
        <div class="card-body">
            <div class="mb-3 row">
                <input type="text" id="busqueda" class="form-control letra rounded-pill" placeholder="Buscar..." onkeyup="buscar()">
            </div>

            <div style="height: 500px;" class="overflow-auto">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Id usuario</th>
                            <th scope="col">Nombre </th>
                            <th scope="col">Correo </th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody id="logs">
                        <?php
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

                    </tbody>
                </table>
            </div>

            <div id="alerta">
                
            </div>

        </div>
        <div class="card-footer">

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content mt-5">
            <div class="modal-header encabezado text-white text-center">
                <h5 class="modal-title" id="exampleModalLabel">Información del usuario </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="ver">

            </div>
        </div>
    </div>
</div>

<script>
    function buscar() {
        var url = "indexAjax.php?pid=<?php echo base64_encode("presentacion/administrador/adminAjax.php") ?>" + "&filtro=" + $("#busqueda").val();
        $("#logs").load(url);
    }

    function ver(v) {
        var url = "indexAjax.php?pid=<?php echo base64_encode("presentacion/administrador/administradorModal.php") ?>" + "&id=" + v;
        $("#ver").load(url);
        $('#user').modal('show');
    }

    function Bloquear(v) {
        var url = "indexAjax.php?pid=<?php echo base64_encode("presentacion/administrador/bloquearAdmin.php").'&idu='.$_SESSION['id'] ?>" + "&id=" + v;
        $("#alerta").load(url);
    }
</script>