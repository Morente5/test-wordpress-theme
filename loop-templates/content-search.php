<?php
/**
 * Search results partial template.
 *
 * @package understrap
 */

?>

<section class="wrapper" id="content-wrapper">

	<div class="container" id="content" tabindex="-1">
		<h2>Resultados de búsqueda sobre: <?php echo get_search_query( ); ?></h2>

		<div class="row">

			<main class="container container-main" id="main" data-display="13">
				<?php get_my_posts('', 13, 1, get_search_query( )); ?>
			</main><!-- #main -->

		</div><!-- .row -->

	</div><!-- Container end -->


</section><!-- Wrapper end -->
