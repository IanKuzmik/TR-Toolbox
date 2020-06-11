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
  	header( 'Content-Security-Policy: '   .get_option('content-security-policy') );
  	header( 'X-Content-Type-Options: '		.get_option('x-content-type-options') );
  	header( 'Referrer-Policy: ' 					.get_option('referrer-policy') );
  	header( 'Strict-Transport-Security: ' .get_option('strict-transport-security') );
  	header( 'Timing-Allow-Origin: '				.get_option('timing-allow-origin') );
  	if ( get_option('remove-expires') == 1 ) header_remove('Expires');
  }


}
