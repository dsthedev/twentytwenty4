<?php

/**
 * PheonixPress Parent Theme Index
 * 
 * This file is meant to be a barebones implementation of the core functionality needed out of a theme.  The magic is in putting everything into this file, and have all components lib'd out for template use.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * 
 * @todo Clean this up and make it woo-ready.  It seems such limited conditional checking and lack of templates may be causing the shop to not display, as well as other features.
 * 
 * get_header('NAME'); // header-NAME.php
 */

$body_classes = 'is-preload';

if (is_front_page()) {
  $body_classes .= ' front-page';
}

?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="wp-theme-origin" content="PheonixPress" data-pheonixpress-keywords="foundation-mq">

  <link rel="profile" href="https://gmpg.org/xfn/11">

  <?php if (!function_exists('has_site_icon') || !has_site_icon()) { ?>
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
    <link href="<?php echo get_template_directory_uri(); ?>/assets/images/icon.png" rel="touch-icon" />
  <?php } ?>

  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

  <?php wp_head(); ?>
</head>

<body <?php body_class($body_classes); ?>>

  <!-- Wrapper -->
  <div id="wrapper">

    <!-- Main -->
    <main id="main-container">
      <div class="inner">
        <?php get_template_part('lib/editorial/generic/browserupgrade'); ?>

        <!-- Header -->
        <header id="header">
          <?php get_template_part('lib/nfawc/navbar'); ?>
        </header>
        
        <div class="container">