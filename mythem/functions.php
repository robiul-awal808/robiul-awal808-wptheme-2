<?php

function mytheme_setup_theme() {
  load_theme_textdomain( 'mytheme', get_template_directory() . '/languages' );

    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo', array(
      'width' => 190,
      'height' => 110, 
      'flex-height' => true, 
      'flex-height' => true, 
    ));

    /**
     * Register Nav Menus
     */
    register_nav_menus(
      array(
        'header-menu' => esc_html__( 'Header Menu', 'mytheme' )
      )
      );
}

add_action( 'after_setup_theme', 'mytheme_setup_theme' );

function mytheme_enqueue_scripts() {
  wp_enqueue_style( 'mytheme-style', get_template_directory_uri() . '/assets/css/style.css' );
  wp_enqueue_style( 'mytheme-google-fonts', '//fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap' );

  wp_enqueue_script( 'mytheme-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), false, true );
}

if( ! function_exists( 'mytheme_filter_nav_menu_css_class' ) ) :
add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_scripts' );

function mytheme_filter_nav_menu_css_class( $classes, $item, $args ) {
  //var_dump( $classes ); 
  //var_dump( $item );
  //var_dump( $args ); 

  /**
   * Add Icon to Menu Item has clsaa of 'menu-item-has-children'
   */
  if( 'header-menu' === $args->theme_location && in_array( 'menu-item-has-children', $classes) ) {
      $item->title .= '<span class="dropdown-menu-toggle"></span>';
  }

    return $classes;
}
endif;
add_filter( 'nav_menu_css_class', 'mytheme_filter_nav_menu_css_class', 10, 3 );

/**
 * Register Sidebars
 */
function mytheme_register_sidebars() {
    register_sidebar(
        array(
            'id'            => 'sidebar-1',
            'name'          => esc_html__( 'Default Sidebar', 'mytheme' ),
            'description'   => esc_html__( 'A short description of the sidebar.', 'mytheme' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

    register_sidebar(
      array(
          'id'            => 'footer-widgets',
          'name'          => esc_html__( 'footer-widgets', 'mytheme' ),
          'description'   => esc_html__( 'A short description of the sidebar.', 'mytheme' ),
          'before_widget' => '<div id="%1$s" class="widget %2$s">',
          'after_widget'  => '</div>',
          'before_title'  => '<h3 class="widget-title">',
          'after_title'   => '</h3>',
      )
  );
}
add_action( 'widgets_init', 'mytheme_register_sidebars' );