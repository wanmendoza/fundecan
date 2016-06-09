<?php
/**
* Class and Function List:
* Function list:
* - init()
* - constants()
* - widgets()
* - supports()
* - functions()
* - language()
* - add_metaboxes()
* - admin()
* - post_types()
* - theme_enqueue_scripts()
* - helpme_preloader_script() 
*/

$theme = new Helpme_Theme();
$theme->init(array(
		"theme_name" => "Helpme",
		"theme_slug" => "helpme",
));

class Helpme_Theme
{
		function init($options)
		{
				$this->constants($options);
				$this->functions();
				$this->admin();
				
				add_action('init', array(&$this,
						'language'
				));
				
				add_action('init', array(&$this,
						'add_metaboxes',
				));
				
				add_action('after_setup_theme', array(&$this,
						'supports',
				));
				add_action('widgets_init', array(&$this,
						'widgets',
				));
				
				
		}
		
		function constants($options)
		{
				define("HELPME_THEME_DIR", get_template_directory());
				define("HELPME_THEME_DIR_URI", get_template_directory_uri());
				define("HELPME_THEME_NAME", $options["theme_name"]);
				define("HELPME_THEME_SLUG", $options["theme_slug"]);
				define("HELPME_THEME_STYLES", HELPME_THEME_DIR_URI . "/styles/css");
				define("HELPME_THEME_IMAGES", HELPME_THEME_DIR_URI . "/images");
				define("HELPME_THEME_JS", HELPME_THEME_DIR_URI . "/js");
				define("HELPME_THEME_INCLUDES", HELPME_THEME_DIR . "/includes");
				define("HELPME_THEME_FRAMEWORK", HELPME_THEME_INCLUDES . "/framework");
				define("HELPME_THEME_ACTIONS", HELPME_THEME_INCLUDES . "/actions");
				define("HELPME_THEME_PLUGINS_CONFIG", HELPME_THEME_INCLUDES . "/plugins-config");
				define("HELPME_THEME_PLUGINS_CONFIG_URI", HELPME_THEME_DIR_URI . "/includes/plugins-config");
				define('HELPME_THEME_METABOXES', HELPME_THEME_FRAMEWORK . '/metaboxes');
				define('HELPME_THEME_ADMIN_URI', HELPME_THEME_DIR_URI . '/includes');
				define('HELPME_THEME_ADMIN_ASSETS_URI', HELPME_THEME_DIR_URI . '/includes/assets');
		}
		
		function widgets()
		{
				require_once (trailingslashit( get_template_directory() ).'includes/custom-post/widgets/widgets-popular-posts.php');
				require_once (trailingslashit( get_template_directory() )."includes/custom-post/widgets/widgets-recent-posts.php");
				require_once (trailingslashit( get_template_directory() )."includes/custom-post/widgets/widgets-video.php");
				require_once (trailingslashit( get_template_directory() )."includes/custom-post/widgets/widgets-flickr-feeds.php");
				require_once (trailingslashit( get_template_directory() )."includes/custom-post/widgets/widgets-recent-portfolio.php");
				require_once (trailingslashit( get_template_directory() )."includes/custom-post/widgets/widgets-comments.php");
				require_once (trailingslashit( get_template_directory() )."includes/custom-post/widgets/widgets-instagram.php");
				require_once (trailingslashit( get_template_directory() )."includes/custom-post/widgets/widgets-custom-menu.php");
				
				register_widget("Helpme_Widget_Popular_Posts");
				register_widget("Helpme_Widget_Recent_Posts");
				register_widget("Helpme_Widget_Video");
				register_widget("Helpme_Widget_Flickr_Feeds");
				register_widget("Helpme_Widget_Recent_Portfolio");
				register_widget("Helpme_WP_Widget_Recent_Comments");
				register_widget("Helpme_Widget_Instagram_Feeds");
				register_widget("Helpme_WP_Nav_Menu_Widget");
		}
		
		function supports()
		{
				
				if(class_exists('Redux_Framework_sample_config')){
					$content_width = '';
				if (!isset($content_width)) {
						global $helpme_settings;
						$content_width = $helpme_settings['grid-width'];
				}
				}
				if (function_exists('add_theme_support')) {
						add_theme_support('menus');
						add_theme_support('automatic-feed-links');
						add_theme_support('editor-style');
						add_theme_support( 'title-tag' );
						add_theme_support( 'custom-header' );
						add_theme_support( 'custom-background' );
						/* Add Woocmmerce support */
						add_theme_support('woocommerce');
						
						add_theme_support('post-formats', array(
								'image',
								'gallery',
								'video',
								'audio',
								'quote',
								'link'
						));
						register_nav_menus(array(
								'primary-menu' => 'Primary Navigation',
								'second-menu' => 'Second Navigation',
								'third-menu' => 'Third Navigation',
								'fourth-menu' => 'Fourth Navigation',
								'fifth-menu' => 'Fifth Navigation',
								'sixth-menu' => 'Sixth Navigation',
								'seventh-menu' => 'Seventh Navigation',
						));
						
						add_theme_support('post-thumbnails');
				}
		}
		
