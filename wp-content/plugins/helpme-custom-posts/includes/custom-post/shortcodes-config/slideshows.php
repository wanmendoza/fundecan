<?php
/*
vc_map(array(
    "name" => esc_html__("Fade Text Box", "helpme"),
    "base" => "helpme_fade_txt_box",
    "content_element" => true,
    'icon' => 'icon-helpme-content-box vc_helpme_element-icon',
    "as_parent" => array('only' => 'helpme_fade_txt_item'),
    "category" => esc_html__('Slideshows', 'helpme'),
    'params' => array(
        array(
            "type" => "range",
            "heading" => esc_html__("Item Padding", "helpme"),
            "param_name" => "padding",
            "value" => "20",
            "min" => "5",
            "max" => "500",
            "step" => "1",
            "unit" => 'px',
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Animation Speed", "helpme"),
            "param_name" => "animation_speed",
            "value" => "700",
            "min" => "100",
            "max" => "3000",
            "step" => "1",
            "unit" => 'ms',
            "description" => esc_html__("", "helpme")
        ),
        array(
            "heading" => esc_html__("Slideshow Speed", "helpme"),
            "param_name" => "slideshow_speed",
            "value" => "5000",
            "min" => "0",
            "max" => "50000",
            "step" => "1",
            "unit" => 'ms',
            "description" => esc_html__("If set to zero the autoplay will be disabled, any number above zeo will define the delay between each slide transition.", "helpme"),
            'type' => 'range'
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "helpme"),
            "param_name" => "el_class",
            "value" => "",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "helpme")
        )
    ),
    "js_view" => 'VcColumnView'
));

vc_map(array(
    "name" => esc_html__("Fade Text Item", "helpme"),
    "base" => "helpme_fade_txt_item",
    "as_child" => array('only' => 'helpme_fade_txt_box'),
    'icon' => 'icon-helpme-content-box vc_helpme_element-icon',
    "content_element" => true,
    "category" => esc_html__('Slideshows', 'helpme'),
    'params' => array(
        
        array(
            "type" => "textfield",
            "heading" => esc_html__("Text", "helpme"),
            "param_name" => "item_txt",
            "value" => "",
            "description" => esc_html__("", "helpme"),
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Font Size", "helpme"),
            "param_name" => "item_text_size",
            "value" => "16",
            "min" => "10",
            "max" => "100",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Font Weight", "helpme"),
            "param_name" => "item_font_weight",
            "value" => array(
                esc_html__('Default', "helpme") => "inherit",
                esc_html__('Light', "helpme") => "300",
                esc_html__('Normal', "helpme") => "normal",
                esc_html__('Bold', "helpme") => "bold",
                esc_html__('Bolder', "helpme") => "bolder",
                esc_html__('Extra Bold', "helpme") => "900",
            ),
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Text Align", "helpme"),
            "param_name" => "item_text_align",
            "value" => array(
                esc_html__('Left', "helpme") => "left",
                esc_html__('Center', "helpme") => "center",
                esc_html__('Right', "helpme") => "right"
            ),
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Font Color", "helpme"),
            "param_name" => "item_color",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "helpme"),
            "param_name" => "el_class",
            "value" => "",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "helpme")
        )
    )
));


vc_map(array(
    "name" => esc_html__("Image Slideshow", "helpme"),
    "base" => "helpme_image_slideshow",
    'icon' => 'icon-helpme-image-slideshow vc_helpme_element-icon',
    "category" => esc_html__('Slideshows', 'helpme'),
    'description' => esc_html__( 'Simple image slideshow.', 'helpme' ),
    "params" => array(

        array(
            "type" => "attach_images",
            "heading" => esc_html__("Add Images", "helpme"),
            "param_name" => "images",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),

        array(
            "type" => "dropdown",
            "heading" => esc_html__("Slideshow Direction", "helpme"),
            "param_name" => "direction",
            "width" => 300,
            "value" => array(
                esc_html__('horizontal', "helpme") => "horizontal",
                esc_html__('Vertical', "helpme") => "vertical"
            ),
            "description" => esc_html__("", "helpme")
        ),
        array(
            "heading" => esc_html__("Slideshow Align?", 'helpme'),
            "description" => esc_html__("", 'helpme'),
            "param_name" => "slideshow_aligment",
            "value" => array(
                esc_html__("Left", 'helpme') => "left",
                esc_html__("Center", 'helpme') => "none",
                esc_html__("Right", 'helpme') => "right"
            ),
            "type" => "dropdown"
        ),

        array(
            "type" => "range",
            "heading" => esc_html__("Width", "helpme"),
            "param_name" => "image_width",
            "value" => "770",
            "min" => "100",
            "max" => "1380",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Height", "helpme"),
            "param_name" => "image_height",
            "value" => "350",
            "min" => "100",
            "max" => "1000",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme")
        ),

        array(
            "type" => "range",
            "heading" => esc_html__("Animation Speed", "helpme"),
            "param_name" => "animation_speed",
            "value" => "700",
            "min" => "100",
            "max" => "3000",
            "step" => "1",
            "unit" => 'ms',
            "description" => esc_html__("", "helpme")
        ),

        array(
            "type" => "range",
            "heading" => esc_html__("Slideshow Speed", "helpme"),
            "param_name" => "slideshow_speed",
            "value" => "7000",
            "min" => "1000",
            "max" => "20000",
            "step" => "1",
            "unit" => 'ms',
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "toggle",
            "heading" => esc_html__("Direction Nav", "helpme"),
            "param_name" => "direction_nav",
            "value" => "true",
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "toggle",
            "heading" => esc_html__("Pagination", "helpme"),
            "param_name" => "pagination",
            "value" => "false",
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Margin Bottom", "helpme"),
            "param_name" => "margin_bottom",
            "value" => "20",
            "min" => "0",
            "max" => "500",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "helpme"),
            "param_name" => "el_class",
            "value" => "",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "helpme")
        )

    )
));


vc_map( array(
        "name"      => esc_html__( "Tablet Slideshow", "helpme" ),
        "base"      => "helpme_tablet_slideshow",
        'icon' => 'icon-helpme-image-slideshow vc_helpme_element-icon',
        "category" => esc_html__('Slideshows', 'helpme'),
        'description' => esc_html__( 'Slideshow inside a tablet.', 'helpme' ),
        "params"    => array(
            array(
                "heading" => esc_html__( "Tablet Color", 'helpme' ),
                "description" => esc_html__( "", 'helpme' ),
                "param_name" => "tablet_color",
                "value" => array(
                    esc_html__( "Black", 'helpme' )  =>  "black",
                    esc_html__( "White", 'helpme' ) =>  "white",
                ),
                "type" => "dropdown"
            ),
            array(
                "type" => "attach_images",
                "heading" => esc_html__( "Add Images", "helpme" ),
                "param_name" => "images",
                "value" => "",
                "description" => esc_html__( "", "helpme" )
            ),
            array(
                "type" => "range",
                "heading" => esc_html__( "Animation Speed", "helpme" ),
                "param_name" => "animation_speed",
                "value" => "700",
                "min" => "100",
                "max" => "3000",
                "step" => "1",
                "unit" => 'ms',
                "description" => esc_html__( "", "helpme" )
            ),
            array(
                "type" => "range",
                "heading" => esc_html__( "Slideshow Speed", "helpme" ),
                "param_name" => "slideshow_speed",
                "value" => "7000",
                "min" => "1000",
                "max" => "20000",
                "step" => "1",
                "unit" => 'ms',
                "description" => esc_html__( "", "helpme" )
            ),

            array(
                "type" => "toggle",
                "heading" => esc_html__( "Pause on Hover", "helpme" ),
                "param_name" => "pause_on_hover",
                "value" => "false",
                "description" => esc_html__( "Pause the slideshow when hovering over slider, then resume when no longer hovering", "helpme" )
            ),


            array(
                "type" => "dropdown",
                "heading" => esc_html__( "Viewport Animation", "helpme" ),
                "param_name" => "animation",
                "value" => $css_animations,
                "description" => esc_html__( "Viewport animation will be triggered when this element is being viewed when you scroll page down. you only need to choose the animation style from this option. please note that this only works in moderns. We have disabled this feature in touch devices to increase browsing speed.", "helpme" )
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Extra class name", "helpme" ),
                "param_name" => "el_class",
                "value" => "",
                "description" => esc_html__( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "helpme" )
            )

        )
    )
);

vc_map( array(
        "name"      => esc_html__( "Mobile Slideshow", "helpme" ),
        "base"      => "helpme_mobile_slideshow",
        'icon' => 'icon-helpme-image-slideshow vc_helpme_element-icon',
        "category" => esc_html__('Slideshows', 'helpme'),
        'description' => esc_html__( 'Slideshow inside a mobile.', 'helpme' ),
        "params"    => array(
            array(
                "heading" => esc_html__( "Orientation", 'helpme' ),
                "description" => esc_html__( "", 'helpme' ),
                "param_name" => "orientation",
                "value" => array(
                    esc_html__( "Landscape", 'helpme' )  =>  "landscape",
                    esc_html__( "Portrait", 'helpme' ) =>  "portrait",
                ),
                "type" => "dropdown"
            ),

            array(
                "heading" => esc_html__( "Tablet Color", 'helpme' ),
                "description" => esc_html__( "", 'helpme' ),
                "param_name" => "mobile_color",
                "value" => array(
                    esc_html__( "Balck", 'helpme' )  =>  "black",
                    esc_html__( "White", 'helpme' ) =>  "white",
                ),
                "type" => "dropdown"
            ),
            array(
                "type" => "attach_images",
                "heading" => esc_html__( "Add Images", "helpme" ),
                "param_name" => "images",
                "value" => "",
                "description" => esc_html__( "", "helpme" )
            ),
            array(
                "type" => "range",
                "heading" => esc_html__( "Animation Speed", "helpme" ),
                "param_name" => "animation_speed",
                "value" => "700",
                "min" => "100",
                "max" => "3000",
                "step" => "1",
                "unit" => 'ms',
                "description" => esc_html__( "", "helpme" )
            ),
            array(
                "type" => "range",
                "heading" => esc_html__( "Slideshow Speed", "helpme" ),
                "param_name" => "slideshow_speed",
                "value" => "7000",
                "min" => "1000",
                "max" => "20000",
                "step" => "1",
                "unit" => 'ms',
                "description" => esc_html__( "", "helpme" )
            ),

            array(
                "type" => "toggle",
                "heading" => esc_html__( "Pause on Hover", "helpme" ),
                "param_name" => "pause_on_hover",
                "value" => "false",
                "description" => esc_html__( "Pause the slideshow when hovering over slider, then resume when no longer hovering", "helpme" )
            ),

            array(
                "type" => "dropdown",
                "heading" => esc_html__( "Viewport Animation", "helpme" ),
                "param_name" => "animation",
                "value" => $css_animations,
                "description" => esc_html__( "Viewport animation will be triggered when this element is being viewed when you scroll page down. you only need to choose the animation style from this option. please note that this only works in moderns. We have disabled this feature in touch devices to increase browsing speed.", "helpme" )
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__( "Extra class name", "helpme" ),
                "param_name" => "el_class",
                "value" => "",
                "description" => esc_html__( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "helpme" )
            )

        )
    )
);


vc_map(array(
    "name" => esc_html__("Sharp Slider", "helpme"),
    "base" => "helpme_sharp_slider",
    'icon' => 'icon-helpme-sharp-slider vc_helpme_element-icon',
    "category" => esc_html__('Slideshows', 'helpme'),
    'description' => esc_html__( 'Powerful Sharp Slider.', 'helpme' ),
    "params" => array(
        array(
            "type" => "toggle",
            "heading" => esc_html__("First Element?", "helpme"),
            "param_name" => "first_el",
            "value" => "true",
            "description" => esc_html__("If you are not using this slideshow as first element in content then disable this option. This option only useful when Transparent Header style is enabled in this page, having this option enabled will allow the header skin follow slide item's => header skin.", "helpme")
        ),
        array(
            "type" => "multiselect",
            "heading" => esc_html__("Select specific slides", "helpme"),
            "param_name" => "slides",
            "value" => '',
            "options" => $sharp_posts,
            "description" => esc_html__("", "helpme")
        ),

        array(
            "heading" => esc_html__("Order", 'helpme'),
            "description" => esc_html__("Designates the ascending or descending order of the 'orderby' parameter.", 'helpme'),
            "param_name" => "order",
            "value" => array(
                esc_html__("ASC (ascending order)", 'helpme') => "ASC",
                esc_html__("DESC (descending order)", 'helpme') => "DESC"
            ),
            "type" => "dropdown"
        ),
        array(
            "heading" => esc_html__("Orderby", 'helpme'),
            "description" => esc_html__("Sort retrieved slides items by parameter.", 'helpme'),
            "param_name" => "orderby",
            "value" => $helpme_orderby,
            "type" => "dropdown"
        ),
        array(
            "type" => "toggle",
            "heading" => esc_html__("Full Height?", "helpme"),
            "param_name" => "full_height",
            "value" => "true",
            "description" => esc_html__("If you dont want full screen height slideshow disable this option. If you disable this option set the height of slideshow using below option.", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Slideshow Height", "helpme"),
            "param_name" => "height",
            "value" => "700",
            "min" => "100",
            "max" => "2000",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("This option only works when above option is disabled.", "helpme")
        ),
        array(
            "heading" => esc_html__("Animation Effect", 'helpme'),
            "description" => esc_html__("Note that Horizontal Curtain is reverted to Slide effect for Internet Explorer.", 'helpme'),
            "param_name" => "animation_effect",
            "value" => array(
                esc_html__("Slide", 'helpme') => "slide",
                esc_html__("Slide Vertical", 'helpme') => "vertical_slide",
                esc_html__("Zoom", 'helpme') => "zoom",
                esc_html__("Zoom Out", 'helpme') => "zoom_out",
                esc_html__("Horizontal Curtain", 'helpme') => "horizontal_curtain",
                esc_html__("Fade", 'helpme') => "fade",
                esc_html__("Perspective Flip", 'helpme') => "perspective_flip"
            ),
            "type" => "dropdown"
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Animation Speed", "helpme"),
            "param_name" => "animation_speed",
            "value" => "700",
            "min" => "100",
            "max" => "3000",
            "step" => "1",
            "unit" => 'ms',
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Pause Time", "helpme"),
            "param_name" => "slideshow_speed",
            "value" => "7000",
            "min" => "1000",
            "max" => "20000",
            "step" => "1",
            "unit" => 'ms',
            "description" => esc_html__("How long each slide will show.", "helpme")
        ),

        // array(
        //     "type" => "toggle",
        //     "heading" => esc_html__("Direction Nav", "helpme"),
        //     "param_name" => "direction_nav",
        //     "value" => "true",
        //     "description" => esc_html__("", "helpme")
        // ),

        array(
            "type" => "dropdown",
            "heading" => esc_html__("Direction Nav", "helpme"),
            "param_name" => "direction_nav",
            "width" => 300,
            "value" => array(
                esc_html__('Classic', "helpme") => "classic",
                // esc_html__('Classic Retouched', "helpme") => "classic_retouched",
                esc_html__('Bar', "helpme") => "bar",
                esc_html__('Round', "helpme") => "round",
                esc_html__('Flip', "helpme") => "flip",
                esc_html__('-- No Pagination', "helpme") => "false"
            ),
            "description" => esc_html__("", "helpme"),
            // "dependency" => array(
            //     "element" => "direction_nav",
            //     "value" => array(
            //         "true"
            //     )
            // )
        ),

        array(
            "type" => "dropdown",
            "heading" => esc_html__("Pagination", "helpme"),
            "param_name" => "pagination",
            "width" => 300,
            "value" => array(
                esc_html__('-- No Pagination', "helpme") => "",
                esc_html__('Small Stroke', "helpme") => "small_stroke",
                esc_html__('Rounded Underline', "helpme") => "rounded",
                esc_html__('Underline', "helpme") => "underline",
                esc_html__('Square', "helpme") => "square",

            ),
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "toggle",
            "heading" => esc_html__("Parallax", "helpme"),
            "param_name" => "parallax",
            "value" => "false",
            "description" => esc_html__("Add parallax effect to your slider", "helpme")
        ),
        array(
            "type" => "toggle",
            "heading" => esc_html__("Loop?", "helpme"),
            "param_name" => "sharp_slider_loop",
            "value" => "false",
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "toggle",
            "heading" => esc_html__("Hash Navigation?", "helpme"),
            "param_name" => "sharp_slider_hash",
            "value" => "false",
            "description" => esc_html__("", "helpme")
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "helpme"),
            "param_name" => "el_class",
            "value" => "",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "helpme")
        )

    )
));


vc_map(array(
    "name" => esc_html__("Tab Slider", "helpme"),
    "base" => "helpme_tab_slider",
    'icon' => 'icon-helpme-sharp-slider vc_helpme_element-icon',
    "category" => esc_html__('Slideshows', 'helpme'),
    'description' => esc_html__( 'Powerful Tab Slider.', 'helpme' ),
    "params" => array(
        array(
            "type" => "multiselect",
            "heading" => esc_html__("Select specific slides", "helpme"),
            "param_name" => "slides",
            "value" => '',
            "options" => $tab_posts,
            "description" => esc_html__("", "helpme")
        ),
        array(
            "heading" => esc_html__("Order", 'helpme'),
            "description" => esc_html__("Designates the ascending or descending order of the 'orderby' parameter.", 'helpme'),
            "param_name" => "order",
            "value" => array(
                esc_html__("ASC (ascending order)", 'helpme') => "ASC",
                esc_html__("DESC (descending order)", 'helpme') => "DESC"
            ),
            "type" => "dropdown"
        ),
        array(
            "heading" => esc_html__("Orderby", 'helpme'),
            "description" => esc_html__("Sort retrieved slides items by parameter.", 'helpme'),
            "param_name" => "orderby",
            "value" => $helpme_orderby,
            "type" => "dropdown"
        ),
        array(
            "type" => "toggle",
            "heading" => esc_html__("Full Height?", "helpme"),
            "param_name" => "full_height",
            "value" => "true",
            "description" => esc_html__("If you dont want full screen height slideshow disable this option. If you disable this option set the height of slideshow using below option.", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Slideshow Height", "helpme"),
            "param_name" => "height",
            "value" => "700",
            "min" => "100",
            "max" => "2000",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("This option only works when above option is disabled.", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Animation Speed", "helpme"),
            "param_name" => "animation_speed",
            "value" => "700",
            "min" => "100",
            "max" => "3000",
            "step" => "1",
            "unit" => 'ms',
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "helpme"),
            "param_name" => "el_class",
            "value" => "",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "helpme")
        )

    )
));


vc_map(array(
    "name" => esc_html__("Sharp One Pager", "helpme"),
    "base" => "helpme_sharp_one_pager",
    'icon' => 'icon-helpme-sharp-one-pager vc_helpme_element-icon',
    "category" => esc_html__('Slideshows', 'helpme'),
    'description' => esc_html__( 'Converts Sharp Slider to vertical scroll.', 'helpme' ),
    "params" => array(
        array(
            "type" => "multiselect",
            "heading" => esc_html__("Select specific slides", "helpme"),
            "param_name" => "slides",
            "value" => '',
            "options" => $sharp_posts,
            "description" => esc_html__("", "helpme")
        ),

        array(
            "heading" => esc_html__("Order", 'helpme'),
            "description" => esc_html__("Designates the ascending or descending order of the 'orderby' parameter.", 'helpme'),
            "param_name" => "order",
            "value" => array(
                esc_html__("ASC (ascending order)", 'helpme') => "ASC",
                esc_html__("DESC (descending order)", 'helpme') => "DESC"
            ),
            "type" => "dropdown"
        ),
        array(
            "heading" => esc_html__("Orderby", 'helpme'),
            "description" => esc_html__("Sort retrieved slides items by parameter.", 'helpme'),
            "param_name" => "orderby",
            "value" => $helpme_orderby,
            "type" => "dropdown"
        ),
        array(
            "type" => "toggle",
            "heading" => esc_html__("Pagination?", "helpme"),
            "param_name" => "navigation",
            "value" => "true",
            "description" => esc_html__("", "helpme")
        ),
        
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Pagination Style", "helpme"),
            "param_name" => "pagination",
            "width" => 300,
            "value" => array(
                esc_html__('Square', "helpme") => "square",
                esc_html__('Small Stroke', "helpme") => "small_stroke",
                esc_html__('Rounded Underline', "helpme") => "rounded",
                esc_html__('Underline', "helpme") => "underline",

            ),
            "dependency" => array(
                "element" => "navigation",
                "value" => array(
                    "true"
                )
            ),
            "description" => esc_html__("", "helpme")
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "helpme"),
            "param_name" => "el_class",
            "value" => "",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "helpme")
        )
    )
));

vc_map(array(
    "name" => esc_html__("Content Scroller", "helpme"),
    "base" => "vc_content_scroller",
    "as_parent" => array('only' => 'vc_content_scroller_item'),
    "content_element" => true,
    'icon' => 'icon-helpme-image-slideshow vc_helpme_element-icon',
    "category" => esc_html__('Slideshows', 'helpme'),
    'description' => esc_html__( 'Swiper enabled content slideshow.', 'helpme' ),
    "params" => array(
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Border Top and Bottom Color", "helpme"),
            "param_name" => "border_color",
            "value" => "#eee",
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Box Background Color", "helpme"),
            "param_name" => "bg_color",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "upload",
            "heading" => esc_html__("Background Image", "helpme"),
            "param_name" => "bg_image",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Background Attachment", "helpme"),
            "param_name" => "attachment",
            "width" => 150,
            "value" => array(
                esc_html__('Scroll', "helpme") => "scroll",
                esc_html__('Fixed', "helpme") => "fixed"
            ),
            "description" => esc_html__("The background-attachment property sets whether a background image is fixed or scrolls with the rest of the page. <a href='http://www.w3schools.com/CSSref/pr_background-attachment.asp'>Read More</a>", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Background Position", "helpme"),
            "param_name" => "bg_position",
            "width" => 300,
            "value" => array(
                esc_html__('Left Top', "helpme") => "left top",
                esc_html__('Center Top', "helpme") => "center top",
                esc_html__('Right Top', "helpme") => "right top",
                esc_html__('Left Center', "helpme") => "left center",
                esc_html__('Center Center', "helpme") => "center center",
                esc_html__('Right Center', "helpme") => "right center",
                esc_html__('Left Bottom', "helpme") => "left bottom",
                esc_html__('Center Bottom', "helpme") => "center bottom",
                esc_html__('Right Bottom', "helpme") => "right bottom"
            ),
            "description" => esc_html__("First value defines horizontal position and second vertical positioning.", "helpme")
        ),
        array(
            "type" => "toggle",
            "heading" => esc_html__('Cover whole background', 'helpme'),
            "description" => esc_html__("Scale the background image to be as large as possible so that the background area is completely covered by the background image. Some parts of the background image may not be in view within the background positioning area.", "helpme"),
            "param_name" => "bg_stretch",
            "value" => "false",
        ),
        array(
            "heading" => esc_html__("Slide Direction", 'helpme'),
            "description" => esc_html__("", 'helpme'),
            "param_name" => "slide_direction",
            "value" => array(
                esc_html__("Horizontal", 'helpme') => "horizontal",
                esc_html__("Vertical", 'helpme') => "vertical"
            ),
            "dependency" => array(
                'element' => "effect",
                'value' => array(
                    'slide'
                )
            ),
            "type" => "dropdown"
        ),

        array(
            "type" => "range",
            "heading" => esc_html__("Animation Speed", "helpme"),
            "param_name" => "animation_speed",
            "value" => "700",
            "min" => "100",
            "max" => "3000",
            "step" => "1",
            "unit" => 'ms',
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Slideshow Speed", "helpme"),
            "param_name" => "slideshow_speed",
            "value" => "7000",
            "min" => "1000",
            "max" => "20000",
            "step" => "1",
            "unit" => 'ms',
            "description" => esc_html__("", "helpme")
        ),

        array(
            "type" => "toggle",
            "heading" => esc_html__("Direction Nav", "helpme"),
            "param_name" => "direction_nav",
            "value" => "true",
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "helpme"),
            "param_name" => "el_class",
            "value" => "",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "helpme")
        )
    ),
     "js_view" => 'VcColumnView'
));

vc_map(array(
    "name" => esc_html__("Content Scroller Item", "helpme"),
    "base" => "vc_content_scroller_item",
     'icon' => 'icon-helpme-image-slideshow vc_helpme_element-icon',
    "content_element" => true,
    "as_child" => array('only' => 'vc_content_scroller'),
    "is_container" => true,

    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", "helpme"),
            "param_name" => "title",
            "description" => esc_html__("Content Scroller section title.", "helpme")
        )
    ),
     "js_view" => 'VcColumnView'
));
*/


