<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php //the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta small clearfix mb-2">
			<div class="float-right">
				Publicado el <?php yofisio_posted_on(); ?> en <?php yofisio_entry_footer(); ?>
			</div>
		</div><!-- .entry-meta -->
		<div class="entry-ratings small clearfix mb-2">
			<div class="float-right">
				<?php if(function_exists('the_ratings')) { the_ratings(); } ?>
			</div>
		</div>

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php the_content(); ?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
			'after'  => '</div>',
		) );
		?>

		<div id="crestashareiconincontent" class="inline-social clearfix">
			<?php add_social_button(); ?>
		</div>
	</div><!-- .entry-content -->

	<footer class="entry-footer">

		

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
