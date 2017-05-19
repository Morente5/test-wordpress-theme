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
	get_template_part( 'loop-templates/components/content', 'header' );
	get_template_part( 'loop-templates/components/content', 'subtitle' );
	get_template_part( 'loop-templates/components/content', 'equipo' );
	get_template_part( 'loop-templates/components/content', 'categorias' );
	get_template_part( 'loop-templates/components/content', 'testimonios' );
endwhile;

get_footer();
