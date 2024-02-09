<?php

/**
 * Twenty Twenty 4 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Twenty Twenty 4
 * @since Twenty Twenty 4 0.1
 */

/**
 * Enqueue custom scripts and styles
 *
 * @since Twenty Twenty 4 0.1
 * @return void
 */
if (!function_exists('twentytwenty4_scripts_n_styles')) {
    function twentytwenty4_scripts_n_styles()
    {
        global $wp_styles;

        // wp_enqueue_script(
        //     'twenty4-js',
        //     get_theme_file_uri() . '/assets/js/main.js',
        //     array('jquery'),
        //     twentytwenty4_filemtime(get_theme_file_uri() . '/assets/js'),
        //     true
        // );

        wp_enqueue_style(
            'twenty4-css',
            get_theme_file_uri() . '/assets/css/app.css',
            array(),
            twentytwenty4_filemtime(get_theme_file_uri() . '/assets/css'),
            'all'
        );
    }
}
add_action('wp_enqueue_scripts', 'twentytwenty4_scripts_n_styles', 99);

/**
 * Filemtime Workaround
 * 
 * Since filemtime sometimes fails for apparently no good reason, it's best to wrap it in a file_exists variable with a time based fallback to force refresh.
 */
if (!function_exists('twentytwenty4_filemtime')) {
    function twentytwenty4_filemtime($type)
    {
        $dir_to_check = get_theme_file_uri() . '/dist/' . $type;

        if (file_exists($dir_to_check) && is_dir($dir_to_check)) {
            return filemtime($dir_to_check);
        } else {
            return date('Ymd') . '-' . time();
        }
    }
}
