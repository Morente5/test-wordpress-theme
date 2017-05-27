<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();
get_template_part( 'loop-templates/components/content', 'header' );
get_template_part( 'loop-templates/components/content', 'breadcrumbs' );
?>

<section class="wrapper" id="content-wrapper">

	<div class="container" id="content" tabindex="-1">
		<h2>Últimas entradas</h2>

		<div class="row">

			<main class="container container-main" id="main" data-display="5">
				<?php get_my_posts('', 5, 1, ''); ?>
			</main><!-- #main -->

		</div><!-- .row -->
		
		<?php pagination('', 5) ?>

	</div><!-- Container end -->

	<div class="container" id="content" tabindex="-1">
		<div class="row">

			<?php foreach (get_categories() as $cat) { ?>
			<div class="col-lg-6 p-0">
				<div class="container" id="content" tabindex="-1">
					<h2><?php echo $cat->name; ?></h2>

					<main class="container container-category" id="<?php echo $cat->slug; ?>" data-display="2">
						<?php get_my_posts($cat->slug, 2, 1, ''); ?>
					</main><!-- #main -->

					<div class="clearfix"></div>
					<?php pagination($cat->slug, 2) ?>
		
				</div><!-- Container end -->
			</div>
			<?php } ?>

		</div><!-- .row -->
	</div><!-- Container end -->
</section><!-- Wrapper end -->


<?php get_footer(); ?>
