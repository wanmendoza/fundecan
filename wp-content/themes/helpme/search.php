<?php 
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage HelpMe
 * @since HelpMe 1.0
 */

$layout = $helpme_settings['search-layout'];


get_header(); ?>
<div id="theme-page">
	<div class="helpme-main-wrapper-holder">
	<div class="theme-page-wrapper helpme-main-wrapper <?php echo esc_attr($layout); ?>-layout helpme-grid vc_row-fluid">
		<div class="inner-page-wrapper">
		<div class="theme-content" itemprop="mainContentOfPage">
		<section class="helpme-search-loop">	
		<?php

				if ( have_posts() ):
					while ( have_posts() ) :
						the_post();

						$post_type =  get_post_type();
				?>

					<article class="blog-list-entry">


						<?php /* Search post type icons that defines result post type */ ?>
						<div class="list-posttype-col">
							<a href="<?php echo get_permalink(); ?>" class="post-type-icon"><i class="helpme-theme-icon-<?php echo esc_attr($post_type); ?>"></i></a>
						</div>
						<?php /******** ?>



						<? /* Search content column that has all the data */ ?>
						<div class="list-content-col">
								<h5 class="the-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h5>

								<div class="listtype-meta">
									
									<?php if($post_type != 'page') : ?>
									<time datetime="<?php the_time( 'F, j' ); ?>" itemprop="datePublished" pubdate>
										<a href="<?php echo get_month_link( get_the_time( "Y" ), get_the_time( "m" ) ); ?>"><?php the_date(); ?></a>
									</time>
									<?php endif; ?>


									<?php if($post_type == 'post') { ?>

									<span><?php echo get_the_category_list( ', ' ); ?></span>
									
									<?php } elseif ($post_type == 'portfolio') { ?>

									<span><?php echo implode( ', ', helpme_get_portfolio_tax($post->ID, false) ); ?></span>
									<?php }  elseif ($post_type == 'causes') { ?>

									<span><?php echo implode( ', ', helpme_get_causes_tax($post->ID, false) ); ?></span>
									<?php } ?>
									

								</div>

								<!--<div class="the-excerpt"><?php //the_excerpt(); ?></div>-->
						</div>
						<?php /**********/ ?>
				</article>

				<?php

				endwhile;
				
				helpme_theme_blog_pagenavi($before = '', $after = '', NULL, $paged);
				
				wp_reset_postdata();

				else :
?>

				<div class="search-wrap">
					<h3><?php esc_html_e('Nothing Found', 'helpme'); ?></h3>
					<p><?php esc_html_e('Sorry, Nothing found! Try searching a different phrase.', 'helpme'); ?></p>


					<div class="searchform" style="text-align:center;">
					
						<?php get_search_form();

						

						?>
				
					</div>
					
				</div>
				<?php endif; ?>
			</section>
		</div>
	<?php if($layout != 'full') get_sidebar(); ?>	
	<div class="clearboth"></div>
		</div>
	</div>
	<div class="clearboth"></div>
	</div>
</div>
<?php get_footer(); ?>