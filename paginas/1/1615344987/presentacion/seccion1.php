<div class="card">
    <!-- Galeria -->
    <div class="card-body">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">

                <?php
		/* cantidad */ $num = 3;
                $cant = intval(($num % 3) ? ($num / 3) + 1 : ($num / 3));
                $img = 0;
                for ($f = 0; $f < $cant; $f++) {
                    if ($f == 0) {
                        echo "<div class='carousel-item active'>";
                    } else {
                        echo "<div class='carousel-item '>";
                    }
                ?>
                    <div class="row">
                        <?php
                        for ($i = $img; $i < ($img + 3); $i++) {
                            if ($i < $num) {
                        ?>
                                <div class="col-4" style="height: 35vh;">
                                    <button type="button" class="b" id=<?php echo $i ?> data-toggle="modal" data-target="#modal" onclick="Modal(this.id)">
		<!-- imagen --><img src='img/1615345018083<?php echo $i ?>.png' id='img' class='img-fluid' alt='Responsive image'>
                                    </button>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
            </div>
        <?php
                    $img = $img + 3;
                }
        ?>
        </div>

    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

</div>

<!-- Modal -->
<div class="modal fade mt-5" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <img src="img/imagen.png" id="imagenM" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>
</div>
<script>
    function Modal(id) {
        if ($("#img").attr("src") != "img/imagen.png") {
            $("#imagenM").attr("src", $("#img").attr("src").substr(0, 17) + id + '.png');
        }
    }
</script>