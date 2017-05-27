<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

?>

<section class="wrapper" id="content-wrapper">

	<div class="container" id="content" tabindex="-1">

		<h2 class="page-title"><?php esc_html_e( 'Nothing Found', 'understrap' ); ?></h2>



		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p>
				<?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'understrap' ), array(
					'a' => array(
						'href' => array(),
						),
					) ), esc_url( admin_url( 'post-new.php' ) ) );
				?>
			</p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'understrap' ); ?></p>
			<?php
				get_search_form();
		else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'understrap' ); ?></p>
			<?php
				get_search_form();
		endif; ?>

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