vc_map(array(
    "name" => esc_html__("Testimonials", "helpme"),
    "base" => "helpme_testimonials",
    'icon' => 'icon-helpme-testimonial-slideshow vc_helpme_element-icon',
    "category" => esc_html__('Slideshows', 'helpme'),
    'description' => esc_html__( 'Shows Testimonials in multiple styles.', 'helpme' ),
    "params" => array(


        array(
            "heading" => esc_html__("Style", 'helpme'),
            "description" => esc_html__("", 'helpme'),
            "param_name" => "style",
            "value" => array(
                esc_html__("Boxed Style", 'helpme') => "boxed",
                esc_html__("creative", 'helpme') => "creative",
                esc_html__("Modern Style", 'helpme') => "modern"
            ),
            "type" => "dropdown"
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Count", "helpme"),
            "param_name" => "count",
            "value" => "4",
            "min" => "-1",
            "max" => "50",
            "step" => "1",
            "unit" => 'testimonial',
            "description" => esc_html__("How many testimonial you would like to show? (-1 means unlimited)", "helpme")
        ),
        array(
            "type" => "multiselect",
            "heading" => esc_html__("Select specific testimonials", "helpme"),
            "param_name" => "testimonials",
            "value" => '',
            "options" => $testimonials,
            "description" => esc_html__("", "helpme")
        ),

        array(
            "type" => "theme_fonts",
            "heading" => esc_html__("Font Family", "helpme"),
            "param_name" => "font_family",
            "value" => "",
            "description" => esc_html__("You can choose a font for this shortcode, however using non-safe fonts can affect page load and performance.", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Font Size?", "helpme"),
            "param_name" => "font_size",
            "value" => "14",
            "min" => "10",
            "max" => "30",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Line Height?", "helpme"),
            "param_name" => "line_height",
            "value" => "26",
            "min" => "15",
            "max" => "50",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Font Color?", "helpme"),
            "param_name" => "font_color",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'boxed',
                    'modern',
                )
            ),
        ),
        array(
            "type" => "hidden_input",
            "param_name" => "font_type",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),

        /*array(
            "heading" => esc_html__("Skin", 'helpme'),
            "description" => esc_html__("Please note that this option will only work in \"Quotation Style\"", 'helpme'),
            "param_name" => "skin",
            "value" => array(
                esc_html__("Dark", 'helpme') => "dark",
                esc_html__("Light", 'helpme') => "light"
            ),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'quote'
                )
            ),
            "type" => "dropdown"
        ),*/
		array(
            "type" => "toggle",
            "heading" => esc_html__("scroller", "helpme"),
            "param_name" => "scroll",
			"value" => "true",
            "description" => esc_html__("put loop scroller on or off", "helpme"),

        ),
		array(
            "type" => "toggle",
            "heading" => esc_html__("Auto Scroll", "helpme"),
            "param_name" => "autoplay",
            "value" => "false",
            "description" => esc_html__("Auto scroll on or off", "helpme"),
            "dependency" => array(
                'element' => "scroll",
                'value' => array(
                    'true'
                )
            )

        ),
		array(
            "type" => "toggle",
            "heading" => esc_html__(" Scroller navigation", "helpme"),
            "param_name" => "owl_nav",
            "value" => "false",
            "description" => esc_html__(" scroll navigation on or off", "helpme"),
            "dependency" => array(
                'element' => "scroll",
                'value' => array(
                    'true'
                )
            )

        ),
		array(
            "type" => "toggle",
            "heading" => esc_html__(" Scroller item loop", "helpme"),
            "param_name" => "item_loop",
            "value" => "false",
            "description" => esc_html__(" scroller item  on or off", "helpme"),
            "dependency" => array(
                'element' => "scroll",
                'value' => array(
                    'true'
                )
            )

        ),
		array(
            "type" => "range",
            "heading" => esc_html__(" Scroller autoplay speed", "helpme"),
            "param_name" => "autoplay_speed",
            "value" => "2000",
			"min" => "0",
			"max" => "10000",
			"step" => "1",
			"unit" => "ms",
            "description" => esc_html__(" scroller autoplay speed", "helpme"),
            "dependency" => array(
                'element' => "scroll",
                'value' => array(
                    'true'
                )
            )

        ),
		array(
            "type" => "range",
            "heading" => esc_html__(" Scroller autoplay Delay", "helpme"),
            "param_name" => "delay",
            "value" => "1000",
			"min" => "0",
			"max" => "5000",
			"step" => "1",
			"unit" => "ms",
            "description" => esc_html__("Scroller autoplay Delay per slider", "helpme"),
            "dependency" => array(
                'element' => "scroll",
                'value' => array(
                    'true'
                )
            )

        ),
		array(
            "type" => "range",
            "heading" => esc_html__(" Scroller items gutter space", "helpme"),
            "param_name" => "gutter_space",
            "value" => "30",
			"min" => "0",
			"max" => "50",
			"step" => "1",
			"unit" => "px",
            "description" => esc_html__("Scroller items gutter space, defualt is 30px you can set 0 to 100px but not in -ve value", "helpme"),
            "dependency" => array(
                'element' => "scroll",
                'value' => array(
                    'true'
                )
            )

        ),
		array(
            "type" => "range",
            "heading" => esc_html__(" Scroller items for desktop above 1025px", "helpme"),
            "param_name" => "desktop_items",
            "value" => "3",
			"min" => "1",
			"max" => "8",
			"step" => "1",
			"unit" => "items",
            "description" => esc_html__("Scroller items for desktop above 1025px, adjust items according to your layout", "helpme"),
            "dependency" => array(
                'element' => "scroll",
                'value' => array(
                    'true'
                )
            )

        ),
		array(
            "type" => "range",
            "heading" => esc_html__(" Scroller items for tabs landscape from 960px to 1024px", "helpme"),
            "param_name" => "tab_landscape_items",
            "value" => "3",
			"min" => "1",
			"max" => "6",
			"step" => "1",
			"unit" => "items",
            "description" => esc_html__("Scroller items for tabs landscape from 960px to 1024px, adjust items according to your layout", "helpme"),
            "dependency" => array(
                'element' => "scroll",
                'value' => array(
                    'true'
                )
            )

        ),
		array(
            "type" => "range",
            "heading" => esc_html__(" Scroller items for tabs from 768px to 959px", "helpme"),
            "param_name" => "tab_items",
            "value" => "2",
			"min" => "1",
			"max" => "4",
			"step" => "1",
			"unit" => "items",
            "description" => esc_html__("Scroller items for tabs landscape from 960px to 1024px, adjust items according to your layout", "helpme"),
            "dependency" => array(
                'element' => "scroll",
                'value' => array(
                    'true'
                )
            )

        ),
        array(
            "heading" => esc_html__("Order", 'helpme'),
            "description" => esc_html__("Designates the ascending or descending order of the 'orderby' parameter.", 'helpme'),
            "param_name" => "order",
            "value" => array(
                esc_html__("DESC (descending order)", 'helpme') => "DESC",
                esc_html__("ASC (ascending order)", 'helpme') => "ASC"
            ),
            "type" => "dropdown"
        ),
        array(
            "heading" => esc_html__("Orderby", 'helpme'),
            "description" => esc_html__("Sort retrieved client items by parameter.", 'helpme'),
            "param_name" => "orderby",
            "value" => $helpme_orderby,
            "type" => "dropdown"
        ),



        array(
            "heading" => esc_html__("Slides animation", 'helpme'),
            "description" => esc_html__("", 'helpme'),
            "param_name" => "animation_effect",
            "value" => array(
                esc_html__("Slide", 'helpme') => "slide",
                esc_html__("Fade", 'helpme') => "fade"
            ),
            "type" => "dropdown"
        ),

        array(
            "type" => "dropdown",
            "heading" => esc_html__("Viewport Animation", "helpme"),
            "param_name" => "animation",
            "value" => $css_animations,
            "description" => esc_html__("Viewport animation will be triggered when this element is being viewed when you scroll page down. you only need to choose the animation style from this option. please note that this only works in moderns. We have disabled this feature in touch devices to increase browsing speed.", "helpme")
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "helpme"),
            "param_name" => "el_class",
            "value" => "",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "helpme")
        )

    )
));

