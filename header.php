<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <nav id="content">
 *
 * @package understrap
 */

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
	<script async defer type="text/javascript" src="//newsharecounts.s3-us-west-2.amazonaws.com/nsc.js"></script>
	<script async defer type="text/javascript">window.newShareCountsAuto="smart";</script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
