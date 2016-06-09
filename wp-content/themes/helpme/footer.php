<?php 


$helpme_settings = $GLOBALS['helpme_settings'];
$template = '';
if(global_get_post_id()) {
	$template = get_post_meta( global_get_post_id(), '_template', true );

}

if($template != 'no-footer' && $template != 'no-header-footer' && $template != 'no-header-title-footer' && $template !='no-sub-footer-title' && $template !='no-title-footer-sub-footer') :

if($helpme_settings['footer'] == true && $template != 'no-footer-only' && $template != 'no-footer-title' && $template != 'no-header-title-only-footer' && $template != 'no-title-footer') : ?>
<section id="helpme-footer">
<div class="footer-wrapper helpme-grid">
<div class="helpme-padding-wrapper">
<?php

$footer_column = $helpme_settings['footer-layout'];

if(is_numeric($footer_column)):
	switch ( $footer_column ):
		case 1:
		$class = '';
			break;
		case 2:
			$class = 'helpme-col-1-2';
			break;
		case 3:
			$class = 'helpme-col-1-3';
			break;
		case 4:
			$class = 'helpme-col-1-4';
			break;
		case 5:
			$class = 'helpme-col-1-5';
			break;
		case 6:
			$class = 'helpme-col-1-6';
			break;		
	endswitch;
	for( $i=1; $i<=$footer_column; $i++ ):
?>
<?php if($i == $footer_column): ?>
<div class="<?php echo esc_attr($class); ?>"><?php helpme_sidebar_generator( 'get_footer_sidebar'); ?></div>
<?php else:?>
			<div class="<?php echo esc_attr($class); ?>"><?php helpme_sidebar_generator( 'get_footer_sidebar'); ?></div>
<?php endif;		
endfor; 

else : 

switch($footer_column):
		case 'third_sub_third':
?>
		<div class="helpme-col-1-3"><?php helpme_sidebar_generator( 'get_footer_sidebar'); ?></div>
		<div class="helpme-col-2-3">
			<div class="helpme-col-1-3"><?php helpme_sidebar_generator( 'get_footer_sidebar'); ?></div>
			<div class="helpme-col-1-3"><?php helpme_sidebar_generator( 'get_footer_sidebar'); ?></div>
			<div class="helpme-col-1-3"><?php helpme_sidebar_generator( 'get_footer_sidebar'); ?></div>
		</div>
<?php
			break;
		case 'sub_third_third':
?>
		<div class="helpme-col-2-3">
			<div class="helpme-col-1-3"><?php helpme_sidebar_generator( 'get_footer_sidebar'); ?></div>
			<div class="helpme-col-1-3"><?php helpme_sidebar_generator( 'get_footer_sidebar'); ?></div>
			<div class="helpme-col-1-3"><?php helpme_sidebar_generator( 'get_footer_sidebar'); ?></div>
		</div>
		<div class="helpme-col-1-3"><?php helpme_sidebar_generator( 'get_footer_sidebar'); ?></div>
<?php
			break;
		case 'third_sub_fourth':
?>
		<div class="helpme-col-1-3"><?php helpme_sidebar_generator( 'get_footer_sidebar'); ?></div>
		<div class="helpme-col-2-3 last">
			<div class="helpme-col-1-4"><?php helpme_sidebar_generator( 'get_footer_sidebar'); ?></div>
			<div class="helpme-col-1-4"><?php helpme_sidebar_generator( 'get_footer_sidebar'); ?></div>
			<div class="helpme-col-1-4"><?php helpme_sidebar_generator( 'get_footer_sidebar'); ?></div>
			<div class="helpme-col-1-4"><?php helpme_sidebar_generator( 'get_footer_sidebar'); ?></div>
		</div>
<?php
			break;
		case 'sub_fourth_third':
