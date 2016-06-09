<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux_Framework_sample_config' ) ) {

        class Redux_Framework_sample_config {

            public $args = array();
            public $sections = array();
            public $theme;
            public $ReduxFramework;

            public function __construct() {

                if ( ! class_exists( 'ReduxFramework' ) ) {
                    return;
                }

                // This is needed. Bah WordPress bugs.  ;)
                if ( true == Redux_Helpers::isTheme( __FILE__ ) ) {
                    $this->initSettings();
                } else {
                    add_action( 'plugins_loaded', array( $this, 'initSettings' ), 10 );
                }

            }

            public function initSettings() {

                // Just for demo purposes. Not needed per say.
                $this->theme = wp_get_theme();

                // Set the default arguments
                $this->setArguments();

                // Set a few help tabs so you can see how it's done
                $this->setHelpTabs();

                // Create the sections and fields
                $this->setSections();

                if ( ! isset( $this->args['opt_name'] ) ) { // No errors please
                    return;
                }

                // If Redux is running as a plugin, this will remove the demo notice and links
                //add_action( 'redux/loaded', array( $this, 'remove_demo' ) );

                // Function to test the compiler hook and demo CSS output.
                // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
                //add_filter('redux/options/'.$this->args['opt_name'].'/compiler', array( $this, 'compiler_action' ), 10, 3);

                // Change the arguments after they've been declared, but before the panel is created
                //add_filter('redux/options/'.$this->args['opt_name'].'/args', array( $this, 'change_arguments' ) );

                // Change the default value of a field after it's been set, but before it's been useds
                //add_filter('redux/options/'.$this->args['opt_name'].'/defaults', array( $this,'change_defaults' ) );

                // Dynamically add a section. Can be also used to modify sections/fields
                //add_filter('redux/options/' . $this->args['opt_name'] . '/sections', array($this, 'dynamic_section'));

                $this->ReduxFramework = new ReduxFramework( $this->sections, $this->args );
            }

            /**
             * This is a test function that will let you see when the compiler hook occurs.
             * It only runs if a field    set with compiler=>true is changed.
             * */
            function compiler_action( $options, $css, $changed_values ) {
                echo '<h1>The compiler hook has run!</h1>';
                echo "<pre>";
                print_r( $changed_values ); // Values that have changed since the last save
                echo "</pre>";
                //print_r($options); //Option values
                //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )

                /*
              // Demo of how to use the dynamic CSS and write your own static CSS file
              $filename = dirname(__FILE__) . '/style' . '.css';
              global $wp_filesystem;
              if( empty( $wp_filesystem ) ) {
                require_once( ABSPATH .'/wp-admin/includes/file.php' );
              WP_Filesystem();
              }

              if( $wp_filesystem ) {
                $wp_filesystem->put_contents(
                    $filename,
                    $css,
                    FS_CHMOD_FILE // predefined mode settings for WP files
                );
              }
             */
            }

            /**
             * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
             * Simply include this function in the child themes functions.php file.
             * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
             * so you must use get_template_directory_uri() if you want to use any of the built in icons
             * */
            function dynamic_section( $sections ) {
                //$sections = array();
                $this->sections[] = array(
                    'title'  => esc_html__( 'Section via hook', 'helpme' ),
                    'desc'   => esc_html__( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'helpme' ),
                    'icon'   => 'el el-paper-clip',
                    // Leave this as a blank section, no options just some intro text set above.
                    'fields' => array()
                );

                return $sections;
            }

            /**
             * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
             * */
            function change_arguments( $args ) {
                $args['dev_mode'] = false;

                return $args;
            }

            /**
             * Filter hook for filtering the default value of any given field. Very useful in development mode.
             * */
            function change_defaults( $defaults ) {
                $defaults['str_replace'] = 'Testing filter hook!';

                return $defaults;
            }


            public function setSections() {

                /**
                 * Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
                 * */
                // Background Patterns Reader
				
                $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
                $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
                $sample_patterns      = array();

                if ( is_dir( $sample_patterns_path ) ) :

                    if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) :
                        $sample_patterns = array();

                        while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                            if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                                $name              = explode( '.', $sample_patterns_file );
                                $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                                $sample_patterns[] = array(
                                    'alt' => $name,
                                    'img' => $sample_patterns_url . $sample_patterns_file
                                );
                            }
                        }
                    endif;
                endif;

                ob_start();

                $ct          = wp_get_theme();
                $this->theme = $ct;
                $item_name   = $this->theme->get( 'Name' );
                $tags        = $this->theme->Tags;
                $screenshot  = $this->theme->get_screenshot();
                $class       = $screenshot ? 'has-screenshot' : '';

                $customize_title = sprintf( esc_html__( 'Customize &#8220;%s&#8221;', 'helpme' ), $this->theme->display( 'Name' ) );

                ?>
                <div id="current-theme" class="<?php echo esc_attr( $class ); ?>">
                    <?php if ( $screenshot ) : ?>
                        <?php if ( current_user_can( 'edit_theme_options' ) ) : ?>
                            <a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize"
                               title="<?php echo esc_attr( $customize_title ); ?>">
                                <img src="<?php echo esc_url( $screenshot ); ?>"
                                     alt="<?php esc_attr_e( 'Current theme preview', 'helpme' ); ?>"/>
                            </a>
                        <?php endif; ?>
                        <img class="hide-if-customize" src="<?php echo esc_url( $screenshot ); ?>"
                             alt="<?php esc_attr_e( 'Current theme preview', 'helpme' ); ?>"/>
                    <?php endif; ?>

                    <h4><?php echo esc_attr($this->theme->display( 'Name' )); ?></h4>

                    <div>
                        <ul class="theme-info">
                            <li><?php printf( esc_html__( 'By %s', 'helpme' ), $this->theme->display( 'Author' ) ); ?></li>
                            <li><?php printf( esc_html__( 'Version %s', 'helpme' ), $this->theme->display( 'Version' ) ); ?></li>
                            <li><?php echo '<strong>' . esc_html__( 'Tags', 'helpme' ) . ':</strong> '; ?><?php printf( $this->theme->display( 'Tags' ) ); ?></li>
                        </ul>
                        <p class="theme-description"><?php echo esc_attr($this->theme->display( 'Description' )); ?></p>
                        <?php
                            if ( $this->theme->parent() ) {
                                printf( ' <p class="howto">' . esc_html__( 'This %1$s child theme requires its parent theme, %2$s.', 'helpme' ) . '</p>', esc_html__( 'http://codex.wordpress.org/Child_Themes', 'helpme' ), $this->theme->parent()->display( 'Name' ) );
                            }
                        ?>

                    </div>
                </div>

                <?php
                $item_info = ob_get_contents();

                ob_end_clean();

                $sampleHTML = '';
                if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
                    Redux_Functions::initWpFilesystem();

                    global $wp_filesystem;

                    $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
                }

               $this->sections[] = array(
				'title' => esc_html__('General Settings', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				'icon' => 'el-icon-globe-alt',
				// 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
				'fields' => array(

			array(
				'id' => 'favicon',
				'type' => 'media',
				'url' => true,
				'title' => esc_html__('Upload Favicon', 'helpme'),
				'mode' => false,
				'desc' => esc_html__('This option is for backward compatibility , You can upload your own custom favicon. This size should be 16X16 but if you want to support retina devices upload 32X32 png file. since version 4.3 wordpress provides this features from customizer area and this theme feature is now only for backward compatibility if you are using older wp version then you can upload your favico here ', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'default' => false,
			),
			array(
				'id' => 'logo',
				'type' => 'media',
				'url' => true,
				'title' => esc_html__('Upload Logo', 'helpme'),
				'mode' => false,
				'desc' => esc_html__('', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'default' => false,
			),

			array(
				'id' => 'logo-retina',
				'type' => 'media',
				'url' => true,
				'title' => esc_html__('Upload Retina Logo', 'helpme'),
				'mode' => false,
				'desc' => esc_html__('Please note that the image you are uploading should be exactly 2x size of the original logo you have uploaded in above option.', 'helpme'),
				'subtitle' => esc_html__('Use this option if you want your logo appear crystal clean in retina devices(eg. macbook retina, ipad, iphone).', 'helpme'),
				'default' => false,
			),

			/*array(
				'id' => 'logo-light',
				'type' => 'media',
				'url' => true,
				'title' => esc_html__('Upload Light Logo', 'helpme'),
				'mode' => false,
				'desc' => esc_html__('', 'helpme'),
				'subtitle' => esc_html__('This option will only be used if you have a transparent header in a page that you have chosen light skin for header elements.', 'helpme'),
				'default' => false,
			),

			array(
				'id' => 'logo-light-retina',
				'type' => 'media',
				'url' => true,
				'title' => esc_html__('Upload Retina Light Logo', 'helpme'),
				'mode' => false,
				'desc' => esc_html__('This option is for transparent header style logo in light skin. Please note that the image you are uploading should be exactly 2x size of the original logo you have uploaded in above option.', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'default' => false,
			),*/

			array(
				'id' => 'preloader-logo',
				'type' => 'media',
				'url' => true,
				'title' => esc_html__('Pre-loader Overlay Logo', 'helpme'),
				'mode' => false,
				'desc' => esc_html__('This logo will be viewed in the pre-loader overlay. This overlay can be enabled form page meta option and mostly used for heavy pages with alot of content and images.', 'helpme'),
				'subtitle' => esc_html__('Image size is up to you.', 'helpme'),
				'default' => false,
			),

			array(
				'id' => 'mobile-logo',
				'type' => 'media',
				'url' => true,
				'title' => esc_html__('Upload Mobile Logo', 'helpme'),
				'mode' => false,
				'subtitle' => esc_html__('This option comes handly when your logo is just too long for a mobile device and you would like to upload a shorter and smaller logo just to fit the header area.', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				'default' => false,
			),

			array(
				'id' => 'mobile-logo-retina',
				'type' => 'media',
				'url' => true,
				'title' => esc_html__('Upload Mobile Retina Logo', 'helpme'),
				'mode' => false,
				'desc' => esc_html__('Please note that the image you are uploading should be exactly 2x size of the original logo you have uploaded in above option (Upload Mobile Logo).', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'default' => false,
			),

			array(
				'id' => 'res-nav-width',
				'type' => 'slider',
				'title' => esc_html__('Main Navigation Responsive Width', 'helpme'),
				'subtitle' => esc_html__('The width Main navigation converts to responsive mode.', 'helpme'),
				'desc' => esc_html__('Navigation item can vary from site to site and it totally depends on you to define a the best width Main Navigation convert to responsive mode. you can find the right value by just resizing the window to find the best fit coresponding to navigation items.', 'helpme'),
				"default" => "1170",
				"min" => "600",
				"step" => "1",
				"max" => "1380",
			),
			array(
				'id' => 'grid-width',
				'type' => 'slider',
				'title' => esc_html__('Main grid Width', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				"default" => "1170",
				"min" => "960",
				"step" => "1",
				"max" => "1380",
			),
			array(
				'id' => 'content-width',
				'type' => 'slider',
				'title' => esc_html__('Content Width', 'helpme'),
				'subtitle' => esc_html__('Using this option you can define the width of the content.', 'helpme'),
				'desc' => esc_html__('please note that this option is in percent, lets say if you set it 60%, sidebar will occupy 40% of the main content space.', 'helpme'),
				"default" => "67",
				"min" => "50",
				"step" => "1",
				"max" => "80",
			),
			array(
				'id' => 'pages-layout',
				'type' => 'image_select',
				'title' => esc_html__('Pages Layout', 'helpme'),
				'subtitle' => esc_html__('Defines Pages layout.', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				'options' => array(
					'left' => array('alt' => '1 Column', 'img' => HELPME_THEME_ADMIN_ASSETS_URI . '/img/left_layout.png'),
					'right' => array('alt' => '2 Column', 'img' => HELPME_THEME_ADMIN_ASSETS_URI . '/img/right_layout.png'),
					'full' => array('alt' => '3 Column', 'img' => HELPME_THEME_ADMIN_ASSETS_URI . '/img/full_layout.png'),
				),
				'default' => 'right'
			),
			array(
				'id' => 'error_page',
				'type' => 'select',
				'title' => esc_html__('404 Page template', 'helpme'),
				'subtitle' => esc_html__('Defines 404 Pages template.', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				'options' => array(
					'1' => esc_html__('style 1.', 'helpme'),
					'2' => esc_html__('style 2.', 'helpme'),
				),
				'default' => '1'
			),
			array(
				'id' => 'error-layout',
				'type' => 'image_select',
				'title' => esc_html__('404 Page Layout', 'helpme'),
				'subtitle' => esc_html__('Defines Pages layout.', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				'options' => array(
					'left' => array('alt' => '1 Column', 'img' => HELPME_THEME_ADMIN_ASSETS_URI . '/img/left_layout.png'),
					'right' => array('alt' => '2 Column', 'img' => HELPME_THEME_ADMIN_ASSETS_URI . '/img/right_layout.png'),
					'full' => array('alt' => '3 Column', 'img' =>   HELPME_THEME_ADMIN_ASSETS_URI . '/img/full_layout.png'),
				),
				'default' => 'full'
			),
			array(
				'id' => 'error_page_small_text',
				'type' => 'textarea',
				'title' => esc_html__('404 Page small text', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'desc' => esc_html__('small text message to show at 404 page', 'helpme'),
				'default' => esc_html__('Far far away, behind the word mountains, far from the countries Vokalia and there live the blind texts. Sepraed. they live in Boo marksgrove right at the coast of the Semantics, a large language ocean A small river named Duden flows by their place and su plies it with the necessary regelialia Even the all powe ful Pointing.', "helpme")
			),
			array(
				'id' => 'search-layout',
				'type' => 'image_select',
				'title' => esc_html__('search page Layout', 'helpme'),
				'subtitle' => esc_html__('Defines search Page layout.', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				'options' => array(
					'left' => array('alt' => '1 Column', 'img' =>  HELPME_THEME_ADMIN_ASSETS_URI . '/img/left_layout.png'),
					'right' => array('alt' => '2 Column', 'img' =>  HELPME_THEME_ADMIN_ASSETS_URI . '/img/right_layout.png'),
					'full' => array('alt' => '3 Column', 'img' =>  HELPME_THEME_ADMIN_ASSETS_URI . '/img/full_layout.png'),
				),
				'default' => 'right'
			),
			/*array(
				'id' => 'side-dashboard',
				'type' => 'switch',
				'title' => esc_html__('Side Dashboard', 'helpme'),
				'subtitle' => esc_html__('The sliding widgetized dashboard section.', 'helpme'),
				'desc' => esc_html__('If you don\'t want this feature just disable it from this option.', 'helpme'),
				"default" => 1,
				'on' => 'Enable',
				'off' => 'Disable',
			),
			array(
				'id' => 'side-dashboard-icon',
				'type' => 'text',
				'title' => esc_html__('Side Dashboard Icon Class Name', 'helpme'),
				'desc' => esc_html__("", 'helpme'),
				'subtitle' => esc_html__("", 'helpme'),
				'default' => '',
			),*/
			array(
				'id' => 'breadcrumb',
				'type' => 'switch',
				'title' => esc_html__('Breadcrumb', 'helpme'),
				'subtitle' => esc_html__('Breadcrumbs will appear horizontally across the top of all pages below header.', 'helpme'),
				'desc' => esc_html__('Using this option you can disable breadcrumbs throughout the site.', 'helpme'),
				"default" => 1,
				'on' => 'Enable',
				'off' => 'Disable',
			),
			array(
				'id' => 'smooth-scroll',
				'type' => 'switch',
				'title' => esc_html__('Smooth Scroll', 'helpme'),
				'subtitle' => esc_html__('Adds easing movement in page scroll and modifys browser native scrollbar', 'helpme'),
				'desc' => esc_html__('If you don\'t want this feature just disable it from this option.', 'helpme'),
				"default" => 1,
				'on' => 'Enable',
				'off' => 'Disable',
			),
			array(
				'id' => 'pages-comments',
				'type' => 'switch',
				'title' => esc_html__('Page Comments', 'helpme'),
				'subtitle' => esc_html__('Option to globally enable/disable comments in pages.', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				"default" => 1,
				'on' => 'Enable',
				'off' => 'Disable',
			),
			array(
				'id' => 'custom-sidebar',
				'type' => 'multi_text',
				'title' => esc_html__('Custom Sidebars', 'helpme'),
				'validate' => 'no_special_chars',
				'subtitle' => esc_html__('Will create custom widget areas to help you make custom sidebars in pages & posts.', 'helpme'),
				'desc' => esc_html__('No Special characters please! eg: "contact page 3"', 'helpme')
			),
			array(
				'id' => 'typekit-id',
				'type' => 'text',
				'title' => esc_html__('Typekit Kit ID', 'helpme'),
				'desc' => esc_html__("If you want to use typekit in your site simply enter The Type Kit ID you get from Typekit site.", 'helpme'). __("<a target='_blank' href='http://help.typekit.com/customer/portal/articles/6840-using-typekit-with-wordpress-com'>Read More</a>", "helpme"),
				'subtitle' => esc_html__("", 'helpme'),
				'default' => '',
			),
			
			/*array(
				'id' => 'disable-quick-contact',
				'type' => 'switch',
				'title' => esc_html__('Quick Contact', 'helpme'),
				'subtitle' => esc_html__('You can enable or disable Quick Contact Form using this option.', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				"default" => 0,
				'on' => 'Enable',
				'off' => 'Disable',
			),
			array(
				'id' => 'skin-quick-contact',
				'type' => 'switch',
				'title' => esc_html__('Quick Contact Skin', 'helpme'),
				'subtitle' => esc_html__('You can choose Quick Contact Form skin color.', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				"default" => 0,
				'on' => 'Light',
				'off' => 'Dark',
			),*/
		),
	);

	$this->sections[] = array(
		'title' => esc_html__('Header', 'helpme'),
		'desc' => esc_html__('', 'helpme'),
		'icon' => 'el-icon-website',
		// 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
		'fields' => array(
			array(
				'id' => 'header-structure',
				'type' => 'button_set',
				'title' => esc_html__('Header Structure', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				'options' => array('standard' => 'Standard', 'margin' => 'Margin'/*, 'vertical' => 'Vertical'*/), //Must provide key => value pairs for radio options 
				'default' => 'standard',
			),
			array(
				'id' => 'header-location',
				'type' => 'button_set',
				'required' => array('header-structure', 'equals', 'standard'),
				'title' => esc_html__('Header Location', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'desc' => esc_html__('Whether stay at the top or bottom of the screen.', 'helpme'),
				'options' => array('top' => 'Top'/*, 'bottom' => 'Bottom'*/), //Must provide key => value pairs for radio options
				'default' => 'top'
			),

			/*array(
				'id' => 'vertical-header-state',
				'type' => 'button_set',
				'required' => array('header-structure', 'equals', 'vertical'),
				'title' => esc_html__('Vertical Header State', 'helpme'),
				'subtitle' => esc_html__('Choose vertical header defaut state.', 'helpme'),
				'desc' => esc_html__('If condensed header chosen, header will be narrow by default and by clicking burger icon it will be expanded to reveal logo and navigation.', 'helpme'),
				'options' => array('condensed' => 'Expandable', 'expanded' => 'Always Open'), //Must provide key => value pairs for radio options
				'default' => 'expanded'
			),*/
			
			/*array(
				'id' => 'header-vertical-width',
				'type' => 'slider',
				'required' => array('header-structure', 'equals', 'vertical'),
				'title' => esc_html__('Header Vertical Width?', 'helpme'),
				'subtitle' => esc_html__('Default : 280px', 'helpme'),
				'desc' => esc_html__('Using this option you can increase or decrease header width.', 'helpme'),
				"default" => "280",
				"min" => "200",
				"step" => "1",
				"max" => "500",
			),*/
			array(
				'id' => 'header-padding',
				'type' => 'slider',
				'title' => esc_html__('Header Padding', 'helpme'),
				'subtitle' => esc_html__('Top & Bottom. default : 30px', 'helpme'),
				'desc' => esc_html__('Using this option you can increase or decrease header padding from its top and bottom.', 'helpme'),
				"default" => "18",
				"min" => "0",
				"step" => "1",
				"max" => "200",
			),
			/*array(
				'id' => 'header-padding-vertical',
				'type' => 'slider',
				'required' => array('header-structure', 'equals', 'vertical'),
				'title' => esc_html__('Header Padding', 'helpme'),
				'subtitle' => esc_html__('Left & Right. default : 30px', 'helpme'),
				'desc' => esc_html__('Using this option you can increase or decrease header padding from its top and bottom.', 'helpme'),
				"default" => "30",
				"min" => "0",
				"step" => "1",
				"max" => "100",
			),*/
			array(
				'id' => 'header-align',
				'type' => 'button_set',
				'title' => esc_html__('Header Align', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'desc' => esc_html__('Please note that this option does not work for vertical header style. Use below option instead', 'helpme'),
				'options' => array('left' => 'Left', 'center' => 'Center', 'right' => 'Right'), //Must provide key => value pairs for radio options
				'default' => 'left'
			),
			/*array(
				'id' => 'nav-alignment', 
				'type' => 'button_set',
				'title' => esc_html__('Vertical Header Menu Align', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				'options' => array('left' => 'Left', 'center' => 'Center', 'right' => 'Right'), 
				'default' => 'left',
			),*/
			array(
				'id' => 'boxed-header',
				'type' => 'switch',
				'title' => esc_html__('Boxed Header', 'helpme'),
				'subtitle' => esc_html__('Full screen wide header content or inside main grid?.', 'helpme'),
				'desc' => esc_html__('If you want the cotent be stretched screen wide, disable this option.', 'helpme'),
				"default" => 1,
				'on' => 'Enable',
				'off' => 'Disable',
			),
			array(
				'id' => 'header-grid',
				'type' => 'switch',
				'title' => esc_html__('header in grid', 'helpme'),
				'subtitle' => esc_html__('Will make header stay in top of browser while scrolling down', 'helpme'),
				'desc' => esc_html__('If you don\'t want this feature just disable it from this option.', 'helpme'),
				"default" => 0,
				'off' => 'Disable',
				'on' => 'Enable',
				
			),
			array(
				"title" => esc_html__( "in grid header margin top", "helpme" ),
				"desc" => esc_html__( "", "helpme" ),
				"id" => "header-grid-margin-top",
				"default" => "30",
				"min" => "0",
				"max" => "50",
				"step" => "1",
				"unit" => 'px',
				"type" => "slider"
			),
			array(
				'id' => 'sticky-header',
				'type' => 'switch',
				'title' => esc_html__('Sticky Header', 'helpme'),
				'subtitle' => esc_html__('Will make header stay in top of browser while scrolling down', 'helpme'),
				'desc' => esc_html__('If you don\'t want this feature just disable it from this option.', 'helpme'),
				"default" => 1,
				'on' => 'Enable',
				'off' => 'Disable',
			),
			array(
				'id' => 'squeeze-sticky-header',
				'type' => 'switch',
				'title' => esc_html__('Squeeze Sticky Header', 'helpme'),
				'subtitle' => esc_html__('This option to give you the control on whether to squeeze the sticky header or keep it same height as none-sticky.', 'helpme'),
				'desc' => esc_html__('Disable this option if you dont want this feature.', 'helpme'),
				"default" => 1,
				'on' => 'Enable',
				'off' => 'Disable',
			),
			array(
				'id' => 'header-border-top',
				'type' => 'switch',
				'title' => esc_html__('Show Header Border Top?', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				"default" => 0,
				'on' => 'Enable',
				'off' => 'Disable',
			),
			array(
				'id' => 'header-search',
				'type' => 'switch',
				'title' => esc_html__('Header Search Form', 'helpme'),
				'subtitle' => esc_html__('Will stay on right hand of main navigation.', 'helpme'),
				'desc' => esc_html__('If you don\'t want this feature just disable it from this option.', 'helpme'),
				"default" => 0,
				'on' => 'Enable',
				'off' => 'Disable',
			),
			array(
				'id' => 'header-search-location',
				'type' => 'button_set',
				'required' => array(array('header-align', 'equals', 'center'),array('header-search', 'equals', '1')),
				'title' => esc_html__('Header Search Location', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				'options' => array('left' => 'Left', 'right' => 'Right'), //Must provide key => value pairs for radio options
				'default' => 'right'
			),
			array(
				'id' => 'header-wpml',
				'type' => 'switch',
				'title' => esc_html__('Header Wpml Language Selector', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'desc' => esc_html__('If you don\'t want this feature just disable it from this option.', 'helpme'),
				"default" => 0,
				'on' => 'Enable',
				'off' => 'Disable',
			),

			array(
				'id' => 'page-title-pages',
				'type' => 'switch',
				'title' => esc_html__('Page Title : Pages', 'helpme'),
				'subtitle' => esc_html__('This option will affect Pages.', 'helpme'),
				'desc' => esc_html__('If you don\'t want to show page title section (title, breadcrumb) in Pages disable this option. this option will not affect archive, search, 404, category templates as well as blog and portfolio single posts.', 'helpme'),
				"default" => 1,
				'on' => 'Enable',
				'off' => 'Disable',
			),
			array(
				"title" => esc_html__("Main Navigation for Logged In User", "helpme"),
				"desc" => esc_html__("Please choose the menu location that you would like to show as global main navigation for logged in users.", "helpme"),
				"id" => "loggedin_menu",
				"default" => 'primary-menu',
				"options" => array(
					"primary-menu" => esc_html__('Primary Navigation', "helpme"),
					"second-menu" => esc_html__('Second Navigation', "helpme"),
					"third-menu" => esc_html__('Third Navigation', "helpme"),
					"fourth-menu" => esc_html__('Fourth Navigation', "helpme"),
					"fifth-menu" => esc_html__('Fifth Navigation', "helpme"),
					"sixth-menu" => esc_html__('Sixth Navigation', "helpme"),
					"seventh-menu" => esc_html__('Seventh Navigation', "helpme"),
				),
				"type" => "select"
			),
			array(
				"title" => esc_html__("Header Social Networks", "helpme"),
				"desc" => esc_html__("", "helpme"),
				"id" => "header-social-select",
				"default" => 'header_toolbar',
				"options" => array(
					"header_toolbar" => esc_html__('Header Toolbar', "helpme"),
					//"header_section" => esc_html__('Header Section', "helpme"),
					"disabled" => esc_html__('Disabled', "helpme")
				),
				"type" => "select"
			),
			array(
				"title" => esc_html__("Header contact", "helpme"),
				"desc" => esc_html__("", "helpme"),
				"id" => "header-contact-select",
				"default" => 'header_toolbar',
				"options" => array(
					"header_toolbar" => esc_html__('Header Toolbar', "helpme"),
					//"header_section" => esc_html__('Header Section', "helpme"),
					"disabled" => esc_html__('Disabled', "helpme")
				),
				"type" => "select"
			),
			array(
				'id' => 'header-toolbar',
				'type' => 'switch',
				'title' => esc_html__('Header Toolbar', 'helpme'),
				'subtitle' => esc_html__('Enable/Disable Header Toolbar', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				"default" => 1,
				'on' => 'Enable',
				'off' => 'Disable',
			),
			array(
				'id' => 'header-toolbar-phone',
				'type' => 'text',
				'required' => array('header-toolbar', 'equals', '1'),
				'title' => esc_html__('Header Toolbar Phone Number', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'default' => '',
			),
			array(
				'id' => 'header-toolbar-phone-icon',
				'type' => 'text',
				'required' => array('header-toolbar', 'equals', '1'),
				'title' => esc_html__('Header Toolbar Phone Icon', 'helpme'),
				'desc' => esc_html__("This option will give you the ability to add any icon you want to use for front of the email address.  to get the icon class name.", 'helpme'),
				'subtitle' => esc_html__("", 'helpme'),
				'default' => '',
			),
			array(
				'id' => 'header-toolbar-email',
				'type' => 'text',
				'required' => array('header-toolbar', 'equals', '1'),
				'title' => esc_html__('Header Toolbar Email Address', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'default' => '',
			),
			array(
				'id' => 'header-toolbar-email-icon',
				'type' => 'text',
				'required' => array('header-toolbar', 'equals', '1'),
				'title' => esc_html__('Header Toolbar Email Icon', 'helpme'),
				'desc' => esc_html__("This option will give you the ability to add any icon you want to use for front of the email address.  to get the icon class name.", 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'default' => '',
			),
			
			array(
				"title" => esc_html__("Header Toolbar Custom Menu", "helpme"),
				"desc" => esc_html__("", "helpme"),
				'required' => array('header-toolbar', 'equals', '1'),
				"id" => "toolbar-custom-menu",
				"default" => '',
				"data" => 'menus',
				"type" => "select"
			),

			array(
				'id' => 'header-social-facebook',
				'required' => array('header-social-select', 'equals', array( 'header_toolbar', 'header_section' )),
				'type' => 'text',
				'title' => esc_html__('Facebook', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Header Social Networks', 'helpme'),
				'default' => '',
			),

			array(
				'id' => 'header-social-twitter',
				'required' => array('header-social-select', 'equals', array( 'header_toolbar', 'header_section' )),
				'type' => 'text',
				'title' => esc_html__('Twitter', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Header Social Networks', 'helpme'),
				'default' => '',
			),

			array(
				'id' => 'header-social-rss',
				'required' => array('header-social-select', 'equals', array( 'header_toolbar', 'header_section' )),
				'type' => 'text',
				'title' => esc_html__('RSS', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Header Social Networks', 'helpme'),
				'default' => '',
			),

			array(
				'id' => 'header-social-dribbble',
				'required' => array('header-social-select', 'equals', array( 'header_toolbar', 'header_section' )),
				'type' => 'text',
				'title' => esc_html__('Dribbble', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Header Social Networks', 'helpme'),
				'default' => '',
			),

			array(
				'id' => 'header-social-pinterest',
				'required' => array('header-social-select', 'equals', array( 'header_toolbar', 'header_section' )),
				'type' => 'text',
				'title' => esc_html__('Pinterest', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Header Social Networks', 'helpme'),
				'default' => '',
			),

			array(
				'id' => 'header-social-instagram',
				'required' => array('header-social-select', 'equals', array( 'header_toolbar', 'header_section' )),
				'type' => 'text',
				'title' => esc_html__('Instagram', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Header Social Networks', 'helpme'),
				'default' => '',
			),

			array(
				'id' => 'header-social-google-plus',
				'required' => array('header-social-select', 'equals', array( 'header_toolbar', 'header_section' )),
				'type' => 'text',
				'title' => esc_html__('Google Plus', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Header Social Networks', 'helpme'),
				'default' => '',
			),

			array(
				'id' => 'header-social-linkedin',
				'required' => array('header-social-select', 'equals', array( 'header_toolbar', 'header_section' )),
				'type' => 'text',
				'title' => esc_html__('Linkedin', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Header Social Networks', 'helpme'),
				'default' => '',
			),

			array(
				'id' => 'header-social-youtube',
				'required' => array('header-social-select', 'equals', array( 'header_toolbar', 'header_section' )),
				'type' => 'text',
				'title' => esc_html__('Youtube', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Header Social Networks', 'helpme'),
				'default' => '',
			),
			array(
				'id' => 'header-social-vimeo',
				'required' => array('header-social-select', 'equals', array( 'header_toolbar', 'header_section' )),
				'type' => 'text',
				'title' => esc_html__('Vimeo', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Header Social Networks', 'helpme'),
				'default' => '',
			),
			array(
				'id' => 'header-social-spotify',
				'required' => array('header-social-select', 'equals', array( 'header_toolbar', 'header_section' )),
				'type' => 'text',
				'title' => esc_html__('Spotify', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Header Social Networks', 'helpme'),
				'default' => '',
			),

			array(
				'id' => 'header-social-tumblr',
				'required' => array('header-social-select', 'equals', array( 'header_toolbar', 'header_section' )),
				'type' => 'text',
				'title' => esc_html__('Tumblr', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Header Social Networks', 'helpme'),
				'default' => '',
			),

			array(
				'id' => 'header-social-behance',
				'required' => array('header-social-select', 'equals', array( 'header_toolbar', 'header_section' )),
				'type' => 'text',
				'title' => esc_html__('Behance', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Header Social Networks', 'helpme'),
				'default' => '',
			),
			array(
				'id' => 'header-social-WhatsApp',
				'required' => array('header-social-select', 'equals', array( 'header_toolbar', 'header_section' )),
				'type' => 'text',
				'title' => esc_html__('WhatsApp', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Header Social Networks', 'helpme'),
				'default' => '',
			),
			array(
				'id' => 'header-social-qzone',
				'required' => array('header-social-select', 'equals', array( 'header_toolbar', 'header_section' )),
				'type' => 'text',
				'title' => esc_html__('qzone', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Header Social Networks', 'helpme'),
				'default' => '',
			),
			array(
				'id' => 'header-social-vkcom',
				'required' => array('header-social-select', 'equals', array( 'header_toolbar', 'header_section' )),
				'type' => 'text',
				'title' => esc_html__('vk.com', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Header Social Networks', 'helpme'),
				'default' => '',
			),
			array(
				'id' => 'header-social-imdb',
				'required' => array('header-social-select', 'equals', array( 'header_toolbar', 'header_section' )),
				'type' => 'text',
				'title' => esc_html__('IMDb', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Header Social Networks', 'helpme'),
				'default' => '',
			),
			array(
				'id' => 'header-social-renren',
				'required' => array('header-social-select', 'equals', array( 'header_toolbar', 'header_section' )),
				'type' => 'text',
				'title' => esc_html__('Renren', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Header Social Networks', 'helpme'),
				'default' => '',
			),
			array(
				'id' => 'header-social-weibo',
				'required' => array('header-social-select', 'equals', array( 'header_toolbar', 'header_section' )),
				'type' => 'text',
				'title' => esc_html__('Weibo', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Header Social Networks', 'helpme'),
				'default' => '',
			),
			array(
				'id' => 'donate-btn-url',
				'type' => 'text',
				'title' => esc_html__('Header  Donate Button Url ', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Header  Donate Button url', 'helpme'),
				'default' => '',
			),
			array(
				'id' => 'donate-btn-text',
				'type' => 'text',
				'title' => esc_html__('Header  Donate Button Text ', 'helpme'),
				'desc' => esc_html__('button text', 'helpme'),
				'subtitle' => esc_html__('Header  Donate Button', 'helpme'),
				'default' => '',
			),
		),
	);

	$this->sections[] = array(
		'title' => esc_html__('Footer', 'helpme'),
		'desc' => esc_html__('', 'helpme'),
		'icon' => 'el-icon-photo',
		// 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
		'fields' => array(

			array(
				'id' => 'footer',
				'type' => 'switch',
				'title' => esc_html__('Footer', 'helpme'),
				'subtitle' => esc_html__('Will be located after content. Please note that sub footer will not be affected by this option.', 'helpme'),
				'desc' => esc_html__('If you don\'t want to have footer section you can disable it.', 'helpme'),
				"default" => 1,
				'on' => 'Enable',
				'off' => 'Disable',
			),
			array(
				'id' => 'footer-layout',
				'required' => array('footer', 'equals', '1'),
				'type' => 'image_select',
				'title' => esc_html__('Footer Widget Area Columns', 'helpme'),
				'subtitle' => esc_html__('Defines in which strcuture footer widget areas would be divided', 'helpme'),
				'desc' => esc_html__('Please choose your footer widget area column strucutre.', 'helpme'),
				'options' => array(
					'1' => array('alt' => '1 Column', 'img' => HELPME_THEME_ADMIN_ASSETS_URI . '/img/column_1.png'),
					'2' => array('alt' => '2 Column', 'img' => HELPME_THEME_ADMIN_ASSETS_URI . '/img/column_2.png'),
					'3' => array('alt' => '3 Column', 'img' => HELPME_THEME_ADMIN_ASSETS_URI . '/img/column_3.png'),
					'4' => array('alt' => '4 Column', 'img' => HELPME_THEME_ADMIN_ASSETS_URI . '/img/column_4.png'),
					'5' => array('alt' => '5 Column', 'img' => HELPME_THEME_ADMIN_ASSETS_URI . '/img/column_5.png'),
					'6' => array('alt' => '6 Column', 'img' => HELPME_THEME_ADMIN_ASSETS_URI . '/img/column_6.png'),
					'half_sub_half' => array('alt' => 'Half Sub Half Column', 'img' => HELPME_THEME_ADMIN_ASSETS_URI . '/img/column_half_sub_half.png'),
					'half_sub_third' => array('alt' => 'Half Sub Third Column', 'img' => HELPME_THEME_ADMIN_ASSETS_URI . '/img/column_half_sub_third.png'),
					'third_sub_third' => array('alt' => 'Third Sub Third Column', 'img' =>  HELPME_THEME_ADMIN_ASSETS_URI . '/img/column_third_sub_third.png'),
					'third_sub_fourth' => array('alt' => 'Third Sub Fourth Column', 'img' => HELPME_THEME_ADMIN_ASSETS_URI . '/img/column_third_sub_fourth.png'),
					'sub_half_half' => array('alt' => 'Sub Half Half Column', 'img' =>  HELPME_THEME_ADMIN_ASSETS_URI . '/img/column_sub_half_half.png'),
					'sub_third_half' => array('alt' => 'Sub Third Half Column', 'img' => HELPME_THEME_ADMIN_ASSETS_URI . '/img/column_sub_third_half.png'),
					'sub_third_third' => array('alt' => 'Sub Third Third Column', 'img' => HELPME_THEME_ADMIN_ASSETS_URI . '/img/column_sub_third_third.png'),
					'sub_fourth_third' => array('alt' => 'Sub Fourth Third Column', 'img' => HELPME_THEME_ADMIN_ASSETS_URI . '/img/column_sub_fourth_third.png'),

				),
				'default' => '4'
			),

			array(
				'id' => 'sub-footer',
				'type' => 'switch',
				'title' => esc_html__('Sub Footer', 'helpme'),
				'subtitle' => esc_html__('Locates below footer.', 'helpme'),
				'desc' => esc_html__('If you don\'t want to have sub footer section you can disable it.', 'helpme'),
				"default" => 1,
				'on' => 'Enable',
				'off' => 'Disable',
			),
			array(
				'id' => 'footer-copyright',
				'type' => 'textarea',
				'required' => array('sub-footer', 'equals', '1'),
				'title' => esc_html__('Sub Footer Copyright text', 'helpme'),
				'subtitle' => esc_html__('You may write your site copyright information.', 'helpme'),
				'desc' => '',
				'default' => 'Copyright All Rights Reserved'
			),
			array(
				'id' => 'subfooter-logos-src',
				'required' => array('sub-footer', 'equals', '1'),
				'type' => 'media',
				'url' => true,
				'title' => esc_html__('Sub Footer Right Section Logo Image', 'helpme'),
				'mode' => false,
				'desc' => esc_html__('', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'default' => false,
			),
			array(
				'id' => 'subfooter-logos-link',
				'required' => array('sub-footer', 'equals', '1'),
				'type' => 'text',
				'title' => esc_html__('Sub Footer Right Section Logo Link', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'default' => '',
			),

			array(
				'id' => 'social-facebook',
				'required' => array('sub-footer', 'equals', '1'),
				'type' => 'text',
				'title' => esc_html__('Facebook', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Sub Footer Social Networks', 'helpme'),
				'default' => '',
			),

			array(
				'id' => 'social-twitter',
				'required' => array('sub-footer', 'equals', '1'),
				'type' => 'text',
				'title' => esc_html__('Twitter', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Sub Footer Social Networks', 'helpme'),
				'default' => '',
			),

			array(
				'id' => 'social-rss',
				'required' => array('sub-footer', 'equals', '1'),
				'type' => 'text',
				'title' => esc_html__('RSS', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Sub Footer Social Networks', 'helpme'),
				'default' => '',
			),

			array(
				'id' => 'social-dribbble',
				'required' => array('sub-footer', 'equals', '1'),
				'type' => 'text',
				'title' => esc_html__('Dribbble', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Sub Footer Social Networks', 'helpme'),
				'default' => '',
			),

			array(
				'id' => 'social-pinterest',
				'required' => array('sub-footer', 'equals', '1'),
				'type' => 'text',
				'title' => esc_html__('Pinterest', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Sub Footer Social Networks', 'helpme'),
				'default' => '',
			),

			array(
				'id' => 'social-instagram',
				'required' => array('sub-footer', 'equals', '1'),
				'type' => 'text',
				'title' => esc_html__('Instagram', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Sub Footer Social Networks', 'helpme'),
				'default' => '',
			),

			array(
				'id' => 'social-google-plus',
				'required' => array('sub-footer', 'equals', '1'),
				'type' => 'text',
				'title' => esc_html__('Google Plus', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Sub Footer Social Networks', 'helpme'),
				'default' => '',
			),

			array(
				'id' => 'social-linkedin',
				'required' => array('sub-footer', 'equals', '1'),
				'type' => 'text',
				'title' => esc_html__('Linkedin', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Sub Footer Social Networks', 'helpme'),
				'default' => '',
			),

			array(
				'id' => 'social-youtube',
				'required' => array('sub-footer', 'equals', '1'),
				'type' => 'text',
				'title' => esc_html__('Youtube', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Sub Footer Social Networks', 'helpme'),
				'default' => '',
			),

			array(
				'id' => 'social-vimeo',
				'required' => array('sub-footer', 'equals', '1'),
				'type' => 'text',
				'title' => esc_html__('Vimeo', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Sub Footer Social Networks', 'helpme'),
				'default' => '',
			),

			array(
				'id' => 'social-spotify',
				'required' => array('sub-footer', 'equals', '1'),
				'type' => 'text',
				'title' => esc_html__('Spotify', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Sub Footer Social Networks', 'helpme'),
				'default' => '',
			),

			array(
				'id' => 'social-tumblr',
				'required' => array('sub-footer', 'equals', '1'),
				'type' => 'text',
				'title' => esc_html__('Tumblr', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Sub Footer Social Networks', 'helpme'),
				'default' => '',
			),

			array(
				'id' => 'social-behance',
				'required' => array('sub-footer', 'equals', '1'),
				'type' => 'text',
				'title' => esc_html__('Behance', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Sub Footer Social Networks', 'helpme'),
				'default' => '',
			),
			array(
				'id' => 'social-whatsapp',
				'required' => array('sub-footer', 'equals', '1'),
				'type' => 'text',
				'title' => esc_html__('WhatsApp', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Sub Footer Social Networks', 'helpme'),
				'default' => '',
			),
			array(
				'id' => 'social-wechat',
				'required' => array('sub-footer', 'equals', '1'),
				'type' => 'text',
				'title' => esc_html__('Wechat', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Sub Footer Social Networks', 'helpme'),
				'default' => '',
			),
			array(
				'id' => 'social-qzone',
				'required' => array('sub-footer', 'equals', '1'),
				'type' => 'text',
				'title' => esc_html__('qzone', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Sub Footer Social Networks', 'helpme'),
				'default' => '',
			),
			array(
				'id' => 'social-vkcom',
				'required' => array('sub-footer', 'equals', '1'),
				'type' => 'text',
				'title' => esc_html__('vk.com', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Sub Footer Social Networks', 'helpme'),
				'default' => '',
			),
			array(
				'id' => 'social-imdb',
				'required' => array('sub-footer', 'equals', '1'),
				'type' => 'text',
				'title' => esc_html__('IMDb', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Sub Footer Social Networks', 'helpme'),
				'default' => '',
			),
			array(
				'id' => 'social-renren',
				'required' => array('sub-footer', 'equals', '1'),
				'type' => 'text',
				'title' => esc_html__('Renren', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Sub Footer Social Networks', 'helpme'),
				'default' => '',
			),
			array(
				'id' => 'social-weibo',
				'required' => array('sub-footer', 'equals', '1'),
				'type' => 'text',
				'title' => esc_html__('Weibo', 'helpme'),
				'desc' => esc_html__('Including http://', 'helpme'),
				'subtitle' => esc_html__('Sub Footer Social Networks', 'helpme'),
				'default' => '',
			),

		),
	);

	$this->sections[] = array(
		'title' => esc_html__('Typography', 'helpme'),
		'desc' => esc_html__('', 'helpme'),
		'icon' => 'el-icon-font',
		'fields' => array(

			array(
				'id' => 'body-font',
				'type' => 'typography',
				'title' => esc_html__('Body Font', 'helpme'),
				'compiler' => true, // Use if you want to hook in your own CSS compiler
				'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup' => true, // Select a backup non-google font in addition to a google font
				'font-style' => false, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets' => true, // Only appears if google is true and subsets not set to false
				'font-size' => true,
				'line-height' => false,
				//'word-spacing'=>true, // Defaults to false
				//'letter-spacing'=>true, // Defaults to false
				'color' => false,
				'preview' => true, // Disable the previewer
				'all_styles' => false, // Enable all Google Font style/weight variations to be added to the page
				'units' => 'px', // Defaults to px
				'subtitle' => esc_html__('Choose your body font properties.', 'helpme'),
				'default' => array(
					'font-family' => 'Lato',
					'google' => true,
					'font-size' => '14px',
				),
			),

			array(
				'id' => 'heading-font',
				'type' => 'typography',
				'title' => esc_html__('Headings Font', 'helpme'),
				'compiler' => false, // Use if you want to hook in your own CSS compiler
				'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup' => false, // Select a backup non-google font in addition to a google font
				'font-style' => false, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets' => true, // Only appears if google is true and subsets not set to false
				'font-size' => false,
				'line-height' => false,
				//'word-spacing'=>true, // Defaults to false
				//'letter-spacing'=>true, // Defaults to false
				'color' => false,
				'preview' => false, // Disable the previewer
				'all_styles' => false, // Enable all Google Font style/weight variations to be added to the page
				'units' => 'px', // Defaults to px
				'subtitle' => esc_html__('Choose your Heading fonts properties. <br>(will affect H1, H2, H3, H4, H5, H6)', 'helpme'),
				'default' => array(
					'font-family' => 'Montserrat',
					'google' => true,
					'font-weight' => '',
				),
			),

			array(
				'id' => 'widget-title',
				'type' => 'typography',
				'title' => esc_html__('Widgets Title', 'helpme'),
				'compiler' => false, // Use if you want to hook in your own CSS compiler
				'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup' => false, // Select a backup non-google font in addition to a google font
				'font-style' => false, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets' => false, // Only appears if google is true and subsets not set to false
				'font-size' => true,
				'line-height' => false,
				//'word-spacing'=>true, // Defaults to false
				//'letter-spacing'=>true, // Defaults to false
				'color' => false,
				'preview' => false, // Disable the previewer
				'all_styles' => false, // Enable all Google Font style/weight variations to be added to the page
				'units' => 'px', // Defaults to px
				'subtitle' => esc_html__('This will apply to all widget areas title including footer, sidebar and side dashboard', 'helpme'),
				'default' => array(
					'font-family' => 'Montserrat',
					'google' => true,
					'font-size' => '18px',
					'font-weight' => 'bold',
				),
			),

			array(
				'id' => 'page-title-size',
				'type' => 'slider',
				'title' => esc_html__('Page Title Text Size', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				"default" => "36",
				"min" => "12",
				"step" => "1",
				"max" => "100",
			),
			array(
				'id' => 'p-text-size',
				'type' => 'slider',
				'title' => esc_html__('Paragraph Text Size', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				"default" => "14",
				"min" => "12",
				"step" => "1",
				"max" => "100",
			),
			array(
				'id' => 'p-line-height',
				'type' => 'slider',
				'title' => esc_html__('Paragraph Line Height', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				"default" => "28",
				"min" => "12",
				"step" => "1",
				"max" => "100",
			),

			array(
				'id' => 'main-nav-font',
				'type' => 'typography',
				'title' => esc_html__('Main Navigation Top level', 'helpme'),
				'compiler' => false, // Use if you want to hook in your own CSS compiler
				'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup' => false, // Select a backup non-google font in addition to a google font
				'font-style' => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets' => false, // Only appears if google is true and subsets not set to false
				'font-size' => true,
				'line-height' => false,
				//'word-spacing'=>true, // Defaults to false
				//'letter-spacing'=>true, // Defaults to false
				'color' => false,
				'preview' => false, // Disable the previewer
				'all_styles' => false, // Enable all Google Font style/weight variations to be added to the page
				'units' => 'px', // Defaults to px
				'subtitle' => esc_html__('', 'helpme'),
				'default' => array(
					'font-family' => 'Lato',
					'google' => true,
					'font-size' => '14px',
					'font-weight' => '400',
				),
			),
			
			array(
				'id' => 'main-nav-item-space',
				'type' => 'slider',
				'title' => esc_html__('Main Menu Items Gutter Space', 'helpme'),
				'subtitle' => esc_html__('Left & Right. default : 17px', 'helpme'),
				'desc' => esc_html__('This Value will be applied as padding to left and right of the item.', 'helpme'),
				"default" => "15",
				"min" => "0",
				"step" => "1",
				"max" => "100",
			),
			array(
				'id' => 'vertical-nav-item-space',
				'type' => 'slider',
				'required' => array('header-structure', 'equals', 'vertical'),
				'title' => esc_html__('Main Menu Items Top & Bottom Padding', 'helpme'),
				'subtitle' => esc_html__('Top & Bottom. default : 10px', 'helpme'),
				'desc' => esc_html__('This Value will be applied as padding to top and bottom of the item.', 'helpme'),
				"default" => "10",
				"min" => "0",
				"step" => "1",
				"max" => "25",
			),
			array(
				'id' => 'main-nav-top-transform',
				'type' => 'button_set',
				'title' => esc_html__('Main Menu Top Level Text Transform', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				'options' => array('uppercase' => 'Uppercase', 'capitalize' => 'Capitalize', 'lowercase' => 'Lower Case'), 
				'default' => 'uppercase',
			),

			array(
				'id' => 'sub-nav-top-size',
				'type' => 'slider',
				'title' => esc_html__('Main Menu Sub Level Font Size', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				"default" => "12", 
				"min" => "10",
				"step" => "1",
				"max" => "50",
			),
			array(
				'id' => 'sub-nav-top-transform',
				'type' => 'button_set',
				'title' => esc_html__('Main Menu Sub Level Text Transform', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				'options' => array('uppercase' => 'Uppercase', 'capitalize' => 'Capitalize', 'lowercase' => 'Lower Case'), 
				'default' => 'capitalize',
			),
			array(
				'id' => 'sub-nav-top-weight',
				'type' => 'button_set',
				'title' => esc_html__('Main Menu Sub Level Font Weight', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				'options' => array('lighter' => 'Light (300)', 'normal' => 'Normal (400)', '500' => '500', '600' => '600', 'bold' => 'Bold (700)', 'bolder' => 'Bolder', '8000' => 'Extra Bold (800)', '900' => '900'), 
				'default' => 'normal',
			),
			array(
				'id' => 'toolbar-font',
				'type' => 'typography',
				'title' => esc_html__('Toolbar Font', 'helpme'),
				'compiler' => true, // Use if you want to hook in your own CSS compiler
				'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup' => false, // Select a backup non-google font in addition to a google font
				'font-style' => false, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets' => false, // Only appears if google is true and subsets not set to false
				'font-size' => true,
				'line-height' => false,
				//'word-spacing'=>true, // Defaults to false
				//'letter-spacing'=>true, // Defaults to false
				'color' => false,
				'preview' => true, // Disable the previewer
				'all_styles' => false, // Enable all Google Font style/weight variations to be added to the page
				'units' => 'px', // Defaults to px
				'subtitle' => esc_html__('Choose your header toolbar font properties.', 'helpme'),
				'default' => array(
					'font-family' => 'Montserrat',
					'google' => true,
					'font-size' => '14px',
					'font-weight' => '400',
				),
			),
			array(
				'id' => 'typekit-info',
				'type' => 'info',
				'style' => 'warning',
				'desc' => esc_html__("Note: Adobe Typekit is a premium service", 'helpme'). __(" ", 'helpme'),
				'subtitle' => esc_html__("", 'helpme'),
				'default' => '',
			),
			array(
				'id' => 'typekit-font-family',
				'type' => 'text',
				'title' => esc_html__('Choose a Typekit Font', 'helpme'),
				'desc' => esc_html__("Type the name of the font family you have picked from typekit library.", 'helpme'),
				'subtitle' => esc_html__("", 'helpme'),
				'default' => '',
			),
			array(
				'id' => 'typekit-element-names',
				'type' => 'text',
				'title' => esc_html__('Add Typekit Elements Class Names.', 'helpme'),
				'desc' => esc_html__("Add class names you want the Typekit apply the above font family. Add Class, ID or tag names (e.g. : body, p, #custom-id, .custom-class).", 'helpme'),
				'subtitle' => esc_html__("", 'helpme'),
				'default' => '',
			),
		),
	);

	$this->sections[] = array(
		'title' => esc_html__('Skin', 'helpme'),
		'desc' => esc_html__('', 'helpme'),
		'icon' => 'el-icon-tint',
		'fields' => array(

			array(
				'id' => 'accent-color',
				'type' => 'color',
				'title' => esc_html__('Accent Color', 'helpme'),
				'subtitle' => esc_html__('Main color scheme. Choose a vivid and bold color.', 'helpme'),
				'default' => '#82b541',
				'validate' => 'color',
			),

			/*array(
				'id' => 'hover-overlay-color',
				'type' => 'color',
				'title' => esc_html__('Image Hover Overlay Color', 'helpme'),
				'subtitle' => esc_html__('Image Hover Overlay Color will affect all images that have some overlay layer.', 'helpme'),
				'default' => '#ff4351',
				'validate' => 'color',
			),*/

			array(
				'id' => 'body-txt-color',
				'type' => 'color',
				'title' => esc_html__('Body text Color', 'helpme'),
				'subtitle' => esc_html__('Will affect all texts if no color is defined for them.', 'helpme'),
				'default' => '#6a727d',
				'validate' => 'color',
			),
			array(
				'id' => 'heading-color',
				'type' => 'color',
				'title' => esc_html__('Headings Color', 'helpme'),
				'subtitle' => esc_html__('Will affect all headings (h1,h2,h3,h4,h5,h6)', 'helpme'),
				'default' => '#272e43',
				'validate' => 'color',
			),
			array(
				'id' => 'link-color',
				'type' => 'link_color',
				'title' => esc_html__('Links Color', 'helpme'),
				'subtitle' => esc_html__('Will affect all links color.', 'helpme'),
				'regular' => true,
				'hover' => true,
				'default' => array(
					'regular' => '#6a727d',
					'hover' => '',
				)
			),

			array(
				'id' => 'page-title-color',
				'type' => 'color',
				'title' => esc_html__('Page Title', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'default' => '#ffffff',
				'validate' => 'color',
			),

			/*array(
				'id' => 'dashboard-title-color',
				'type' => 'color',
				'title' => esc_html__('Dashboard Widget Title', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'default' => '#272e43',
				'validate' => 'color',
			),

			array(
				'id' => 'dashboard-txt-color',
				'type' => 'color',
				'title' => esc_html__('Dashboard Widget Texts', 'helpme'),
				'subtitle' => esc_html__('Will affect all texts in side dashboard widget (unless there is a color value for the specific option in theme styles)', 'helpme'),
				'default' => '#6a727d',
				'validate' => 'color',
			),

			array(
				'id' => 'dashboard-link-color',
				'type' => 'link_color',
				'title' => esc_html__('Dashboard Widget Links', 'helpme'),
				'subtitle' => esc_html__('Will affect all links in side dashboard section.', 'helpme'),
				'regular' => true,
				'hover' => true,
				'default' => array(
					'regular' => '#6a727d',
					'hover' => '#82b541',
				)
			),*/

			array(
				'id' => 'sidebar-title-color',
				'type' => 'color',
				'title' => esc_html__('Sidebar Widget Title', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'default' => '#272e43',
				'validate' => 'color',
			),

			array(
				'id' => 'sidebar-txt-color',
				'type' => 'color',
				'title' => esc_html__('Sidebar Widget Texts', 'helpme'),
				'subtitle' => esc_html__('Will affect all texts in sidebar widget (unless there is a color value for the specific option in theme styles)', 'helpme'),
				'default' => '#6a727d',
				'validate' => 'color',
			),

			array(
				'id' => 'sidebar-link-color',
				'type' => 'link_color',
				'title' => esc_html__('Sidebar Widget Links', 'helpme'),
				'subtitle' => esc_html__('Will affect all links in sidebar section.', 'helpme'),
				'regular' => true,
				'hover' => true,
				'default' => array(
					'regular' => '#6a727d',
					'hover' => '#82b541',
				)
			),

			array(
				'id' => 'footer-title-color',
				'type' => 'color',
				'title' => esc_html__('Footer Widget Title', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'default' => '#ffffff',
				'validate' => 'color',
			),

			array(
				'id' => 'footer-txt-color',
				'type' => 'color',
				'title' => esc_html__('Footer Widget Texts', 'helpme'),
				'subtitle' => esc_html__('Will affect all texts in footer widget (unless there is a color value for the specific option in theme styles)', 'helpme'),
				'default' => '#6a727d',
				'validate' => 'color',
			),

			array(
				'id' => 'footer-link-color',
				'type' => 'link_color',
				'title' => esc_html__('Footer Widget Links', 'helpme'),
				'subtitle' => esc_html__('Will affect all links in footer section.', 'helpme'),
				'regular' => true,
				'hover' => true,
				'default' => array(
					'regular' => '#6a727d',
					'hover' => '#82b541',
				)
			),
			array(
				'id' => 'sub-footer-border-top',
				'type' => 'switch',
				'title' => esc_html__('Show Sub Footer Border Top?', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				"default" => 0,
				'on' => 'Enable',
				'off' => 'Disable',
			),
			array(
				'id' => 'footer-social-color',
				'type' => 'link_color',
				'title' => esc_html__('Sub-Footer Social Networks Color', 'helpme'),
				'subtitle' => esc_html__('Will affect all social network icons in sub footer. you can set its active and hover values.', 'helpme'),
				'regular' => true,
				'hover' => true,
				'default' => array(
					'regular' => '#6a727d',
					'hover' => '#82b541',
				)
			),
			array(
				'id' => 'footer-socket-color',
				'type' => 'color',
				'title' => esc_html__('Sub-Footer Copyright Color', 'helpme'),
				'subtitle' => esc_html__('Will affect sub footer left side copyright text.', 'helpme'),
				'default' => '#6a727d',
				'validate' => 'color',
			),
			/*array(
				'id' => 'widget-title-divider',
				'type' => 'switch',
				'title' => esc_html__('Show Widget Title Divider?', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'desc' => esc_html__('If you dont want to show widget title divider disabled this option.', 'helpme'),
				"default" => 1,
				'on' => 'Enable',
				'off' => 'Disable',
			),*/

			array(
				'id' => 'main-nav-top-color',
				'type' => 'nav_color',
				'title' => esc_html__('Main Navigation Top Level', 'helpme'),
				'subtitle' => esc_html__('Will affect main navigation top level links', 'helpme'),
				'regular' => true,
				'hover' => true,
				'bg' => true,
				'bg-hover' => true,
				'default' => array(
					'regular' => '#ffffff',
					'hover' => '#82b541',
					'bg' => '',
					'bg-hover' => '',
				)
			),

			array(
				'id' => 'main-nav-sub-bg',
				'type' => 'color',
				'title' => esc_html__('Main Navigation Sub Level Background Color', 'helpme'),
				'subtitle' => esc_html__('This value will affect Sub level background color including mega menu.', 'helpme'),
				'default' => 'rgba(16,28,40,0.9)',
				'validate' => 'color',
			),

			array(
				'id' => 'main-nav-sub-color',
				'type' => 'nav_color',
				'title' => esc_html__('Main Navigation Sub Level', 'helpme'),
				'subtitle' => esc_html__('all sub level menus ans sidebar links.', 'helpme'),
				'regular' => true,
				'hover' => true,
				'bg' => true,
				'bg-hover' => true,
				'bg-active' => true,
				'default' => array(
					'regular' => '#fff',
					'hover' => '#fff',
					'bg' => '',
					'bg-hover' => '#82b541',
					'bg-active' => '#1A1C28',
				)
			),
			array(
				'id' => 'navigation-border-top',
				'type' => 'switch',
				'title' => esc_html__('Show Main Navigation Border Top?', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				"default" => 0,
				'on' => 'Enable',
				'off' => 'Disable',
			),
			array(
				'id' => 'toolbar-border-top',
				'type' => 'switch',
				'title' => esc_html__('Show Toolbar Border Top?', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				"default" => 0,
				'on' => 'Enable',
				'off' => 'Disable',
			),
			array(
				'id' => 'toolbar-border-bottom-color',
				'type' => 'color',
				'title' => esc_html__('Header Toolbar Border Bottom Color', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'default' => 'transparent',
				'validate' => 'color',
			),
			array(
				'id' => 'toolbar-text-color',
				'type' => 'color',
				'title' => esc_html__('Header Toolbar Text Color', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'default' => '#ffffff',
				'validate' => 'color',
			),
			array(
				'id' => 'toolbar-phone-email-icon-color',
				'type' => 'color',
				'title' => esc_html__('Header Toolbar Phone & Email Icon Color', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'default' => '#ffffff',
				'validate' => 'color',
			),
			array(
				'id' => 'toolbar-link-color',
				'type' => 'nav_color',
				'title' => esc_html__('Header Toolbar Link Color', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'regular' => true,
				'hover' => true,
				'default' => array(
					'regular' => '#ffffff',
					'hover' => '#ffffff'
				)
			),
			array(
				'id' => 'toolbar-social-link-color',
				'type' => 'nav_color',
				'title' => esc_html__('Header Toolbar Social Network Link Color', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'regular' => true,
				'hover' => true,
				'default' => array(
					'regular' => '#ffffff',
					'hover' => '#82b541'
				)
			),
			array(
				'id' => 'header-search-icon-color',
				'type' => 'color',
				'title' => esc_html__('Header Search Icon Color', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'default' => '',
				'validate' => 'color',
			),

			array(
				'id' => 'preloader-txt-color',
				'type' => 'color',
				'title' => esc_html__('Preloader Text Color', 'helpme'),
				'subtitle' => esc_html__('Will affect global site preloader text color.', 'helpme'),
				'default' => '#ffffff',
				'validate' => 'color',
			),

			array(
				'id' => 'preloader-bg-color',
				'type' => 'color',
				'title' => esc_html__('Preloader Backgroud Color', 'helpme'),
				'subtitle' => esc_html__('Will affect global site preloader Background color.', 'helpme'),
				'default' => '#272e43',
				'validate' => 'color',
			),

			array(
				'id' => 'preloader-bar-color',
				'type' => 'color',
				'title' => esc_html__('Preloader Bar Color', 'helpme'),
				'subtitle' => esc_html__('Will affect global site preloader Bar color.', 'helpme'),
				'default' => '',
				'validate' => 'color',
			),
			array(
				'id' => 'breadcrumb-skin',
				'type' => 'select',
				'title' => esc_html__('Breadcrumb Skin', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'options' => array(
					'light' => 'Light',
					'custom' => 'Custom',
					//'dark' => 'Dark',

				),
				'default' => 'light',
			),
			array(
				'id' => 'breadcrumb-skin-custom',
				'type' => 'nav_color',
				'title' => esc_html__('Breadcrumb Custom Skin Color', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'regular' => true,
				'hover' => true,
				'default' => array(
					'regular' => '#ffffff',
					'hover' => '#ffffff'
				)
			),

			array(
				'id' => 'custom-css',
				'type' => 'ace_editor',
				'title' => esc_html__('Custom CSS', 'helpme'),
				'subtitle' => esc_html__('Add some quick css into this box.', 'helpme'),
				'desc' => esc_html__('For larger scale css modifications use custom.css file in theme root or consider using a child theme.', 'helpme'),
				'mode' => 'css',
				'theme' => 'monokai',
				'default' => "",
			),
			array(
				'id' => 'custom-js',
				'type' => 'ace_editor',
				'title' => esc_html__('Custom JS', 'helpme'),
				'subtitle' => esc_html__('Script will be placed in an script tag in document footer', 'helpme'),
				'mode' => 'javascript',
				'theme' => 'chrome',
				'desc' => 'For larger scale css modifications js custom.js file in theme root or consider using a child theme.',
				'default' => "jQuery(document).ready(function(){\n\n});",
			),



		),
	);

	$this->sections[] = array(
		'title' => esc_html__('Backgrounds', 'helpme'),
		'desc' => esc_html__('In this section you will customize your website backgrounds.', 'helpme'),
		'icon' => 'el-icon-brush',
		'fields' => array(

			array(
				'id' => 'body-layout',
				'type' => 'button_set',
				'title' => esc_html__('Site Layout', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'desc' => esc_html__('Boxed layout best works on standart header style.', 'helpme'),
				'options' => array('full' => 'Full Width', 'boxed' => 'Boxed'), //Must provide key => value pairs for radio options
				'default' => 'full',
			),

			array(
				'id' => 'body-bg',
				'type' => 'bg_selector',
				'required' => array('body-layout', 'equals', 'boxed'),
				'title' => esc_html__('Body Background', 'helpme'),
				'subtitle' => esc_html__('Affects body background Properties, use this option when boxed layout is chosen.', 'helpme'),
				'preset' => false,
				'default' => array(
					'url' => '',
					'color' => '#f9fafc',
					'position' => '',
					'repeat' => 'repeat',
					'attachment' => 'scroll',
					'cover' => '',
				)
			),

			array(
				'id' => 'header-bg',
				'type' => 'bg_selector',
				'title' => esc_html__('Header Background', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'preset' => false,
				'default' => array(
					'url' => '',
					'color' => 'rgba(26,28,40,0.9)',
					'position' => '',
					'repeat' => 'repeat',
					'attachment' => 'scroll',
					'cover' => '',
				)
			),
			array(
				'id' => 'header-bottom-border',
				'type' => 'color',
				'title' => esc_html__('Header Bottom Border Color', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'default' => '',
				'validate' => 'color',
			),
			array(
				'id' => 'toolbar-bg',
				'type' => 'bg_selector',
				'title' => esc_html__('Header Toolbar Background', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'preset' => false,
				'default' => array(
					'url' => '',
					'color' => '#82b541',
					'position' => '',
					'repeat' => 'repeat',
					'attachment' => 'scroll',
					'cover' => '',
				)
			),	

			array(
				'id' => 'page-title-bg',
				'type' => 'bg_selector',
				'title' => esc_html__('Page Title Background', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'preset' => false,
				'border' => true,
				'default' => array(
					'url' => '',
					'color' => '#272e43',
					'position' => '',
					'repeat' => 'repeat',
					'attachment' => 'scroll',
					'cover' => '',
					'border' => '#272e43',
				)
			),

			array(
				'id' => 'page-bg',
				'type' => 'bg_selector',
				'title' => esc_html__('Page Background', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'preset' => false,
				'default' => array(
					'url' => '',
					'color' => '#f9fafc',
					'position' => '',
					'repeat' => 'repeat',
					'attachment' => 'scroll',
					'cover' => '',
				)
			),

			array(
				'id' => 'footer-bg',
				'type' => 'bg_selector',
				'title' => esc_html__('Footer Background', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'preset' => false,
				'default' => array(
					'url' => '',
					'color' => '#1a1c28',
					'position' => '',
					'repeat' => 'repeat',
					'attachment' => 'scroll',
					'cover' => '',
				)
			),

			array(
				'id' => 'sub-footer-bg',
				'type' => 'color',
				'title' => esc_html__('Sub Footer Background Color', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'default' => '#1f212f',
				'validate' => 'color',
			),

			/*array(
				'id' => 'dashboard-bg',
				'type' => 'color',
				'title' => esc_html__('Side Dashboard Background Color', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'default' => '#222222',
				'validate' => 'color',
			),*/

			

		),
	);

	$this->sections[] = array(
		'title' => esc_html__('Blog', 'helpme'),
		'desc' => esc_html__('', 'helpme'),
		'icon' => 'el-icon-pencil',
		'fields' => array(

			array(
				'id' => 'page-title-blog',
				'type' => 'switch',
				'title' => esc_html__('Page Title : Blog Posts', 'helpme'),
				'subtitle' => esc_html__('This option will affect Blog single posts.', 'helpme'),
				'desc' => esc_html__('If you don\'t want to show page title section (title, breadcrumb) in blog single posts disable this option.', 'helpme'),
				"default" => 1,
				'on' => 'Enable',
				'off' => 'Disable',
			),
			/*array(
				"title" => esc_html__("Previous & Next Arrows", 'helpme'),
				"subtitle" => esc_html__("Using this option you can turn on/off the navigation arrows when viewing the portfolio single page.", "helpme"),
				"id" => "blog_next_prev",
				"default" => 1,
				"type" => "switch",
				'on' => 'Enable',
				'off' => 'Disable',
			),*/
			array(
				'id' => 'blog-featured-image',
				'type' => 'switch',
				'title' => esc_html__('Blog Single Featured image, audio, video ', 'helpme'),
				'subtitle' => esc_html__('Will completely disable Featued Image, Video and Audio players from blog single post.', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				"default" => 1,
				'on' => 'Enable',
				'off' => 'Disable',
			),

			array(
				'id' => 'blog-image-crop',
				'type' => 'switch',
				'title' => esc_html__('Featured image hard cropping', 'helpme'),
				'subtitle' => esc_html__('This option will affect single blog post featrued image.', 'helpme'),
				'desc' => esc_html__('If you want to disable automatic image cropping for featured image, disable this option. The original image size will be used. However it will be responsive and fit to container.', 'helpme'),
				"default" => 1,
				'on' => 'Enable',
				'off' => 'Disable',
			),

			array(
				'id' => 'blog-single-image-height',
				'required' => array('blog-image-crop', 'equals', '1'),
				'type' => 'slider',
				'title' => esc_html__('Single Post Featured Image Height', 'helpme'),
				'subtitle' => esc_html__('This height applies to featured image and gallery post type slideshow..', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				"default" => "350",
				"min" => "100",
				"step" => "1",
				"max" => "1000",
			),

			/*array(
				'id' => 'blog-single-related-posts',
				'type' => 'switch',
				'title' => esc_html__('Related Projects', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				"default" => 0,
				'on' => 'Enable',
				'off' => 'Disable',
			),*/

			array(
				'id' => 'blog-single-about-author',
				'type' => 'switch',
				'title' => esc_html__('About Author Section', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				"default" => 1,
				'on' => 'Enable',
				'off' => 'Disable',
			),

			array(
				'id' => 'blog-single-social-share',
				'type' => 'switch',
				'title' => esc_html__('Blog Single Social Share', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				"default" => 1,
				'on' => 'Enable',
				'off' => 'Disable',
			),

			array(
				'id' => 'blog-single-comments',
				'type' => 'switch',
				'title' => esc_html__('Comments', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				"default" => 1,
				'on' => 'Enable',
				'off' => 'Disable',
			),

			array(
				'id' => 'archive-layout',
				'type' => 'image_select',
				'title' => esc_html__('Archive Layout', 'helpme'),
				'subtitle' => esc_html__('Defines archive loop layout.', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				'options' => array(
					'left' => array('alt' => '1 Column', 'img' => HELPME_THEME_ADMIN_ASSETS_URI . '/img/left_layout.png'),
					'right' => array('alt' => '2 Column', 'img' => HELPME_THEME_ADMIN_ASSETS_URI . '/img/right_layout.png'),
					'full' => array('alt' => '3 Column', 'img' =>  HELPME_THEME_ADMIN_ASSETS_URI . '/img/full_layout.png'),
				),
				'default' => 'right'
			),
			array(
				'id' => 'archive-columns',
				'type' => 'slider',
				'title' => esc_html__('Archive columns', 'helpme'),
				'subtitle' => esc_html__('Defines archive loop layout.', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				'min' => '1',
				'max' => '4',
				'default' => '2'
			),
			array(
				'id' => 'archive-loop-style',
				'type' => 'select',
				'title' => esc_html__('Archive Loop Style', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'options' => array(
					'tile' => esc_html__('Tile', 'helpme'),
					'classic' => esc_html__('Classic', 'helpme'),
					//'masonry' => esc_html__('Masonry', 'helpme'),
					'thumb' => esc_html__('Thumb', 'helpme'),
					//'list' => esc_html__('List', 'helpme'),
				),
				'default' => 'tile',
			),
			array(
				'id' => 'archive-page-title',
				'type' => 'switch',
				'title' => esc_html__('Archive Loop Page Title', 'helpme'),
				'subtitle' => esc_html__('Using this option you can enable/disable page title section (including breadcrumbs)', 'helpme'),
				"default" => 1,
				'on' => 'Enable',
				'off' => 'Disable',
			),

		),
	);

	$this->sections[] = array(
		'title' => esc_html__('Portfolio', 'helpme'),
		'desc' => esc_html__('', 'helpme'),
		'icon' => 'el-icon-briefcase',
		'fields' => array(

			array(
				'id' => 'page-title-portfolio',
				'type' => 'switch',
				'title' => esc_html__('Page Title : Portfolio Posts', 'helpme'),
				'subtitle' => esc_html__('This option will affect Portfolio single posts.', 'helpme'),
				'desc' => esc_html__('If you don\'t want to show page title section (title, breadcrumb) in Portfolio single posts disable this option.', 'helpme'),
				"default" => 1,
				'on' => 'Enable',
				'off' => 'Disable',
			),
			array(
				'id' => 'portfolio-slug',
				'type' => 'text',
				'title' => esc_html__('Portfolio Slug', 'helpme'),
				'subtitle' => esc_html__('If you modify this field please navigate to settings > permalinks and hit the save button to update the permalink structure.', 'helpme'),
				'desc' => esc_html__('Portfolio Slug is the text that is displyed in the URL also its archive link for portfolio. As shown in the example, it is set to "portfolio-posts" by default but you can change it to anything to suite your preference. However you should not have the same slug in any page or other post slug and if so the pagination will return 404 error naturally due to the internal conflicts.', 'helpme'),
				'default' => 'portfolio-posts',
			),
			/*array(
				"title" => esc_html__("Previous & Next Arrows", 'helpme'),
				"subtitle" => esc_html__("Using this option you can turn on/off the navigation arrows when viewing the portfolio single page.", "helpme"),
				"id" => "portfolio_next_prev",
				"default" => '1',
				"type" => "switch",
				'on' => 'Enable',
				'off' => 'Disable',
			),*/
			array(
				'id' => 'portfolio-single-image',
				'type' => 'switch',
				'title' => esc_html__('Portfolio Single Featured Image', 'helpme'),
				'subtitle' => esc_html__('Using this option you can disable/enable portfolio single featured image, gallyer slidshow or video.', 'helpme'),
				"default" => 1,
				'on' => 'Enable',
				'off' => 'Disable',
			),

			array(
				'id' => 'portfolio-image-crop',
				'type' => 'switch',
				'required' => array('portfolio-single-image', 'equals', '1'),
				'title' => esc_html__('Featured image hard cropping', 'helpme'),
				'subtitle' => esc_html__('This option will affect single Portfolio post featrued image.', 'helpme'),
				'desc' => esc_html__('If you want to disable automatic image cropping for featured image, disable this option. The original image size will be used. However it will be responsive and fit to container.', 'helpme'),
				"default" => 1,
				'on' => 'Enable',
				'off' => 'Disable',
			),

			array(
				'id' => 'Portfolio-single-image-height',
				'type' => 'slider',
				'required' => array('portfolio-single-image', 'equals', '1'),
				'title' => esc_html__('Featured Image Height', 'helpme'),
				'subtitle' => esc_html__('This height applies to featured image and gallery post type slideshow..', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				"default" => "350",
				"min" => "100",
				"step" => "1",
				"max" => "1000",
			),

			/*array(
				'id' => 'portfolio-single-related',
				'type' => 'switch',
				'title' => esc_html__('Related Projects', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				"default" => 0,
				'on' => 'Enable',
				'off' => 'Disable',
			),

			array(
				'id' => 'portfolio-single-comments',
				'type' => 'switch',
				'title' => esc_html__('Comments', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				"default" => 0,
				'on' => 'Enable',
				'off' => 'Disable',
			),*/

			array(
				'id' => 'portfolio-archive-loop-style',
				'type' => 'select',
				'title' => esc_html__('Portfolio Archive Loop Style', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				"default" => 'standard',
				'options' => array(
					//"grid" => esc_html__("Grid", 'helpme'),
					//"masonry" => esc_html__("Masonry", 'helpme'),
					//"flip" => esc_html__("Flip", 'helpme'),
					"standard" => esc_html__("Standard", 'helpme'),
					//"scroller" => esc_html__("Scroller", 'helpme')

				),
				'default' => 'standard',
			),

		),
	);

	$this->sections[] = array(
		'title' => esc_html__('Woocommerce', 'helpme'),
		'desc' => esc_html__('', 'helpme'),
		'icon' => 'el-icon-shopping-cart',
		'fields' => array(
			array(
				'id' => 'woo-shop-layout',
				'type' => 'image_select',
				'title' => esc_html__('Shop Layout', 'helpme'),
				'subtitle' => esc_html__('Defines shop loop layout.', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				'options' => array(
					'left' => array('alt' => '1 Column', 'img' => HELPME_THEME_ADMIN_ASSETS_URI . '/img/left_layout.png'),
					'right' => array('alt' => '2 Column', 'img' => HELPME_THEME_ADMIN_ASSETS_URI . '/img/right_layout.png'),
					'full' => array('alt' => '3 Column', 'img' =>  HELPME_THEME_ADMIN_ASSETS_URI . '/img/full_layout.png'),
				),
				'default' => 'right'
			),

			array(
				'id' => 'woo-loop-thumb-height',
				'type' => 'slider',
				'title' => esc_html__('Product Loop Image Height', 'helpme'),
				'subtitle' => esc_html__('Using this option you can change the product loop image height.', 'helpme'),
				'desc' => esc_html__('default : 330', 'helpme'),
				"default" => "380",
				"min" => "100",
				"step" => "1",
				"max" => "1000",
			),
		    array(
		        "title" => esc_html__("Shop Loop Image Size", 'helpme'),
		        "id" => "woo_loop_image_size",
		        "default" => "crop",
		        "options" => array(
		            "crop" => esc_html__("Resize & Crop", 'helpme'),
		            "full" => esc_html__("Original Size", 'helpme'),
		            "large" => esc_html__("Large Size", 'helpme'),
		            "medium" => esc_html__("Medium Size", 'helpme'),
		        ),
		        "type" => "select"
		    ),
			array(
				'id' => 'woo-single-thumb-height',
				'type' => 'slider',
				'title' => esc_html__('Single Product Image Height', 'helpme'),
				'subtitle' => esc_html__('Using this option you can change the single product image height.', 'helpme'),
				'desc' => esc_html__('default : 400', 'helpme'),
				"default" => "400",
				"min" => "100",
				"step" => "1",
				"max" => "1000",
			),
		    array(
		        "title" => esc_html__("Shop Single Product Image Size", 'helpme'),
		        "id" => "woo_single_image_size",
		        "default" => "crop",
		        "options" => array(
		            "crop" => esc_html__("Resize & Crop", 'helpme'),
		            "full" => esc_html__("Original Size", 'helpme'),
		            "large" => esc_html__("Large Size", 'helpme'),
		            "medium" => esc_html__("Medium Size", 'helpme'),
		        ),
		        "type" => "select"
		    ),

			array(
				'id' => 'woo-single-layout',
				'type' => 'image_select',
				'title' => esc_html__('Single Layout', 'helpme'),
				'subtitle' => esc_html__('Defines shop single product layout.', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				'options' => array(
					'left' => array('alt' => '1 Column', 'img' =>   '/img/left_layout.png'),
					'right' => array('alt' => '2 Column', 'img' =>   '/img/right_layout.png'),
					'full' => array('alt' => '3 Column', 'img' =>   '/img/full_layout.png'),
				),
				'default' => 'right'
			),

			array(
				'id' => 'checkout-box',
				'type' => 'switch',
				'title' => esc_html__('Header Checkout/Shopping Box', 'helpme'),
				'subtitle' => esc_html__('Using This option you can remove header shopping box from header.', 'helpme'),
				"default" => 0,
				'on' => 'Enable',
				'off' => 'Disable',
			),

			array(
				'id' => 'woo-image-quality',
				'type' => 'button_set',
				'title' => esc_html__('Product Loops image quality', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				'options' => array('1' => 'Normal Size', '2' => 'Retina Compatible'), //Must provide key => value pairs for radio options
				'default' => '1'
			),

			array(
				'id' => 'woo-single-title',
				'type' => 'switch',
				'title' => esc_html__('Show Product Category as Product Single Title.', 'helpme'),
				'subtitle' => esc_html__('If you want to show product category(if multiple only first will be used) as single product page title enable this option. having this option disabled shop page title will be used.', 'helpme'),
				"default" => 1,
				'on' => 'Enable',
				'off' => 'Disable',
			),

			array(
				'id' => 'woo-single-show-title',
				'type' => 'switch',
				'title' => esc_html__('Woocommerce Single Product Page Title', 'helpme'),
				'subtitle' => esc_html__('Using this option you can disable/enable single product page title (including breadcrumbs).', 'helpme'),
				"default" => 1,
				'on' => 'Enable',
				'off' => 'Disable',
			),

			array(
				'id' => 'woo-shop-loop-title',
				'type' => 'switch',
				'title' => esc_html__('Woocommerce Shop Loop Page Title', 'helpme'),
				'subtitle' => esc_html__('Using this option you can disable/enable Shop product Loop title (including breadcrumbs).', 'helpme'),
				"default" => 1,
				'on' => 'Enable',
				'off' => 'Disable',
			),

		),
	);

	$this->sections[] = array(
		'title' => esc_html__('Third Party API', 'helpme'),
		'desc' => esc_html__('', 'helpme'),
		'icon' => 'el-icon-puzzle',
		'fields' => array(

			array(
				'id' => 'twitter-consumer-key',
				'type' => 'text',
				'title' => esc_html__('Twitter Consumer Key', 'helpme'),
				'desc' => __('<ol style="list-style-type:decimal !important;">
  <li>Go to dev.twitter.com/apps login with your twitter account and click "Create a new application".</li>
  <li>Fill out the required fields, accept the rules of the road, and then click on the "Create your Twitter application" button. You will not need a callback URL for this app, so feel free to leave it blank.</li>
  <li>Once the app has been created, click the "Create my access token" button.</li>
  <li>You are done! You will need the following data later on:</ol>', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'default' => '',
			),

			array(
				'id' => 'twitter-consumer-secret',
				'type' => 'text',
				'title' => esc_html__('Twitter Consumer Secret', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'default' => '',
			),

			array(
				'id' => 'twitter-access-token',
				'type' => 'text',
				'title' => esc_html__('Twitter Access Token', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'default' => '',
			),

			array(
				'id' => 'twitter-access-token-secret',
				'type' => 'text',
				'title' => esc_html__('Twitter Access Token Secret', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'default' => '',
			),

			array(
				'id' => 'flickr-api-key',
				'type' => 'text',
				'title' => esc_html__('Flickr API Key', 'helpme'),
				'desc' => __('You can obtain your API key from www.flickr.com/services/api/misc.api_keys.html Flickr The App Garden', 'helpme'),
				'subtitle' => esc_html__('You will need to fill this field if you want to use flickr widget or shrotcode', 'helpme'),
				'default' => '',
			),

			/*array(
				'id' => 'google-analytics',
				'type' => 'text',
				'title' => esc_html__('Google Analytics ID', 'helpme'),
				'desc' => esc_html__('Enter your Google Analytics ID here to track your site with Google Analytics.', 'helpme'),
				'subtitle' => esc_html__('', 'helpme'),
				'default' => '',
			),*/

		),
	);

	$this->sections[] = array(
		'title' => esc_html__('Manage Theme Speed', 'helpme'),
		'desc' => esc_html__('', 'helpme'),
		'icon' => 'el-icon-cogs',
		'fields' => array(
			array(
				'id' => 'minify-js',
				'type' => 'switch',
				'title' => esc_html__('Minify Java Script Files', 'helpme'),
				'subtitle' => esc_html__('Minifies file to decrease the file size by 40%', 'helpme'),
				'desc' => esc_html__('You can enable JS minification using this option. This option will only pickup the pre-minified JS files(theme-scripts-min.js & plugins.js). So use this option if you did not hack the JS files.', 'helpme'),
				"default" => 1,
				'on' => 'Enable',
				'off' => 'Disable',
			),

			array(
				'id' => 'minify-css',
				'type' => 'switch',
				'title' => esc_html__('Minify CSS Files', 'helpme'),
				'subtitle' => esc_html__('Minifies file to decrease the file size by 40%', 'helpme'),
				'desc' => esc_html__('You can enable CSS minification using this option. This option will only pickup the pre-minified CSS files. So use this option if you did not hack the CSS files.', 'helpme'),
				"default" => 1,
				'on' => 'Enable',
				'off' => 'Disable',
			),

			array(
				'id' => 'remove-js-css-ver',
				'type' => 'switch',
				'title' => esc_html__('Remove query string from Static Files', 'helpme'),
				'subtitle' => esc_html__('Removes "ver" query string from JS and CSS files.', 'helpme'),
				'desc' => __('For More info Please <a href="https://developers.google.com/speed/docs/best-practices/caching#LeverageProxyCaching">Read Here</a>.', 'helpme'),
				"default" => 1,
				'on' => 'Enable',
				'off' => 'Disable',
			),

		),
	);


                $this->sections[] = array(
                    'title'  => esc_html__( 'Import / Export', 'helpme' ),
                    'desc'   => esc_html__( 'Import and Export your Redux Framework settings from file, text or URL.', 'helpme' ),
                    'icon'   => 'el el-refresh',
                    'fields' => array(
                        array(
                            'id'         => 'opt-import-export',
                            'type'       => 'import_export',
                            'title'      => 'Import Export',
                            'subtitle'   => 'Save and restore your Redux options',
                            'full_width' => false,
                        ),
                    ),
                );

                $this->sections[] = array(
                    'type' => 'divide',
                );


                if ( file_exists( trailingslashit( dirname( __FILE__ ) ) . 'README.html' ) ) {
                    $tabs['docs'] = array(
                        'icon'    => 'el el-book',
                        'title'   => esc_html__( 'Documentation', 'helpme' ),
                        'content' => $wp_filesystem->get_contents( dirname( __FILE__ ) . 'README.html' )
                    );
                }
            }

            public function setHelpTabs() {

                // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
                $this->args['help_tabs'][] = array(
                    'id'      => 'redux-help-tab-1',
                    'title'   => esc_html__( 'Theme Information 1', 'helpme' ),
                    'content' => esc_html__( 'This is the tab content, HTML is allowed.', 'helpme' )
                );

                $this->args['help_tabs'][] = array(
                    'id'      => 'redux-help-tab-2',
                    'title'   => esc_html__( 'Theme Information 2', 'helpme' ),
                    'content' => esc_html__( 'This is the tab content, HTML is allowed.', 'helpme' )
                );

                // Set the help sidebar
                $this->args['help_sidebar'] = esc_html__( 'This is the sidebar content, HTML is allowed.', 'helpme' );
            }

            /**
             * All the possible arguments for Redux.
             * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
             * */
            public function setArguments() {

                $theme = wp_get_theme(); // For use with some settings. Not necessary.

                $this->args = array(
                    // TYPICAL -> Change these values as you need/desire
                    'opt_name'             => 'helpme_settings',
					'disable_tracking'             => true,
                    // This is where your data is stored in the database and also becomes your global variable name.
                    'display_name'         => $theme->get( 'Name' ),
                    // Name that appears at the top of your panel
                    'display_version'      => $theme->get( 'Version' ),
                    // Version that appears at the top of your panel
                    'menu_type'            => 'menu',
                    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                    'allow_sub_menu'       => true,
                    // Show the sections below the admin menu item or not
                    'menu_title'           => esc_html__( 'Theme Settings', 'helpme' ),
                    'page_title'           => esc_html__( 'Theme Settings', 'helpme' ),
                    // You will need to generate a Google API key to use this feature.
                    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                    'google_api_key'       => '',
                    // Set it you want google fonts to update weekly. A google_api_key value is required.
                    'google_update_weekly' => false,
                    // Must be defined to add google fonts to the typography module
                    'async_typography'     => true,
                    // Use a asynchronous font on the front end or font string
                    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
                    'admin_bar'            => true,
                    // Show the panel pages on the admin bar
                    'admin_bar_icon'     => 'dashicons-portfolio',
                    // Choose an icon for the admin bar menu
                    'admin_bar_priority' => 50,
                    // Choose an priority for the admin bar menu
                    'global_variable'      => '',
                    // Set a different name for your global variable other than the opt_name
                    'dev_mode'             => false,
                    // Show the time the page took to load, etc
					'forced_dev_mode_off' => true,
                    'update_notice'        => true,
                    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
                    'customizer'           => true,
                    // Enable basic customizer support
                    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
                    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

                    // OPTIONAL -> Give you extra features
                    'page_priority'        => null,
                    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                    'page_parent'          => 'themes.php',
                    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                    'page_permissions'     => 'manage_options',
                    // Permissions needed to access the options panel.
                    'menu_icon'            => '',
                    // Specify a custom URL to an icon
                    'last_tab'             => '',
                    // Force your panel to always open to a specific tab (by id)
                    'page_icon'            => 'icon-themes',
                    // Icon displayed in the admin panel next to your menu_title
                    'page_slug'            => 'theme_settings',
                    // Page slug used to denote the panel
                    'save_defaults'        => true,
                    // On load save the defaults to DB before user clicks save or not
                    'default_show'         => false,
                    // If true, shows the default value next to each field that is not the default value.
                    'default_mark'         => '',
                    // What to print by the field's title if the value shown is default. Suggested: *
                    'show_import_export'   => true,
                    // Shows the Import/Export panel when not used as a field.

                    // CAREFUL -> These options are for advanced use only
                    'transient_time'       => 60 * MINUTE_IN_SECONDS,
                    'output'               => true,
                    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                    'output_tag'           => true,
                    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

                    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                    'database'             => '',
                    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                    'system_info'          => false,
                    // REMOVE

                    // HINTS
                    'hints'                => array(
                        'icon'          => 'el el-question-sign',
                        'icon_position' => 'right',
                        'icon_color'    => 'lightgray',
                        'icon_size'     => 'normal',
                        'tip_style'     => array(
                            'color'   => 'light',
                            'shadow'  => true,
                            'rounded' => false,
                            'style'   => '',
                        ),
                        'tip_position'  => array(
                            'my' => 'top left',
                            'at' => 'bottom right',
                        ),
                        'tip_effect'    => array(
                            'show' => array(
                                'effect'   => 'slide',
                                'duration' => '500',
                                'event'    => 'mouseover',
                            ),
                            'hide' => array(
                                'effect'   => 'slide',
                                'duration' => '500',
                                'event'    => 'click mouseleave',
                            ),
                        ),
                    )
                );

               
                // Panel Intro text -> before the form
                if ( ! isset( $this->args['global_variable'] ) || $this->args['global_variable'] !== false ) {
                    if ( ! empty( $this->args['global_variable'] ) ) {
                        $v = $this->args['global_variable'];
                    } else {
                        $v = str_replace( '-', '_', $this->args['opt_name'] );
                    }
                    //$this->args['intro_text'] = sprintf( esc_html__( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'helpme' ), $v );
                } else {
                    //$this->args['intro_text'] = esc_html__( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'helpme' );
                }

                // Add content after the form.
                //$this->args['footer_text'] = esc_html__( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'helpme' );
            }

            public function validate_callback_function( $field, $value, $existing_value ) {
                $error = true;
                $value = 'just testing';

                /*
              do your validation

              if(something) {
                $value = $value;
              } elseif(something else) {
                $error = true;
                $value = $existing_value;
                
              }
             */

                $return['value'] = $value;
                $field['msg']    = 'your custom error message';
                if ( $error == true ) {
                    $return['error'] = $field;
                }

                return $return;
            }

            public static function class_field_callback( $field, $value ) {
                print_r( $field );
                echo '<br/>CLASS CALLBACK';
                print_r( $value );
            }

        }

        global $reduxConfig;
        $reduxConfig = new Redux_Framework_sample_config();
    } else {
        echo "The class named Redux_Framework_sample_config has already been called. <strong>Developers, you need to prefix this class with your company name or you'll run into problems!</strong>";
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ):
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    endif;

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ):
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error = true;
            $value = 'just testing';

            /*
          do your validation

          if(something) {
            $value = $value;
          } elseif(something else) {
            $error = true;
            $value = $existing_value;
            
          }
         */

            $return['value'] = $value;
            $field['msg']    = 'your custom error message';
            if ( $error == true ) {
                $return['error'] = $field;
            }

            $return['warning'] = $field;

            return $return;
        }
    endif;

function removeDemoModeLink() { // Be sure to rename this function to something more unique
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}
add_action('init', 'removeDemoModeLink');

/** remove redux menu under the tools **/
add_action( 'admin_menu', 'remove_redux_menu',12 );
function remove_redux_menu() {
    remove_submenu_page('tools.php','redux-about');
}