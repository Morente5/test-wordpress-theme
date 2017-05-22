<?php
/**
 * Template Name: Contacto
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
	//get_template_part( 'loop-templates/components/content', 'subtitle' );
?>
<div class="wrapper" id="content-wrapper">
	
<section id="contacto">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<?php if (get_field('titulo_mapa')) { ?>
					<h2><?php the_field('titulo_mapa') ?></h2>
				<?php } ?>
				<div class="map"></div>
			</div>
			<div class="col-md-6">
				<?php if (get_field('titulo_formulario')) { ?>
					<h2><?php the_field('titulo_formulario') ?></h2>
				<?php } ?>
				<?php echo do_shortcode( '[contact-form-7 id="268" title="Contacto"]' ); ?>
			</div>
		</div>
	</div>
</section>

</div>
<?php endwhile;

get_footer();
