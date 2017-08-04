<?php
/**
 * Content razones template.
 *
 * @package yofisio
 */
?>
<?php if (get_field('razones')) { ?>
  <section class="pos-r razones">
    <div class="overlay-7 bg-info"></div>
    <div class="overlay">
      <?php
        if( get_field('razones_img') ) {
          echo wp_get_attachment_image( get_field('razones_img'), 'full');
        }
      ?>
    </div>
    <div class="container">
      <h2><?php the_field('razones_h2'); ?></h2>
      <div class="row">
        <?php foreach (get_field('razones') as $i => $razon) { ?>
          <div class="col-6 col-md-3">
            <p class="h5"><?php echo $razon['pre']; ?></p>
            <p class="number-icon"><?php echo $razon['icon']; ?></p>
            <p class="h5"><?php echo $razon['post']; ?></p>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
<?php } ?>
