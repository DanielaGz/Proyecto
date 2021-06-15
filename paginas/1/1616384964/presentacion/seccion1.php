<div id="carouselExampleControls" class="carousel slide" data-ride="carousel"><!-- Galeria -->
  <div class="carousel-inner">
    <?php
		/* cantidad */ $num = 2;
    for ($i = 0; $i < $num; $i++) {
      if($i==0){
        echo "<div class='carousel-item active'>";
      }else{
        echo "<div class='carousel-item'>";
      }
    ?>
		<!-- imagen --><img src='img/1616439028501<?php echo $i ?>.png' id='img' class='img-fluid' alt='Responsive image'>
      </div>
    <?php
    }
    ?>
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