<?php
/**
 * Template Name: Categoría
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package yofisio
 */

get_header();

while ( have_posts() ) : the_post();
	get_template_part( 'loop-templates/components/content', 'header' );
	get_template_part( 'loop-templates/components/content', 'breadcrumbs' );
	get_template_part( 'loop-templates/components/content', 'subtitle' );
	?>
	<div class="wrapper" id="content-wrapper">
		<?php get_template_part( 'loop-templates/components/content', 'categorias' ); ?>
	</div>
<?php endwhile;

get_footer();

