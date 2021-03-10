<div class="card" style="width: 40vmax; height: 70vh;">
    <div class="card-header">
        <p class="text-white letra">Elige una nueva sección</p>
    </div>
    <div class="card-body">
        <select class="custom-select i" onchange="seccion(this.value)">
            <option selected>Tipo de sección</option>
            <option value="1">Imagenes</option>
            <option value="2">Portada</option>
            <option value="3">Texto</option>
            <option value="4">Video</option>
        </select>
        <div id="seccion" class="border borde overflow-auto mt-2 " style="height: 80%;">

        </div>
    </div>

    <div class="card-footer">
        <button type="button" class="btn text-white rounded-pill letra" data-toggle="modal" data-target="#Crear">
            Crear <i class="fas fa-pencil-alt"></i>
        </button>
    </div>
</div>

<script>
    function seccion(id) {
        switch (id) {
            case '1': {
                var url = "indexAjax.php?pid=<?php echo base64_encode("presentacion/seccionUsuario/imagen.php") . "&id=" . $_GET["id"] . "&idPag=" . $_GET["idPag"] ?>";
                $("#seccion").load(url);
            }
            break;
        case '2': {
            var url = "indexAjax.php?pid=<?php echo base64_encode("presentacion/seccionUsuario/imagenTexto.php") . "&id=" . $_GET["id"] . "&idPag=" . $_GET["idPag"] ?>";
            $("#seccion").load(url);
        }
        break;
        case '3': {
            var url = "indexAjax.php?pid=<?php echo base64_encode("presentacion/seccionUsuario/texto.php") . "&id=" . $_GET["id"] . "&idPag=" . $_GET["idPag"] ?>";
            $("#seccion").load(url);
        }
        break;
        case '4': {
            var url = "indexAjax.php?pid=<?php echo base64_encode("presentacion/seccionUsuario/video.php") . "&id=" . $_GET["id"] . "&idPag=" . $_GET["idPag"] ?>";
            $("#seccion").load(url);
        }
        break;
        }
    }

    function ElegirSeccion(id) {
        var f = "<?php echo "&id=" . $_GET["id"] . "&idPag=" . $_GET["idPag"]; ?>";
        $.ajax({
            url: "presentacion/edicionUsuario/editarArchivo.php?ed=Agregar&val=" + id + f,
            type: "GET",
            processData: false,
            contentType: false,
            cache: false,
            error: function() {
                console.log("No se ha podido obtener la información");
            }
        })
        $.ajax({
            url: "presentacion/edicionUsuario/editarArchivo.php?ed=Menu&val=" + id + f,
            type: "GET",
            processData: false,
            contentType: false,
            cache: false,
            error: function() {
                console.log("No se ha podido obtener la información");
            }
        })
        $(document).ready(function() {
            var url = "indexAjax.php?pid=<?php echo base64_encode("presentacion/parteUsuario/editar.php") ?>&sec=" + $("#editando").val() + f;
            $("#vista").load(url);
            var url2 = "indexAjax.php?pid=<?php echo base64_encode("presentacion/paginacionUsuario.php") ?>&sec=" + $("#editando").val() + f;
            $("#paginacion").load(url2);
        })

    }
</script>