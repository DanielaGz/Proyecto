<div class="card shadow-lg m-3" style="border-radius: 3vmax;">
    <div class="row m-5">
        <!-- Galeria -->
        <?php
        /* cantidad */ $num = 1;
        for ($i = 0; $i < $num; $i++) {
            if ($num == 1) {
                echo "<div class='contenedor col-12'>";
            } else {
                echo "<div class='contenedor col-lg-4 col-12 col-md-6 col-sm-6 mt-2'>";
            }
        ?>
            <!-- imagen --><img src="img/imagen.png" class="imagen img-fluid" alt="Responsive image">
    </div>
<?php
        }
?>
</div>
</div>