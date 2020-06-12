<?php

/**
* @package TR_Toolbox
*/

namespace Inc\Services;

class HTTPHeaders {

  public function init() {
    add_action( 'send_headers', array( $this, 'get_headers' ) );
  }

  public function get_headers() {
    $headers = array(
      'Content-Security-Policy: '   => sanitize_text_field( get_option('tr-content-security-policy') ),
      'X-Content-Type-Options: '    => sanitize_text_field( get_option('tr-x-content-type-options') ),
      'Referrer-Policy: '           => sanitize_text_field( get_option('tr-referrer-policy') ),
      'Strict-Transport-Security: ' => sanitize_text_field( get_option('tr-strict-transport-security') ),
      'Timing-Allow-Origin: '       => sanitize_text_field( get_option('tr-timing-allow-origin') ),
    );
    foreach ( $headers as $header => $option ) {
      if ( !empty($option) ) header( $header.$option );
    }
  	if ( get_option('tr-remove-expires') == 1 ) header_remove('Expires');
  }

}
