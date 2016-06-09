<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.4.0
 * @author     Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @author     Gary Jones <gamajo@gamajo.com>
 * @copyright  Copyright (c) 2012, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'helpme_helpme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function helpme_helpme_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(



        // This is an example of how to include a plugin from the WordPress Plugin Repository

        array(
            'name' => 'Visual Composer',
            'slug' => 'js_composer',
            'source' => HELPME_THEME_INCLUDES. '/plugins/js_composer.zip',
            'required' => true,
            'version' => '4.11.1',
			'is_automatic' => true, // automatically activate plugins after installation
            'force_activation' => false,
            'force_deactivation' => false
        ),
		array(
            'name' => 'Helpme Custom Posts', // The plugin name.
            'slug' => 'helpme-custom-posts', // The plugin slug (typically the folder name).
            'source' => HELPME_THEME_INCLUDES. '/plugins/helpme-custom-posts.zip',
            'required' => true, // If false, the plugin is only 'recommended' instead of required.
            'version' => '1.0',
			//'is_automatic' => true, // automatically activate plugins after installation
            'force_activation' => false,
            'force_deactivation' => false
        ),

		array(
            'name' => 'The Events Calendar', // The plugin name.
            'slug' => 'the-events-calendar', // The plugin slug (typically the folder name).
            'source' => '',
            'required' => true, // If false, the plugin is only 'recommended' instead of required.
            'version' => '4.1.0.1',
            'force_activation' => false,
            'force_deactivation' => false
        ),

		array(
            'name' => 'WooCommerce', // The plugin name.
            'slug' => 'woocommerce', // The plugin slug (typically the folder name).
            'source' => '',
            'required' => true, // If false, the plugin is only 'recommended' instead of required.
            'version' => '2.5.5',
            'force_activation' => false,
            'force_deactivation' => false
        ),
        array(
            'name'  => 'Envato WordPress Toolkit', // The plugin name.
            'slug'  => 'envato-wordpress-toolkit-master', // The plugin slug (typically the folder name).
            'source' => 'https://github.com/envato/envato-wordpress-toolkit/archive/master.zip',
            'required' => false, // If false, the plugin is only 'recommended' instead of required.
            'version' => '1.7.1',
            'force_activation' => false,
            'force_deactivation' => false
        ),



    );

/**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => esc_html__( 'Install Required Plugins', 'helpme' ),
            'menu_title'                      => esc_html__( 'Install Plugins', 'helpme' ),
            'installing'                      => esc_html__( 'Installing Plugin: %s', 'helpme' ), // %s = plugin name.
            'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'helpme' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s. (NOTE:you have to install layerslider and total donation plugin manually )', 'This theme requires the following plugins: %1$s. (NOTE:you have to install layerslider and total donation plugin manually )', 'helpme' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'helpme' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'helpme' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'helpme' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'helpme' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'helpme'  ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'helpme'  ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'helpme'  ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'helpme'  ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'helpme'  ),
            'return'                          => esc_html__( 'Return to Required Plugins Installer', 'helpme' ),
            'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'helpme' ),
            'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'helpme' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}