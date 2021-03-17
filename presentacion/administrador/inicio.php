<div class="container mt-5">
    <div class="card borde">
        <div class="card-header encabezado borde1 text-white">
            <h6>Bienvenido administrador!</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-5">
                    <img style=" max-height: 400px;" src="img/saludo2.gif" class="img-fluid" alt="Responsive image">
                </div>
                <div class="col-7">
                    <div class="card borde">
                        <div class="card-header text-white">
                            <h4>
                                <center>Últimos usuarios en unirse</center>
                            </h4>
                        </div>
                        <div class="card-body">
                            <?php
                            $usu = new Usuario();
                            $uss = $usu->consultarUlt();
                            ?>
                            <table class="table">
                                <tbody>
                                    <?php
                                    foreach ($uss as $u) {
                                        echo "<tr><td><center>".$u -> getNombre()."</center></td></tr>";
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">

        </div>
    </div>
</div>