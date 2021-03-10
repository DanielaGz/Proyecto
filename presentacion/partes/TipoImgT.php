<!-- Section: Live preview -->
<section class="mx-2 pb-3">

  <ul class="nav nav-tabs md-tabs cabeza borde1 text-white" id="myTabMD" role="tablist">
    <li class="nav-item waves-effect waves-light">
      <a class="nav-link active letra" id="home-tab-md" data-toggle="tab" href="#home-md" role="tab" aria-controls="home-md" aria-selected="true">Ediciones</a>
    </li>
  </ul>
  <div class="tab-content card pt-5" id="myTabContentMD">
    <div class="tab-pane fade show active" id="home-md" role="tabpanel" aria-labelledby="home-tab-md">
      <div class="row mb-4">
        <div class="col-5">
          <p class="letra">Titulo: </p>
          <p class="letra">Contenido: </p>
          <p class="letra">Imagen: </p>
        </div>
        <div class="col-7">
          
          <div>
            <input id="Titulo" type="text" class="form-control i" onchange="EditarIT(this.value,this.id)">
            <input id="Contenido" type="text" class="form-control i" onchange="EditarIT(this.value,this.id)">
          </div>
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="imagen" oninput="ImagenIT(this)">
            <label class="custom-file-label i" for="imagen" aria-describedby="inputGroupFileAddon02">Elegir</label>
          </div>

        </div>
      </div>
    </div>
  </div>

</section>



<div class="borde">

</div>

<script>
  function EditarIT(val, id) {
    $.ajax({
      url: "presentacion/edicion/editarArchivo.php?val=" + val + "&ed=ImagTexto" + "&edi=" + id + "&sec=" + $("#editando").val(),
      type: "GET",
      processData: false,
      contentType: false,
      cache: false,
      error: function() {
        console.log("No se ha podido obtener la información imagen texto");
      }
    })
    $(document).ready(function() {
      var url = "indexAjax.php?pid=<?php echo base64_encode("presentacion/partes/header.php") ?>&sec=" + $("#editando").val();
      $("#vista").load(url);
    })
  }

  function ImagenIT(img) {
    var imagenes = img.files.length;
    var form = new FormData;
    var nom = Date.now();
    for (i = 0; i < imagenes; i++) {
      form.append("nombre" + (i + 1), nom + "" + i + ".png");
      form.append("foto" + (i + 1), $("#imagen")[0].files[i]);
    }
    $.ajax({
      url: "presentacion/edicion/editarImagen.php?img=" + imagenes,
      type: "POST",
      data: form,
      processData: false,
      contentType: false,
      cache: false,
      error: function() {
        console.log("No paso");
      }
    })
    setTimeout(function() {
      $.ajax({
        url: "presentacion/edicion/editarArchivo.php?ed=Imagenes2" + "&val=" + nom + "&sec=" + +$("#editando").val() + "&cant=" + imagenes,
        type: "GET",
        processData: false,
        contentType: false,
        cache: false,

        error: function() {
          console.log("No se ha podido obtener la información sad");
        }
      })
      $(document).ready(function() {
        var url = "indexAjax.php?pid=<?php echo base64_encode("presentacion/partes/header.php") ?>&sec=" + $("#editando").val();;
        $("#vista").load(url);
      })
    }, 500);
  }
</script>