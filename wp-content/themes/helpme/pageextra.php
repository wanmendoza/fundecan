<?php 
/*
Template Name: Custom Header

*/

$post_id = global_get_post_id();

$layout = get_post_meta($post_id, '_layout', true );
$padding = get_post_meta($post_id, '_padding', true );

if(empty($layout)) {
	$layout = 'right';
	
}

$padding = ($padding == 'true') ? 'no-padding' : '';

get_header(); ?>
<style>
@media (min-width:320px) { /* smartphones, iPhone, portrait 480x320 phones */ }
@media (min-width:481px) { /* portrait e-readers (Nook/Kindle), smaller tablets @ 600 or @ 640 wide. */ }
@media (min-width:641px) { /* portrait tablets, portrait iPad, landscape e-readers, landscape 800x480 or 854x480 phones */ }
@media (min-width:961px) { /* tablet, landscape iPad, lo-res laptops ands desktops */ }
@media (min-width:1025px) { 
	#helpme-header .helpme-grid{
		display: none;
	}

	header{
		display: none;
	}

	#theme-page .theme-page-wrapper.no-padding{
		margin-top:0px !important;
	}

	body.page #theme-page .theme-page-wrapper .theme-content.no-padding{
		padding-top:0px !important;
	}

	.menu_icons{
		padding-top:10px;
	    position: fixed;
    	z-index: 9;
    	width: 100%;
    	/*background: #D10572;*/
	}

	.menu_icons .menu_icons_list{
		text-align: center;
	}

	.menu_icons .menu_icons_list li{
		display: inline-block;
		vertical-align: top;
		background: #D10572;
	    border-radius: 300px;
	    width: 65px;
	    height: 65px;
	    padding: 0px;
	}
 }
@media (min-width:1281px) { /* hi-res laptops and desktops */ }
</style>
<div class="menu_icons">
  <ul class="menu_icons_list">
    <li>
    	<a href="#donde"  title="¿DÓNDE Y CUÁNDO SE CORRE?">
    		<img src="https://www.pandaton.mx/img/bnt_m_donde.png" alt="¿DÓNDE Y CUÁNDO SE CORRE?" id="donde_img" >
		</a>
	</li>
    <li>
    	<a href="#costo"  title="¿CUÁNTO CUESTA Y DÓNDE ME INSCRIBO?">
    		<img src="https://www.pandaton.mx/img/bnt_m_costo.png" alt="¿CUÁNTO CUESTA Y DÓNDE ME INSCRIBO?" id="cuanto_img" >
		</a>
	</li>
    <li >
    	<a href="#apoyo"  title="PANDATÓN">
    		<img src="https://www.pandaton.mx/img/bnt_m_que.png" alt="¿QUÉ ES EL PANDATÓN?" id="pandaton_img">
		</a>
	</li>
    <li>
    	<a href="#blog" title="¿A QUIENES VAMOS A APOYAR?">
    		<img src="<?php echo get_bloginfo('template_directory');?>/images/blogsymbol.png" alt="¿A QUIENES VAMOS A APOYAR?" id="apoyo_img" style="    width: 45px;vertical-align: middle;padding-top: 8px;">
		</a>
	</li>
	 <li style="margin-left:30px; margin-right:30px;">
    	<a href="#inicio" title="¿A QUIENES VAMOS A APOYAR?">
    		<img style="width:75px" src="<?php echo get_bloginfo('template_directory');?>/images/logofundecan.png" alt="¿A QUIENES VAMOS A APOYAR?" id="apoyo_img">
		</a>
	</li>
    <li style="margin-left:0px;">
    	<a href="#ganador" title="¿QUIÉN GANA?">
    		<img src="https://www.pandaton.mx/img/bnt_m_quien.png" alt="¿QUIÉN GANA?" id="quien_img" >
		</a>
	</li>
	  <li>
    	<a href="#twitter" title="¿QUIÉN ES EL PANDA?">
    		<img src="<?php echo get_bloginfo('template_directory');?>/images/twitter.png" alt="¿QUIÉN ES EL PANDA?" id="panda_img" style=" width: 45px;vertical-align: middle;padding-top: 8px;">
		</a>
	</li>
    <li>
    	<a href="#grupos" title="¿QUIÉN LO HACE POSIBLE?">
    		<img src="https://www.pandaton.mx/img/bnt_m_posible.png" alt="¿QUIÉN LO HACE POSIBLE?" id="posible_img" >
		</a>
	</li>
  
    <li>
    	<a href="#ayuda" title="PREGUNTAS FRECUENTES">
    		<img src="https://www.pandaton.mx/img/bnt_m_pf.png" alt="PREGUNTAS FRECUENTES" id="pf_img">
		</a>
	</li>
  </ul>
  
</div>
<div id="theme-page">
	<div class="helpme-main-wrapper-holder">
		<div class="theme-page-wrapper helpme-main-wrapper <?php echo esc_attr($layout); ?>-layout <?php echo esc_attr($padding); ?> helpme-grid vc_row-fluid">
			<div class="inner-page-wrapper">
				<div class="theme-content <?php echo esc_attr($padding); ?>" itemprop="mainContentOfPage">
				
				<?php 
					/* Hook to add content before content */	
					do_action('page_add_before_content');
				?>

					<?php if ( have_posts() ) while ( have_posts() ) : the_post();
						$helpme_settings = $GLOBALS['helpme_settings'];
					 ?>
							<?php the_content();?>
							<div class="clearboth"></div>
							<?php wp_link_pages('before=<div id="helpme-page-links">'.esc_html__('Pages:', 'helpme').'&after=</div>'); ?>

							<?php
							if(isset($helpme_settings['pages-comments']) && $helpme_settings['pages-comments'] == 1) {
								comments_template( '', true ); 	
							}
							?>
					<?php endwhile; ?>

				<?php 
					/* Hook to add content after content */	
					do_action('page_add_after_content'); 
				?>

				</div>
			<?php if($layout != 'full') get_sidebar(); ?>	
			<div class="clearboth"></div>	
			</div>
			<div class="clearboth"></div>
		</div>
	</div>
</div>
<?php get_footer(); ?>