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

// Only function
get_template_part( 'loop-templates/components/content', 'main-blog' );
?>

<div class="wrapper" id="content-wrapper">

	<div class="container" id="content" tabindex="-1">

		<div class="row">

			<main class="container" id="main">

				<?php get_my_posts('', 1); ?>

		
			</main><!-- #main -->


		

		</div><!-- .row -->
				<div aria-label="Page Navigation">
				<ul class="pagination">
					<li class="page-item">
					<a class="page-link" href="#" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
						<span class="sr-only">Previous</span>
					</a>
					</li>
					<li class="page-item"><a class="page-link"><span aria-label="This">1</span> / <span aria-label="Total"><?php echo ceil(get_total_posts('') / 5); ?></span></a></li>
					<li class="page-item">
					<a class="page-link" href="#" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
						<span class="sr-only">Next</span>
					</a>
					</li>
				</ul>
				</div>	

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
