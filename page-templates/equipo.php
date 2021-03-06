<?php
/**
 * Template Name: Equipo
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
	//get_template_part( 'loop-templates/components/content', 'subtitle' );
?>
	<div class="wrapper" id="content-wrapper">
		<div class="container">
			<div class="content">
				<?php foreach (get_field('equipo') as $index => $member) { ?>
					<section class="member" id="<?php echo sanitize_title($member['nombre']); ?>">
						<div>
							<div>
								<h2><?php echo $member['nombre']; ?></h2>
							</div>
							<div class="<?php echo $index % 2 ? 'float-right wow fadeInRight' : 'float-left wow fadeInLeft'; ?>">
								<?php
									$attr = array(
										'title' => $member['nombre'],
										'alt' => $member['nombre'],
									);
									echo wp_get_attachment_image( $member['imagen']['id'], 'medium_large', $attr);
								?>
							</div>
							<?php echo $member['texto'] ?>
						</div>
						<div class="clearfix"></div>
					</section>
				<?php } ?>
			</div>
		</div>
	</div>
<?php

endwhile;

get_footer();
