<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <a class="navbar-brand letra" href="index.php?pid=<?php echo base64_encode("presentacion/Usuario/inicioU.php") ?>"><img src="img/logo2.png" width="35vmax"> Inicio</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php?pid=<?php echo base64_encode("presentacion/usuario/paginasU.php") ?>">Tus paginas<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Perfil
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Tu información</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="index.php?cerrarSesion=true"><i class="fas fa-sign-out-alt"></i> Cerrar Sesion</a>
                </div>
            </li>
        </ul>
        <span class="navbar-text">
            Genera codigo base
        </span>
    </div>
</nav>