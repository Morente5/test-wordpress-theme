<?php
/**
 * Content main-blog template.
 *
 * @package yofisio
 */
?>
<?php
function get_my_posts($category, $posts, $page) {
    $category_query = new WP_Query( array('post_status' => 'publish', 'posts_per_page' => $posts, 'paged' => $page, 'category_name' => $category) );

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

function pagination($category, $posts) {
    echo '<div aria-label="Page Navigation">';
        echo '<ul class="pagination '.$category.'">';
            echo '<li class="page-item">';
                echo '<a class="page-link" href="#" aria-label="Previous">';
                    echo '<span aria-hidden="true">&laquo;</span>';
                    echo '<span class="sr-only">Previous</span>';
                echo '</a>';
            echo '</li>';
            echo '<li class="page-item"><a class="page-link"><span aria-label="This">1</span> / <span aria-label="Total">'.ceil(get_total_posts($category) / $posts).'</span></a></li>';
            echo '<li class="page-item">';
                echo '<a class="page-link" href="#" aria-label="Next">';
                    echo '<span aria-hidden="true">&raquo;</span>';
                    echo '<span class="sr-only">Next</span>';
                echo '</a>';
            echo '</li>';
        echo '</ul>';
    echo '</div>';
}