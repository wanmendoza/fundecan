<?php

/* - WPML compatibility - */
if(defined('ICL_SITEPRESS_VERSION') && defined('ICL_LANGUAGE_CODE')) 
{
	if(!function_exists('helpme_wpml_language_switch'))
	{
		function helpme_wpml_language_switch()
		{
			$languages = icl_get_languages('skip_missing=0&orderby=id');
			$output = "";
			
			if(is_array($languages))
			{
				
	       		$output .= '<div class="helpme-language-nav"><a href="#"><i class="helpme-icon-globe"></i>'. esc_html__('Languages', 'helpme').'</a>';
				$output .= '<div class="helpme-language-nav-sub-wrapper"><div class="helpme-language-nav-sub">';
				$output .= "<ul class='helpme-language-navigation'>";	
				foreach($languages as $lang)
				{
					$output .= "<li class='language_".$lang['language_code']."'><a href='".$lang['url']."'>";
					$output .= "<span class='helpme-lang-flag'><img title='".$lang['native_name']."' src='".$lang['country_flag_url']."' /></span>";
					$output .= "<span class='helpme-lang-name'>".$lang['translated_name']."</span>";
					$output .= "</a></li>";
				}
				
				$output .= "</ul></div></div></div>";
			}
			
			echo '<div>'.$output.'</div>';
		}
	}	
}

