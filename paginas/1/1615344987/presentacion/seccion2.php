<div class="card mb-3">
    <!-- Inagen - Texto -->
    <div class="row no-gutters">
        <?php
        /* cantidad */ $num = 1;
        for ($i = 0; $i < $num; $i++) {
        ?>
            <div class="col-sm-8 col-12 d-flex align-items-center justify-content-center<!-- Inagen - Texto -->">
                <div class="card-body" style="text-align: center;">
                    <div>
                        <h4 class="card-title" style="font-size: 3vmax;">
		<!-- Titulo -->Prueba
                        </h4>
                        <pre style="white-space: normal; font-size: 2vmax;">
		<!-- Contenido -->Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </pre>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-12">
		<!-- imagen --><img src='img/1615345050656<?php echo $i ?>.png' id='img' class='img-fluid' alt='Responsive image'>
            </div>
        <?php
        } ?>
    </div>
</div>