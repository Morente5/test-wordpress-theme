<?php
/**
 * The template for displaying search results pages.
 *
 * @package understrap
 */

get_header();


get_template_part( 'loop-templates/components/content', 'header' );
get_template_part( 'loop-templates/components/content', 'breadcrumbs' );

?>


				<?php if ( have_posts() ) : ?>

					

						<?php
						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'loop-templates/content', 'search' );
						?>



				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>


<?php get_footer(); ?>
