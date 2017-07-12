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
    <div class="row testimonios no-gutters">

      <?php foreach (get_field('testimonios') as $i => $testimonio) { ?>
        <div class="col-lg-6 testimonio">

            <div class="card card-inverse card-info">
              <div class="card-block">
                <div class="row">
                  <div class="col-md-5 testimonio-desc">
                    <div class="row">
                      <div class="col-sm-4 col-md-12 testimonio-img">
                        <?php
                          $attr = array(
                            'alt' => $testimonio['imagen']['alt'],
                          );
                          echo wp_get_attachment_image( $testimonio['imagen']['id'], 'thumbnail', $attr);
                        ?>
                        <div class="testimonio-icon">
                          <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                        </div>
                      </div>
                      <div class="col-sm-8 col-md-12 testimonio-name">
                        <p class="testimonio-name-name"><strong><?php echo $testimonio['nombre']; ?></strong></p>
                        <p class="testimonio-name-designation"><?php echo $testimonio['profesion']; ?></p>
                        <p class="testimonio-name-treatment"><a href="<?php echo $testimonio['tratamiento_enlace']; ?>"><?php echo $testimonio['tratamiento']; ?></a></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-7 testimonio-text">
                    <?php echo $testimonio['testimonio']; ?>
                  </div>
                </div>
              </div>
            </div>

        </div>
      <?php } ?>

    </div>
  </div>

</section>