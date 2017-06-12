<?php
/**
 * Content header template.
 *
 * @package yofisio
 */
if ( is_home() && !is_front_page() ) { // Blog
  $imgURL = get_the_post_thumbnail_url(get_option( 'page_for_posts' ), 'full');
  $img = get_post_thumbnail_id(get_option( 'page_for_posts' ));
} elseif ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  $imgURL = get_the_post_thumbnail_url($post, 'full');
  $img = get_post_thumbnail_id($post);
} elseif ( has_category_thumbnail() ) {
  $imgURL = get_the_category_thumbnail()->url;
  $img = get_the_category_thumbnail()->id;
} else {
  $imgURL = get_the_post_thumbnail_url(get_option( 'page_on_front' ), 'full');
  $img = get_post_thumbnail_id(get_option( 'page_on_front' ));
}
?>
<div class="jumbotron title pos-r">
  <div class="overlay-4 bg-white"></div>
  <div class="overlay <?php the_field('position'); ?>"><?php echo wp_get_attachment_image($img, 'full'); ?></div>
  <div class="container">
    <h1 class="text-center"><?php echo get_my_title(); ?></h1>
  </div>
</div>
