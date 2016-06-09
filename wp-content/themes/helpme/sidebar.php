<aside id="helpme-sidebar" class="helpme-builtin ">
    <div class="sidebar-wrapper">
	    <?php
		if(class_exists('Helpme_Theme')){
	    
	    if ( isset( $post ) ) {
			helpme_sidebar_generator( 'get_sidebar', $post->ID);

		}else {
			helpme_sidebar_generator( 'get_sidebar');
		}
		}
		?>
    </div>
</aside>
