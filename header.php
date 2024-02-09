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

  <header>
    <nav class="top-bar topbar-responsive">
      <div class="row">
        <div class="top-bar-title">
          <span data-responsive-toggle="topbar-responsive" data-hide-for="medium">
            <button class="menu-icon" type="button" data-toggle></button>
          </span>
          <a class="topbar-responsive-logo" href="<?php echo home_url(); ?>"><strong><?php echo bloginfo('name'); ?></strong></a>
        </div>
        <div id="topbar-responsive" class="topbar-responsive-links">
          <div class="top-bar-right">
            <ul class="menu simple vertical medium-horizontal">
              <li><a href="#">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Contact</a></li>
              <li>
                <button type="button" class="button nothollow topbar-responsive-button">Hello</button>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </header>