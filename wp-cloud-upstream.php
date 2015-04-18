<?php
/**
 * Plugin Name: WP-Cloud: Upstream
 * Plugin URI: http://wpcloud.io/plugins/wp-cloud
 * Description: Manage upstram git pushes.
 * Version: 0.5.0
 * Author: wpCloud.io
 * Author URI: http://wpcloud.io/
 * License: GPLv2 or later
 * Network: True
 * Domain Path: /static/locale/
 * Text Domain: wp-cloud
 *
 */
namespace wpCloud\Upstream {

  if( file_exists( __DIR__ . '/vendor/libraries/autoload.php' ) ) {
    include_once( __DIR__ . '/vendor/libraries/autoload.php' );
  }

  // add_filter( 'option_active_plugins', 'wpCloud\Policy\Filter::active_plugins' );
  // add_filter( 'site_option_active_sitewide_plugins', 'wpCloud\Policy\Filter::sitewide_plugins' );

  class Action {

  }

}