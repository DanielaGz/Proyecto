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
</div>

<script>
    function seccion(id) {
        switch (id) {
            case '1': {
                var url = "indexAjax.php?pid=<?php echo base64_encode("presentacion/seccion/imagen.php") ?>";
                $("#seccion").load(url);
            }
            break;
        case '2': {
            var url = "indexAjax.php?pid=<?php echo base64_encode("presentacion/seccion/imagenTexto.php") ?>";
            $("#seccion").load(url);
        }
        break;
        case '3': {
            var url = "indexAjax.php?pid=<?php echo base64_encode("presentacion/seccion/texto.php") ?>";
            $("#seccion").load(url);
        }
        break;
        case '4': {
            var url = "indexAjax.php?pid=<?php echo base64_encode("presentacion/seccion/video.php") ?>";
            $("#seccion").load(url);
        }
        break;
        }
    }

    function ElegirSeccion(id) {
        $.ajax({
            url: "presentacion/edicion/editarArchivo.php?ed=Agregar&val=" + id,
            type: "GET",
            processData: false,
            contentType: false,
            cache: false,
            error: function() {
                console.log("No se ha podido obtener la información");
            }
        })
        $.ajax({
            url: "presentacion/edicion/editarArchivo.php?ed=Menu&val=" + id,
            type: "GET",
            processData: false,
            contentType: false,
            cache: false,
            error: function() {
                console.log("No se ha podido obtener la información");
            }
        })
        $(document).ready(function() {
            var url = "indexAjax.php?pid=<?php echo base64_encode("presentacion/partes/header.php") ?>";
            $("#vista").load(url);
            var url2 = "indexAjax.php?pid=<?php echo base64_encode("presentacion/paginacion.php") ?>&sec=" + $("#editando").val();
            $("#paginacion").load(url2);
        })

    }
</script>