<?php

/**
* @package TR_Toolbox
*/

namespace Inc;

require_once(plugin_dir_path(__FILE__).'/base/BaseController.php');

use Inc\Base\BaseController;

class Enqueue extends BaseController {

  public function init() {
    add_action( 'admin_enqueue_scripts', array($this, 'admin_enqueue') );
    //add_action( 'wp_enqueue_scripts', array($this, 'enqueue') );
  }

  public function admin_enqueue() {
    wp_enqueue_style( 'tr-toolbox-admin-style', $this->plugin_url . 'assets/tr-toolbox.admin.css' );
    wp_enqueue_script( 'tr-toolbox-admin-script', $this->plugin_url . 'assets/tr-toolbox.admin.js', array(), '1.0.0', 'true' );
  }

  public function enqueue() {
    wp_enqueue_style( 'tr-toolbox-style', $this->plugin_url . 'assets/tr-toolbox.css' );
    wp_enqueue_script( 'tr-toolbox-script', $this->plugin_url . 'assets/tr-toolbox.js', array(), '1.0.0', 'true' );
  }

}
