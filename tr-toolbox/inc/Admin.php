<?php

/**
* @package TR_Toolbox
*/

namespace Inc;

require_once(plugin_dir_path(__FILE__).'/base/AdminCallbacks.php');
require_once(plugin_dir_path(__FILE__).'/base/SettingsApi.php');

use Inc\Base\AdminCallbacks;
use Inc\Base\SettingsApi;

class Admin {

  public $settings_api;
  public $admin_callbacks;

  public function init() {
    $this->admin_callbacks              = new AdminCallbacks();
    $this->settings_api                 = new SettingsApi();
    $this->settings_api->admin_page     = $this->get_admin_page();
    $this->settings_api->admin_subpages = $this->get_admin_subpages();
    $this->settings_api->sections       = $this->get_sections();
    $this->settings_api->settings       = $this->get_settings();
    $this->settings_api->fields         = $this->get_fields();
    $this->settings_api->register();
  }

 private function get_admin_page() {
    $args = array (
      [
        'page_title' => 'TR Toolbox',
        'menu_title' => 'TR Toolbox',
        'capability' => 'manage_options',
        'menu_slug'  => 'tr_toolbox',
        'callback'   => array( $this->admin_callbacks, 'admin_page' ),
        'icon_url'   => 'dashicons-carrot',
        'position'   => 200
      ]
    );
    return $args;
  }

  private function get_admin_subpages() {
     $args = array (
       [
         'parent_slug' => 'tr_toolbox',
         'page_title'  => 'TR Toolbox',
         'menu_title'  => 'Security',
         'capability'  => 'manage_options',
         'menu_slug'   => 'tr_security',
         'callback'    => array( $this->admin_callbacks, 'admin_subpage_security' )
       ]
     );
     return $args;
   }

  private function get_sections() {
    $args = array (
      [
        'id'       => 'tr-security-settings-section',
        'title'    => 'HTTP Response Headers',
        'callback' => '',
        'page'     => 'tr_security'
      ]
    );
    return $args;
  }

  private function get_settings() {
    $args = array (
      [
        'option_group' => 'tr-security-option-group',
        'option_name'  => 'tr-content-security-policy'
      ],
      [
        'option_group' => 'tr-security-option-group',
        'option_name'  => 'tr-x-content-type-options'
      ],
      [
        'option_group' => 'tr-security-option-group',
        'option_name'  => 'tr-referrer-policy'
      ],
      [
        'option_group' => 'tr-security-option-group',
        'option_name'  => 'tr-strict-transport-security'
      ],
      [
        'option_group' => 'tr-security-option-group',
        'option_name'  => 'tr-timing-allow-origin'
      ],
      [
        'option_group' => 'tr-security-option-group',
        'option_name'  => 'tr-remove-expires'
      ]
    );
    return $args;
  }

  private function get_fields() {
    $args = array (
      [
        'id'       => 'content-security-policy',
        'title'    => 'Content-Security-Policy',
        'callback' => array( $this->admin_callbacks, 'content_security_policy_field' ),
        'page'     => 'tr_security',
        'section'  => 'tr-security-settings-section'
      ],
      [
        'id'       => 'x-content-type-options',
        'title'    => 'X-Content-Type-Options',
        'callback' => array( $this->admin_callbacks, 'x_content_type_options_field' ),
        'page'     => 'tr_security',
        'section'  => 'tr-security-settings-section'
      ],
      [
        'id'       => 'referrer-policy',
        'title'    => 'Referrer-Policy',
        'callback' => array( $this->admin_callbacks, 'referrer_policy_field' ),
        'page'     => 'tr_security',
        'section'  => 'tr-security-settings-section'
      ],
      [
        'id'       => 'strict-transport-security',
        'title'    => 'Strict-Transport-Security',
        'callback' => array( $this->admin_callbacks, 'strict_transport_security_field' ),
        'page'     => 'tr_security',
        'section'  => 'tr-security-settings-section'
      ],
      [
        'id'       => 'timing-allow-origin',
        'title'    => 'Timing-Allow-Origin',
        'callback' => array( $this->admin_callbacks, 'timing_allow_origin_field' ),
        'page'     => 'tr_security',
        'section'  => 'tr-security-settings-section'
      ],
      [
        'id'       => 'remove-expires',
        'title'    => 'Remove Expires Header?',
        'callback' => array( $this->admin_callbacks, 'remove_expires_field' ),
        'page'     => 'tr_security',
        'section'  => 'tr-security-settings-section'
      ]
    );
    return $args;
  }

}
