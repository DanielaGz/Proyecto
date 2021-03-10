<div class="container mt-5">
    <div class="row">
        <div class="col-lg-9">
            <div class="card m-1 shadow-lg " style="border-radius: 3vmax; align-items: center;">
                <div class="embed-responsive embed-responsive-16by9 m-4" style="width: 90%;">
                    <iframe class='embed-responsive-item' src='https://www.youtube.com/embed/pwc1AjaA5HE' allowfullscreen style='border-radius: 1vmax;'></iframe>;
                </div>
            </div>
        </div>
        <div class="col-lg-3 iniciar">
            <div class="card m-1 shadow-lg " style="border-radius: 3vmax; align-items: center;">
                <div class="card-body text-center">
                    <a class="btn text-white rounded-pill letra" href="index.php?pid=<?php
                                                                                        echo base64_encode("presentacion/crearPagina.php");
                                                                                        ?>" role="button" data-toggle="modal" data-target="#exampleModal">Comienza ya!</a>
                    <hr />
                </div>

            </div>
        </div>
        <div class="col-lg-3 iniciarcell">
            <br>
            <div class="card m-1 shadow-lg " style="border-radius: 3vmax; align-items: center;">
                <div class="card-header letra borde1" style="width: 100%; border-top-left-radius: 2vmax; border-top-right-radius: 2vmax;">
                    Inicia sesión
                </div>
                <div class="card-body text-center">
                    <?php include "iniciar.php" ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade mt-5" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog p">
        <div class="modal-content borde">
            <div class="modal-header cabeza text-white borde1">
                <h5 class="modal-title letra" id="exampleModalLabel">Iniciar sesion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center" id="m">
                <?php include "iniciar.php" ?>
            </div>
        </div>
    </div>
</div>
<script>
    function crear() {
        $.ajax({
            url: "presentacion/edicion/elegir.php?v=-1",
            type: "GET",
            processData: false,
            contentType: false,
            cache: false,
        })
    }

    function Registrar(val) {
        if (val == 0) {
            var url = "indexAjax.php?pid=<?php echo base64_encode("presentacion/registrar.php") ?>";
            $("#m").load(url);
        } else {
            var url = "indexAjax.php?pid=<?php echo base64_encode("presentacion/iniciar.php") ?>";
            $("#m").load(url);
        }

    }

    <?php if (isset($_GET["error"])) {
    ?>
        $('#exampleModal').modal('show')
    <?php
    } ?>
</script>