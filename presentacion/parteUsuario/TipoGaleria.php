<?php
$total = count(glob('../../' . $_GET["idPag"] . '/inicio/{*.php}', GLOB_BRACE));
?>
<section class="mx-2 pb-3">

  <ul class="nav nav-tabs md-tabs cabeza borde1 text-white" id="myTabMD" role="tablist">
    <li class="nav-item waves-effect waves-light">
      <a class="nav-link active letra" id="home-tab-md" data-toggle="tab" href="#home-md" role="tab" aria-controls="home-md" aria-selected="true">Imagenes</a>
    </li>
  </ul>
  <div class="tab-content card pt-5" id="myTabContentMD">
    <div class="custom-file mb-5">
      <input type="file" class="custom-file-input" id="imagen" oninput="Imagen(this)" multiple>
      <label class="custom-file-label i" for="imagen" aria-describedby="inputGroupFileAddon02">Elegir</label>
    </div>
  </div>

</section>

<div class="borde">

</div>

<script>
  function myFunction(val, id) {
    var f = "<?php echo "&id=" . $_GET["id"] . "&idPag=" . $_GET["idPag"]; ?>";
    $(document).ready(function() {
      var url = "indexAjax.php?pid=<?php echo base64_encode("presentacion/parteUsuario/editar.php") ?>" + f;
      $("#vista").load(url);
    })
  }

  function Imagen(img) {
    var f = "<?php echo "&id=" . $_GET["id"] . "&idPag=" . $_GET["idPag"]; ?>";
    var imagenes = img.files.length;
    var form = new FormData;
    var nom = Date.now();
    for (i = 0; i < imagenes; i++) {
      form.append("nombre" + (i + 1), nom + "" + i + ".png");
      form.append("foto" + (i + 1), $("#imagen")[0].files[i]);
    }
    $.ajax({
      url: "presentacion/edicionUsuario/editarImagen.php?img=" + imagenes + f,
      type: "POST",
      data: form,
      processData: false,
      contentType: false,
      cache: false,
      error: function() {
        console.log("No paso");
      }
    })
    $.ajax({
      url: "presentacion/edicionUsuario/editarArchivo.php?ed=Imagenes" + "&val=" + nom + "&sec=" + +$("#editando").val() + "&cant=" + imagenes + f,
      type: "GET",
      processData: false,
      contentType: false,
      cache: false,

      error: function() {
        console.log("No se ha podido obtener la información");
      }
    })
    setTimeout(function() {
      $.ajax({
        url: "presentacion/edicionUsuario/editarArchivo.php?ed=Imagenes2" + "&val=" + nom + "&sec=" + +$("#editando").val() + "&cant=" + imagenes + f,
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
      })
    }, 500);
  }
</script>