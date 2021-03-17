<?php
$seccion = "";
$_SESSION["pag"] = $_GET["idpag"];
if (isset($_GET["sec"])) {
    $seccion = "#" . $_GET["sec"];
}
$fecha = new DateTime();
$obj = new Pagina("", "", $_GET["idpag"]);
$obj->consultarPag();
$obj->editar("FechaEd", "NOW()");


$fecha = new DateTime();
$id=$fecha->getTimestamp();
$log = new Log($id, 'Edición del proyecto '.$obj->getNombre());
$log->insertar();
$ulog = new UsuarioLog($_SESSION['id'], $id);
$ulog->insertar();

$var = count(glob($_SESSION["pag"] . '{*.php}', GLOB_BRACE));
?>
<input id="anterior" type="hidden" value="">
<input id="editando" type="hidden" value="">
<div class="botones marb">
    <div class="row tex-left">
        <div class="col-1 col-xs-2 bot">
            <div>
                <button class="btn f" type="submit" data-toggle="collapse" data-target="#tipo" aria-expanded="false" aria-controls="multiCollapseExample2">
                    <h6><i class="fas fa-palette"></i></h6>
                </button>
            </div>
            <div>
                <br>
            </div>
            <div>
                <button class="btn f" type="submit" data-toggle="collapse" data-target="#secc" aria-expanded="false" aria-controls="multiCollapseExample">
                    <h6><i class="fas fa-plus-circle"></i></h6>
                </button>
            </div>
            <div>
                <br>
            </div>
            <div>
                <button class="btn f" type="submit" data-toggle="collapse" data-target="" aria-expanded="false" aria-controls="multiCollapseExample" onclick="eliminarsec()">
                    <h6><i class="fas fa-trash-alt"></i></h6>
                </button>
            </div>
            <div>
                <br>
            </div>
            <div>
                <a type="button" data-toggle="modal" data-target="#exampleModal">
                    <img id="foto" class="ima" src="img/logo2.png" style="width: 9vmin;" onmouseover="foto()" onmouseout="foto2()">
                </a>
            </div>
        </div>
        <div class="col-11 col-xs-10  d-flex justify-content-start">

            <div class="collapse rounded" id="secc">

            </div>
            <div class="collapse rounded" id="tipo">

            </div>
        </div>
    </div>
</div>

<input id="secciones" type="hidden" value="0" class="form-control" min="0" max="<?php echo $var - 1; ?>" oninput="cambiar(this.value)">
<div class="contenedor mt-5 mb-5 center">

    <div class="card shadow-lg vista-pagina">
        <div class="card-body" style="margin-top: 5vh;">
            <div>
                <h5 class="text-center letra">TU PAGINA "<?php echo strtoupper($obj->getNombre()); ?>" </h5>
            </div>
            <div id="vista" style="height: 108%;">

            </div>
        </div>
        <div class="tarjeta-footer">
            <div class="row ml-5 mr-5 mb-2">
                <div class="col-12 col-lg-10 col-xl-10 ">
                    <div class="col-8 ">
                        <br>
                        <div id="paginacion" style="overflow-x: auto;">
                            <?php include "paginacionUsuario.php" ?>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-2 col-xl-2 d-flex justify-content-center align-self-center ">
                    <a href="indexPag.php?pid=<?php echo base64_encode($_SESSION['pag']); ?>" target="_blank" class="btn btn-dark float-right i letra"><i class="fas fa-eye"></i></a>
                    <a href="index.php?pid=<?php echo base64_encode("presentacion/edicionUsuario/descargar.php") . "&idPag=" . $_SESSION["pag"] . "&id=" . $_SESSION["id"]; ?>" id="Terminar" type="button" value=0 class="btn btn-dark float-right i letra"><i class="fas fa-download"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php include "ayuda/principal.php" ?>
</div>