		function functions()
		{
				require_once HELPME_THEME_FRAMEWORK . '/ReduxCore/framework.php';
				require_once HELPME_THEME_FRAMEWORK . '/ReduxCore/options-config.php';
				require_once HELPME_THEME_FRAMEWORK . "/general.php";
				require_once HELPME_THEME_FRAMEWORK . "/woocommerce.php";
				require_once HELPME_THEME_PLUGINS_CONFIG . "/ajax-search.php";
				require_once HELPME_THEME_PLUGINS_CONFIG . "/wp-nav-custom-walker.php";
				require_once HELPME_THEME_FRAMEWORK . '/sidebar-generator.php';
				require_once HELPME_THEME_PLUGINS_CONFIG . "/pagination.php";
				require_once HELPME_THEME_PLUGINS_CONFIG . "/image-cropping.php";
				require_once HELPME_THEME_PLUGINS_CONFIG . "/tgm-plugin-activation/request-plugins.php";
				
				require_once HELPME_THEME_PLUGINS_CONFIG . "/love-this.php";
				require_once HELPME_THEME_FRAMEWORK . "/theme-skin.php";
				
				require_once HELPME_THEME_INCLUDES . "/thirdparty-integration/wpml-fix/helpme-wpml.php";
				
				/*
				Theme elements hooks
				*/
				require_once (trailingslashit( get_template_directory() )."includes/actions/header.php");
				require_once (trailingslashit( get_template_directory() )."includes/actions/posts.php");
				require_once (trailingslashit( get_template_directory() )."includes/actions/general.php");
				
				/* Portfolio styles */
				require_once (trailingslashit( get_template_directory() )."includes/custom-post/portfolio-styles/standard.php");
				require_once (trailingslashit( get_template_directory() )."includes/custom-post/portfolio-styles/scroller.php");
				
				/* Blog Styles @since V1.0 */
				require_once (trailingslashit( get_template_directory() )."includes/custom-post/blog-styles/classic.php");
				
				/* Blog Styles @since V1.0 */
				require_once (trailingslashit( get_template_directory() )."includes/custom-post/blog-styles/thumb.php");
				require_once (trailingslashit( get_template_directory() )."includes/custom-post/blog-styles/tile.php");
				require_once (trailingslashit( get_template_directory() )."includes/custom-post/blog-styles/scroller.php");
		}
		
		function language()
		{
				load_theme_textdomain('helpme', get_stylesheet_directory() . '/languages');
		}
		
		function add_metaboxes()
		{
				require_once HELPME_THEME_FRAMEWORK . '/metabox-generator.php';
				require_once HELPME_THEME_METABOXES . '/metabox-layout.php';
				require_once HELPME_THEME_METABOXES . '/metabox-posts.php';
				require_once HELPME_THEME_METABOXES . '/metabox-portfolios.php';
				require_once HELPME_THEME_METABOXES . '/metabox-cause.php';
				require_once HELPME_THEME_METABOXES . '/metabox-employee.php';
				require_once HELPME_THEME_METABOXES . '/metabox-pages.php';
				require_once HELPME_THEME_METABOXES . '/metabox-clients.php';
				require_once HELPME_THEME_METABOXES . '/metabox-testimonials.php';
				include_once HELPME_THEME_METABOXES . '/metabox-skinning.php';
		}
		
