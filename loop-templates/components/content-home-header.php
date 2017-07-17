<?php
/**
 * Content header template.
 *
 * @package yofisio
 */
if ( is_home() && !is_front_page() ) { // Blog
  $imgURL = get_the_post_thumbnail_url(get_option( 'page_for_posts' ), 'full');
  $img = get_post_thumbnail_id(get_option( 'page_for_posts' ));
} elseif ( has_category_thumbnail() ) {
  $imgURL = get_the_category_thumbnail()->url;
  $img = get_the_category_thumbnail()->id;
} elseif ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  $imgURL = get_the_post_thumbnail_url($post, 'full');
  $img = get_post_thumbnail_id($post);
} else {
  $imgURL = get_the_post_thumbnail_url(get_option( 'page_on_front' ), 'full');
  $img = get_post_thumbnail_id(get_option( 'page_on_front' ));
}
?>


<div class="hfeed site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<?php $frontpage_id = get_option( 'page_on_front' ); ?>
	<div class="wrapper-fluid wrapper-navbar" id="wrapper-navbar" style="background-image: url('<?php the_field('imagen', $frontpage_id); ?>')">
    <div class="jumbotron jumbotron-home title pos-r">
      <nav id="navigation-nav" class="navbar navbar-home">
        <div>
          <!-- Your site title as branding in the menu -->
          <?php if ( ! has_custom_logo() ) { ?>
            <?php if ( is_front_page() && is_home() ) : ?>
              <h1 class="navbar-brand"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
            <?php else : ?>
              <a class="navbar-brand is-left" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
            <?php endif; ?>
          <?php } else { ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand custom-logo-link" rel="home" itemprop="url">
              <?php
                $custom_logo_id = get_theme_mod( 'custom_logo' );
                $logo = wp_get_attachment_image( $custom_logo_id , 'small' );
                echo $logo;
              } ?><!-- end custom logo -->
            </a>
          <!-- The WordPress Menu goes here -->
          <?php wp_nav_menu(
            array(
              'theme_location'  => 'primary',
              'container_class' => 'is-right is-inline',
              'container_id'    => '',
              'menu_class'      => 'navbar-nav navbar-top pull-right',
              'fallback_cb'     => '',
              'menu_id'         => 'main-menu',
              'walker'          => new WP_Bootstrap_Navwalker_YoFisio(),
            )
          ); ?>
        </div>
      </nav><!-- .site-navigation -->

      <a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content',
      'understrap' ); ?></a>


      <nav id="category-nav" class="navbar navbar-toggleable">
          
        <div class="container">
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
        </div>
      </nav><!-- .site-navigation -->

      <div class="overlay-4 bg-white"></div>
      <div class="overlay">
        <?php
          // HEADER IMAGE
          $attr = array(
            'title' => get_my_title(),
            'alt' => get_my_title(),
            'class' =>  get_field('position'),
          );
          echo wp_get_attachment_image($img, 'full', false, $attr);
          ?>
      </div>
      <div class="container home-height">
        <h1 class="text-center"><?php echo get_my_title(); ?></h1>
      </div>
    </div>  
  </div>
