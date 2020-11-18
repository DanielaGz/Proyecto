<?php
$edicion = 0;
$sec = "";
if (isset($_GET["sec"])) {
    $sec = "#Seccion" . $_GET["sec"];
}
$ruta = $_GET["idPag"]."/index.php?1&".$sec;
?>
<div id="pag" class="pag">
    <iframe class="embed-responsive-item frame" src="<?php echo $ruta ?>" width="100%" style="border-radius: 2vh;"></iframe>
</div>