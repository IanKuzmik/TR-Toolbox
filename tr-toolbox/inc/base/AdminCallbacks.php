<?php

/**
* @package TR_Toolbox
*/

namespace Inc\Base;

class AdminCallbacks {

  /* MENU PAGE */
  public function admin_page() {
    echo '<h1>TapRoot Toolbox</h1>';
  }

  /* MENU SUBPAGES */
  public function admin_subpage_security() {
    echo '<h1>Security Options</h1>';
    settings_errors();
    echo '<form class="tr-security-admin-form" action="options.php" method="post">';
    settings_fields('tr-security-option-group');
    do_settings_sections( 'tr_security' );
    echo '<button id="js-tr-toolbox-http-headers-edit-button" class="tr-toolbox-http-headers-edit-button btn-secondary" name="button" type="button">Edit</button> ';
    submit_button();
    echo '</form>';
  }

  /* SECURITY HEADERS */
  public function content_security_policy_field() {
    $setting = 'tr-content-security-policy';
    $value = sanitize_text_field( get_option( $setting, '' ) );
    echo '<textarea class="widefat tr-http-header-field" id="'.$setting.'" name="'.$setting.'" disabled>'.$value.'</textarea>';
  }
  public function x_content_type_options_field() {
    $setting = 'tr-x-content-type-options';
    $value = sanitize_text_field( get_option( $setting, '' ) );
    echo '<input class="widefat tr-http-header-field" type="text" id="'.$setting.'" name="'.$setting.'" value="'.$value.'" disabled>';
  }
  public function referrer_policy_field() {
    $setting = 'tr-referrer-policy';
    $value = sanitize_text_field( get_option( $setting, '' ) );
    echo '<input class="widefat tr-http-header-field" type="text" id="'.$setting.'" name="'.$setting.'" value="'.$value.'" disabled>';
  }
  public function strict_transport_security_field() {
    $setting = 'tr-strict-transport-security';
    $value = sanitize_text_field( get_option( $setting, '' ) );
    echo '<input class="widefat tr-http-header-field" type="text" id="'.$setting.'" name="'.$setting.'" value="'.$value.'" disabled>';
  }
  public function timing_allow_origin_field() {
    $setting = 'tr-timing-allow-origin';
    $value = sanitize_text_field( get_option( $setting, '' ) );
    echo '<input class="widefat tr-http-header-field" type="text" id="'.$setting.'" name="'.$setting.'" value="'.$value.'" disabled>';
  }
  public function remove_expires_field() {
    $setting = 'tr-remove-expires';
    $value = get_option( $setting, '' ) ;
    $checked = checked( 1, get_option($setting), false);
    echo '<input class="widefat tr-http-header-field" type="checkbox" id="'.$setting.'" name="'.$setting.'" value="1" '.$checked.' disabled>';
  }

}
