<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */
get_header();
get_template_part( 'loop-templates/components/content', 'header' );
get_template_part( 'loop-templates/components/content', 'breadcrumbs' );
// Only function
get_template_part( 'loop-templates/components/content', 'main-blog' );
?>

<section class="wrapper" id="content-wrapper">

	<div class="container" id="content" tabindex="-1">
		<h2>Últimas entradas sobre <?php echo get_the_category()[0]->name; ?></h2>

		<div class="row">

			<main class="container container-main" id="main" data-display="5">
				<?php get_my_posts(get_the_category()[0]->slug, 5, 1); ?>
			</main><!-- #main -->

		</div><!-- .row -->
		
		<?php pagination('', 5) ?>

	</div><!-- Container end -->


</section><!-- Wrapper end -->


<?php get_footer(); ?>