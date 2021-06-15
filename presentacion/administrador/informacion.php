<?php

if (isset($_POST['nombre'])) {
    $fecha = new DateTime();
    $usuario = new Administrador($_SESSION["id"], $_POST['nombre']);
    $tmp = $_FILES['foto']["tmp_name"];
    $usuario->consultar();
    if ($tmp != '') {
        if (file_exists($usuario->getFoto())) {
            unlink($usuario->getFoto());
        }
        $folder = 'img/Usuarios/' . $fecha->getTimestamp() . '.jpg';
        move_uploaded_file($tmp, $folder);
        $usuario = new Administrador($_SESSION["id"], $_POST['nombre'], "", "", $folder);
        $usuario->Editar();
    } else {
        $usuario = new Administrador($_SESSION["id"], $_POST['nombre'], "", "", $usuario->getFoto());
        $usuario->Editar();
    }
    $id = $fecha->getTimestamp();
    $log = new Log($id, 'Editó su información personal');
    $log->insertar();
    $ulog = new AdminLog($_SESSION["id"], $id);
    $ulog->insertar();
} else if (isset($_POST['cnueva'])) {
    $v = false;
    $fecha = new DateTime();
    $usuario = new Administrador($_SESSION["id"], "", "", $_POST['cant']);
    if ($usuario->VerificarPass()) {
        $usuario = new Administrador($_SESSION["id"], "", "", $_POST['cnueva']);
        $usuario->EditarPass();
        $v = true;
        $id = $fecha->getTimestamp();
        $log = new Log($id, 'Editó su contraseña');
        $log->insertar();
        $ulog = new AdminLog($_SESSION["id"], $id);
        $ulog->insertar();
    }
} else {
    $usuario = new Administrador($_SESSION["id"]);
}

$usuario->consultar();

?>
<div class="container mt-5">
    <div class="card shadow-lg borde card">
        <div class="card-header borde1">
            <h6 class="letra text-white text-center"> INFORMACIÓN PERSONAL <?php echo $usuario->getNombre(); ?></h6>
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <div class="row ml-5 mr-5">
                        <div class="col-lg-3 col-md-3 col-12">
                            <img style=" max-height: 400px;" src="<?php echo ($usuario->getFoto() == '') ? 'img/usuario.png' : $usuario->getFoto(); ?>" class="img-fluid" alt="Responsive image">
                        </div>
                        <div class="ml-5 col-lg-8 col-md-8 col-12 d-flex align-items-center">
                            <div class="table-responsive ">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Nombre</th>
                                            <td><?php echo $usuario->getNombre(); ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Correo</th>
                                            <td><?php echo $usuario->getCorreo(); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <?php
                    if (isset($_POST['nombre'])) {
                    ?>
                        <br>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Información actualizada!</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php
                    }

                    ?>

                    <?php
                    if (isset($_POST['cnueva'])) {
                        if ($v) {
                    ?>
                            <br>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Contraseña actualizada!</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php
                        } else {
                        ?>
                            <br>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>La contraseña anterior no coincide!</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                    <?php
                        }
                    }

                    ?>

                </div>
                <div class="card-footer">
                    <div class="m-3 d-flex justify-content-between">
                        <button type="button" class="btn rounded-pill text-white letra" data-toggle="modal" data-target="#EditarCon">Editar contraseña <i class="fas fa-unlock-alt"></i></button>
                        <button type="button" class="btn rounded-pill text-white letra" data-toggle="modal" data-target="#Editar">Editar información <i class="fas fa-pencil-alt"></i></button>
                    </div>
                </div>


            </div>



        </div>
        <div class="card-footer">

        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="Editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content mt-5 borde">
            <div class="modal-header cabeza">
                <h5 class="modal-title text-white letra" id="exampleModalLabel">Editar información personal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="index.php?pid=<?php echo base64_encode("presentacion/administrador/informacion.php") ?>" method="post" enctype="multipart/form-data">

                <div class="modal-body letra">
                    Nombre: <input type="text" name="nombre" class="form-control letra rounded-pill" value="<?php echo $usuario->getNombre(); ?>">

                    Foto: <div class="custom-file">
                        <input type="file" class="custom-file-input" id="foto" name="foto" accept="image/*">
                        <label class="custom-file-label letra rounded-pill" for="foto">Elegir</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <input class="btn text-white letra rounded-pill" type="submit" value="Editar">
                </div>
            </form>

        </div>
    </div>
</div>

<div class="modal fade" id="EditarCon" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content mt-5 borde">
            <div class="modal-header cabeza">
                <h5 class="modal-title text-white letra" id="exampleModalLabel">Editar contraseña</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="index.php?pid=<?php echo base64_encode("presentacion/administrador/informacion.php") ?>" method="post">

                <div class="modal-body letra">
                    Contraseña anterior: <input type="password" name="cant" class="form-control letra rounded-pill" value="">

                    Contraseña nueva: <input type="password" name="cnueva" class="form-control letra rounded-pill" value="">

                </div>

                <div class="modal-footer">
                    <input class="btn text-white letra rounded-pill" type="submit" value="Editar">
                </div>
            </form>

        </div>
    </div>
</div>


<script>

</script>