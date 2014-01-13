<?php
/**
 * Main template file.
 *
 * @package Hugo
 * @since Hugo 1.0
 */

get_template_part('templates/header');

if ( function_exists( 'get_option_tree') ) {
    $theme_options = get_option('option_tree');
}

$layout = get_option_tree('homepage_layout',$theme_options);

if ( $layout == "left-sidebar" ) :
    get_sidebar();
    echo '<div class="main-content col-8-12">';

elseif ( $layout == "full-width" ) :
    echo '<div class="main-content col-1-1">';

elseif ( $layout == "right-sidebar" ) :
    echo '<div class="main-content col-8-12">';

endif;

        if ( have_posts() ) :

            while (have_posts()) : the_post();

                get_template_part('templates/content', get_post_format());

            endwhile;

                hugo_page_nav();

        else :

                get_template_part('templates/content', 'nope');

        endif;

    echo '</div>';

if ( $layout == "right-sidebar" ) :
    get_sidebar();
endif;

get_template_part('templates/footer');


/*if ( is_home() && function_exists('show_nivo_slider') ) {
    show_nivo_slider();
}
*/
