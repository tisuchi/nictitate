<?php

define('KOPA_THEME_NAME', 'Nictitate');
define('KOPA_DOMAIN', 'nictitate');
define('KOPA_CPANEL_IMAGE_DIR', get_template_directory_uri() . '/library/images/layout/');

/*
 * Initialize admin page, register widgets
 */
require trailingslashit(get_template_directory()) . '/library/kopa.php';

/*
 * Initialize layout settings and dynamic sidebar settings
 */
require trailingslashit(get_template_directory()) . '/library/ini.php';

/*
 * Get google fonts array
 */
require trailingslashit(get_template_directory()) . '/library/includes/google-fonts.php';

/*
 * Contain all ajax functions that use in this theme 
 */
require trailingslashit(get_template_directory()) . '/library/includes/ajax.php';

/*
 * Dynamic layout options for post, page and category
 */
require trailingslashit(get_template_directory()) . '/library/includes/metabox/post.php';
require trailingslashit(get_template_directory()) . '/library/includes/metabox/category.php';
require trailingslashit(get_template_directory()) . '/library/includes/metabox/page.php';

/*
 * Set up theme defaults and registers support for various WordPress features.
 * Contain many utility functions for frontend
 */
require trailingslashit(get_template_directory()) . '/library/front.php';

/*
 * Upload field in post (image will be used in sequence slider widget) 
 */
require trailingslashit(get_template_directory()) . '/library/options/options_post_slider_bg.php';

/*
 * Icon selection field for main menu item
 */
require trailingslashit(get_template_directory()) . '/library/custom-menu/kopa_custom_menu.php';


/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'kopa_register_required_plugins' );

function kopa_register_required_plugins() {
	$plugins = array(
		array(
			'name'     				=> 'Kopa Nictitate Toolkit', // The plugin name
			'slug'     				=> 'kopa-nictitate-toolkit', // The plugin slug (typically the folder name)
			'source'   				=> get_stylesheet_directory() . '/plugins/kopa-nictitate-toolkit.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
		)
	);	

	$config = array(
		'domain'       		=> kopa_get_domain(),         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', kopa_get_domain() ),
			'menu_title'                       			=> __( 'Install Plugins', kopa_get_domain() ),
			'installing'                       			=> __( 'Installing Plugin: %s', kopa_get_domain() ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', kopa_get_domain() ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s. If you currently use the built-in plugin (pre-packaged plugin, e.g. shortcode...) from another WordPress themes by Kopatheme, please deactivate and delete the plugin before installing.', 'This theme requires the following plugins: %1$s. If you currently use the built-in plugins (pre-packaged plugins, e.g. shortcode...) from another WordPress themes by Kopatheme, please deactivate and delete the plugins before installing.' ),
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s. If you currently use the built-in plugin (pre-packaged plugin, e.g. shortcode...) from another WordPress themes by Kopatheme, please deactivate and delete the plugin before installing.', 'This theme recommends the following plugins: %1$s. If you currently use the built-in plugins (pre-packaged plugins, e.g. shortcode...) from another WordPress themes by Kopatheme, please deactivate and delete the plugins before installing.' ),
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s. If you currently use the built-in plugin (pre-packaged plugin, e.g. shortcode...) from another WordPress themes by Kopatheme, please delete the plugin and install the pre-packaged plugin comes with this theme.', 'The following required plugins are currently inactive: %1$s. If you currently use the built-in plugins (pre-packaged plugins, e.g. shortcode...) from another WordPress themes by Kopatheme, please delete the plugins and install the pre-packaged plugins come with this theme.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s. If you currently use the built-in plugin (pre-packaged plugin, e.g. shortcode...) from another WordPress themes by Kopatheme, please delete the plugin and install the pre-packaged plugin comes with this theme.', 'The following recommended plugins are currently inactive: %1$s. If you currently use the built-in plugins (pre-packaged plugins, e.g. shortcode...) from another WordPress themes by Kopatheme, please delete the plugins and install the pre-packaged plugins come with this theme.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s. If the plugin is built-in plugin (pre-packaged plugin, e.g. shortcode...) of this theme, please deactivate and delete its current version before installing its latest version comes with this theme.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s. If the plugins are built-in plugins (pre-packaged plugins, e.g. shortcode...) of this theme, please deactivate and delete their current version before installing their latest version come with this theme.' ),
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', kopa_get_domain() ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', kopa_get_domain() ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', kopa_get_domain() ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);
	tgmpa( $plugins, $config );
}