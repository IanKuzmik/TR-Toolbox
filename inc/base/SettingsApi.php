<?php
/**
* @package TR_Toolbox
*/

namespace Inc\Base;

class SettingsApi {

  public $admin_page     = array();
  public $admin_subpages = array();
  public $sections       = array();
  public $settings       = array();
  public $fields         = array();

  public function register() {
    if ( !empty( $this->admin_page ) ) {
      add_action( 'admin_menu', array( $this, 'add_admin_menu') );
    }
    if ( !empty( $this->sections ) ) {
      add_action( 'admin_init', array( $this, 'register_custom_fields') );
    }
  }

  public function add_admin_menu() {
    $admin_page = $this->admin_page[0];
    add_menu_page( $admin_page['page_title'], $admin_page['menu_title'], $admin_page['capability'], $admin_page['menu_slug'], $admin_page['callback'], $admin_page['icon_url'], $admin_page['position'] );
    foreach( $this->admin_subpages as $page ) {
      add_submenu_page( $page['parent_slug'], $page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'], $page['callback'] );
    }
  }

  public function register_custom_fields() {
    foreach( $this->settings as $setting ) {
      register_setting( $setting['option_group'], $setting['option_name'], (isset( $setting['args'] ) ? $setting['args'] : '') );
    }
    foreach( $this->sections as $section ) {
      add_settings_section( $section['id'], $section['title'], (isset( $section['callback'] ) ? $section['callback'] : ''), $section['page'] );
    }
    foreach( $this->fields as $field ) {
      add_settings_field( $field['id'], $field['title'], (isset( $field['callback'] ) ? $field['callback'] : ''), $field['page'],  $field['section'], (isset( $field['args'] ) ? $field['args'] : '') );
    }
  }

}
