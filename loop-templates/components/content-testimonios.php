<?php
/**
 * Content testimonios template.
 *
 * @package yofisio
 */
?>
<section>


  <div class="container">
    <h2 class="text-center">Testimonios</h2>
  </div>
  
  <div class="container content">
    <div class="row justify-content-center">

      <?php foreach (get_field('testimonios') as $i => $testimonio) { ?>
        <div class="col-lg-6">
          <div class="testimonial testimonial-info">
            <div class="testimonial-section">
              <?php echo $testimonio['testimonio']; ?>
            </div>
            <div class="testimonial-desc">
                <img src="<?php echo $testimonio['imagen']['url']; ?>" alt="<?php echo $testimonio['imagen']['alt']; ?>">
                <div class="testimonial-writer">
                  <div class="testimonial-writer-name"><?php echo $testimonio['nombre']; ?></div>
                  <div class="testimonial-writer-designation"><?php echo $testimonio['profesion']; ?></div>
                  <a href="#" class="testimonial-writer-company"><?php echo $testimonio['tratamiento']; ?></a>
                </div>
            </div>
          </div>
        </div>
      <?php } ?>

    </div>
  </div>

</section>