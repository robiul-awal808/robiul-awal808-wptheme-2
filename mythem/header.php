<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
   <meta charset="<?php bloginfo('charset'); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <script src="assets/js/jquery-3.5.1.min.js"></script>

   <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?> 

   <div id="page" class="site">
      <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'mytheme' ); ?></a>

         <header id="masthead" class="site-header">
         <div class="container">

            <div class="site-branding">
               <?php
               if ( has_custom_logo() ) {
                  the_custom_logo();
               } else {
                  echo '<h1>' . esc_html(get_bloginfo( 'name' )) . '</h1>';
               }
               ?>
            </div>

            <button id="menu-toggle"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"/></svg></button>

            <?php
            wp_nav_menu(
               array(
                  'theme_location'       => 'header-menu',
                  'container'            => 'nav',
                  'container_class'      => 'main-navigation',
                  'container_id'         => 'site-navigation',  
               )
            )
            ?>           
         </div>
      </header><!-- #masthead -->

      <div id="content" class="site-content">
         <div class="container">











         