<?php
/**
* @package TR_Toolbox
*/

namespace Inc\Base;

class Activation {

  public static function activate() {
    flush_rewrite_rules();
  }

}
