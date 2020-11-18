<?php
/* echo $_FILES["foto1"]["name"].PHP_EOL;
echo $_FILES["foto2"]["name"].PHP_EOL;
echo $_FILES["foto3"]["name"].PHP_EOL;
echo $_POST["img"]; */

for ($i = 1; $i < ($_GET["img"]+1); $i++) {
    $tmp = $_FILES['foto' . $i]["tmp_name"];
    $folder = "../../pagina/img/".$_POST["nombre".$i];
    move_uploaded_file($tmp, $folder);
}
?>