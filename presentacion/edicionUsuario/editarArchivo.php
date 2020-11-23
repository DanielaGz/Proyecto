<?php
$total = count(glob('../../' . $_GET["idPag"] . '/inicio/{*.php}', GLOB_BRACE));
if (isset($_GET["ed"])) {
    switch ($_GET["ed"]) {
        case 'base': {
                Editar($_GET["ed"], "../../" . $_GET["idPag"] . "/css/estilos.css", "/* base */--b: #" . $_GET["val"] . ";");
            }
            break;
        case 'menu': {
                Editar($_GET["ed"], "../../" . $_GET["idPag"] . "/css/estilos.css", "/* menu */--m: #" . $_GET["val"] . ";");
            }
            break;
        case 'fondo': {
                Editar($_GET["ed"], "../../" . $_GET["idPag"] . "/css/estilos.css", "/* fondo */--f: #" . $_GET["val"] . ";");
            }
            break;
        case 'head': {
                Editar($_GET["ed"], "../../" . $_GET["idPag"] . "/css/estilos.css", "/* head */--e: #" . $_GET["val"] . ";");
            }
            break;
        case 'alinear': {
                Editar($_GET["ed"], "../../" . $_GET["idPag"] . "/header.php", "<!-- alinear --><div class='container d-flex justify-content-" . $_GET["val"] . "'>");
            }
            break;
        case 'Titulo': {
                Editar($_GET["ed"], "../../" . $_GET["idPag"] . "/header.php", "<!-- Titulo --><h4><strong>" . $_GET["val"] . "</strong></h4>");
            }
            break;
        case 'Agregar': {
                Editar("<!-- Nueva -->", '../../' . $_GET["idPag"] . '/inicio/inicio.php', "\t<!-- Seccion" . $_GET["val"] . " --><div id='Seccion" . $_GET["val"] . "' class='selec'><?php include 'seccion" . $_GET["val"] . ".php' ?></div>" . PHP_EOL . "\t<!-- Nueva -->");
            }
            break;
        case 'Menu': {
                Editar("<!-- nuevo -->", '../../' . $_GET["idPag"] . '/menu.php', "\t<!-- Seccion" . $_GET["val"] . " --><li class='nav-item'><a class='nav-link' href='#Seccion" . $_GET["val"] . "'>Seccion" . $_GET["val"] . "</a></li>" . PHP_EOL . "\t<!-- nuevo -->");
            }
            break;
        case 'Seleccionar': {
                Editar("<!-- Seccion" . $_GET["val"] . " -->", '../../' . $_GET["idPag"] . '/inicio/inicio.php', "\t<!-- Seccion" . $_GET["val"] . " --><div id='Seccion" . $_GET["val"] . "' class='selec'><div class='seleccionado'></div><?php include 'seccion" . $_GET["val"] . ".php' ?></div>");
            }
            break;
        case 'Deselec': {
                Editar("<!-- Seccion" . $_GET["val"] . " -->", '../../' . $_GET["idPag"] . '/inicio/inicio.php', "\t<!-- Seccion" . $_GET["val"] . " --><div id='Seccion" . $_GET["val"] . "' class='selec'><?php include 'seccion" . $_GET["val"] . ".php' ?></div>");
            }
            break;
        case 'Tipo': {
                echo Tipo($_GET["val"]);
            }
            break;
        case 'Imagenes': {
                Editar(" cantidad ", "../../" . $_GET["idPag"] . "/inicio/seccion" . $_GET["sec"] . ".php", "\t\t/* cantidad */ \$num = " . $_GET["cant"] . ";");
            }
            break;
        case 'Imagenes2': {
                Editar("<!-- imagen -->", "../../" . $_GET["idPag"] . "/inicio/seccion" . $_GET["sec"] . ".php", "\t\t<!-- imagen --><img src='img/" . $_GET["val"] . "<?php echo \$i ?>.png' id='img' class='img-fluid' alt='Responsive image'>");
            }
            break;
        case 'ImagTexto': {
                Editar("<!-- " . $_GET["edi"] . " -->", "../../" . $_GET["idPag"] . "/inicio/seccion" . $_GET["sec"] . ".php", "\t\t<!-- " . $_GET["edi"] . " -->" . $_GET["val"]);
            }
            break;
        case 'ImagenesIT': {
                Editar("<!-- imagen -->", "../../" . $_GET["idPag"] . "/inicio/seccion" . $_GET["sec"] . ".php", "\t\t<!-- imagen --><img src='img/" . $_GET["val"] . "<?php echo \$i ?>.png' class='img-fluid' alt='Responsive image'>");
            }
            break;
        case 'menuEdit': {
                Editar("<!-- Seccion" . $_GET["sec"] . " -->", "../../" . $_GET["idPag"] . "/menu.php", "\t<!-- Seccion" . $_GET["sec"] . " --><li class='nav-item'><a class='nav-link' href='#Seccion" . $_GET["sec"] . "'>" . $_GET["val"] . "</a></li>");
            }
            break;
        case 'Video': {
                Editar("<!-- Url -->", "../../" . $_GET["idPag"] . "/inicio/seccion" . $_GET["sec"] . ".php", "\t<!-- Url --><iframe class='embed-responsive-item' src='" . $_GET["val"] . "' allowfullscreen style='border-radius: 1vmax;'></iframe>");
            }
            break;
        case 'Eliminar': {
                eliminarDir("../../paginas/4/1606095564");
                /* Editar("<!-- Seccion" . $_GET["sec"] . " -->", "../../" . $_GET["idPag"] . "/menu.php", "\t");
                Editar("<!-- Seccion" . $_GET["sec"] . " -->", "../../" . $_GET["idPag"] . "/inicio/inicio.php", "\t");
                eliminar("../../" . $_GET["idPag"], $_GET["sec"], $total); */
            }
            break;
    }
}

