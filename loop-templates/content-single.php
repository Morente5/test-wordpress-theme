<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header clearfix">

		<?php //the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta small float-right mb-2">

			Publicado el <?php yofisio_posted_on(); ?> en <?php yofisio_entry_footer(); ?>

		</div><!-- .entry-meta -->

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
