<?php
$edicion = 0;
$sec = "";
if (isset($_GET["sec"])) {
    $sec = "#Seccion" . $_GET["sec"];
}
?>
<div id="pag" class="pag">
    <iframe class="embed-responsive-item frame" src="pagina/index.php?1&<?php echo $sec ?>" width="100%" style="border-radius: 2vh;"></iframe>
</div>