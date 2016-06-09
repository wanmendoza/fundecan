<form class="helpme-searchform" method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
	<input type="text" class="text-input" placeholder="<?php esc_html_e('Type your keyword', 'helpme'); ?>" value="<?php if(!empty($_GET['s'])) echo get_search_query(); ?>" name="s" id="s" />
	<i class="helpme-icon-search"><input value="" type="submit" class="search-button" type="submit" /></i>
</form> 