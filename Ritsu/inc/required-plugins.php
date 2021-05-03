 
<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme alex
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */




add_action( 'tgmpa_register', 'alex_register_required_plugins' );


function alex_register_required_plugins() {
	
	$plugins = array(
		
		array(
			'name'        => 'Kirki Customizer Framework',
			'slug'        => 'kirki',
			'required'    =>  true
		),

		array(
			'name'        => 'Mailchimp for WordPress',
			'slug'        => 'mailchimp-for-wp',
			'required'    =>  true
		),

		array(
			'name'        => 'Contact Form 7',
			'slug'        => 'contact-form-7',
			'required'    =>  true
		),

		array(
			'name'        => 'Elementor Website Builder',
			'slug'        => 'elementor',
			'required'    =>  true
		),
		array(
			'name'        => 'Menu Icons by ThemeIsle',
			'slug'        => 'menu-icons',
			'required'    =>  true
		),
		array(
			'name'        => 'Recent Posts Widget With Thumbnails',
			'slug'        => 'recent-posts-widget-with-thumbnails',
			'required'    =>  true
		),
		array(
			'name'        => 'Social Media Share Buttons Popup & Pop Up Social Sharing Icons',
			'slug'        => 'ultimate-social-media-icons',
			'required'    =>  false
		),
		

	);
	
	
	$config = array(
		'id'           => 'ritsu',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		
	);

	tgmpa( $plugins, $config );
}
