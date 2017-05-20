<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
?>

<footer class="footer pos-r">
	<div class="overlay-8 bg-info"></div>
	<?php $contactoID = get_page_by_title( 'contacto' )->ID; ?>
	
	<div class="container">

		<div class="row">
			<div class="col-sm-3">
				<h4>Categorías</h4>
				<?php wp_nav_menu(
				array(
					'theme_location'  => 'categories-menu',
					'container_id'    => 'categories-footer',
					'menu_id'         => 'categories-menu-footer',
					'depth' => 1
				)
			); ?>
				<h4>Síguenos en redes</h4>
				<?php wp_nav_menu(
						array(
							'theme_location'  => 'social',
							'container_class' => 'social',
							'container_id'    => 'socialNavbar',
							'menu_class'      => 'navbar-nav',
							'fallback_cb'     => '',
							'menu_id'         => 'social-menu',
							'walker'          => new WP_Bootstrap_Navwalker_YoFisio(),
						)
					); ?>
			</div><!--col end -->
			<div class="col-lg-9">
				
				<div class="row">
					<div class="col-lg-4">
						<div class="map"></div>
					</div>
					<div class="col-lg-4">
						<?php if (get_field('telefonos', $contactoID)) { ?>
							<h6>Teléfono<?php echo count(get_field('telefonos', $contactoID)) != 1 ? 's' : ''; ?></h6>
							<ul>
							<?php
								foreach (get_field('telefonos', $contactoID) as $tel) {
									echo '<li>'.$tel['telefono'].'</li>';
								}
							?>
							</ul>
						<?php } ?>
						<?php if (get_field('email', $contactoID)) { ?>
							<h6>Email</h6>
							<?php the_field('email', $contactoID) ?>
						<?php } ?>
					</div>
					<div class="col-lg-4">
						<?php if (get_field('horario', $contactoID)) { ?>
							<h6>Horario</h6>
							<?php the_field('horario', $contactoID) ?>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col">
				©2017 by <a href="https://braunmarketingandconsulting.es">Braun Marketing & Consulting</a>
			</div>
		</div>

	</div><!-- container end -->

</footer>

</div><!-- #page -->

<?php wp_footer(); 

$contactoID = get_page_by_title( 'contacto' )->ID
?>
<script>
function initMap() {
	var yofisio = {lat: <?php echo get_field('direccion', $contactoID)['lat']; ?>, lng: <?php echo get_field('direccion', $contactoID)['lng']; ?>};
	jQuery('.map').each( function() {
		var map = new google.maps.Map(this, {
			zoom: 17,
			center: yofisio
		});
		var marker = new google.maps.Marker({
			position: yofisio,
			map: map
		});
		var infowindow = new google.maps.InfoWindow({
			content: 'Estamos aquí'
		});

		google.maps.event.addListener(marker, 'click', function() {
			infowindow.open( map, marker );
		});
	});
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAurgtOsHHiNdITsEEJ5n-EHbvbdXkwRT4&callback=initMap" async defer></script>
</body>

</html>

