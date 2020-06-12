<?php

/**
* This file is triggered on uninstall
*
* @package TR_Toolbox
*/

if ( ! defined('WP_UNINSTALL_PLUGIN') ) {
  die;
}


// delete saved options
$options = array(
  'tr-content-security-policy',
  'tr-x-content-type-options',
  'tr-referrer-policy',
  'tr-strict-transport-security',
  'tr-timing-allow-origin',
  'tr-remove-expires'
);
foreach ( $options as $option ) {
	if ( get_option($option) ) delete_option($option);
}
