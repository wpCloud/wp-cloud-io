<?php
/**
 * Plugin Name: WP-Cloud: Navbar
 * Plugin URI: http://wpcloud.io/plugins/wp-cloud
 * Description: Display navbar information such as container, branch, etc.
 * Version: 0.5.0
 * Author: wpCloud.io
 * Author URI: http://wpcloud.io/
 * License: GPLv2 or later
 * Network: False
 *
 */
namespace wpCloud\Navbar {

  if( file_exists( __DIR__ . '/vendor/libraries/autoload.php' ) ) {
    include_once( __DIR__ . '/vendor/libraries/autoload.php' );
  }

  add_action( 'admin_menu', array( 'wpCloud\Navbar\Actions', 'admin_menu' ), 15 );
  add_action( 'admin_bar_menu', array( 'wpCloud\Navbar\Actions', 'admin_bar_menu' ), 15 );
  add_action( 'wp_before_admin_bar_render', array( 'wpCloud\Navbar\Actions', 'wp_before_admin_bar_render' ), 15 );


  class Filters {}

  class Actions {

    public static function wp_before_admin_bar_render( $wp_admin_bar ) {
      global $wp_admin_bar;

      $wp_admin_bar->remove_menu( 'wp-logo' );
      $wp_admin_bar->remove_menu( 'comments' );
      $wp_admin_bar->remove_menu( 'wpseo-menu' );
      //$wp_admin_bar->remove_menu('user-actions' );
      //$wp_admin_bar->remove_menu('user-info' );

    }

    public static function admin_menu( ) {
      remove_submenu_page( 'index.php', 'wpmandrill-reports' );
      remove_submenu_page( 'index.php', 'my-sites.php' );
      remove_submenu_page( 'edit.php?post_type=property', 'show_agents' );
    }

    public static function admin_bar_menu( $wp_admin_bar ) {

      if( !is_super_admin() || !is_multisite() || !$wp_admin_bar ) {
        return;
      }

      if( !$_backend = isset( $_SERVER['HTTP_X_SELECTED_BACKEND'] ) ? $_SERVER['HTTP_X_SELECTED_BACKEND'] : null ) {
        return;
      }

      $wp_admin_bar->add_menu( array(
        'id' => 'cloud-backend',
        'parent' => 'top-secondary',
        'title' => sprintf( __( '%s' ), $_backend ),
        'href' => '#'
      ));

    }

    public static function admin_print_footer_scripts() {
      echo '<style type="text/css">#wpadminbar li#wp-admin-bar-cloud-backend {background-color: rgb(77, 22, 22);}</style>';
    }

  }

}