?>
		<div class="helpme-col-2-3">
			<div class="helpme-col-1-4"><?php helpme_sidebar_generator( 'get_footer_sidebar'); ?></div>
			<div class="helpme-col-1-4"><?php helpme_sidebar_generator( 'get_footer_sidebar'); ?></div>
			<div class="helpme-col-1-4"><?php helpme_sidebar_generator( 'get_footer_sidebar'); ?></div>
			<div class="helpme-col-1-4"><?php helpme_sidebar_generator( 'get_footer_sidebar'); ?></div>
		</div>
		<div class="helpme-col-1-3"><?php helpme_sidebar_generator( 'get_footer_sidebar'); ?></div>
<?php
			break;
		case 'half_sub_half':
?>
		<div class="helpme-col-1-2"><?php helpme_sidebar_generator( 'get_footer_sidebar'); ?></div>
		<div class="helpme-col-1-2">
			<div class="helpme-col-1-2"><?php helpme_sidebar_generator( 'get_footer_sidebar'); ?></div>
			<div class="helpme-col-1-2"><?php helpme_sidebar_generator( 'get_footer_sidebar'); ?></div>
		</div>
<?php
			break;
		case 'half_sub_third':
?>
		<div class="helpme-col-1-2"><?php helpme_sidebar_generator( 'get_footer_sidebar'); ?></div>
		<div class="helpme-col-1-2">
			<div class="helpme-col-1-3"><?php helpme_sidebar_generator( 'get_footer_sidebar'); ?></div>
			<div class="helpme-col-1-3"><?php helpme_sidebar_generator( 'get_footer_sidebar'); ?></div>
			<div class="helpme-col-1-3"><?php helpme_sidebar_generator( 'get_footer_sidebar'); ?></div>
		</div>
<?php
			break;
		case 'sub_half_half':
?>
		<div class="helpme-col-1-2">
			<div class="helpme-col-1-2"><?php helpme_sidebar_generator( 'get_footer_sidebar'); ?></div>
			<div class="helpme-col-1-2"><?php helpme_sidebar_generator( 'get_footer_sidebar'); ?></div>
		</div>
		<div class="helpme-col-1-2"><?php helpme_sidebar_generator( 'get_footer_sidebar'); ?></div>
<?php
			break;
		case 'sub_third_half':
?>
		<div class="helpme-col-1-2">
			<div class="helpme-col-1-3"><?php helpme_sidebar_generator( 'get_footer_sidebar'); ?></div>
			<div class="helpme-col-1-3"><?php helpme_sidebar_generator( 'get_footer_sidebar'); ?></div>
			<div class="helpme-col-1-3"><?php helpme_sidebar_generator( 'get_footer_sidebar'); ?></div>
		</div>
		<div class="helpme-col-1-2"><?php helpme_sidebar_generator( 'get_footer_sidebar'); ?></div>
<?php
			break;
	endswitch;
endif;?> 
<div class="clearboth"></div>      
</div>
</div>
<div class="clearboth"></div>
<?php endif;?>

<?php if ( $helpme_settings['sub-footer'] == true && $template != 'no-sub-footer' && $template != 'no-title-sub-footer') { ?>
<div id="sub-footer">
	<div class="helpme-grid">
		<div class="item-holder">
		
    	<span class="helpme-footer-copyright"><?php echo esc_attr($helpme_settings['footer-copyright']); ?></span>

    	<?php do_action('subfooter_social'); ?>
    	<?php do_action('subfooter_logos'); ?>

		</div>
	</div>
	<div class="clearboth"></div>

</div>
<?php } ?>

</section>




<?php endif; ?>

</div><!-- End boxed layout -->
<a href="#" class="helpme-go-top"><i class="helpme-icon-angle-up"></i></a>
</div><!-- End Theme main Wrapper -->



<?php 
if($helpme_settings['header-location'] == 'bottom') {
$header_padding_type = $helpme_settings['sticky-header'] ? 'sticky-header' : 'none-sticky-header'; ?>
<div class="bottom-header-padding <?php echo esc_attr($header_padding_type) ?>"></div>
<?php 
}
?>



<?php wp_footer(); ?>
</body>
</html>
