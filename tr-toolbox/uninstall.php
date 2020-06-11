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
  'content-security-policy',
  'x-content-type-options',
  'referrer-policy',
  'strict-transport-security',
  'timing-allow-origin',
  'remove-expires'
);
foreach ($options as $option) {
	if (get_option($option)) delete_option($option);
}
