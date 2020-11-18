<div class="row"><!-- Galeria -->
    <?php
    /* cantidad */$num = 1;
    for ($i = 0; $i < $num; $i++) {
        if($num==1){
            echo "<div class='col-12'>";
        }else{
            echo "<div class='col-lg-4 col-12 col-md-6 col-sm-6 mt-2'>";
        }
    ?>
            <div class="card">
                <!-- imagen --><img src="img/imagen.png" class="img-fluid" alt="Responsive image">
            </div>
        </div>
    <?php
    }
    ?>
</div>