<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <a class="navbar-brand letra" href="index.php?pid=<?php echo base64_encode("presentacion/administrador/inicio.php") ?>"><img src="img/logo2.png" class="imagen"> Inicio</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle letra" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Usuarios
                </a>
                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                    <a class="dropdown-item letra" href="index.php?pid=<?php echo base64_encode("presentacion/administrador/administradores.php") ?>"><i class="fas fa-users"></i> Ver administradores</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item letra" href="index.php?pid=<?php echo base64_encode("presentacion/administrador/usuarios.php") ?>"><i class="fas fa-users"></i> Ver clientes</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item letra" href="index.php?pid=<?php echo base64_encode("presentacion/administrador/nuevoAdmin.php") ?>"><i class="fas fa-user-plus"></i> Añadir administrador</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item letra" href="index.php?pid=<?php echo base64_encode("presentacion/administrador/nuevoCliente.php") ?>"><i class="fas fa-user-plus"></i> Añadir cliente</a>
                </div>
            </li>
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle letra" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Log
                </a>
                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                    <a class="dropdown-item letra" href="index.php?pid=<?php echo base64_encode("presentacion/administrador/logAdmin.php") ?>"><i class="fas fa-user-clock"></i> Log de administradores</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item letra" href="index.php?pid=<?php echo base64_encode("presentacion/administrador/log.php") ?>"><i class="fas fa-user-clock"></i> Log de clientes</a>

                </div>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle letra" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Perfil
                </a>
                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                    <a class="dropdown-item letra" href="index.php?pid=<?php echo base64_encode("presentacion/administrador/informacion.php") ?>">Tu información</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item letra" href="index.php?cerrarSesion=true"><i class="fas fa-sign-out-alt"></i> Cerrar Sesion</a>
                </div>
            <li class="nav-item active">
                <a class="nav-link letra" href="index.php?cerrarSesion=true"><i class="fas fa-sign-out-alt"></i> Cerrar Sesion<span class="sr-only">(current)</span></a>
            </li>
            </li>
        </ul>
    </div>
</nav>