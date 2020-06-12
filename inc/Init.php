<?php

/**
* @package TR_Toolbox
*/

namespace Inc;

require_once(plugin_dir_path(__FILE__).'/Admin.php');
require_once(plugin_dir_path(__FILE__).'/Enqueue.php');
require_once(plugin_dir_path(__FILE__).'/services/HTTPHeaders.php');

use Inc\Admin;
use Inc\Enqueue;
use Inc\Services\HTTPHeaders;

final class Init {

  //loop through classes, initialize them, and call the register method
  public static function register_services() {
    foreach (self::get_services() as $class) {
      $service = self::instantiate( $class );
      if ( method_exists( $service, 'init' ) ) {
        $service->init();
      }
    }
  }

  //get classes to be used
  private static function get_services() {
    return [
      Admin::class,
      Enqueue::class,
      HTTPHeaders::class
    ];
  }

  //instantiate the class to be used
  private static function instantiate( $class ) {
    $service = new $class();
    return $service;
  }
}
