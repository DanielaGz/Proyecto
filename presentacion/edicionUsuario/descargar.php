<?php
$carpeta =  $_GET["idPag"];
$zip = new ZipArchive();
// Ruta absoluta
$nombreArchivoZip = "paginas/" . $_GET["id"] . "/pagina.zip";
$rutaDelDirectorio = $carpeta;

if (!$zip->open($nombreArchivoZip, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
    exit("Error abriendo ZIP en $nombreArchivoZip");
}
// Si no hubo problemas, continuamos

// Crear un iterador recursivo que tendrá un iterador recursivo del directorio
$archivos = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rutaDelDirectorio),
    RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($archivos as $archivo) {
    // No queremos agregar los directorios, pues los nombres
    // de estos se agregarán cuando se agreguen los archivos
    if ($archivo->isDir()) {
        continue;
    }

    $rutaAbsoluta = $archivo->getRealPath();
    // Cortamos para que, suponiendo que la ruta base es: C:\imágenes ...
    // [C:\imágenes\perro.png] se convierta en [perro.png]
    // Y no, no es el basename porque:
    // [C:\imágenes\vacaciones\familia.png] se convierte en [vacaciones\familia.png]
    $nombreArchivo = substr($rutaAbsoluta, strlen($rutaDelDirectorio) + 1);
    $zip->addFile($rutaAbsoluta, $nombreArchivo);
}
// No olvides cerrar el archivo
$resultado = $zip->close();
if ($resultado) {
    echo "Archivo creado";
} else {
    echo "Error creando archivo";
}

$root = 'paginas/' . $_GET["id"] . "/";
echo $root;
$file = basename('pagina.zip');
$path = $root . $file;
$type = '';

if (is_file($path)) {
    $size = filesize($path);
    if (function_exists('mime_content_type')) {
        $type = mime_content_type($path);
    } else if (function_exists('finfo_file')) {
        $info = finfo_open(FILEINFO_MIME);
        $type = finfo_file($info, $path);
        finfo_close($info);
    }
    if ($type == '') {
        $type = "application/force-download";
    }
    // Define los headers
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=pagina.zip");
    header("Content-Type: application/zip");
    header("Content-Transfer-Encoding: binary");
    // Descargar el archivo
    readfile($path);
} else {
    die("El archivo no existe.");
}
 

// Por último eliminamos el archivo temporal creado
//unlink($nombreArchivoZip);//Destruye el archivo temporal