<!-- Modal agregar pagina-->
<div class="modal fade" id="agregarpag" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar página</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-8">
                        <input type="text" class="form-control rounded-pill" placeholder="Nombre de la pagina">
                    </div>
                    <div class="col-4">
                        <select class="custom-select rounded-pill" id="inputGroupSelect01">
                            <option selected>Tipo de menu...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                        </select>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button i" class="btn btn-primary letra">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="Crear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header encabezado text-white letra">
                <h5 class="modal-title" id="exampleModalLabel">Crea tu propia sección!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
    window.onbeforeunload = function() {
        $.ajax({
            url: "presentacion/edicionUsuario/editarArchivo.php?ed=Deselec&val=" + $("#editando").val() + "<?php echo "&idPag=" . $_SESSION["pag"]; ?>",
            type: "GET",
            processData: false,
            contentType: false,
            cache: false,
        })
    }

    var cont = 0;

    if (cont == 0) {
        $(document).ready(function() {
            var url = "indexAjax.php?pid=<?php echo base64_encode("presentacion/parteUsuario/editar.php") . "&id=" . $_SESSION["id"] . "&idPag=" . $_SESSION["pag"] ?>";
            $("#vista").load(url);
        })
        $(document).ready(function() {
            var url = "indexAjax.php?pid=<?php echo base64_encode("presentacion/parteUsuario/TipoAjax.php") . "&id=" . $_SESSION["id"] . "&idPag=" . $_SESSION["pag"] ?>&t=0";
            $("#tipo").load(url);
        })
        $(document).ready(function() {
            var url = "indexAjax.php?pid=<?php echo base64_encode("presentacion/seccionUsuario/principal.php") . "&id=" . $_SESSION["id"] . "&idPag=" . $_SESSION["pag"] ?>";
            $("#secc").load(url);
        })
        var url2 = "indexAjax.php?pid=<?php echo base64_encode("presentacion/paginacionUsuario.php") . "&id=" . $_SESSION["id"] . "&idPag=" . $_SESSION["pag"] ?>";
        $("#paginacion").load(url2);
    }

    function seccion() {
        $(document).ready(function() {
            var url = "indexAjax.php?pid=<?php echo base64_encode("presentacion/partes/seccion.php") ?>";
            $("#content").load(url);
        })
    }

    function eliminarsec() {
        if ($("#editando").val() != 0) {
            $.ajax({
                url: "presentacion/edicionUsuario/editarArchivo.php?ed=Eliminar&sec=" + $("#editando").val() + "<?php echo "&idPag=" . $_SESSION["pag"]; ?>",
                type: "GET",
                processData: false,
                contentType: false,
                cache: false
            })
            setTimeout(function() {
                $(document).ready(function() {
                    var url = "indexAjax.php?pid=<?php echo base64_encode("presentacion/parteUsuario/editar.php") . "&id=" . $_SESSION["id"] . "&idPag=" . $_SESSION["pag"] ?>";
                    $("#vista").load(url);
                    var url2 = "indexAjax.php?pid=<?php echo base64_encode("presentacion/paginacionUsuario.php") . "&idPag=" . $_SESSION["pag"] ?>";
                    $("#paginacion").load(url2);
                })
            }, 400);
        } else {
            alert("Seleccione una seccion para eliminar");
        }

    }

    function terminar() {
        $.ajax({
            url: "presentacion/edicionUsuario/editarArchivo.php?ed=Deselec&val=" + $("#editando").val() + "<?php echo "&idPag=" . $_SESSION["pag"]; ?>",
            type: "GET",
            processData: false,
            contentType: false,
            cache: false,
        });

        $.ajax({
            url: "presentacion/edicionUsuario/descargar.php?ed=Descargar" + "<?php echo "&idPag=" . $_SESSION["pag"] . "&id=" . $_SESSION["id"]; ?>",
            type: "GET",
            processData: false,
            contentType: false,
            cache: false
        });
    }


    function foto2() {
        $("#foto").attr("src", "img/logo2.png");
    }

    function foto() {
        $("#foto").attr("src", "img/logoanim.gif");
    }
</script>