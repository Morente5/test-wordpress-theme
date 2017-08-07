<?php
/**
 * Content secciones template.
 *
 * @package yofisio
 */
?>

<?php if (get_field('secciones')) { ?>
  <section>
    <div class="container">
      <h2><?php the_field('secciones_h2'); ?></h2>
      <div class="row">
        <?php foreach (get_field('secciones') as $i => $seccion) { ?>
          <div class="col-sm-6 col-lg-3 service">
            <div class="card card-inverse">
              <div class="overlay bg-gradient"></div>
              <div class="overlay">
                <?php
                  if( $seccion['imagen'] ) {
                    echo wp_get_attachment_image( $seccion['imagen'], 'medium', false, array( "class" => "overlay card-img service-img" ) );
                  }
                ?>
              </div>
              <div class="card-img-overlay">
                <h3 class="service-title">
                  <a href="<?php echo $seccion['pagina']; ?>" ><?php echo $seccion['titulo']; ?></a>
                </h3>
              </div>
            </div>
            <p class="h5">
              <?php echo $seccion['descripcion']; ?>
            </p>

          </div>
         
        <?php } ?>
      </div>
    </div>
  </section>
<?php } ?>