/*
vc_map(array(
    "name" => esc_html__("Window Scroller", "helpme"),
    "base" => "helpme_window_scroller",
    'icon' => 'icon-helpme-image-slideshow vc_helpme_element-icon',
    "category" => esc_html__('Slideshows', 'helpme'),
    'description' => esc_html__( 'Vertical widnow scroll in a frame.', 'helpme' ),
    "params" => array(
        array(
            "type" => "upload",
            "heading" => esc_html__("Uplaod Your image", "helpme"),
            "param_name" => "src",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Window Height", "helpme"),
            "param_name" => "height",
            "value" => "300",
            "min" => "100",
            "max" => "1000",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme")
        ),

        array(
            "type" => "range",
            "heading" => esc_html__("Animation Speed", "helpme"),
            "param_name" => "speed",
            "value" => "2000",
            "min" => "100",
            "max" => "10000",
            "step" => "1",
            "unit" => 'ms',
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Link", "helpme"),
            "param_name" => "link",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Target", "helpme"),
            "param_name" => "target",
            "width" => 200,
            "value" => $target_arr,
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Viewport Animation", "helpme"),
            "param_name" => "animation",
            "value" => $css_animations,
            "description" => esc_html__("Viewport animation will be triggered when this element is being viewed when you scroll page down. you only need to choose the animation style from this option. please note that this only works in moderns. We have disabled this feature in touch devices to increase browsing speed.", "helpme")
        ),
        $add_device_visibility,
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "helpme"),
            "param_name" => "el_class",
            "value" => "",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "helpme")
        )



    )
));

vc_map(array(
    "name" => esc_html__("Theatre Slider", "helpme"),
    "base" => "helpme_theatre_slider",
    'icon' => 'vc_helpme_element-icon',
    "category" => esc_html__('Slideshows', 'helpme'),
    'description' => esc_html__( '', 'helpme' ),
    "params" => array(
        array(
            "heading" => esc_html__("Background Style", 'helpme'),
            "description" => esc_html__("", 'helpme'),
            "param_name" => "background_style",
            "value" => array(
                esc_html__("Desktop", 'helpme') => "desktop_style",
                esc_html__("Laptop", 'helpme') => "laptop_style"
            ),
            "type" => "dropdown"
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Slider Max Width", "helpme"),
            "param_name" => "max_width",
            "value" => "900",
            "min" => "320",
            "max" => "920",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme")
        ),
        array(
            "heading" => esc_html__("Video Host", 'helpme'),
            "description" => esc_html__("", 'helpme'),
            "param_name" => "host",
            "value" => array(
                esc_html__("Self Hosted", 'helpme') => "self_hosted",
                esc_html__("Social Hosted", 'helpme') => "social_hosted"
            ),
            "type" => "dropdown"
        ), 
        array(
            "type" => "upload",
            "heading" => esc_html__("MP4 Format", "helpme"),
            "param_name" => "mp4",
            "value" => "",
            "description" => esc_html__("Compatibility for Safari, IE9", "helpme"),
            "dependency" => array(
                'element' => "host",
                'value' => array(
                    'self_hosted'
                )
            )
        ),
        array(
            "type" => "upload",
            "heading" => esc_html__("WebM Format", "helpme"),
            "param_name" => "webm",
            "value" => "",
            "description" => esc_html__("Compatibility for Firefox4, Opera, and Chrome", "helpme"),
            "dependency" => array(
                'element' => "host",
                'value' => array(
                    'self_hosted'
                )
            )
        ),
        array(
            "type" => "upload",
            "heading" => esc_html__("OGV Format", "helpme"),
            "param_name" => "ogv",
            "value" => "",
            "description" => esc_html__("Compatibility for older Firefox and Opera versions", "helpme"),
            "dependency" => array(
                'element' => "host",
                'value' => array(
                    'self_hosted'
                )
            )
        ),
        array(
            "type" => "upload",
            "heading" => esc_html__("Background Video Preview image (and fallback image)", "helpme"),
            "param_name" => "poster_image",
            "value" => "",
            "description" => esc_html__("This Image will shown until video load. in case of video is not supported or did not load the image will remain as fallback.", "helpme"),
            "dependency" => array(
                'element' => "host",
                'value' => array(
                    'self_hosted'
                )
            )
        ),
        array(
            "heading" => esc_html__("Stream Host Website", 'helpme'),
            "description" => esc_html__("", 'helpme'),
            "param_name" => "stream_host_website",
            "value" => array(
                esc_html__("Youtube", 'helpme') => "youtube",
                esc_html__("Vimeo", 'helpme') => "vimeo"
            ),
            "type" => "dropdown",
            "dependency" => array(
                'element' => "host",
                'value' => array(
                    'social_hosted'
                )
            ),
        ),
        array(
            "type" => "toggle",
            "heading" => esc_html__("Show Social Video Controls", "helpme"),
            "param_name" => "video_controls",
            "value" => "true",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "stream_host_website",
                'value' => array(
                    'youtube'
                )
            )
        ),
        array(
            "type" => "toggle",
            "heading" => esc_html__("Autoplay?", "helpme"),
            "param_name" => "autoplay",
            "value" => "false",
            "description" => esc_html__("", "helpme"),
        ),
        array(
            "type" => "toggle",
            "heading" => esc_html__("Loop?", "helpme"),
            "param_name" => "loop",
            "value" => "false",
            "description" => esc_html__("", "helpme"),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Video ID", "helpme"),
            "param_name" => "stream_video_id",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "host",
                'value' => array(
                    'social_hosted'
                )
            )
        ),
        array(
            "heading" => esc_html__("Slider Align", 'helpme'),
            "description" => esc_html__("", 'helpme'),
            "param_name" => "align",
            "value" => array(
                esc_html__("Left", 'helpme') => "left",
                esc_html__("Center", 'helpme') => "center",
                esc_html__("Right", 'helpme') => "right"
            ),
            "type" => "dropdown"
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Margin Bottom", "helpme"),
            "param_name" => "margin_bottom",
            "value" => "25",
            "min" => "10",
            "max" => "250",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Viewport Animation", "helpme"),
            "param_name" => "animation",
            "value" => $css_animations,
            "description" => esc_html__("Viewport animation will be triggered when this element is being viewed when you scroll page down. you only need to choose the animation style from this option. please note that this only works in moderns. We have disabled this feature in touch devices to increase browsing speed.", "helpme")
        ),
        $add_device_visibility,
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "helpme"),
            "param_name" => "el_class",
            "value" => "",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "helpme")
        )
    )
));
*/