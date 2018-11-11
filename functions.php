<?php
/**
 * Main Functions File - used for:
 * • including other function-files
 * • WP-Support & WP-Setup
 * • general functions like replacements, translations
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       undefined 0.1.0
 *
 */


/*==================================================================================
  DEVELOPER TOOLKIT
==================================================================================*/
require('functions/functions-dev.php');



/*==================================================================================
  WP SETUP & SETTINGS
==================================================================================*/
require('functions/functions-setup.php');
require('functions/functions-settings.php');

/*==================================================================================
  BLOCKS
==================================================================================*/
// Blocks using the ACF Flexible Content
// » https://www.advancedcustomfields.com/resources/flexible-content/
require('functions/functions-blocks.php');
require('acf.php');


/*==================================================================================
  CUSTOM
==================================================================================*/
require('functions/functions-custom.php');
require get_template_directory() . '/bootstrap-navwalker.php';

// Plugins
require_once get_stylesheet_directory() . '/inc/plugin-activation.php';

// Post Types
require('custom-post-type.php');
?>
