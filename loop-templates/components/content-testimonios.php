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
          <div class="testimonio testimonio-info">
            <div class="card card-inverse card-info testimonio-section">
              <div class="card-block">
                <?php echo $testimonio['testimonio']; ?>
              </div>
            </div>
            <div class="testimonio-desc">
                <?php
                  $attr = array(
                    'alt' => $testimonio['imagen']['alt'],
                  );
                  echo wp_get_attachment_image( $testimonio['imagen']['id'], 'thumbnail', $attr);
                ?>
                <div class="testimonio-writer">
                  <div class="testimonio-writer-name"><?php echo $testimonio['nombre']; ?></div>
                  <div class="testimonio-writer-designation"><?php echo $testimonio['profesion']; ?></div>
                  <a href="#" class="testimonio-writer-company"><?php echo $testimonio['tratamiento']; ?></a>
                </div>
            </div>
          </div>
        </div>
      <?php } ?>

    </div>
  </div>

</section>