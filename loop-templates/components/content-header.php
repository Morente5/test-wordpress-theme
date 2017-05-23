<?php
/**
 * Content header template.
 *
 * @package yofisio
 */
?>
<div class="jumbotron title pos-r"
  <?php
  if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  ?>
    style="background-image: url('<?php the_post_thumbnail_url('large'); ?>')"
  <?php
  } elseif ( has_category_thumbnail() ) {
  ?>
    style="background-image: url('<?php echo get_the_category_thumbnail()->url; ?>')"
  <?php
  }
  ?>
  >
  <div class="overlay-5 bg-white"></div>
  <div class="container">
    <h1 class="display-4 text-center"><?php echo get_my_title(); ?></h1>
  </div>
</div>