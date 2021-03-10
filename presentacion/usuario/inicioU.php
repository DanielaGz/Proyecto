<?php
$usuario = new Usuario($_SESSION["id"]);
$usuario->consultar();
$pagina = new Pagina("", "", "", "", $_SESSION["id"]);
$paginas = $pagina->consultarMod2();
?>
<div class="container mt-5">
    <div class="card ">
        <div class="card-header">
            <h6 class="letra text-white text-center">HOLA <?php echo $usuario->getNombre(); ?></h6>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-8">
                    <div class="card borde">
                        <div class="card-header borde1">
                            <h6 class="letra text-white text-center">TUS ULTIMOS PROYECTOS</h6>
                        </div>
                        <div class="card-body">
                            <?php
                            foreach ($paginas as $pag) {
                            ?>
                                <div class="card rounded-pill borber border-secondary mb-3">
                                    <div class="ml-3 mt-2 mb-2">
                                        <div class="row">
                                            <div class="col-9 align-self-center">
                                                <?php echo $pag->getNombre(); ?>
                                            </div>
                                            <div class="col-3 d-flex justify-content-center">
                                                <button class="btn f mr-2" type="submit" value="<?php echo $pag->getRuta(); ?>" onclick="Editar(this.value)">
                                                    <h6><i class="fas fa-pencil-alt"></i></h6>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <a tabindex="0" class="" role="button" id="pop" data-toggle="popover" data-trigger="focus" title="Hola!" data-content="Me alegra verte denuevo <?php echo $usuario -> getNombre(); ?> ">
                        <img style=" max-height: 400px;" src="img/logoanim.gif" class="img-fluid" alt="Responsive image">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#pop').popover('show');

    function Editar(val) {
        window.location.replace("index.php?pid=<?php echo base64_encode("presentacion/editarPagina.php") ?>&idpag=" + val);
    }
</script>