		function admin()
		{
				if (is_admin()) {
						
						require_once HELPME_THEME_FRAMEWORK . '/admin.php';
						require_once HELPME_THEME_PLUGINS_CONFIG . '/mega-menu.php';
						require_once HELPME_THEME_FRAMEWORK . '/icon-library.php';
				}
		}
		
		
}
function theme_enqueue_scripts()
{
		if (!is_admin()) {
				
				global $helpme_settings;
				$theme_data = wp_get_theme("helpme");
				
				wp_enqueue_script('jquery-ui-tabs');
				wp_register_script('jquery-jplayer', HELPME_THEME_JS . '/jquery.jplayer.min.js', array(
						'jquery'
				) , $theme_data['Version'], true);
				wp_register_script('instafeed', HELPME_THEME_JS . '/instafeed.min.js', array(
						'jquery'
				) , $theme_data['Version'], true);
				wp_enqueue_script('bootstrap', HELPME_THEME_JS . '/bootstrap.min.js', array(
						'jquery'
				) , $theme_data['Version'], true);
				wp_enqueue_script('skrollr', HELPME_THEME_JS . '/skrollr-min.js', array(
						'jquery'
				) , $theme_data['Version'], true);
				wp_enqueue_script('owl.carousel', HELPME_THEME_JS . '/owl.carousel.js', array(
						'jquery'
				) , $theme_data['Version'], true);
				wp_enqueue_script('triger', HELPME_THEME_JS . '/triger.js', array(
						'jquery'
				) , $theme_data['Version'], true);
				wp_enqueue_script('circles', HELPME_THEME_JS . '/circles.js', array(
						'jquery'
				) , $theme_data['Version'], true);
				
				
				if ($helpme_settings['minify-js']) {
						wp_enqueue_script('theme-plugins-min', HELPME_THEME_JS . '/min/plugins-ck.js', array(
								'jquery'
						) , $theme_data['Version'], true);
						wp_enqueue_script('theme-scripts-min', HELPME_THEME_JS . '/min/theme-scripts-ck.js', array(
								'jquery'
						) , $theme_data['Version'], true);
				} 
				else {
						wp_enqueue_script('theme-plugins', HELPME_THEME_JS . '/plugins.js', array(
								'jquery'
						) , $theme_data['Version'], true);
						wp_enqueue_script('theme-scripts', HELPME_THEME_JS . '/theme-scripts.js', array(
								'jquery'
						) , $theme_data['Version'], true);
				}
				
				$custom_js_file = get_stylesheet_directory() . '/custom.js';
				$custom_js_file_uri = get_stylesheet_directory_uri() . '/custom.js';
				
				if (file_exists($custom_js_file)) {
						wp_enqueue_script('custom-js', $custom_js_file_uri, array(
								'jquery'
						) , $theme_data['Version'], true);
				}
				
				if (is_singular()) {
						wp_enqueue_script('comment-reply');
				}
				$css_min = (isset($helpme_settings['minify-css']) && $helpme_settings['minify-css'] == 1) ? '.min' : '';
				wp_enqueue_style('bootstrap', HELPME_THEME_STYLES . '/bootstrap' . $css_min . '.css', false, $theme_data['Version'], 'all');
				wp_enqueue_style('theme-styles', HELPME_THEME_STYLES . '/styles' . $css_min . '.css', false, $theme_data['Version'], 'all');
				wp_enqueue_style('designsvilla-icons', HELPME_THEME_STYLES . '/designsvilla-icons' . $css_min . '.css', false, $theme_data['Version'], 'all');
				wp_enqueue_style('fontawesome', HELPME_THEME_STYLES . '/font-awesome' . $css_min . '.css', false, $theme_data['Version'], 'all');
				wp_enqueue_style('pe-line-icons', HELPME_THEME_STYLES . '/pe-line-icons' . $css_min . '.css', false, $theme_data['Version'], 'all');
				wp_enqueue_style('flaticon', HELPME_THEME_STYLES . '/flaticon' . $css_min . '.css', false, $theme_data['Version'], 'all');
		}
}

add_action('wp_enqueue_scripts', 'theme_enqueue_scripts', 1);


function helpme_preloader_script()
{
		
		if (!global_get_post_id()) {
				return false;
		}
		
		$preloader = get_post_meta(global_get_post_id() , '_preloader', true);
		
		if ($preloader == 'true') {
				wp_enqueue_script('QueryLoader', HELPME_THEME_JS . '/jquery.queryloader2-min.js', array(
						'jquery'
				) , false, false);
		}
}


add_action('wp_enqueue_scripts', 'helpme_preloader_script', 1);

/* header script */

