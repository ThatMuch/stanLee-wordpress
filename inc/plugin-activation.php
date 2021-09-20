<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http: //tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme undefined
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http : //opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https: //github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'stanlee_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function stanlee_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin bundled with a theme.
 		array(
			'name'               => 'Advanced Custom Fields PRO',                                               // The plugin name.
			'slug'               => 'advanced-custom-fields-pro',                                               // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/inc/plugins/advanced-custom-fields-pro.zip',   // The plugin source.
			'required'           => true,                                                                       // If false, the plugin is only 'recommended' instead of required.
			'version'            => '5.10.2',                                                                    // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => true,                                                                       // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
		),
		array(
			'name'     => 'Advanced Custom Fields: Contact Form 7',
			'slug'     => 'advanced-custom-fields-contact-form-7',
			'source'   => 'https://github.com/taylormsj/acf-cf7/archive/master.zip',
			'required' => true,
			'force_activation'   => true,
		),
		array(
			'name'             => 'Advanced Custom Fields: Font Awesome',
			'slug'             => 'advanced-custom-fields-font-awesome',
			'required'         => true,
			'force_activation' => true,
		),
		array(
			'name'             => 'Contact Form 7',
			'slug'             => 'contact-form-7',
			'required'         => true,
			'force_activation' => true,
		),
		array(
			'name'               => 'WP Pusher',                                              // The plugin name.
			'slug'               => 'wppusher',                                               // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/inc/plugins/wppusher.zip',   // The plugin source.
			'required'           => false,                                                     // If false, the plugin is only 'recommended' instead of required.
		),
		array(
			'name'     => 'FakerPress',
			'slug'     => 'fakerpress',
			'required' => false,
		),
		array(
			'name'     => 'Custom Post Type UI',
			'slug'     => 'custom-post-type-ui',
			'required' => false,
		),
		array(
			'name'     => 'Custom Post Type Widgets',
			'slug'     => 'custom-post-type-widgets',
			'required' => false,

		),
		array(
			'name'             => 'All-in-one WP Migration',
			'slug'             => 'all-in-one-wp-migration',
			'required'         => false,
		),

		// This is an example of the use of 'is_callable' functionality. A user could - for instance -
		// have WPSEO installed *or* WPSEO Premium. The slug would in that last case be different, i.e.
		// 'wordpress-seo-premium'.
		// By setting 'is_callable' to either a function from that plugin or a class method
		// `array( 'class', 'method' )` similar to how you hook in to actions and filters, TGMPA can still
		// recognize the plugin as being installed.
		array(
			'name'        => 'WordPress SEO by Yoast',
			'slug'        => 'wordpress-seo',
			'is_callable' => 'wpseo_init',
		),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'stanlee',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                        // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins',   // Menu slug.
		'parent_slug'  => 'themes.php',              // Parent menu slug.
		'capability'   => 'edit_theme_options',      // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                      // Show admin notices or not.
		'dismissable'  => true,                      // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                        // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                     // Automatically activate plugins after installation or not.
		'message'      => '',                        // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