function Tipo($url)
{
    $tipo = 0;
    if ($url != '0') {
        $archivo = "../../" . $_GET["idPag"] . "/inicio/seccion" . $_GET["val"] . ".php";
        $prueba = fopen($archivo, "r") or die("error");
        $editar = "";
        while (!feof($prueba)) {
            $linea = fgets($prueba);

            if (strpos($linea, "<!-- Galeria -->")) {
                $tipo = 1;
            } else if (strpos($linea, "<!-- Inagen - Texto -->")) {
                $tipo = 2;
            } else if (strpos($linea, "<!-- Texto -->")) {
                $tipo = 3;
            } else if (strpos($linea, "<!-- Video -->")) {
                $tipo = 4;
            }
        }
        fclose($prueba);
    }
    return $tipo;
}

function Editar($parametro, $archivo, $valor)
{
    $prueba = fopen($archivo, "r") or die("error");
    $editar = "";
    while (!feof($prueba)) {
        $linea = fgets($prueba);

        if (strpos($linea, $parametro)) {
            $editar = $linea;
        }
    }
    fclose($prueba);
    if ($editar != "") {
        $path_to_file = $archivo;
        $file_contents = file_get_contents($path_to_file);
        $file_contents = str_replace($editar, $valor . PHP_EOL, $file_contents);
        file_put_contents($path_to_file, $file_contents);
    }
}

function Editar2($parametro, $archivo, $valor)
{
    $path_to_file = $archivo;
    $file_contents = file_get_contents($path_to_file);
    $file_contents = str_replace($parametro, $valor, $file_contents);
    file_put_contents($path_to_file, $file_contents);
}

function eliminar($url, $sec, $tot)
{
    unlink($url . "/inicio/seccion" . $sec . ".php");
    for ($i = $sec; $i < $tot; $i++) {
        if (file_exists($url . "/inicio/seccion" . $i . ".php")) {
            rename($url . "/inicio/seccion" . $i . ".php", $url . "/inicio/seccion" . ($i - 1) . ".php");
            Editar("<!-- Seccion" . $i . " -->", $url . "/inicio/inicio.php", "\t<!-- Seccion" . ($i - 1) . " --><div id='Seccion" . ($i - 1) . "' class='selec'><?php include 'seccion" . ($i - 1) . ".php' ?></div>");
            Editar2("Seccion" . $i . "", $url . "/menu.php", "Seccion" . ($i - 1));
            sleep(0.5);
        }
    }
}

function eliminarDir(string $dir): int
{

    $count = 0;

    // ensure that $dir ends with a slash so that we can concatenate it with the filenames directly
    $dir = rtrim($dir, "/\\") . "/";

    // use dir() to list files
    $list = dir($dir);
    chmod($dir, 0755);

    // store the next file name to $file. if $file is false, that's all -- end the loop.
    while (($file = $list->read()) !== false) {
        if ($file === "." || $file === "..") continue;
        if (is_file($dir . $file)) {
            unlink($dir . $file);
            $count++;
        } else if (is_dir($dir . $file)) {
            $count += eliminarDir($dir . $file);            
        }
    }

    // finally, safe to delete directory!
    rmdir($dir);
    

    return $count;
}
