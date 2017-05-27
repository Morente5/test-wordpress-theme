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
$cat = get_the_category()[0];
?>

<section class="wrapper" id="content-wrapper">

	<div class="container" id="content" tabindex="-1">
		<h2>Últimas entradas sobre <?php echo $cat->name; ?></h2>

		<div class="row">

			<main class="container container-main" id="<?php echo $cat->slug;?>" data-display="13">
				<?php get_my_posts($cat->slug, 13, 1, ''); ?>
			</main><!-- #main -->

		</div><!-- .row -->
		
		<?php pagination($cat->slug, 13) ?>

	</div><!-- Container end -->


</section><!-- Wrapper end -->


<?php get_footer(); ?>