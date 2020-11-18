<!-- Section: Live preview -->
<section class="mx-2 pb-3">

  <ul class="nav nav-tabs md-tabs cabeza borde1 text-white" id="myTabMD" role="tablist">
    <li class="nav-item waves-effect waves-light">
      <a class="nav-link active letra" id="home-tab-md" data-toggle="tab" href="#home-md" role="tab" aria-controls="home-md" aria-selected="true">Colores</a>
    </li>
    <li class="nav-item waves-effect waves-light">
      <a class="nav-link letra" id="profile-tab-md" data-toggle="tab" href="#profile-md" role="tab" aria-controls="profile-md" aria-selected="false">Logo</a>
    </li>
  </ul>
  <div class="tab-content card pt-5" id="myTabContentMD">
    <div class="tab-pane fade show active" id="home-md" role="tabpanel" aria-labelledby="home-tab-md">
      <div class="row">
        <div class="col-5">
          <p class="letra">Encabezado: </p>
          <p class="letra">Base: </p>
          <p class="letra">Color Menu: </p>
          <p class="letra">Color Fondo: </p>
        </div>
        <div class="col-7">
          <input id="base" type="color" class="form-control i" oninput="myFunction(this.value,this.id)">
          <input id="head" type="color" class="form-control i" oninput="myFunction(this.value,this.id)">
          <input id="menu" type="color" class="form-control i" oninput="myFunction(this.value,this.id)">
          <input id="fondo" type="color" class="form-control i" oninput="myFunction(this.value,this.id)">
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="profile-md" role="tabpanel" aria-labelledby="profile-tab-md">
      <div class="row">
        <div class="col-3">
          <p class="letra">Posicion: </p>
          <p class="letra">Logo: </p>
          <p class="letra">Título: </p>
        </div>
        <div class="col-9">
          <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" value="start" class="btn btn-secondary i" onclick="myFunction(this.value,'alinear')">Izquierda</button>
            <button type="button" value="center" class="btn btn-secondary i" onclick="myFunction(this.value,'alinear')">Centro</button>
            <button type="button" value="end" class="btn btn-secondary i" onclick="myFunction(this.value,'alinear')">Derecha</button>
          </div>
          <form action="" id="logo" name="logo" method="POST" role="form" enctype="multipart/form-data">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="imagen" oninput="Logo(this)">
              <label class="custom-file-label i" for="imagen" aria-describedby="inputGroupFileAddon02">Elegir</label>
            </div>
          </form>
          <input type="text" class="form-control i" placeholder="Titulo..." onchange="myFunction(this.value,'Titulo')">
        </div>
      </div>
    </div>
  </div>

</section>



<div class="borde">

</div>

<script>
  function myFunction(val, id) {
    var f = "<?php echo "&id=" . $_GET["id"] . "&idPag=" . $_GET["idPag"]; ?>";
    $.ajax({
      url: "presentacion/edicionUsuario/editarArchivo.php?val=" + val.replace('#', '') + "&ed=" + id + f,
      type: "GET",
      processData: false,
      contentType: false,
      cache: false,
      error: function() {
        console.log("No se ha podido obtener la información");
      }
    })
    $(document).ready(function() {
      var url = "indexAjax.php?pid=<?php echo base64_encode("presentacion/parteUsuario/editar.php") ?>"+f;
      $("#vista").load(url);
    })
  }

  function Logo(img) {
    var f = "<?php echo "&id=" . $_GET["id"] . "&idPag=" . $_GET["idPag"]; ?>";
    var imagenes = img.files.length;
    var form = new FormData;
    for (i = 0; i < imagenes; i++) {
      form.append("nombre" + (i + 1), "logo.png");
      form.append("foto" + (i + 1), $("#imagen")[0].files[i]);
    }
    $.ajax({
      url: "presentacion/edicionUsuario/editarImagen.php?img=" + imagenes + f,
      type: "POST",
      data: form,
      processData: false,
      contentType: false,
      cache: false,
    })
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
        var url = "indexAjax.php?pid=<?php echo base64_encode("presentacion/parteUsuario/editar.php") ?>&sec="+$("#editando").val() + f;
        $("#vista").load(url);
      })
    }, 500);
  }
</script>