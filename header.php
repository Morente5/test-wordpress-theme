<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <nav id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-99987389-1', 'auto');
		ga('send', 'pageview');
	</script>
	<script type="text/javascript" src="//newsharecounts.s3-us-west-2.amazonaws.com/nsc.js"></script>
	<script type="text/javascript">window.newShareCountsAuto="smart";</script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<?php $frontpage_id = get_option( 'page_on_front' ); ?>
	<div class="wrapper-fluid wrapper-navbar" id="wrapper-navbar" style="background-image: url('<?php the_field('imagen', $frontpage_id); ?>')">

		<nav id="navigation-nav" class="navbar navbar-inverse">
			<div class="overlay-8 bg-info"></div>
			<div class="container">
				<!-- The WordPress Menu goes here -->
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'is-right',
						'container_id'    => '',
						'menu_class'      => 'navbar-nav navbar-top pull-right',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'walker'          => new WP_Bootstrap_Navwalker_YoFisio(),
					)
				); ?>
			</div><!-- .container -->
		</nav><!-- .site-navigation -->

		<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content',
		'understrap' ); ?></a>

		<div class="header-main">
			<div class="container">
				<!-- Your site title as branding in the menu -->
				<?php if ( ! has_custom_logo() ) { ?>
					<?php if ( is_front_page() && is_home() ) : ?>
						<h1 class="navbar-brand"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
					<?php endif; ?>
				<?php } else {
					the_custom_logo();
				} ?><!-- end custom logo -->

			</div><!-- .container -->

		</nav><!-- .site-navigation -->

	</div><!-- .wrapper-navbar end -->

	<nav id="category-nav" class="navbar navbar-toggleable navbar-inverse">
		<div class="overlay-8 bg-info"></div>
		<?php if ( 'container' == $container ) : ?>
		<div class="container">
		<?php endif; ?>
		


			<button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#categoriesDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fa fa-bars" aria-hidden="true"></i>
			</button>


			<!-- The WordPress Menu goes here -->
			<?php wp_nav_menu(
				array(
					'theme_location'  => 'categories-menu',
					'container_class' => 'collapse navbar-collapse',
					'container_id'    => 'categoriesDropdown',
					'menu_class'      => 'navbar-nav h5',
					'fallback_cb'     => '',
					'menu_id'         => 'categories-menu',
					'walker'          => new WP_Bootstrap_Navwalker_YoFisio(),
				)
			); ?>
		<?php if ( 'container' == $container ) : ?>
		</div><!-- .container -->
		<?php endif; ?>
	</nav><!-- .site-navigation -->

</div>