<?php

//Grabs portfolio single layout from meta value
$layout = get_post_meta( $post->ID, '_layout', true );
$single_featured = get_post_meta( $post->ID, '_single_featured', true );
$related_project = get_post_meta( $post->ID, '_portfolio_related_project', true );



$image_height = $helpme_settings['Portfolio-single-image-height'];
$featured_image = $helpme_settings['portfolio-single-image'];
$image_width = helpme_content_width( $layout );

$padding = get_post_meta( $post->ID, '_padding', true );
$padding = ($padding == 'true') ? 'no-padding' : '';

get_header();

if ( have_posts() ) while ( have_posts() ) : the_post();
	
$post_type = get_post_format( get_the_id() );


?>

<div id="theme-page">
	<div class="background-img background-img--page"></div>
	<div class="helpme-main-wrapper-holder">
	<div class="theme-page-wrapper single-portfolio-wrap <?php echo esc_attr($layout); ?>-layout helpme-grid vc_row-fluid <?php echo esc_attr($padding); ?>">
		<div class="theme-content-inner">
		<div class="theme-content single-portfolio <?php echo esc_attr($padding); ?>">
			<article id="portfolio-post-<?php the_ID(); ?>" class="portfolio-single-page">

				<?php
				if($single_featured != 'false'):
						if($featured_image) :

						if ( $post_type == 'gallery' ) {
							$attachment_ids = get_post_meta( get_the_id(), '_gallery_images', true );
							
							echo '<div class="single-portfolio-slideshow">' . do_shortcode( '[helpme_image_slideshow images="'.$attachment_ids.'" image_width="'.$image_width.'" image_height="'.$image_height.'" effect="slide" animation_speed="700" slideshow_speed="7000" pause_on_hover="false" direction_nav="true"]' ) . '</div>';

						} else if ( $post_type == 'image' || $post_type == 'standard' ) {

								$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
								if(isset($helpme_settings['portfolio-image-crop']) && $helpme_settings['portfolio-image-crop'] == 0) {
									$image_src = $image_src_array[ 0 ];
								} else {
									$image_src = bfi_thumb( $image_src_array[ 0 ], array('width' => $image_width, 'height' => $image_height, 'crop'=>true));
								}	

								echo '<div class="portfolio-featured-image">';
								echo '<a href="'.$image_src_array[ 0 ].'" class="helpme-lightbox"><img alt="'.get_the_title().'" title="'.get_the_title().'" src="'.helpme_thumbnail_image_gen($image_src, $image_width, $image_height).'" height="'.$image_height.'" width="'.$image_width.'" itemprop="image" /></a>';
								echo '</div>';

							} else if ( $post_type == 'video' ) {
								$link = get_post_meta( $post->ID, '_video_url', true );
								if ( $link ) {
									$wp_embed = $GLOBAL['wp_embed'];
									echo '<div class="helpme-video-wrapper"><div class="helpme-video-container">'.$wp_embed->run_shortcode( '[embed]'.$link.'[/embed]' ).'</div></div>';
								}
							}
						endif;	
				endif;		
				?>

				<section class="portfolio-single-content <?php echo esc_attr($padding); ?>" itemprop="mainContentOfPage">
						<?php the_content(); ?>
						<div class="clearboth"></div>
						<?php if($helpme_settings['blog-single-social-share']) : ?>
				<div class="single-social-share-wrap">
					<ul class="single-social-share">
						<li><a class="facebook-share" data-title="<?php the_title(); ?>" data-url="<?php echo get_permalink(); ?>" href="#"><i class="helpme-icon-facebook"></i></a></li>
						<li><a class="twitter-share" data-title="<?php the_title(); ?>" data-url="<?php echo get_permalink(); ?>" href="#"><i class="helpme-icon-twitter"></i></a></li>
						<li><a class="googleplus-share" data-title="<?php the_title(); ?>" data-url="<?php echo get_permalink(); ?>" href="#"><i class="helpme-icon-google-plus"></i></a></li>
						<li><a class="linkedin-share" data-title="<?php the_title(); ?>" data-url="<?php echo get_permalink(); ?>" href="#"><i class="helpme-icon-linkedin"></i></a></li>
						<?php $image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true ); ?>
						<li><a class="pinterest-share" data-image="<?php echo esc_url($image_src_array[0]); ?>" data-title="<?php the_title(); ?>" data-url="<?php echo get_permalink(); ?>" href="#"><i class="helpme-icon-pinterest"></i></a></li>
					</ul>
				</div>
				<?php endif; ?>

				<nav class="helpme-next-prev">
					<div class="helpme-next-prev-wrap"><?php previous_post_link( '%link', esc_html__('Previous post', 'helpme'));  ?></div>
					<div class="helpme-next-prev-wrap"><?php next_post_link( '%link', esc_html__('Next post', 'helpme')); ?> </div>
				   <div class="clearboth"></div>
				</nav>
				</section>

				<div class="clearboth"></div>
				
			</article>


		<?php /* Related Posts */ 
			//if ( $helpme_settings['portfolio-single-related'] && $related_project != 'false' ) {
				//$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
		?>
		
		<!--<div class="single-post-fancy-title"><span>// esc_html_e( 'Related Projects', 'helpme' ); </span>
			
		</div>-->
		<?php 
			//do_action( 'portfolio_related_posts', $layout );} 
			?>


		<?php /* Comments section */ ?>
		<?php //if ( $helpme_settings['portfolio-single-comments'] == 1 ) {
			//comments_template( '', true );}
		?>

		</div>
		<?php endwhile; ?>
		<?php  if ( $layout != 'full' ) get_sidebar();  ?>
		<div class="clearboth"></div>
	</div>
	</div>
	</div>
</div>
<?php get_footer(); ?>
