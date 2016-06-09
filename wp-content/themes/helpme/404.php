<?php 
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage HelpMe
 * @since HelpMe 1.0
 */


$helpme_settings;
$layout = $helpme_settings['error-layout'];
$error_temp = $helpme_settings['error_page'];
$error_small_text = $helpme_settings['error_page_small_text'];
get_header(); ?>
<div id="theme-page">
	<div class="helpme-main-wrapper-holder">
		<div class="theme-page-wrapper helpme-main-wrapper <?php echo esc_attr($layout); ?>-layout helpme-grid vc_row-fluid">
			<div class="inner-page-wrapper">
			<div class="theme-content" itemprop="mainContentOfPage">
			<div class="error-404-wrapper">
			
			<?php if($error_temp == 1){
			echo do_shortcode( '[vc_row margin_top="0" margin_bottom="30px"][vc_column][helpme_fancy_title style="standard" tag_name="h5" border_width="0" size="36" line_height="36" color="" font_weight="bold" text_transform="none" letter_spacing="2" font_family="Montserrat" font_type="google" margin_top="0" margin_bottom="0" align="center"]'.esc_html__("O00ps!! Error", "helpme").'[/helpme_fancy_title][helpme_fancy_title style="standard" tag_name="h1" border_width="0" size="200" line_height="160" color="#82b541" font_weight="bold" text_transform="uppercase" letter_spacing="5" font_family="Montserrat" font_type="google" margin_top="0" margin_bottom="0" align="center"]404[/helpme_fancy_title][helpme_fancy_title style="standard" tag_name="h5" border_width="0" size="36" line_height="36" color="" font_weight="bold" text_transform="none" letter_spacing="2" font_family="Montserrat" font_type="google" margin_top="0" margin_bottom="30" align="center"]Page not found[/helpme_fancy_title][helpme_custom_box padding_vertical="0" padding_horizental="200" margin_bottom="0"][vc_column_text]

'.esc_html__("Far far away, behind the word mountains, far from the countries Vokalia and there live the blind texts. Sepraed. they live in Boo marksgrove right at the coast of the Semantics, a large language ocean A small river named Duden flows by their place and su plies it with the necessary regelialia Even the all powe ful Pointing.", "helpme").'

[/vc_column_text]
[/helpme_custom_box][/vc_column][/vc_row]');
			
			}elseif($error_temp == 2){
				echo do_shortcode( '[vc_row margin_top="150px" margin_bottom="30px"][vc_column][helpme_fancy_title style="standard" tag_name="h1" border_width="0" size="200" line_height="160" color="#82b541" font_weight="bolder" text_transform="uppercase" letter_spacing="5" font_family="Lato" font_type="google" margin_top="0" margin_bottom="0" align="center"]'.esc_html__("404", "helpme").'[/helpme_fancy_title][helpme_fancy_title style="standard" border_width="0" size="36" line_height="36" color="#82b541" font_weight="bold" text_transform="uppercase" letter_spacing="2" font_family="Lato" font_type="google" margin_top="0" margin_bottom="30" align="center"]Page not found[/helpme_fancy_title][helpme_custom_box padding_vertical="0" padding_horizental="200" margin_bottom="0"][vc_column_text]

'.$error_small_text.'

[/vc_column_text]

[/helpme_custom_box][/vc_column][/vc_row]');
			
				
			}
 ?>

			<div class="searchform" style="text-align:center;"><?php get_search_form(); ?></div>
			</div>
			</div>
		<?php if($layout != 'full') get_sidebar(); ?>	
		<div class="clearboth"></div>	
		</div>
		</div>
		<div class="clearboth"></div>
	</div>
</div>
<?php get_footer(); ?>