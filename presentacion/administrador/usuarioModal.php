<?php

$user = new Usuario($_GET['id']);
$user->consultar();

$pagina = new Pagina("", "", "", "", $_GET['id']);
$paginas = $pagina->consultarMod();

?>

<div class="row">
    <div class="col-lg-3 ">
        <img style=" max-height: 400px;" src=<?php echo ($user->getFoto() == '') ? 'img/usuario.png' : $user->getFoto(); ?> class="img-fluid" alt="Responsive image">
    </div>
    <div class="col-lg-9 d-flex align-items-center">
        <div class="table-responsive ">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th scope="row">Nombre</th>
                        <td><?php echo $user->getNombre(); ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Correo</th>
                        <td><?php echo $user->getCorreo(); ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Estado</th>
                        <td><?php echo ($user->getEstado()==1)?'Activo':'Bloqueado'; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Número de proyectos</th>
                        <td><?php echo count($paginas); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>