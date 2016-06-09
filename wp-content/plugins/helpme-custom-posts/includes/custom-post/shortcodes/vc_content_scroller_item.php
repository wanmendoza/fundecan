<?php
$output = '';
$output .= '<div class="swiper-slide">';
$output .= '<div class="helpme-inner-grid">';
$output .= wpb_js_remove_wpautop($content);
$output .= '</div>';
$output .= '</div>';
echo '<div>'.$output.'</div>';
