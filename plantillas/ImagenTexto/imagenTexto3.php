<div class="card mb-3">
    <!-- Inagen - Texto -->
    <div class="row no-gutters">
        <?php
        /* cantidad */ $num = 1;
        for ($i = 0; $i < $num; $i++) {
        ?>
            <div class="col-sm-4 col-12">
                <!-- imagen --><img src="img/imagen.png" class="card-img" alt="...">
            </div>
            <div class="col-sm-8 col-12 d-flex align-items-center justify-content-center<!-- Inagen - Texto -->">
                <div class="card-body" style="text-align: center;">
                    <div>
                        <h4 class="card-title" style="font-size: 3vmax;">
                            <!-- Titulo -->Titulo
                        </h4>
                        <pre style="white-space: normal; font-size: 2vmax;">
                            <!-- Contenido -->Contenido
                        </pre>
                    </div>
                </div>
            </div>
        <?php
        } ?>
    </div>
</div>