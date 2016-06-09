<?php
function theme_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent-comment') ?> id="li-comment-<?php comment_ID() ?>">
		<div class="helpme-single-comment" id="comment-<?php comment_ID(); ?>">
			<div class="gravatar"><?php echo get_avatar( $comment, $size='80', $default='' ); ?></div>
			<div class="comment-meta">
					<?php printf( '<span class="comment-author">%s</span>', get_comment_author_link() ) ?>	
                    <?php edit_comment_link( '', '', '' ) ?>
                    <time class="comment-time"><?php echo get_comment_time('F jS, Y h:i A'); ?></time>
			</div>
			<span class="comment-reply">
					<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => esc_html__('reply', 'helpme') ) ) ) ?>
			</span>
			<div class="clearboth"></div>
			<div class="comment-content">

					<?php comment_text() ?>

<?php if ( $comment->comment_approved == '0' ) : ?>
					<span class="unapproved"><?php esc_html_e( 'Your comment is awaiting moderation.', 'helpme' );?></span>
<?php endif; ?>
				
			</div>

		       
		</div>		
<?php
}

function list_pings( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
?>

<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>"> 
		<div id="comment-<?php comment_ID(); ?>" class="comment-wrap comments-pings">

			<div class="comment-content">

				<div class="comment-meta">

					<?php printf( '<span class="comment_author"><b>%s</b></span>', get_comment_author_link() ) ?>

				</div>
				<div class="comment-data">
					<?php comment_text() ?>

								<time class="comment-time"><?php echo get_comment_time('F jS, Y h:i A'); ?></time>
<?php if ( $comment->comment_approved == '0' ) : ?>
					<span class="unapproved"><?php esc_html_e('Your comment is awaiting moderation.', 'helpme') ?></span>
<?php endif; ?>
				</div>
                <div class="clearboth"></div>
	</div>





<?php } ?>

<section id="comments">
<?php if ( post_password_required() ) : ?>
	<p class="nopassword"><?php esc_html_e( 'This post is password protected. Enter the password to view any comments.', 'helpme' );?></p>
</section><!-- #comments -->
<?php
return;
endif;

if ( have_comments() ) : ?>
	<div class="single-post-fancy-title"><span><?php printf( _n( 'Comments', 'Showing %s comments', get_comments_number(), 'helpme' ),
	number_format_i18n( get_comments_number() )); ?></span></div>
	<ul class="helpme-commentlist">
		<?php
wp_list_comments( 'callback=theme_comments&type=comment' );
?>
	</ul>





<?php
if ( have_comments() ) : ?>
<?php if ( ! empty( $comments_by_type['pings'] ) ) : ?>
<div class="single-post-fancy-title"><span><?php esc_html_e( 'pingbacks / trackbacks', 'helpme' ); ?></span></div>

<ul class="helpme-commentlist">
<?php wp_list_comments( 'callback=list_pings&type=pings' ); ?>
</ul>
<?php endif; endif; ?>

<?php else :
	if ( ! comments_open() ) :
		endif;
	endif;
?>

 <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav class="comments-navigation">
		<div class="comments-previous"><?php previous_comments_link(); ?></div>
		<div class="comments-next"><?php next_comments_link(); ?></div>
	</nav>
<?php endif;?>

	<?php if ( comments_open() ) : ?>

	<?php
	
		$fields =  array(
			'author'=> '<div class="comment-form-name comment-form-row"><i class="helpme-icon-user"></i><input type="text" name="author" class="text-input" id="author" tabindex="54" placeholder="'.esc_html__('FULL NAME', 'helpme').'"  /></div>',
			'email' => '<div class="comment-form-email comment-form-row"><i class="helpme-icon-envelope-o"></i><input type="text" name="email" class="text-input" id="email" tabindex="56" placeholder="'.esc_html__('EMAIL ADDRESS', 'helpme').'" /></div>',
			'url' 	=> '<div class="comment-form-website comment-form-row"><i class="helpme-icon-globe"></i><input type="text" name="url" class="text-input" id="url" tabindex="57" placeholder="'.esc_html__('WEBSITE', 'helpme').'" /></div>',
		);

		//Comment Form Args
        $comments_args = array(
			'fields' => $fields,
			'title_reply'=>'<div class="single-post-fancy-title"><span>'.esc_html__('Leave a Comment', 'helpme').'</span></div>',
			'comment_field' => '<div class="comment-textarea"><textarea placeholder="'.esc_html__('LEAVE YOUR COMMENT', 'helpme').'" class="textarea" name="comment" rows="8" id="comment" tabindex="58"></textarea></div>',
			'comment_notes_before' => '',
			'comment_notes_after' => '',
			'label_submit' => esc_html__('POST COMMENT','helpme')
		);
		comment_form($comments_args); 
	?>

<?php endif; ?>


</section>
