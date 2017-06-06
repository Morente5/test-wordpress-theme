<?php
/**
 * Content header template.
 *
 * @package yofisio
 */
if ( is_home() && !is_front_page() ) { // Blog
  $imgURL = get_the_post_thumbnail_url(get_option( 'page_for_posts' ), 'full');
} elseif ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  $imgURL = get_the_post_thumbnail_url($post, 'full');
} elseif ( has_category_thumbnail() ) {
  $imgURL = get_the_category_thumbnail()->url;
} else {
  $imgURL = get_the_post_thumbnail_url(get_option( 'page_on_front' ), 'full');
}
?>
<div
  class="jumbotron title pos-r"
  style="
    background-image: url('<?php echo $imgURL; ?>'); background-position: <?php the_field('position'); ?>
  "
>
  <div class="overlay-4 bg-white"></div>
  <div class="container">
    <h1 class="text-center"><?php echo get_my_title(); ?></h1>
  </div>
</div>
