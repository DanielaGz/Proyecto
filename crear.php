<?php
require "logica/Usuario.php";
require "logica/Pagina.php";
switch ($_GET["v"]) {
    case '-2': { //plantilla inicial usuario
            $fecha = new DateTime();
            if (!file_exists("paginas/" . $_GET["idP"])) {
                mkdir("paginas/" . $_GET["idP"], 0700);
            }
            $carpeta = $fecha->getTimestamp();
            mkdir("paginas/" . $_GET["idP"] . "/" . $carpeta, 0700);
            $obj = new Pagina("", $_GET["n"] , "paginas/" . $_GET["idP"] . "/" . $carpeta, "", $_GET["idU"]);
            $obj->insertar();
            full_copy("plantillas/General/", "paginas/" . $_GET["idP"] . "/" . $carpeta);
            echo "paginas/" . $_GET["idP"] . "/" . $carpeta;
        }
        break;
    case '-1': {
            //EliminarCarpeta($_GET["idP"]);
            $obj = new Pagina("", "",  $_GET["idP"], "", $_GET["idU"]);
            $obj->eliminar();
            EliminarCarpeta($_GET["idP"]);
        }
        break;
}




function full_copy($source, $target)
{
    if (is_dir($source)) {
        @mkdir($target);
        $d = dir($source);
        while (FALSE !== ($entry = $d->read())) {
            if ($entry == '.' || $entry == '..') {
                continue;
            }
            $Entry = $source . '/' . $entry;
            if (is_dir($Entry)) {
                full_copy($Entry, $target . '/' . $entry);
                continue;
            }
            copy($Entry, $target . '/' . $entry);
        }
        $d->close();
    } else {
        copy($source, $target);
    }
}

function Eliminar($ruta)
{
    $files = glob($ruta); //obtenemos todos los nombres de los ficheros
    foreach ($files as $file) {
        if (is_file($file))
            unlink($file); //elimino el fichero
    }
}

function EliminarCarpeta($dir)
{
    if(!$dh = @opendir($dir)) return;
    while (false !== ($current = readdir($dh))) {
        if($current != '.' && $current != '..') {
            if (!@unlink($dir.'/'.$current)) 
                EliminarCarpeta($dir.'/'.$current);
        }       
    }
    closedir($dh);
    @rmdir($dir);
}
