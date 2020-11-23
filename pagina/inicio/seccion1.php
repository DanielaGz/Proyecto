<div class="card bg-dark text-white "><!-- Inagen - Texto -->
    <?php
    /* cantidad */ $num = 1;
    for ($i = 0; $i < $num; $i++) {
    ?>
        <!-- imagen --><img src="img/imagen.png" class="card-img" alt="...">

        <div class="card-img-overlay d-flex align-items-center justify-content-center" style="text-align: center;">
            <div style="width: 80%;">
                <div>
                    <h4 class="card-title" style="font-size: 3vmax;">
                        <!-- Titulo -->Titulo
                    </h4>
                </div>
                <pre style="white-space: normal; font-size: 2vmax; color: white">
                    <!-- Contenido -->Contenido
                </pre>
            </div>
        </div>
    <?php
    }
    ?>
</div>