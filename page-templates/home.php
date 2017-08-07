<?php
/**
 * Template Name: Home
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package yofisio
 */

get_header();

while ( have_posts() ) : the_post();
	get_template_part( 'loop-templates/components/content', 'home-header' );
	get_template_part( 'loop-templates/components/content', 'phone-cta' );
	?>
	<div class="wrapper" id="content-wrapper">
		<?php
			get_template_part( 'loop-templates/components/content', 'subtitle' );
			get_template_part( 'loop-templates/components/content', 'razones' );
			get_template_part( 'loop-templates/components/content', 'servicios' );
			get_template_part( 'loop-templates/components/content', 'categorias' );
			get_template_part( 'loop-templates/components/content', 'equipo' );
		?>
		<div class="container" id="content">
			<?php the_content(); ?>
		</div>
		<?php
			get_template_part( 'loop-templates/components/content', 'testimonios' );
		?>
	</div>
<?php
	
endwhile;

get_footer();
