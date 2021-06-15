<?php
if (isset($_POST['crear'])) {
    $admin = new Administrador("", $_POST['nombre'], $_POST['correo'], $_POST['clave']);
    $admin->insertar();

    $fecha = new DateTime();
    $id = $fecha->getTimestamp();
    $log = new Log($id, 'Creó un nuevo usuario administrador');
    $log->insertar();
    $ulog = new AdminLog($_SESSION['id'], $id);
    $ulog->insertar();
}

?>

<div class="container mt-5 mb-5">
    <div class="card">
        <div class="card-header text-center text-white">
            <h6>Nuevo usuario administrador</h6>
        </div>
        <form action="index.php?pid=<?php echo base64_encode("presentacion/administrador/nuevoAdmin.php") ?>" method="post">
            <div class="card-body">
                <?php
                if (isset($_POST['crear'])) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <strong>Usuario creado</strong>
                    </div>
                <?php
                }
                ?>
                Nombre:
                <input name="nombre" type="text" class="form-control i letra" placeholder="Nombre..." required>
                Correo:
                <input name="correo" type="email" class="form-control i letra" placeholder="Correo..." required>
                Clave:
                <input name="clave" type="password" class="form-control i letra" placeholder="Clave..." required>
            </div>
            <div class="card-footer">
                <input name="crear" type="submit" class="form-control btn text-white letra i" value="Crear">
            </div>
        </form>
    </div>
</div>