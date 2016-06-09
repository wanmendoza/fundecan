<?php

/*
	RECENT POSTS
*/

class Designsvilla_Widget_Recent_Portfolio extends WP_Widget {

	function __construct() {
		$widget_ops = array( "classname" => "widget_recent_portfolio", "description" => "Displays the Recent Portfolio items" );
		WP_Widget::__construct( "recent_portfolio", HELPME_THEME_SLUG . " - Recent Portfolios", $widget_ops );
		$this-> alt_option_name = "widget_recent_portfolio";
	}


	function widget( $args, $instance ) {


		ob_start();
		extract( $args );


		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		if ( !$posts_number = (int) $instance['posts_number'] )
			$posts_number = 10;
		else if ( $posts_number < 1 )
				$posts_number = 1;
			else if ( $posts_number > 15 )
					$posts_number = 15;




			$query = array( 'showposts' => $posts_number, 'post_type' => 'portfolio', 'nopaging' => 0, 'orderby'=> 'date', 'order'=>'DESC', 'post_status' => 'publish', 'ignore_sticky_posts' => 1 );

			$cats = $instance["cats"];

			if ( $cats != '' ) {
					$query['tax_query'] = array(
						array(
							'taxonomy' => 'portfolio_category',
							'field' => 'slug',
							'terms' => $cats
						)
					);
			}


			$recent = new WP_Query( $query );

		if ( $recent-> have_posts() ) :
			$widget_id = $args['widget_id'];
			echo '<section id="'.$widget_id.'" class="widget widget_recent_portfolio">';


		if ( $title ) echo '<div class="widgettitle">'. $title.'</div>'; ?>

        <ul>

		<?php

		while ( $recent-> have_posts() ) : $recent -> the_post();
?>

        <li>
        	<div class="item-holder">
		        <div class="featured-image">
		        <?php $image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );
				$image_src = bfi_thumb( $image_src_array[ 0 ], array('width' => 300, 'height' => 300, 'crop'=>true));
		?>
					 <img alt="<?php the_title(); ?>" width="300" height="300" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" src="<?php echo helpme_thumbnail_image_gen($image_src, 300, 300); ?>"  />
					<div class="hover-overlay"></div>
					<div class="portfolio-meta">
						<a class="portfolio-permalink" href="<?php echo get_permalink(); ?>"><i class="helpme-icon-link"></i></a>
						</div>
		       	<div class="clearboth"></div>
       		</div>
       		</div>
       </li>

        <?php endwhile;  ?>

        </ul>
        <div class="clearboth"></div>
        <?php
		echo '</section>';

		wp_reset_postdata();


		endif;




	}


	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance["title"] = strip_tags( $new_instance["title"] );
		$instance["posts_number"] = (int) $new_instance["posts_number"];
		$instance["cats"] = $new_instance["cats"];

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset( $alloptions['Designsvilla_Widget_Recent_Portfolio'] ) )
			delete_option( 'Designsvilla_Widget_Recent_Portfolio' );

		return $instance;
	}






	function form( $instance ) {

		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$cats = isset( $instance['cats'] ) ? $instance['cats'] : array();

		if ( !isset( $instance['posts_number'] ) || !$posts_number = (int) $instance['posts_number'] )
			$posts_number = 4;

		$terms = get_terms( 'portfolio_category', 'hide_empty=1' );



?>
		<p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>">Title:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<p><label for="<?php echo esc_attr($this->get_field_id( 'posts_number' )); ?>">Number of posts:</label>
		<input id="<?php echo esc_attr($this->get_field_id( 'posts_number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'posts_number' )); ?>" type="text" value="<?php echo esc_attr($posts_number); ?>" class="widefat" /></p>

		<p><label for="<?php echo esc_attr($this->get_field_id( 'cats' )); ?>">Which Categories to show?</label>
			<select style="height:150px" name="<?php echo esc_attr($this->get_field_name( 'cats' )); ?>[]" id="<?php echo esc_attr($this->get_field_id( 'cats' )); ?>" class="widefat" multiple="multiple">
				<?php
				if ( is_array( $terms ) && !empty( $terms ) ) {
				 	foreach ( $terms as $term ):?>
					<option value="<?php echo esc_attr($term->slug);?>"<?php echo in_array( $term->slug, $cats )? ' selected="selected"':'';?>><?php echo esc_attr($term->name);?></option>
				<?php endforeach;
				}
				?>
			</select>
		</p>
<?php


	}
}

/***************************************************/
