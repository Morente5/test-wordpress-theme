<?php
/**
 * Content subtitle template.
 *
 * @package yofisio
 */
?>
<?php if (get_field('subtitulo') || get_field('descripcion')) { ?>
  <section>
    <div class="container">
      <?php if (get_field('subtitulo')) { ?>
        <h2 class="display-5 text-center"><?php the_field('subtitulo'); ?></h2>
      <?php } ?>
      <?php if (get_field('descripcion')) { ?>
        <div><?php the_field('descripcion'); ?></div>
      <?php } ?>
    </div>
  </section>
<?php } ?>