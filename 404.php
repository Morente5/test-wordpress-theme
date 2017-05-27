<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package understrap
 */

get_header();
get_template_part( 'loop-templates/components/content', 'header' );
get_template_part( 'loop-templates/components/content', 'breadcrumbs' );
?>

<section class="wrapper" id="content-wrapper">

	<div class="container" id="content" tabindex="-1">

		<h2 class="page-title">No se pudo encontrar nada en esta dirección</h2>
		<p>Pruebe a volver a <a href="/">Inicio</a> o a realizar una búsqueda</p>
		<?php
			get_search_form();
		?>

	</div><!-- Container end -->
</section>
<section>
	<div class="container" id="content" tabindex="-1">
		<h2>Últimas entradas</h2>

		<div class="row">

			<main class="container container-main" id="main" data-display="5">
				<?php get_my_posts('', 5, 1, ''); ?>
			</main><!-- #main -->

		</div><!-- .row -->
		
		<?php pagination('', 5) ?>

	</div><!-- Container end -->


</section><!-- Wrapper end -->

<?php get_footer(); ?>
