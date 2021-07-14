<?php
$pagina = new Pagina("", "", "", "", $_GET["sec"]);
switch ($_GET["c"]) {
    case "1": {
            $paginas = $pagina->consultarMod();
        }
        break;
    case "2": {
            $paginas = $pagina->consultarCre();
        }
        break;
    case "3": {
            $paginas = $pagina->consultarN();
        }
        break;
    case "4": {
            $paginas = $pagina->consultarFiltro($_GET["filtro"]);
        } 
        break;
}

?>
<?php
foreach ($paginas as $pag) {
?>
    <div class="card rounded-pill borber border-secondary mb-3">
        <div class="ml-3 mt-2 mb-2">
            <div class="row">
                <div class="col-5 align-self-center">
                    <?php echo $pag->getNombre(); ?>
                </div>
                <div class="col-4 align-self-center">
                    <?php echo $pag->getFecha(); ?>
                </div>
                <div class="col-3 d-flex justify-content-center">
                    <button class="btn f mr-2" type="submit" value="<?php echo $pag->getRuta(); ?>" onclick="Editar(this.value)">
                        <h6><i class="fas fa-pencil-alt"></i></h6>
                    </button>
                    <a class="btn f mr-2" href="index.php?pid=<?php echo base64_encode("presentacion/edicionUsuario/descargar.php") . "&idPag=" . $pag->getRuta() . "&id=" . $_SESSION["id"]; ?>" type="button" id="<?php echo $pag->getRuta(); ?>" class="btn btn-dark float-right i letra">
                        <h6><i class="fas fa-download"></i></h6>
                    </a>
                    <button class="btn f mr-2" type="submit" value="<?php echo $pag->getRuta(); ?>" data-toggle="modal" data-target="#elim" onclick="validar(this.value)">
                        <h6><i class="fas fa-trash-alt"></i></h6>
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>