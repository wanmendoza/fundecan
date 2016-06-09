<?php 



$layout = $helpme_settings['archive-layout'];
$columns = $helpme_settings['archive-columns'];
$loop_style = $helpme_settings['archive-loop-style'];
$portfolio_loop_style = !empty($helpme_settings['portfolio-archive-loop-style']) ? $helpme_settings['portfolio-archive-loop-style'] : 'grid';

if(empty($layout)) {
	$layout = 'right';
}



get_header(); ?>
<div id="theme-page">
	<div class="helpme-main-wrapper-holder">
		<div class="theme-page-wrapper helpme-main-wrapper <?php echo esc_attr($layout); ?>-layout helpme-grid vc_row-fluid">
			<div class="inner-page-wrapper">
			<div class="theme-content" itemprop="mainContentOfPage">	
				<?php echo do_shortcode( '[helpme_causes style="column"  column="'.$columns.'" pagination_style="1"]' );	?>	
			</div>
		<?php if($layout != 'full') get_sidebar(); ?>	
		<div class="clearboth"></div>	
		</div>
		</div>
		<div class="clearboth"></div>
	</div>	
</div>

<?php get_footer(); ?>