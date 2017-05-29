<?php
/**
 * Content equipo template.
 *
 * @package yofisio
 */
?>
<section>
  <?php $equipo_page = get_page_by_title( 'equipo' ); ?>
  <div class="container">
    <?php if (get_field('equipo', $equipo_page->ID)) { ?>
      <h2 class="display-5 text-center"><?php the_field('titulo_equipo') ?></h2>
    <?php } ?>
    <div class="row">
    
    <?php foreach (get_field('equipo', $equipo_page->ID) as $member) { ?>
      <div class="col-sm-6 col-md text-center">
        <figure class="figure">
          <img src="<?php echo $member['imagen']['url']; ?>" alt="<?php echo $member['imagen']['alt']; // TODO thumbnail ?>">
          <div class="caption">
            <a href="/equipo#<?php echo sanitize_title($member['nombre']); ?>"><strong><?php echo $member['nombre']; ?></strong></a>
          </div>
        </figure>
      </div>
    <?php } ?>
  
    </div>
  </div>
</section>