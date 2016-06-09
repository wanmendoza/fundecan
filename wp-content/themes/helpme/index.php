<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */

$blog_style = $helpme_settings['archive-loop-style'];
$column = $helpme_settings['archive-columns'];
$layout = $helpme_settings['archive-layout'];

get_header(); ?>
<div id="theme-page">
	<div class="helpme-main-wrapper-holder">
	<div class="theme-page-wrapper  <?php echo esc_attr($layout); ?>-layout  helpme-grid row-fluid">
	<div class="inner-page-wrapper">
		<div class="theme-content" itemprop="mainContentOfPage">
			<?php 
			/* Run the blog loop shortcode to output the posts. */
			if(function_exists('custom_vc_init') && class_exists('WPBakeryShortCode')){
			echo do_shortcode( '[helpme_blog order="DESC" orderby="date" style="'.$blog_style.'" column="'.$column.'"]' );
			
			}else{
				
				$id = uniqid();
				$paged = (get_query_var('paged')) ? get_query_var('paged') : ((get_query_var('page')) ? get_query_var('page') : 1);

					$count = '';
					$query = array(
						'post_type' => 'post',
						'posts_per_page' => (int) $count,
						'paged' => $paged,
						'suppress_filters' => 0,
						'ignore_sticky_posts' => 1
					);
				

				$query['paged'] = $paged;

				$r = new WP_Query($query);

				$grid_width    = $helpme_settings['grid-width'];
				$content_width = $helpme_settings['content-width'];
				$item_id = (!empty($item_id)) ? $item_id : 1409305847;
				$atts   = array(
					'layout' => 'right',
					'style' => 'classic',
					'column' => 'one',
					'image_height' => 400,
					'disable_meta' => 'false',
					'thumb_column' => 1,
					'classic_excerpt' => 200,
					'grid_avatar' => 'true',
					'read_more' => 'true',
					'grid_width' => $grid_width,
					'content_width' => $content_width,
					'image_width' => 770,
					'excerpt_length' => 200,
					'cropping' => 'true',
					//'slideshow_layout' => $slideshow_layout,
					'author' => 'false',
					'scroll' => 'false',
					'item_id' => $item_id,
					'item_row' => 1
				);
				echo '<div class="loop-main-wrapper"><section id="helpme-blog-loop-' . $id . '"  class="helpme-blog-container clearfix helpme-classic-wrapper">' . "\n";

				$i = 0;

					if (have_posts()):
						while (have_posts()):
							the_post();
							$i++;
									echo blog_classic_style($atts);

						endwhile;
					endif;
					
				echo '</section><div class="clearboth"></div></div>';
				helpme_theme_blog_pagenavi('', '', $r, $paged);	
				
			}
			
			?>
					<div class="clearboth"></div>
		</div>
		<?php 
			if($layout != 'full') get_sidebar();
		?>	
				<div class="clearboth"></div>
		</div>
	</div>
	</div>
</div>
<?php get_footer(); ?>