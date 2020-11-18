<?php
$pagina = new Pagina("", "", "", "", $_SESSION["id"]);
$paginas = $pagina->consultar();
?>

<div class="container-lg container-xl mt-5 mb-5">
    <div class="card shadow-lg borde" style="min-height: 35vmax;">
        <div class="card-header borde1 text-white letra text-center">
            Tus paginas
        </div>
        <div class="card-body">
            <?php
            foreach ($paginas as $pag) {
            ?>
                <div class="card rounded-pill borber border-secondary mb-3">
                    <div class="ml-3 mt-2 mb-2">
                        <div class="row">
                            <div class="col-5 align-self-center">
                                <?php echo $pag->getNombre(); ?>
                            </div>
                            <div class="col-4 align-self-center">
                                <?php echo $pag->getFecha(); ?>
                            </div>
                            <div class="col-3 d-flex justify-content-center">
                                <button class="btn f mr-2" type="submit" value="<?php echo $pag->getRuta(); ?>" onclick="Editar(this.value)">
                                    <h6><i class="fas fa-pencil-alt"></i></h6>
                                </button>
                                <a class="btn f mr-2" href="index.php?pid=<?php echo base64_encode("presentacion/edicionUsuario/descargar.php") . "&idPag=" . $pag->getRuta() . "&id=" . $_SESSION["id"]; ?>" type="button" id="<?php echo $pag->getRuta(); ?>" class="btn btn-dark float-right i letra">
                                    <h6><i class="fas fa-download"></i></h6>
                                </a>
                                <button class="btn f mr-2" type="submit" value="<?php echo $pag->getRuta(); ?>" onclick="Eliminar(this.value)">
                                    <h6><i class="fas fa-trash-alt"></i></h6>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>
        <div class="card-footer d-flex justify-content-end">
            <button class="btn f mr-2" type="submit">
                <h6><i class="fas fa-plus-circle" id=<?php echo $_SESSION["id"]; ?> onclick="crearPag(this.id)"></i></h6>
            </button>
        </div>
    </div>
</div>

<script>
    function crearPag(id) {
        $.ajax({
            url: "crear.php?v=-2&idP=" + id + "&idU=" + <?php echo $_SESSION["id"] ?>,
            type: "GET",
            processData: false,
            contentType: false,
            cache: false,
            success: function(response) {
                alert("Su pagina se ha creado correctamente");
            }
        })
    }

    function Eliminar(id) {
        $.ajax({
            url: "crear.php?v=-1&idP=" + id + "&idU=" + <?php echo $_SESSION["id"] ?>,
            type: "GET",
            processData: false,
            contentType: false,
            cache: false,
            success: function(response) {
                alert(response);
            }
        })
    }

    function Editar(val) {
        window.location.replace("index.php?pid=<?php echo base64_encode("presentacion/editarPagina.php") ?>&idpag=" + val);
    }
</script>