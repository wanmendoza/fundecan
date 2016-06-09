<?php


$layout = get_post_meta( $post->ID, '_layout', true );

if(empty($layout)) {
	$layout = 'right';
	
}

$image_height = $helpme_settings['blog-single-image-height'];
$image_width = helpme_content_width($layout);

$padding = get_post_meta( $post->ID, '_padding', true );
$padding = ($padding == 'true') ? 'no-padding' : '';

$show_featured = get_post_meta( $post->ID, '_featured_image', true );
$show_featured = (isset($show_featured) && !empty($show_featured)) ? $show_featured  : 'true' ;

$show_meta = get_post_meta( $post->ID, '_meta', true );
$show_meta = (isset($show_meta) && !empty($show_meta)) ? $show_meta  : 'true' ;

function social_networks_meta() {
	$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
	$output  = '<meta property="og:site_name" content="'.get_bloginfo('name').'"/>'. "\n";
	$output .= '<meta property="og:image" content="'.$image_src_array[ 0 ].'"/>'. "\n";
	$output .= '<meta property="og:url" content="'.get_permalink().'"/>'. "\n";
	$output .= '<meta property="og:title" content="'.get_the_title().'"/>'. "\n";
	$output .= '<meta property="og:description" content="'.get_the_excerpt().'"/>'. "\n";
	$output .= '<meta property="og:type" content="article"/>'. "\n";
	echo '<div>'.$output.'</div>';
}
add_action('wp_head', 'social_networks_meta');

get_header(); ?>

<div id="theme-page" class="helpme-blog-single">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post();
		$post_type = (get_post_format( get_the_id()) == '0' || get_post_format( get_the_id()) == '') ? 'image' : get_post_format( get_the_id());
		$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
		if(isset($helpme_settings['blog-image-crop']) && $helpme_settings['blog-image-crop'] == 0) {
			$image_src = $image_src_array[ 0 ];
		} else {
			$image_src = bfi_thumb( $image_src_array[ 0 ], array('width' => $image_width, 'height' => $image_height, 'crop'=>true));
		}
	?>
	<div class="helpme-main-wrapper-holder">
	<div class="theme-page-wrapper <?php echo esc_attr($layout); ?>-layout helpme-grid vc_row-fluid <?php echo esc_attr($padding); ?>">
	<div class="theme-inner-wrapper">
			<div class="theme-content <?php echo esc_attr($padding); ?>" id="blog-entry-<?php the_ID(); ?>" <?php post_class(); ?> itemprop="mainContentOfPage">
			<div class="inner-content">
		<?php if($show_featured == 'true') :

			if(isset($helpme_settings['blog-featured-image']) && $helpme_settings['blog-featured-image'] == 1) {

			if($post_type == 'image' || $post_type == 'portfolio') { ?>

					<?php if(has_post_thumbnail()) : ?>
							<div class="featured-image">
								<a href="<?php echo esc_url($image_src_array[ 0 ]); ?>" class="helpme-lightbox"><img alt="<?php the_title(); ?>" title="<?php the_title(); ?>" src="<?php echo helpme_thumbnail_image_gen($image_src, $image_width, $image_height); ?>" height="<?php echo esc_attr($image_height); ?>" width="<?php echo esc_attr($image_width); ?>" itemprop="image" /></a>
							</div>
					<?php endif; ?>

			<?php } elseif($post_type == 'video') {
			$link = get_post_meta( $post->ID, '_video_url', true );
			if ( $link) {
				$wp_embed = $GLOBALS['wp_embed'];
				echo '<div class="helpme-video-wrapper"><div class="helpme-video-container">'.$wp_embed->run_shortcode( '[embed]'.$link.'[/embed]' ).'</div></div>';
			}

			} elseif($post_type == 'audio') {
				if(has_post_thumbnail()) : ?>
						<div class="featured-image">
							<img alt="<?php the_title(); ?>" title="<?php the_title(); ?>" src="<?php echo esc_url($image_src); ?>" height="<?php echo esc_attr($image_height); ?>" width="<?php echo esc_attr($image_width); ?>" itemprop="image" />
						</div>
				<?php endif;
				$mp3_file  = get_post_meta( $post->ID, '_mp3_file', true );
				$ogg_file  = get_post_meta( $post->ID, '_ogg_file', true );
				$iframe  = get_post_meta( $post->ID, '_audio_iframe', true );
				if(empty($iframe)) {
					echo do_shortcode( '[helpme_audio mp3_file="'.$mp3_file.'" ogg_file="'.$mp3_file.'"]' );
				} else {
					echo '<div class="audio-iframe">'.$iframe.'</div>';
				}


		 	}else if($post_type == 'gallery') {

		 		$attachment_ids = get_post_meta( get_the_id(), '_gallery_images', true );
				echo '<div class="single-blog-gallery-type">';
				echo do_shortcode( '[helpme_image_slideshow images="'.$attachment_ids.'" image_width="'.$image_width.'" image_height="'.$image_height.'" animation_speed="700" slideshow_speed="7000" direction_nav="true"]' );
				echo '</div>';
		 	}
	 	}?>
	 	<?php endif; ?>


 		<?php
 		if($show_meta == 'true') :
 		/* Meta section */ ?>
			<div class="entry-meta">
				<div class="item-holder">
					<time datetime="<?php the_time( 'F jS, Y' ) ?>" itemprop="datePublished" pubdate>
							<a href="<?php get_month_link( the_time( "Y" ), the_time( "m" ) ) ?>"><?php the_date() ?></a>
					</time>
					<div class="blog-categories"><?php the_category( ', ' ); ?></div>
					<a href="#comments" class="blog-comments"><i class="helpme-icon-comment"></i><span> <?php echo comments_number( '0', '1', '%'); ?></span></a>
					<div class="helpme-love-holder"><?php echo helpme_love_this(); ?></div>
					<span class="single-type-icon"><i class="helpme-post-type-icon-<?php echo esc_attr($post_type); ?>"></i></span>
					<div class="clearboth"></div>
				</div>
			</div>
		<?php endif; ?>
		<?php /* end of meta section */ ?>


		<div class="single-content">
			<?php the_content(); ?>
		</div>


		<?php wp_link_pages('before=<div class="helpme-page-links">&after=</div>'); ?>
		
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


		


		


		<div class="clearboth"></div>
</div>
<div class="inner-content">
		<?php /* About Author section */
			if($helpme_settings['blog-single-about-author']) :
		?>
		<div class="about-author-wrapper">
			<div class="item-holder">
				<?php $user = isset($GLOBALS['user']); ?>
				<div class="avatar-box"><?php  echo get_avatar( get_the_author_meta('email'), '150',false ,get_the_author_meta('display_name', $user['ID'])); ?></div>

				<div class="about-author-inner">
					<a class="author-name helpme-skin-color" href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author_meta('display_name'); ?></a>
					<div class="author-desc"><?php the_author_meta('description'); ?></div>
				</div>
			<div class="clearboth"></div>
			</div>
		</div>
		<?php endif; /* end of About Author section */ ?>
<div class="clearboth"></div>
</div>

<div class="inner-content">
<?php
//do_action('blog_related_posts', $layout);

if($helpme_settings['blog-single-comments']) {
		comments_template( '', true );
}

?>
<div class="clearboth"></div>
</div>


</div>
<?php endwhile; ?>


<?php  if($layout != 'full') get_sidebar();  ?>
<div class="clearboth"></div>

</div>
</div>
</div>
</div>
<?php get_footer(); ?>
