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
                            <h6 class="letra text-white text-center">TUS ÚLTIMOS PROYECTOS</h6>
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
                            if (count($paginas) == 0) {
                            ?>
                                <center>
                                    <h6>AUN NO TIENES PROYECTOS</h6>
                                    <button class="btn text-white rounded-pill letra" type="submit" data-toggle="modal" data-target="#exampleModal">
                                        Iniciar proyecto <i class="fas fa-plus-circle"></i>
                                    </button>
                                </center>

                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <a tabindex="0" class="" role="button" id="pop" data-toggle="popover" data-placement="bottom" data-trigger="focus" title="Hola!" data-content="Me alegra verte <?php echo $usuario->getNombre(); ?> ">
                        <img style=" max-height: 400px;" src="img/saludo2.gif" class="img-fluid" alt="Responsive image">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content borde shadow-lg">
            <div class="modal-header cabeza letra borde1 text-center">
                <h5 class="modal-title letra " id="exampleModalLabel">Escribe el nombre para tu proyecto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control rounded-pill letra" placeholder="Nombre" id="nombreplant">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary rounded-pill" id=<?php echo $_SESSION["id"]; ?> onclick="crearPag(this.id)">Crear</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#pop').popover('show');

    function Editar(val) {
        window.location.replace("index.php?pid=<?php echo base64_encode("presentacion/editarPagina.php") ?>&idpag=" + val);
    }

    function crearPag(id) {
        let nom = $("#nombreplant").val();
        $.ajax({
            url: "crear.php?n=" + nom + "&v=-2&idP=" + id + "&idU=" + <?php echo $_SESSION["id"] ?>,
            type: "GET",
            processData: false,
            contentType: false,
            cache: false,
            success: function(response) {
                alert("Su pagina se ha creado correctamente");
                Editar(response);
            }
        })
    }

</script>