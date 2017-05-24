<?php
/**
 * Content main-blog template.
 *
 * @package yofisio
 */
?>
<?php
function get_my_posts($category, $page) {
    $category_query = new WP_Query( array('post_status' => 'publish', 'posts_per_page' => 5, 'paged' => $page, 'category_name' => $category) );

    if ( $category_query->have_posts() ) { 
        while ( $category_query->have_posts() ) {
            $category_query->the_post();
            get_template_part( 'loop-templates/content', 'blog-post' );
        }
    } elseif ( $page == 1 ) {
        get_template_part( 'loop-templates/content', 'none' );
    }
}

function get_total_posts($category) {
    if ( !isset($category) || !$category ) {
        return wp_count_posts()->publish;
    } else {
        return get_terms(array('taxonomy' => 'category', 'slug' => $category))[0]->count;
    }
}