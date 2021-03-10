<?php
$pagina = new Pagina("", "", "", "", $_SESSION["id"]);
$paginas = $pagina->consultarMod();
?>

<div class="container-lg container-xl mt-5 mb-5">
    <div class="card shadow-lg borde" style="min-height: 35vmax;">
        <div class="card-header borde1 text-white letra text-center">
            <h6>Tus paginas</h6>
        </div>
        <div class="card-body">
            <div class="mb-3 row">
                <div class="col-8">
                    <input type="text" id="busqueda" class="form-control letra rounded-pill" placeholder="Buscar..." onkeyup="buscar()">
                </div>
                <div class="col-4">
                    <select class="custom-select letra rounded-pill" id="Organizar" onchange="Organizar(this.value)">
                        <option value="1" selected>Ultima modificación</option>
                        <option value="2">Fecha de creación</option>
                        <option value="3">Nombre</option>
                    </select>
                </div>

            </div>

            <div id="paginasU">
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
                                    <button class="btn f mr-2" type="submit" value="<?php echo $pag->getRuta(); ?>" data-toggle="modal" data-target="#elim" onclick="validar(this.value)">
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


        </div>
        <div class="card-footer d-flex justify-content-end">
            <button class="btn f mr-2" type="submit" data-toggle="modal" data-target="#exampleModal">
                <h6><i class="fas fa-plus-circle"></i></h6>
            </button>
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

<!-- Modal -->
<div class="modal fade" id="elim" tabindex="-1" aria-labelledby="elim" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content borde shadow-lg">
            <div class="modal-header cabeza letra borde1 text-center">
                <h5 class="modal-title letra " id="exampleModalLabel">¡ESPERA!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4">
                        <img src="img/Basura.gif" class="img-fluid" alt="Responsive image">
                    </div>
                    <div class="col-8">
                        ¿Estas seguro de que quieres eliminar el proyecto "nombre"? Una vez lo elimines
                        no podrás recuperar los archivos.
                    </div>
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-primary rounded-pill" id="eliminar" value="" onclick="Eliminar(this.value)">Eliminar definitivamente</button>

                <div class="text-info" style="display: none;" id="iconoCarga">
                    <div class="spinner-border text-info" role="status">
                        <span class="sr-only">Loading...</span>
                    </div> Eliminando...
                </div>
            </div>
        </div>
    </div>
</div>

<script>
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

    function Eliminar(id) {
        $("#iconoCarga").css("display", "block");
        $.ajax({
            url: "crear.php?v=-1&idP=" + id + "&idU=" + <?php echo $_SESSION["id"] ?>,
            type: "GET",
            processData: false,
            contentType: false,
            cache: false,
            success: function(response) {
                var url = "indexAjax.php?pid=<?php echo base64_encode("presentacion/Usuario/PaginasUAjax.php") . "&sec=" . $_SESSION["id"] ?>" + "&c=" + 1;
                $("#paginasU").load(url);
                $("#iconoCarga").css("display", "none");
                $('#elim').modal('hide');
            }
        })
    }

    function Organizar(val) {
        var url = "indexAjax.php?pid=<?php echo base64_encode("presentacion/Usuario/PaginasUAjax.php") . "&sec=" . $_SESSION["id"] ?>" + "&c=" + val;
        $("#paginasU").load(url);
    }

    function buscar() {
        var url = "indexAjax.php?pid=<?php echo base64_encode("presentacion/Usuario/PaginasUAjax.php") . "&sec=" . $_SESSION["id"] ?>" + "&c=" + 4 + "&filtro=" + $("#busqueda").val();
        $("#paginasU").load(url);
    }

    function Editar(val) {
        window.location.replace("index.php?pid=<?php echo base64_encode("presentacion/editarPagina.php") ?>&idpag=" + val);
    }

    function validar(val) {
        $("#eliminar").val(val);
    }
</script>