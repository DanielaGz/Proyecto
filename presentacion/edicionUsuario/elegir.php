<?php
$total = count(glob('../../'.$_GET["idPag"].'/inicio/{*.php}', GLOB_BRACE));
echo $total;
switch ($_GET["v"]) {
    case '-2': { //plantilla inicial usuario
            $fecha = new DateTime();
            if (!file_exists("../../paginas/" . $_GET["idP"])) {
                mkdir("../../paginas/" . $_GET["idP"], 0700);
            }
            $carpeta = $fecha->getTimestamp();
            mkdir("../../paginas/" . $_GET["idP"]."/".$carpeta, 0700);
            $obj = new Pagina("","","../../paginas/" . $_GET["idP"]."/".$carpeta); 
            $obj -> insertar();
            //full_copy("../../plantillas/General/", "../../paginas/");
        }
    case '-1': { //plantilla inicial
            Eliminar("../../".$_GET["idPag"]."/*");
            full_copy("../../plantillas/General/", "../../".$_GET["idPag"]."/");
        }
        break;
    case '0': { //secciones galeria
            full_copy("../../plantillas/galeria/galeria" . $_GET["tipo"] . ".php", "../../".$_GET["idPag"]."/inicio/seccion" . $total . ".php");
        }
        break;
    case '1': { //secciones imagen + texto
            full_copy("../../plantillas/ImagenTexto/imagenTexto" . $_GET["tipo"] . ".php", "../../".$_GET["idPag"]."/inicio/seccion" . $total . ".php");
        }
        break;
    case '2': { //secciones texto
            full_copy("../../plantillas/Texto/texto" . $_GET["tipo"] . ".php", "../../".$_GET["idPag"]."/inicio/seccion" . $total . ".php");
        }
        break;
    case '3': { //secciones video
            full_copy("../../plantillas/Video/video" . $_GET["tipo"] . ".php", "../../".$_GET["idPag"]."/inicio/seccion" . $total . ".php");
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
