<?php

extract( shortcode_atts( array(
            'title' => '',
            'email' => get_bloginfo( 'admin_email' ),
            'style' => 'classic',
            'skin' => 'dark',
            'skin_color' => '',
            'btn_text_color' => '',
            'btn_hover_text_color' => '',
            'phone' => 'true',
            'captcha' => 'true',
            'el_class' => '',
        ), $atts ) );




$id = uniqid();
$tabindex_1 = $id;
$tabindex_2 = $id + 1;
$tabindex_3 = $id + 2;
$tabindex_4 = $id + 3;
$tabindex_5 = $id + 4;
$name_str = esc_html__( 'FULL NAME ', 'helpme' );
$email_str = esc_html__( 'EMAIL', 'helpme' );
$submit_str = esc_html__( 'SUBMIT', 'helpme' );
$content_str = esc_html__( 'SHORT MESSAGE', 'helpme' );
$phone_str = esc_html__( 'YOUR PHONE NUMBER', 'helpme' );
$enter_captcha = esc_html__( 'Enter Captcha', 'helpme' );
$not_readable = esc_html__( 'Not readable?', 'helpme' );
$change_text= esc_html__( 'Change text.', 'helpme' );

$icon_user = $style == 'classic' ? '<i class="helpme-icon-user"></i>' : '';
$icon_email = $style == 'classic' ? '<i class="helpme-icon-envelope-o"></i>' : '';
$icon_phone = $style == 'classic' ? '<i class="helpme-theme-icon-phone"></i>' : '';
$icon_lock= $style == 'classic' ? '<i class="helpme-li-lock"></i>' : '';

$email = antispambot($email);
$output = $skin_style = "";

// Get global JSON contructor object for styles and create local variable
global $helpme_dynamic_styles;
$helpme_styles = '';

if ( $style == 'modern' ) {
    $helpme_styles .= '
        #contact-form-'.$id.' .text-input,
        #contact-form-'.$id.' .helpme-textarea,
        #contact-form-'.$id.' .helpme-button{
            border-color:'.$skin_color.';
        }
        #contact-form-'.$id.' .text-input,
        #contact-form-'.$id.' .helpme-textarea{
            color:'.$skin_color.';
        }
        #contact-form-'.$id.' .text-input::-webkit-input-placeholder,
        #contact-form-'.$id.' .helpme-textarea::-webkit-input-placeholder,
        #contact-form-'.$id.' .text-input:-moz-placeholder,
        #contact-form-'.$id.' .helpme-textarea:-moz-placeholder,
        #contact-form-'.$id.' .text-input::-moz-placeholder,
        #contact-form-'.$id.' .helpme-textarea::-moz-placeholder,
        #contact-form-'.$id.' .text-input:-ms-input-placeholder,
        #contact-form-'.$id.' .helpme-textarea:-ms-input-placeholder{
            color:'.$skin_color.';
        }
        #contact-form-'.$id.' .helpme-button{
            color:'.$btn_text_color.' !important;
        }
        #contact-form-'.$id.' .helpme-button:hover{
            background-color:'.$skin_color.';
            color:'.$btn_hover_text_color.' !important;
        }
        #contact-form-'.$id.' .captcha-change-image {
            color:'.$skin_color.';
        }
        ';
}

$skin_style .= ($style == 'modern') ? '' : $skin.'-skin ';

$output .= '<div id="contact-form-'.$id.'" class="helpme-contact-form-wrapper classic-style dark-skin '.$el_class.'">';
$output .= '    <form class="helpme-contact-form three-column" method="post" novalidate="novalidate">';
$output .= '        <div class="helpme-form-row">
                        <input placeholder="'.$name_str.'" type="text" required="required" name="contact_name" class="text-input" value="" tabindex="'.$tabindex_1.'" />
						'.$icon_user.'
                    </div>';
$output .= '        <div class="helpme-form-row">
                        
                        <input placeholder="'.$email_str.'" type="email" required="required" name="contact_email" class="text-input" value="" tabindex="'.$tabindex_2.'" />
						'.$icon_email.'
                        </div>';
if($phone == 'true'){
$output .= '        <div class="helpme-form-row">
                        
                        <input placeholder="'.$phone_str.'" type="text" name="contact_phone" class="text-input" value="" tabindex="'.$tabindex_3.'" />
						'.$icon_phone.'
						</div>';
}
$output .= '        <div class="helpme-form-textarea-wrap">
                        <textarea required="required" placeholder="'.$content_str.'" name="contact_content" class="helpme-textarea" tabindex="'.$tabindex_4.'"></textarea></div>';



// CAPTCHA 
if($captcha == 'true') {
	
$output .= '<div class="helpme-form-row">
                '.$icon_lock.'
                <input placeholder="'.$enter_captcha.'" type="text" name="captcha" class="captcha-form text-input full" required="required" autocomplete="off" />
                    <img src="' . plugins_url( 'captcha/captcha.php', dirname(__FILE__) ) . '" class="captcha-image" alt="captcha txt"> 
                    <a href="#" class="captcha-change-image">'.$not_readable.' '.$change_text.'</a>
            </div>';
}    

$output .= '        <div class="button-row">
                        <button tabindex="'.$tabindex_5.'" class="helpme-progress-button helpme-button  outline-button medium" data-style="move-up">
                            <span class="helpme-progress-button-content">'.$submit_str.'</span>
                            <span class="helpme-progress">
                                <span class="helpme-progress-inner"></span>
                            </span>
                            <span class="state-success"><i class="helpme-icon-check"></i></span>
                            <span class="state-error"><i class="helpme-icon-times"></i></span>
                        </button>
                    </div>';
$output .= '        <i class="helpme-contact-loading helpme-icon-refresh"></i>';
$output .= '        <i class="helpme-contact-success helpme-theme-icon-tick"></i>';
$output .= '        <input type="hidden" value="'.$email.'" name="contact_to"/>';
$output .= '    </form>';
$output .= '    <div class="clearboth"></div>';
$output .= '</div>';

echo '<div>'.$output.'</div>';


// Hidden styles node for head injection after page load through ajax
echo '<div id="ajax-'.$id.'" class="helpme-dynamic-styles">';
echo '<!-- ' . helpme_clean_dynamic_styles($helpme_styles) . '-->';
echo '</div>';


// Export styles to json for faster page load
$helpme_dynamic_styles[] = array(
  'id' => 'ajax-'.$id ,
  'inject' => $helpme_styles
);
