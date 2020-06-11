<?php
/**
* @package TR_Toolbox
*/
/*
Plugin Name: TapRoot Toolbox
Description: This is a plugin to add http response headers to your theme and possibly other stuff soon.
Version: 1.0.0
Author: Ian Kuzmik
Author URI: 
License: MIT
Text Domain: tr-toolbox
*/

// Security Check
defined('ABSPATH') or die('You do not have permission to access these files');

use Inc\Base\Activation;
use Inc\Base\Deactivation;
use Inc\Init;

require_once(plugin_dir_path(__FILE__).'/inc/base/Activation.php');
require_once(plugin_dir_path(__FILE__).'/inc/base/Deactivation.php');
require_once(plugin_dir_path(__FILE__).'/inc/Init.php');

/*  ACTIVATION & DEACTIVATION */
function activate_tr_toolbox() {
  Activation::activate();
}
register_activation_hook( __FILE__, 'activate_tr_toolbox' );

function deactivate_tr_toolbox() {
  Deactivation::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_tr_toolbox' );

/* INIT */
if ( class_exists('Inc\\Init') ) {
  Init::register_services();
}


?>