add_action('wp_head', 'helpme_header_scripts', 1);
function helpme_header_scripts() { 
global $helpme_settings, $helpme_accent_color, $post, $helpme_json;
 $post_id = global_get_post_id();


?>
	
		 
	<script type="text/javascript">

          // Declare theme scripts namespace
          var helpme = {};
          var php = {};

          var helpme_images_dir = "<?php echo HELPME_THEME_IMAGES; ?>",
          helpme_theme_dir = "<?php echo HELPME_THEME_DIR_URI; ?>",
          helpme_theme_js_path = "<?php echo HELPME_THEME_JS;  ?>",
			helpme_captcha_placeholder = "<?php echo esc_html_e('Enter Captcha', 'helpme') ?>",
			helpme_captcha_invalid_txt = "<?php echo esc_html_e('Invalid. Try again.', 'helpme') ?>",
          helpme_captcha_correct_txt = "<?php echo esc_html_e('Captcha correct.', 'helpme') ?>",
          helpme_nav_res_width = <?php echo esc_js($helpme_settings['res-nav-width']); ?>,
          helpme_header_sticky = <?php echo (get_post_meta( $post_id, '_custom_bg', true ) == 'true') ? get_post_meta( $post_id, 'sticky-header', true ) : $helpme_settings['sticky-header']; ?>,
          helpme_grid_width = <?php echo esc_js($helpme_settings['grid-width']); ?>,
          helpme_preloader_logo = "<?php echo esc_url($helpme_settings['preloader-logo']['url']); ?>",
          helpme_header_padding = <?php echo esc_js($helpme_settings['header-padding']); ?>,
          helpme_accent_color = "<?php echo esc_attr($helpme_accent_color); ?>",
          helpme_squeeze_header = <?php echo isset($helpme_settings['squeeze-sticky-header']) ? $helpme_settings['squeeze-sticky-header'] : 1; ?>,
          helpme_logo_height = <?php echo ($helpme_settings['logo']['height']) ? $helpme_settings['logo']['height'] : 50; ?>,
          helpme_preloader_txt_color = "<?php echo ($helpme_settings['preloader-txt-color']) ? $helpme_settings['preloader-txt-color'] : '#fff'; ?>",
          helpme_preloader_bg_color = "<?php echo ($helpme_settings['preloader-bg-color']) ? $helpme_settings['preloader-bg-color'] : '#272e43'; ?>";
          helpme_preloader_bar_color = "<?php echo (isset($helpme_settings['preloader-bar-color'])) && (!empty($helpme_settings['preloader-bar-color'])) ? $helpme_settings['preloader-bar-color'] : $helpme_accent_color ; ?>",
          helpme_no_more_posts = "<?php echo esc_html_e('No More Posts', 'helpme'); ?>";
          helpme_header_structure = "<?php echo ((get_post_meta( $post_id, '_custom_bg', true ) == 'true') ? get_post_meta( $post_id, 'header-structure', true ) : $helpme_settings['header-structure']) ?>";
          helpme_boxed_header = "<?php echo ($helpme_settings['boxed-header']) ?>";

          <?php if($post_id) {
                  $helpme_header_trans_offset = get_post_meta($post_id, '_trans_header_offset', true ) ? get_post_meta($post_id, '_trans_header_offset', true ) : 0;
            ?> var helpme_header_trans_offset = <?php echo esc_attr($helpme_header_trans_offset); ?>;
          <?php } ?>
         </script>

<?php }

/* footer scripts */

add_action('wp_footer', 'helpme_footer_scripts', 0);
function helpme_footer_scripts() { 
global $helpme_settings, $helpme_accent_color, $post, $helpme_json;
 $post_id = global_get_post_id();


?>
<?php if($helpme_settings['custom-js']) : ?>
	<script type="text/javascript">
	// no dynamic data 
	<?php echo stripslashes($helpme_settings['custom-js']); ?>
	</script>

<?php endif; ?>
		

<?php
	global $helpme_dynamic_styles;

	$helpme_dynamic_styles_ids = array();
	$helpme_dynamic_styles_inject = '';

	$helpme_styles_length = count($helpme_dynamic_styles);

	if ($helpme_styles_length > 0) {
		foreach ($helpme_dynamic_styles as $key => $val) { 
			$helpme_dynamic_styles_ids[] = $val["id"]; 
			$helpme_dynamic_styles_inject .= $val["inject"];
		};
	}

?>
<script type="text/javascript">
	window.$ = jQuery

	var dynamic_styles = '<?php echo helpme_clean_init_styles($helpme_dynamic_styles_inject); ?>';
	var dynamic_styles_ids = (<?php echo json_encode($helpme_dynamic_styles_ids); ?> != null) ? <?php echo json_encode($helpme_dynamic_styles_ids); ?> : [];

	var styleTag = document.createElement('style'),
		head = document.getElementsByTagName('head')[0];

	styleTag.type = 'text/css';
	styleTag.setAttribute('data-ajax', '');
	styleTag.innerHTML = dynamic_styles;
	head.appendChild(styleTag);


	$('.helpme-dynamic-styles').each(function() {
		$(this).remove();
	});

	function ajaxStylesInjector() {
		$('.helpme-dynamic-styles').each(function() {
			var $this = $(this),
				id = $this.attr('id'),
				commentedStyles = $this.html();
				styles = commentedStyles
						 .replace('<!--', '')
						 .replace('-->', '');

			if(dynamic_styles_ids.indexOf(id) === -1) {
				$('style[data-ajax]').append(styles);
				$this.remove();
			}

			dynamic_styles_ids.push(id);
		});
	};
</script>

<?php }



?>
