<section class="mx-2 pb-3">

  <ul class="nav nav-tabs md-tabs cabeza borde1 text-white" id="myTabMD" role="tablist">
    <li class="nav-item waves-effect waves-light">
      <a class="nav-link active letra" id="home-tab-md" data-toggle="tab" href="#home-md" role="tab" aria-controls="home-md" aria-selected="true">Texto</a>
    </li>
  </ul>
  <div class="tab-content card pt-5" id="myTabContentMD">
    <div class="tab-pane fade show active" id="home-md" role="tabpanel" aria-labelledby="home-tab-md">
      <div class="row">
        <div class="col-5">
          <p class="letra">Titulo: </p>
          <p class="letra">Contenido: </p>
        </div>
        <div>
          <input id="Titulo" type="text" class="form-control i" onchange="EditarTex(this.value,this.id)">
          <input id="Contenido" type="text" class="form-control i" onchange="EditarTex(this.value,this.id)">
        </div>
      </div>
    </div>
  </div>

</section>



<div class="borde">

</div>

<script>
  function EditarTex(val, id) {
    $.ajax({
      url: "presentacion/edicion/editarArchivo.php?val=" + val + "&ed=ImagTexto" + "&edi=" + id + "&sec=" + $("#editando").val(),
      type: "GET",
      processData: false,
      contentType: false,
      cache: false,
      error: function() {
        console.log("No se ha podido obtener la información");
      }
    })
    $(document).ready(function() {
      var url = "indexAjax.php?pid=<?php echo base64_encode("presentacion/partes/header.php") ?>&sec=" + $("#editando").val();
      $("#vista").load(url);
    })
  }
</script>