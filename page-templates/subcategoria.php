<?php
/**
 * Template Name: Subcategoría
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package yofisio
 */

get_header();

while ( have_posts() ) : the_post();
	get_template_part( 'loop-templates/components/content', 'phone-cta' );
	get_template_part( 'loop-templates/components/content', 'header' );
	get_template_part( 'loop-templates/components/content', 'breadcrumbs' );
	get_template_part( 'loop-templates/components/content', 'subtitle' );
	?>
	<div class="wrapper" id="content-wrapper">
		<div class="container" id="content">
			<?php the_content(); ?>
		</div>
	</div>
	
<?php
endwhile;

get_footer();

