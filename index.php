<?php

/**
 * Index acts a basic router template
 */
get_header();

if (is_404()) {
    get_template_part('templates/404');
} elseif (is_search()) {
    get_template_part('templates/search');
} elseif (is_front_page()) {
    get_template_part('templates/page');
} elseif (is_page() || is_single() || is_singular()) {
    get_template_part('templates/page');
} elseif (is_home() || is_archive()) {
    get_template_part('templates/posts');
}

get_footer();

// EOF