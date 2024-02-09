<?php get_header(); ?>

    <!-- Main Content -->
    <?php if (is_404()) {
        get_template_part('lib/editorial/404', 'banner');
    } elseif (is_search()) {
        get_template_part('lib/editorial/search');
    } elseif (is_front_page()) {
        get_template_part('lib/editorial/page');
    } elseif (is_page() || is_single() || is_singular()) {
        get_template_part('lib/editorial/page');
    } elseif (is_home() || is_archive()) {
        get_template_part('lib/editorial/posts');
    }
    ?>

<?php get_footer();
