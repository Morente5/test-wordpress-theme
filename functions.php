<?php
function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();

    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
}

function register_my_menus() {
  register_nav_menus(
    array(
      'social-menu' => __( 'Menú Social' ),
      'categories-menu' => __( 'Menú Categorías' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

require get_theme_file_path() . '/inc/navwalker-yofisio.php';

add_theme_support( 'post-thumbnails' );
add_theme_support( 'category-thumbnails' );

// Breadcrumbs
function yofisio_breadcrumbs() {
       
  // Settings
  $breadcrums_id      = 'breadcrumbs';
  $breadcrums_class   = 'breadcrumb';
  $home_title         = 'YoFisio';
  $home_display       = get_field('icono_home_breadcrumbs', get_option( 'page_on_front' )) ?
    '<img src="'.get_field('icono_home_breadcrumbs', get_option( 'page_on_front' ))['url'].'" alt="'.$home_title.'" rel="home">' :
    $home_title;

  // Get the query & post information
  global $post,$wp_query;
  
  // Do not display on the homepage
  if ( !is_front_page() && !is_home() ) {
    echo '<nav>';
    // Build the breadcrums
    echo '<ol id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
    echo '<div class="container">';
    // Home page
    echo '<li class="menu-item menu-item-home breadcrumb-item"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_display . '</a></li>';

    if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
      echo '<li class="current-menu-item menu-item-archive breadcrumb-item active"><a class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</a></li>';
    } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
      // If post is a custom post type
      $post_type = get_post_type();
      // If it is a custom post type display name and link
      if($post_type != 'post') {
        $post_type_object = get_post_type_object($post_type);
        $post_type_archive = get_post_type_archive_link($post_type);
        echo '<li class="menu-item breadcrumb-item menu-item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
      }
      $custom_tax_name = get_queried_object()->name;
      echo '<li class=menu-item-current breadcrumb-item active menu-item-archive"><a class="bread-current bread-archive">' . $custom_tax_name . '</a></li>';
    } else if ( is_single() ) {
      // If post is a custom post type
      $post_type = get_post_type();
      // If it is a custom post type display name and link
      if($post_type != 'post') {
        $post_type_object = get_post_type_object($post_type);
        $post_type_archive = get_post_type_archive_link($post_type);
        echo '<li class="menu-item breadcrumb-item menu-item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
      }
      // Get post category info
      $category = get_the_category();
      if(!empty($category)) {
        // Get last category post is in
        $last_category = end(array_values($category));
        // Get parent any categories and create array
        $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
        $cat_parents = explode(',',$get_cat_parents);
        // Loop through parent categories and store in variable $cat_display
        $cat_display = '';
        foreach($cat_parents as $parents) {
          $cat_display .= '<li class="menu-item breadcrumb-item">'.$parents.'</li>';
        }
      }
      // If it's a custom post type within a custom taxonomy
      $taxonomy_exists = taxonomy_exists($custom_taxonomy);
      if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
        $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
        $cat_id         = $taxonomy_terms[0]->term_id;
        $cat_nicename   = $taxonomy_terms[0]->slug;
        $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
        $cat_name       = $taxonomy_terms[0]->name;
      }
      // Check if the post is in a category
      if(!empty($last_category)) {
        echo $cat_display;
        echo '<li class="menu-item breadcrumb-item active menu-item-current menu-item-' . $post->ID . '"><a class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</a></li>';
      // Else if post is in a custom taxonomy
      } else if(!empty($cat_id)) {
        echo '<li class="menu-item breadcrumb-item menu-item-' . $cat_id . ' menu-item-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
        //echo '<li class="separator"> ' . $separator . ' </li>';
        echo '<li class="menu-item breadcrumb-item active menu-item-current menu-item-' . $post->ID . '"><a class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</a></li>';
      } else {
        echo '<li class="menu-item breadcrumb-item active menu-item-current menu-item-' . $post->ID . '"><a class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</a></li>';
      }
    } else if ( is_category() ) {
      // Category page
      echo '<li class="menu-item-current breadcrumb-item active menu-item"><a class="bread-current bread-cat">' . single_cat_title('', false) . '</a></li>';
    } else if ( is_page() ) {
      // Standard page
      if( $post->post_parent ){
        // If child page, get parents 
        $anc = get_post_ancestors( $post->ID );
        // Get parents in the right order
        $anc = array_reverse($anc);
        // Parent page loop
        if ( !isset( $parents ) ) $parents = null;
        foreach ( $anc as $ancestor ) {
          //QUITAR INICIO
          $parents .= '<li class="menu-item-parent breadcrumb-item menu-item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
          //$parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
        }
        // Display parent pages
        echo $parents;
        // Current page
        echo '<li class="menu-item menu-item-current breadcrumb-item active menu-item-' . $post->ID . '"><a title="' . get_the_title() . '">' . get_the_title() . '</a></li>';
      } else {
        // Just display current page if not parents
        echo '<li class="menu-item menu-item-current breadcrumb-item active menu-item-' . $post->ID . '"><a class="bread-current bread-' . $post->ID . '">' . get_the_title() . '</a></li>';
      }
    } else if ( is_tag() ) {
      // Tag page
      // Get tag information
      $term_id        = get_query_var('tag_id');
      $taxonomy       = 'post_tag';
      $args           = 'include=' . $term_id;
      $terms          = get_terms( $taxonomy, $args );
      $get_term_id    = $terms[0]->term_id;
      $get_term_slug  = $terms[0]->slug;
      $get_term_name  = $terms[0]->name;
      // Display the tag name
      echo '<li class="menu-item breadcrumb-item active menu-item-current menu-item-tag-' . $get_term_id . ' menu-item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
    } elseif ( is_day() ) {
      // Day archive
      // Year link
      echo '<li class="menu-item breadcrumb-item menu-item-year menu-item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
      //echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
      // Month link
      echo '<li class="menu-item breadcrumb-item menu-item-month menu-item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
      //echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
      // Day display
      echo '<li class="menu-item breadcrumb-item active menu-item-current menu-item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
    } else if ( is_month() ) {
      // Month Archive
      // Year link
      echo '<li class="menu-item breadcrumb-item menu-item-year menu-item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
      //echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
      // Month display
      echo '<li class="menu-item breadcrumb-item menu-item-month menu-item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
    } else if ( is_year() ) {
      // Display year archive
      echo '<li class="menu-item breadcrumb-item active menu-item-current menu-item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
    } else if ( is_author() ) {
      // Auhor archive
      // Get the author information
      global $author;
      $userdata = get_userdata( $author );
      // Display author name
      echo '<li class="menu-item breadcrumb-item active menu-item-current menu-item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
    } else if ( get_query_var('paged') ) {
      // Paginated archives
      echo '<li class="menu-item breadcrumb-item active menu-item-current menu-item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';
    } else if ( is_search() ) {
      // Search results page
      echo '<li class="menu-item breadcrumb-item active menu-item-current menu-item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
    } elseif ( is_404() ) {
      // 404 page
      echo '<li class="menu-item breadcrumb-item">' . 'Error 404' . '</li>';
    }
    echo '</div></ol></nav>';
  }
}

function get_my_title() {
    if ( is_category() ) {
        /* translators: Category archive title. 1: Category name */
        $title = sprintf( __( 'Noticias: %s' ), single_cat_title( '', false ) );
    } elseif ( is_tag() ) {
        /* translators: Tag archive title. 1: Tag name */
        $title = sprintf( __( 'Tag: %s' ), single_tag_title( '', false ) );
    } elseif ( is_author() ) {
        /* translators: Author archive title. 1: Author name */
        $title = sprintf( __( 'Author: %s' ), get_the_author() );
    } elseif ( is_year() ) {
        /* translators: Yearly archive title. 1: Year */
        $title = sprintf( __( 'Year: %s' ), get_the_date( _x( 'Y', 'yearly archives date format' ) ) );
    } elseif ( is_month() ) {
        /* translators: Monthly archive title. 1: Month name and year */
        $title = sprintf( __( 'Month: %s' ), get_the_date( _x( 'F Y', 'monthly archives date format' ) ) );
    } elseif ( is_day() ) {
        /* translators: Daily archive title. 1: Date */
        $title = sprintf( __( 'Day: %s' ), get_the_date( _x( 'F j, Y', 'daily archives date format' ) ) );
    } elseif ( is_tax( 'post_format' ) ) {
        if ( is_tax( 'post_format', 'post-format-aside' ) ) {
            $title = _x( 'Asides', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
            $title = _x( 'Galleries', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
            $title = _x( 'Images', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
            $title = _x( 'Videos', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
            $title = _x( 'Quotes', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
            $title = _x( 'Links', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
            $title = _x( 'Statuses', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
            $title = _x( 'Audio', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
            $title = _x( 'Chats', 'post format archive title' );
        }
    } elseif ( is_post_type_archive() ) {
        /* translators: Post type archive title. 1: Post type name */
        $title = sprintf( __( 'Archives: %s' ), post_type_archive_title( '', false ) );
    } elseif ( is_tax() ) {
        $tax = get_taxonomy( get_queried_object()->taxonomy );
        /* translators: Taxonomy term archive title. 1: Taxonomy singular name, 2: Current taxonomy term */
        $title = sprintf( __( '%1$s: %2$s' ), $tax->labels->singular_name, single_term_title( '', false ) );
    } elseif ( is_home() && !is_front_page() ) { // Blog
        $title = get_field('titulo', get_option( 'page_for_posts' ));
    } elseif ( get_the_title() ) {
        $title = get_the_title();
    } else {
        $title = __( 'Archives' );
    }
 
    /**
     * Filters the archive title.
     *
     * @since 4.1.0
     *
     * @param string $title Archive title to be displayed.
     */
    return apply_filters( 'get_my_title', $title );
}

?>