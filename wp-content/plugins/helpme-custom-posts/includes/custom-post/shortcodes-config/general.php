<?php

/*vc_map(array(
    "name" => esc_html__("Row", "helpme"),
    'base' => 'vc_row',
    'is_container' => true,
    'icon' => 'icon-helpme-row vc_helpme_element-icon',
    'show_settings_on_create' => false,
    "category" => esc_html__('General', 'helpme'),
    'description' => esc_html__( 'Place content elements inside the row', 'helpme' ),
    "params" => array(
		array(
            "type" => "dropdown",
            "heading" => esc_html__("Position Row?.", "helpme"),
            "param_name" => "position",
            "value" => array(
                esc_html__('Relative', "helpme") => "relative",
                esc_html__('Absolute', "helpme") => "absolute"
            ),
            "description" => esc_html__("set row position.", "helpme")
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("Row Margin top.", "helpme"),
            "param_name" => "margin_top",
            "value" => "",
            "description" => esc_html__("set row margin top if required.", "helpme")
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("Row Margin bottom.", "helpme"),
            "param_name" => "margin_bottom",
            "value" => "",
            "description" => esc_html__("set row margin bottom if required.", "helpme")
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("Row Margin left.", "helpme"),
            "param_name" => "margin_left",
            "value" => "",
            "description" => esc_html__("set row margin left if required.", "helpme")
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("Row Margin right.", "helpme"),
            "param_name" => "margin_right",
            "value" => "",
            "description" => esc_html__("set row margin right if required.", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Column Paddings", "helpme"),
            "param_name" => "padding",
            "value" => "0",
            "min" => "0",
            "max" => "5",
            "step" => "1",
            "unit" => '%',
            "description" => esc_html__("This option will create paading space inside columns to allow. mostly useful when 'Attached Colums' option is enabled. Please note that padding unit is by percent and will be applied to all directions.", "helpme")
        ),
        $add_device_visibility,
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "helpme"),
            "param_name" => "el_class",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "helpme")
        )
    ),
    "js_view" => 'VcRowView'
));
vc_map(array(
    "name" => esc_html__("Row", "helpme"),
    "base" => "vc_row_inner",
    "content_element" => false,
    "is_container" => true,
    "show_settings_on_create" => false,
    'icon' => 'icon-helpme-row vc_helpme_element-icon',
    'description' => esc_html__( 'Place content elements inside the row', 'helpme' ),
    "params" => array(
        $add_device_visibility,
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "helpme"),
            "param_name" => "el_class",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "helpme")
        )
    ),
    "js_view" => 'VcRowView'
));
$column_width_list = array(
    esc_html__('1 column - 1/12', 'helpme') => '1/12',
    esc_html__('2 columns - 1/6', 'helpme') => '1/6',
    esc_html__('3 columns - 1/4', 'helpme') => '1/4',
    esc_html__('4 columns - 1/3', 'helpme') => '1/3',
    esc_html__('5 columns - 5/12', 'helpme') => '5/12',
    esc_html__('6 columns - 1/2', 'helpme') => '1/2',
    esc_html__('7 columns - 7/12', 'helpme') => '7/12',
    esc_html__('8 columns - 2/3', 'helpme') => '2/3',
    esc_html__('9 columns - 3/4', 'helpme') => '3/4',
    esc_html__('10 columns - 5/6', 'helpme') => '5/6',
    esc_html__('11 columns - 11/12', 'helpme') => '11/12',
    esc_html__('12 columns - 1/1', 'helpme') => '1/1'
);
vc_map(array(
    "name" => esc_html__("vc Column", "helpme"),
    "base" => "vc_column",
    "is_container" => true,
    "content_element" => false,
    "params" => array(
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Column Border Color", "helpme"),
            "param_name" => "border_color",
            "value" => "",
            "description" => esc_html__("You can optionally add border color to columns.", "helpme")
        ),
        $add_device_visibility,
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "helpme"),
            "param_name" => "el_class",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "helpme")
        ),
         array(
            'type' => 'css_editor',
            'heading' => esc_html__( 'Css', 'helpme' ),
            'param_name' => 'css',
            // 'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'helpme' ),
            'group' => esc_html__( 'Design options', 'helpme' )
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Width', 'helpme' ),
            'param_name' => 'width',
            'value' => $column_width_list,
            'group' => esc_html__( 'Width & Responsiveness', 'helpme' ),
            'description' => esc_html__( 'Select column width.', 'helpme' ),
            'std' => '1/1'
        ),
        array(
            'type' => 'column_offset',
            'heading' => esc_html__('Responsiveness', 'helpme'),
            'param_name' => 'offset',
            'group' => esc_html__( 'Width & Responsiveness', 'helpme' ),
            'description' => esc_html__('Adjust column for different screen sizes. Control width, offset and visibility settings.', 'helpme')
        )
    ),
    "js_view" => 'VcColumnView'
));

vc_map( array(
    "name" => esc_html__( "Column", "helpme" ),
    "base" => "vc_column_inner",
    "class" => "",
    "icon" => "",
    "wrapper_class" => "",
    "controls" => "full",
    "allowed_container_element" => false,
    "content_element" => false,
    "is_container" => true,
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__( "Extra class name", "helpme" ),
            "param_name" => "el_class",
            "value" => "",
            "description" => esc_html__( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "helpme" )
        ),
         array(
            'type' => 'css_editor',
            'heading' => esc_html__( 'Css', 'helpme' ),
            'param_name' => 'css',
            // 'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'helpme' ),
            'group' => esc_html__( 'Design options', 'helpme' )
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Width', 'helpme' ),
            'param_name' => 'width',
            'value' => $column_width_list,
            'group' => esc_html__( 'Width & Responsiveness', 'helpme' ),
            'description' => esc_html__( 'Select column width.', 'helpme' ),
            'std' => '1/1'
        ),
    ),
    "js_view" => 'VcColumnView'
) );
*/
vc_map(array(
    "name" => esc_html__("Page Section", "helpme"),
    "base" => "helpme_page_section",
    "category" => esc_html__('General', 'helpme'),
    "as_parent" => array('only' => 'vc_row',),
    'icon' => 'icon-helpme-page-section vc_helpme_element-icon',
    "content_element" => true,
    "show_settings_on_create" => true,
    "is_container" => true,
    'description' => esc_html__( 'Customisable full width page section.', 'helpme' ),
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Section Structure", "helpme"),
            "param_name" => "layout_structure",
            "width" => 300,
            "value" => array(
                esc_html__('Full Layout', "helpme") => "full",
                esc_html__('One Half (Background Image on Left & Content in Right)', "helpme") => "half_left",
                esc_html__('One Half (Background Image on Right & Content in Left)', "helpme") => "half_right"
            ),
            "description" => esc_html__("If chosen One Half layouts, uploaded background image will be displyed in one half of the screen width. the shortcodes placed in this section will occupy the rest of the half(not screen wide, rather it will follow half of the main grid width).", "helpme")
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
            "type" => "colorpicker",
            "heading" => esc_html__("Border Top and Bottom Color", "helpme"),
            "param_name" => "border_color",
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
            "description" => esc_html__("The background-attachment property sets whether a background image is fixed or scrolls with the rest of the page. <a href='http://www.w3schools.com/CSSref/pr_background-attachment.asp'>Read More</a>", "helpme"),
            "dependency" => array(
                'element' => "layout_structure",
                'value' => array(
                    'full'
                )
            )
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
            "description" => esc_html__("First value defines horizontal position and second vertical positioning.", "helpme"),
            "dependency" => array(
                'element' => "layout_structure",
                'value' => array(
                    'full'
                )
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Background Repeat", "helpme"),
            "param_name" => "bg_repeat",
            "width" => 300,
            "value" => array(
                esc_html__('Repeat', "helpme") => "repeat",
                esc_html__('No Repeat', "helpme") => "no-repeat",
                esc_html__('Horizontally repeat', "helpme") => "repeat-x",
                esc_html__('Vertically Repeat', "helpme") => "repeat-y"
            ),
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "layout_structure",
                'value' => array(
                    'full'
                )
            )
        ),
        array(
            "type" => "toggle",
            "heading" => esc_html__('Cover whole background', 'helpme'),
            "description" => esc_html__("Scale the background image to be as large as possible so that the background area is completely covered by the background image. Some parts of the background image may not be in view within the background positioning area.", "helpme"),
            "param_name" => "bg_stretch",
            "value" => "false"
        ),
		array(
            "type" => "dropdown",
            "heading" => esc_html__("Enable Parallax background", "helpme"),
            "param_name" => "parallax",
            "value" => array(
                esc_html__('No', "helpme") => "false",
                esc_html__('Yes', "helpme") => "true"
            ),
            "description" => esc_html__("Using this option you can make this page section's height to cover the whole visible screen height (Not document height). Please note that if the inner content is larger than the window height, this feature will be disabled. Full height is browser resize sensitive and completely responsive.", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Parallax Direction", "helpme"),
            "param_name" => "parallax_direction",
            "width" => 300,
            "value" => array(
                esc_html__('Vertical trigger on page scroll', "helpme") => "vertical",
                esc_html__('Vertical trigger on mouse move', "helpme") => "vertical_mouse",
                esc_html__('Horizontal trigger on page scroll', "helpme") => "horizontal",
                esc_html__('Horizontal trigger on mouse move', "helpme") => "horizontal_mouse",
                esc_html__('Horizontal & Vertical trigger on mouse move', "helpme") => "both_axis_mouse"
            ),
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "layout_structure",
                'value' => array(
                    'full'
                )
            )
        ),

        array(
            "type" => "dropdown",
            "heading" => esc_html__("Background Video?", "helpme"),
            "param_name" => "bg_video",
            "width" => 300,
            "value" => array(
                esc_html__('No', "helpme") => "no",
                esc_html__('Yes', "helpme") => "yes"
            ),
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "upload",
            "heading" => esc_html__("MP4 Format", "helpme"),
            "param_name" => "mp4",
            "value" => "",
            "description" => esc_html__("Compatibility for Safari, IE9", "helpme"),
            "dependency" => array(
                'element' => "bg_video",
                'value' => array(
                    'yes'
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
                'element' => "bg_video",
                'value' => array(
                    'yes'
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
                'element' => "bg_video",
                'value' => array(
                    'yes'
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
                'element' => "bg_video",
                'value' => array(
                    'yes'
                )
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Expandable Page Section", "helpme"),
            "param_name" => "expandable",
            "width" => 300,
            "value" => array(
                esc_html__('No', "helpme") => "false",
                esc_html__('Yes', "helpme") => "true"
            ),
            "description" => esc_html__("If you want to have your page section content in a toggle that can be clicked to expand/collapse, Choose Yes and customize below options. This option will not work if \"Full Height\" option is enabled.", "helpme")
        ),
        array(
            "type" => "toggle",
            "heading" => esc_html__("Mask Pattern? (optional)", "helpme"),
            "param_name" => "mask",
            "description" => esc_html__("If you enable this option a pattern will overlay the section.", "helpme"),
            "value" => "false",
            "dependency" => array(
                'element' => "layout_structure",
                'value' => array(
                    'full'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Color Mask (optional)", "helpme"),
            "param_name" => "color_mask",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "layout_structure",
                'value' => array(
                    'full'
                )
            )
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Color Mask Opacity", "helpme"),
            "param_name" => "mask_opacity",
            "value" => "0.6",
            "min" => "0",
            "max" => "1",
            "step" => "0.1",
            "unit" => 'alpha',
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "layout_structure",
                'value' => array(
                    'full'
                )
            )
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Expandable Page Section Text", "helpme"),
            "param_name" => "expandable_txt",
            "value" => "",
            "description" => esc_html__("e.g. Click here to see more.", "helpme"),
            "dependency" => array(
                'element' => "expandable",
                'value' => array(
                    'true'
                )
            )
        ),
        array(
            "type" => "upload",
            "heading" => esc_html__("Expandable Page Section Hover Image", "helpme"),
            "param_name" => "expandable_image",
            "value" => "",
            "description" => esc_html__("", "helpme"),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Expandable Page Section Hover Icon", "helpme"),
            "param_name" => "expandable_icon",
            "value" => "helpme-theme-icon-plus",
            "description" => esc_html__(" to get the icon class name (or any other font icons library that you have installed in the theme)", "helpme"). wp_kses_post(__("<a target='_blank' href='" . admin_url('tools.php?page=icon-library') . "'>Click here</a>", "helpme")),
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Expandable Page Section Icon Size", "helpme"),
            "param_name" => "expandable_icon_size",
            "value" => "16",
            "min" => "16",
            "max" => "300",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "expandable",
                'value' => array(
                    'true'
                )
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Expandable Page Section Text Align", "helpme"),
            "param_name" => "expandable_txt_align",
            "width" => 300,
            "value" => array(
                esc_html__('Left', "helpme") => "left",
                esc_html__('Center', "helpme") => "center",
                esc_html__('Right', "helpme") => "right"
            ),
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "expandable",
                'value' => array(
                    'true'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Expandable Page Section Text & Arrow Color", "helpme"),
            "param_name" => "expandable_txt_color",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "expandable",
                'value' => array(
                    'true'
                )
            )
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Expandable Page Section Text Size", "helpme"),
            "param_name" => "expandable_txt_size",
            "value" => "16",
            "min" => "12",
            "max" => "100",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "expandable",
                'value' => array(
                    'true'
                )
            )
        ),

        array(
            "type" => "range",
            "heading" => esc_html__("Padding Top", "helpme"),
            "param_name" => "padding_top",
            "value" => "20",
            "min" => "0",
            "max" => "1000",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("This option defines how much top  distance you need to have inside this section", "helpme")
        ),
		array(
            "type" => "range",
            "heading" => esc_html__("Padding Bottom", "helpme"),
            "param_name" => "padding_bottom",
            "value" => "20",
            "min" => "0",
            "max" => "1000",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("This option defines how much bottom distance you need to have inside this section", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Full Screen Height?", "helpme"),
            "param_name" => "full_height",
            "value" => array(
                esc_html__('No', "helpme") => "false",
                esc_html__('Yes', "helpme") => "true"
            ),
            "description" => esc_html__("Using this option you can make this page section's height to cover the whole visible screen height (Not document height). Please note that if the inner content is larger than the window height, this feature will be disabled. Full height is browser resize sensitive and completely responsive.", "helpme")
        ),
        array(
            "type" => "toggle",
            "heading" => esc_html__("Full Width?", "helpme"),
            "param_name" => "full_width",
            "value" => "false",
            "description" => esc_html__("If you want to make this section's content 100% full width enable this option.", "helpme"),
            "dependency" => array(
                'element' => "layout_structure",
                'value' => array(
                    'full'
                )
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Page Section Intro Effect", "helpme"),
            "param_name" => "intro_effect",
            "value" => array(
                esc_html__('None', "helpme") => "false",
                esc_html__('Shuffle', "helpme") => "shuffle",
                esc_html__('Zoom Out', "helpme") => "zoom_out",
                esc_html__('Fade In', "helpme") => "fade"
            ),
            "description" => esc_html__("Note that this page section must be the first element in the page with full height enabled above.", "helpme"),
            "dependency" => array(
                'element' => "expandable",
                'value' => array(
                    'false'
                )
            )
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Section ID", "helpme"),
            "param_name" => "section_id",
            "value" => "",
            "description" => esc_html__("You can user this field to give your page section a unique ID. please note that this should be used only once in a page.", "helpme")
        ),
        $add_device_visibility,
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "helpme"),
            "param_name" => "el_class",
            "value" => "",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "helpme")
        )

    ),
    "js_view" => 'VcRowView'
));

vc_map(array(
    "name" => esc_html__("Custom Box", "helpme"),
    "base" => "helpme_custom_box",
    "as_parent" => array('except' => 'vc_row,helpme_page_section'),
    "content_element" => true,
    "show_settings_on_create" => false,
    "description" => esc_html__("Custom Box For your contents.","helpme"),
    'icon' => 'icon-helpme-custom-box vc_helpme_element-icon',
    "category" => esc_html__('General', 'helpme'),
    "params" => array(

        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Border Color", "helpme"),
            "param_name" => "border_color",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Background Color", "helpme"),
            "param_name" => "bg_color",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "toggle",
            "heading" => esc_html__("Drop Outer Shadow", "helpme"),
            "param_name" => "drop_shadow",
            "value" => "false"
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
            "type" => "dropdown",
            "heading" => esc_html__("Background Repeat", "helpme"),
            "param_name" => "bg_repeat",
            "width" => 300,
            "value" => array(
                esc_html__('Repeat', "helpme") => "repeat",
                esc_html__('No Repeat', "helpme") => "no-repeat",
                esc_html__('Horizontally repeat', "helpme") => "repeat-x",
                esc_html__('Vertically Repeat', "helpme") => "repeat-y"
            ),
            "description" => esc_html__("", "helpme")
        ),
		
        array(
            "type" => "toggle",
            "heading" => esc_html__("Scale the background image to be as large as possible so that the background area is completely covered by the background image. Some parts of the background image may not be in view within the background positioning area", "helpme"),
            "param_name" => "bg_stretch",
            "value" => "false"
        ),
		
		array(
            "type" => "dropdown",
            "heading" => esc_html__("text align", "helpme"),
            "param_name" => "text_align",
            "value" => array(
                esc_html__('Center', "helpme") => "center",
                esc_html__('Left', "helpme") => "left",
                esc_html__('Right', "helpme") => "right"
            ),
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Padding Top and Bottom", "helpme"),
            "param_name" => "padding_vertical",
            "value" => "30",
            "min" => "0",
            "max" => "200",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Padding Left and Right", "helpme"),
            "param_name" => "padding_horizental",
            "value" => "20",
            "min" => "0",
            "max" => "200",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Margin Bottom", "helpme"),
            "param_name" => "margin_bottom",
            "value" => "20",
            "min" => "-50",
            "max" => "300",
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
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "helpme")
        )
    ),
    "js_view" => 'VcColumnView'
));

vc_map(array(
    "name" => esc_html__("Image", "helpme"),
    "base" => "helpme_image",
    "category" => esc_html__('General', 'helpme'),
    'description' => esc_html__( 'Adds Image element with many styles.', 'helpme' ),
    'icon' => 'icon-helpme-image vc_helpme_element-icon',
    "params" => array(
        array(
            "type" => "upload",
            "heading" => esc_html__("Upload Your image", "helpme"),
            "param_name" => "src",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),

        array(
            "type" => "range",
            "heading" => esc_html__("Image Width", "helpme"),
            "param_name" => "image_width",
            "value" => "500",
            "min" => "10",
            "max" => "2600",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Image Height", "helpme"),
            "param_name" => "image_height",
            "value" => "400",
            "min" => "10",
            "max" => "5000",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "toggle",
            "heading" => esc_html__("Image Cropping?", "helpme"),
            "param_name" => "crop",
            "value" => "true",
            "description" => esc_html__("If you dont want to crop your image based on the dimensions you defined above disable this option. Only wdith will be used to give the image container max-width property.", "helpme")
        ),
        array(
            "type" => "toggle",
            "heading" => esc_html__("Image Hover?", "helpme"),
            "param_name" => "hover",
            "value" => "true",
            "description" => esc_html__("If you disable this option the image hover layer including the 'click to open in lightbox' and 'image title' will be removed from this image.", "helpme")
        ),
        array(
            "type" => "toggle",
            "heading" => esc_html__("Image Circular?", "helpme"),
            "param_name" => "circular",
            "value" => "false",
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Hover Style", "helpme"),
            "param_name" => "hover_style",
            "width" => 150,
            "value" => array(
                esc_html__('Style 1', "helpme") => "style1",
                esc_html__('Style 2', "helpme") => "style2"
            ),
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Custom URL", "helpme"),
            "param_name" => "custom_url",
            "value" => "",
            "description" => esc_html__("use this option if you want to link to a webpage instead of 'click to open in lightbox'", "helpme")
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Custom LightBox URL", "helpme"),
            "param_name" => "custom_lightbox_url",
            "value" => "",
            "description" => esc_html__("If you want to load custom image, video in lightbox then fill this form with the URL of the image or video(e.g. youtube, vimeo)'", "helpme")
        ),
        array(
            "type" => "toggle",
            "heading" => esc_html__("Lightbox iFrame Mode", "helpme"),
            "param_name" => "lightbox_ifarme",
            "value" => "false",
            "description" => esc_html__("If you are using a custom ligthbox url and the content you would like to show is webpage, google maps or flash content, enable this option.", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Custom URL Target", "helpme"),
            "param_name" => "target",
            "width" => 200,
            "value" => $target_arr,
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Align", "helpme"),
            "param_name" => "align",
            "width" => 150,
            "value" => array(
                esc_html__('Left', "helpme") => "left",
                esc_html__('Right', "helpme") => "right",
                esc_html__('Center', "helpme") => "center"
            ),
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Lightbox Group rel", "helpme"),
            "param_name" => "group",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Margin Bottom", "helpme"),
            "param_name" => "margin_bottom",
            "value" => "10",
            "min" => "-50",
            "max" => "300",
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
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "helpme")
        )



    )
));


vc_map(array(
    "name" => esc_html__("Image Box", "helpme"),
    "base" => "helpme_image_box",
    "category" => esc_html__('General', 'helpme'),
    'description' => esc_html__( 'A custom box with image and content.', 'helpme' ),
    'icon' => 'icon-helpme-content-box vc_helpme_element-icon',
    "params" => array(
         array(
            "type" => "textfield",
            "heading" => esc_html__("Box Title", "helpme"),
            "param_name" => "title",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),

         array(
            "type" => "textarea",
            "heading" => esc_html__("Box Description", "helpme"),
            "param_name" => "content",
            "holder" => "div",
            "value" => "",
            "description" => esc_html__("This field accepts HTML tags.", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Media Type", "helpme"),
            "param_name" => "media_type",
            "width" => 150,
            "value" => array(
                esc_html__('Image', "helpme") => "image",
                esc_html__('Video', "helpme") => "video"
            ),
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "toggle",
            "heading" => esc_html__("Autoplay?", "helpme"),
            "param_name" => "autoplay",
            "value" => "false",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "media_type",
                'value' => array(
                    'video'
                )
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Video Host?", "helpme"),
            "param_name" => "video_host",
            "width" => 150,
            "value" => array(
                esc_html__('Self Hosted', "helpme") => "self_hosted",
                esc_html__('Social Hosted', "helpme") => "social_hosted"
            ),
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "media_type",
                'value' => array(
                    'video'
                )
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Video Host?", "helpme"),
            "param_name" => "video_host_social",
            "width" => 150,
            "value" => array(
                esc_html__('Youtube', "helpme") => "social_hosted_youtube",
                esc_html__('Vimeo', "helpme") => "social_hosted_vimeo"
            ),
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "video_host",
                'value' => array(
                    'social_hosted'
                )
            )
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Video ID?", "helpme"),
            "param_name" => "social_youtube_id",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "video_host_social",
                'value' => array(
                    'social_hosted_youtube'
                )
            )
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Video ID?", "helpme"),
            "param_name" => "social_vimeo_id",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "video_host_social",
                'value' => array(
                    'social_hosted_vimeo'
                )
            )
        ),
        array(
            "type" => "upload",
            "heading" => esc_html__("Background Video (.MP4)", "helpme"),
            "param_name" => "mp4",
            "value" => "",
            "description" => esc_html__("Upload your video with .MP4 extension. (Compatibility for Safari and IE9)", "helpme"),
            "dependency" => array(
                'element' => "video_host",
                'value' => array(
                    'self_hosted'
                )
            )
        ),
        array(
            "type" => "upload",
            "heading" => esc_html__("Background Video (.WebM)", "helpme"),
            "param_name" => "webm",
            "value" => "",
            "description" => esc_html__("Upload your video with .WebM extension. (Compatibility for Firefox4, Opera, and Chrome)", "helpme"),
            "dependency" => array(
                'element' => "video_host",
                'value' => array(
                    'self_hosted'
                )
            )
        ),
        array(
            "type" => "upload",
            "heading" => esc_html__("Background Video (.OGV)", "helpme"),
            "param_name" => "ogv",
            "value" => "",
            "description" => esc_html__("Upload preview image for mobile devices", "helpme"),
            "dependency" => array(
                'element' => "video_host",
                'value' => array(
                    'self_hosted'
                )
            )
        ),
        array(
            "type" => "upload",
            "heading" => esc_html__("Preview Image", "helpme"),
            "param_name" => "preview_image",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "video_host",
                'value' => array(
                    'self_hosted'
                )
            )
        ),
        array(
            "type" => "upload",
            "heading" => esc_html__("Upload Your image", "helpme"),
            "param_name" => "src",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "media_type",
                'value' => array(
                    'image'
                )
            )
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Box Width", "helpme"),
            "param_name" => "media_width",
            "value" => "500",
            "min" => "10",
            "max" => "2600",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme"),
            // "dependency" => array(
            //     "element" => "media_type",
            //     "value" => array(
            //         "image"
            //     )
            // )
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Image Height", "helpme"),
            "param_name" => "media_height",
            "value" => "400",
            "min" => "10",
            "max" => "5000",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                "element" => "media_type",
                "value" => array(
                    "image"
                )
            )
        ),
        array(
            "type" => "toggle",
            "heading" => esc_html__("Image Cropping?", "helpme"),
            "param_name" => "crop",
            "value" => "true",
            "description" => esc_html__("If you dont want to crop your image based on the dimensions you defined above disable this option. Only wdith will be used to give the image container max-width property.", "helpme"),
            "dependency" => array(
                "element" => "media_type",
                "value" => array(
                    "image"
                )
            )

        ),

        array(
            "type" => "dropdown",
            "heading" => esc_html__("Image Link?", "helpme"),
            "param_name" => "image_link",
            "width" => 200,
            "value" => array(
                esc_html__('Lightbox', "helpme") => "lightbox",
                esc_html__('Url', "helpme") => "url"
            ),
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                "element" => "media_type",
                "value" => array(
                    "image"
                )
            )
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Link (optional)", "helpme"),
            "param_name" => "url",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "image_link",
                'value' => array(
                    'url'
                )
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("URL Target", "helpme"),
            "param_name" => "target",
            "width" => 200,
            "value" => $target_arr,
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "image_link",
                'value' => array(
                    'url'
                )
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Align", "helpme"),
            "param_name" => "align",
            "width" => 150,
            "value" => array(
                esc_html__('Left', "helpme") => "left",
                esc_html__('Right', "helpme") => "right",
                esc_html__('Center', "helpme") => "center"
            ),
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Box Background Color", "helpme"),
            "param_name" => "bg_color",
            "value" => "",
            "description" => esc_html__("", "helpme"),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Border Color", "helpme"),
            "param_name" => "border_color",
            "value" => "",
            "description" => esc_html__("If left blank no border will be added.", "helpme"),
        ),

        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Text Color", "helpme"),
            "param_name" => "text_color",
            "value" => "",
            "description" => esc_html__("This option will apply to title and description", "helpme"),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Title Color", "helpme"),
            "param_name" => "title_color",
            "value" => "",
            "description" => esc_html__("This option will apply to title and description", "helpme"),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Title Text Transform", "helpme"),
            "param_name" => "title_text_transform",
            "width" => 150,
            "value" => array(
                esc_html__('Default', "helpme") => "",
                esc_html__('None', "helpme") => "none",
                esc_html__('Uppercase', "helpme") => "uppercase",
                esc_html__('Lowercase', "helpme") => "lowercase",
                esc_html__('Capitalize', "helpme") => "capitalize"
            ),
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Title Font Weight", "helpme"),
            "param_name" => "title_font_weight",
            "width" => 150,
            "value" => array(
                esc_html__('Default', "helpme") => "inherit",
                esc_html__('Semi Bold', "helpme") => "600",
                esc_html__('Bold', "helpme") => "bold",
                esc_html__('Bolder', "helpme") => "bolder",
                esc_html__('Normal', "helpme") => "normal",
                esc_html__('Light', "helpme") => "300"
            ),
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'custom'
                )
            )
        ),
        array(
            "type" => "toggle",
            "heading" => esc_html__("Rounded Corners?", "helpme"),
            "param_name" => "rounded_corner",
            "value" => "false",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "media_type",
                'value' => array(
                    'image'
                )
            )
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
/*
vc_map(array(
    "name" => esc_html__("Moving Image", "helpme"),
    "base" => "helpme_moving_image",
    "category" => esc_html__('General', 'helpme'),
    'icon' => 'icon-helpme-moving-image vc_helpme_element-icon',
    'description' => esc_html__( 'Images powered by CSS3 moving animations.', 'helpme' ),
    "params" => array(

        array(
            "type" => "upload",
            "heading" => esc_html__("Upload Your image", "helpme"),
            "param_name" => "src",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),

        array(
            "type" => "dropdown",
            "heading" => esc_html__("Style", "helpme"),
            "param_name" => "style",
            "value" => $infinite_animation,
            "description" => esc_html__("", "helpme")
        ),

        array(
            "type" => "dropdown",
            "heading" => esc_html__("Align", "helpme"),
            "param_name" => "align",
            "width" => 150,
            "value" => array(
                esc_html__('Left', "helpme") => "left",
                esc_html__('Right', "helpme") => "right",
                esc_html__('Center', "helpme") => "center"
            ),
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Title & Alt", "helpme"),
            "param_name" => "title",
            "value" => "",
            "description" => esc_html__("For SEO purposes you may need to fill out the title and alt property for this image", "helpme")
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
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "helpme")
        )

    )
));



vc_map(array(
    "name" => esc_html__("Image Gallery", "helpme"),
    "base" => "helpme_gallery",
    'icon' => 'icon-helpme-image-gallery vc_helpme_element-icon',
    'description' => esc_html__( 'Adds images in grids in many styles.', 'helpme' ),
    "category" => esc_html__('General', 'helpme'),
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
            "heading" => esc_html__("Style", "helpme"),
            "param_name" => "style",
            "value" => array(
                "Grid" => "grid",
                "Slider with Thumbnails" => "thumb",
                "Masonry" => "masonry",

            ),
            "description" => esc_html__("Please choose how would you like to show you gallery images?", "helpme")
        ),

        array(
            "type" => "dropdown",
            "heading" => esc_html__("Structure", "helpme"),
            "param_name" => "structure",
            "value" => array(
                "Column Base" => "column",
                "scroller" => "scroller"
            ),
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'grid'
                )
            )
        ),

        array(
            "type" => "dropdown",
            "heading" => esc_html__("Masonry Style", "helpme"),
            "param_name" => "masonry_style",
            "value" => array(
                "Style 1" => "style1",
                "Style 2" => "style2",
                "Style 3" => "style3",
                "Style 4" => "style4"
            ),
            "description" => esc_html__("Mansory Styles Structure see below image :</br><img src='".HELPME_THEME_ADMIN_ASSETS_URI."/img/gallery-mansory-styles.png' /><br>", 'helpme'),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'masonry'
                )
            )
        ),
        array(
            "heading" => esc_html__("Image Size", 'helpme'),
            "description" => esc_html__("", 'helpme'),
            "param_name" => "image_size",
            "value" => array(
                esc_html__("Resize & Crop", 'helpme') => "crop",
                esc_html__("Original Size", 'helpme') => "full",
                esc_html__("Large Size", 'helpme') => "large",
                esc_html__("Medium Size", 'helpme') => "medium"
            ),
            "type" => "dropdown",
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'grid'
                )
            )
        ),
        array(
            "heading" => esc_html__("Item Spacing", 'helpme'),
            "description" => esc_html__("Space between items.", 'helpme'),
            "param_name" => "item_spacing",
            "value" => "8",
            "min" => "0",
            "max" => "50",
            "step" => "1",
            "unit" => 'px',
            "type" => "range",
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'masonry'
                )
            )
        ),

        array(
            "type" => "range",
            "heading" => esc_html__("How many Columns?", "helpme"),
            "param_name" => "column",
            "value" => "3",
            "min" => "1",
            "max" => "6",
            "step" => "1",
            "unit" => 'column',
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "structure",
                'value' => array(
                    'column'
                )
            )
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Image Dimension", "helpme"),
            "param_name" => "scroller_dimension",
            "value" => "400",
            "min" => "100",
            "max" => "1000",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("This width will be applied to both height and width.", "helpme"),
            "dependency" => array(
                'element' => "structure",
                'value' => array(
                    'scroller'
                )
            )
        ),

        array(
            "type" => "range",
            "heading" => esc_html__("Preview Image Width", "helpme"),
            "param_name" => "thumb_style_width",
            "value" => "700",
            "min" => "100",
            "max" => "1000",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'thumb'
                )
            )
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Preview Image Height", "helpme"),
            "param_name" => "thumb_style_height",
            "value" => "380",
            "min" => "100",
            "max" => "1000",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'thumb'
                )
            )
        ),
        array(
            "heading" => esc_html__("Hover Scenarios", 'helpme'),
            "description" => esc_html__("This is what happens when user hovers over a gallery item.", 'helpme'),
            "param_name" => "hover_scenarios",
            "value" => array(
                esc_html__("Overlay Layer", 'helpme') => "overlay",
                esc_html__("Gradient Layer", 'helpme') => 'gradient'
            ),
            "type" => "dropdown",
        ),
        array(
            "type" => "toggle",
            "heading" => esc_html__("Image Title", "helpme"),
            "param_name" => "enable_title",
            "value" => "true",
            "description" => esc_html__("If you dont want to show image title disable this option.", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'grid'
                )
            )
        ),

        array(
            "type" => "range",
            "heading" => esc_html__("Image Height", "helpme"),
            "param_name" => "height",
            "value" => "500",
            "min" => "100",
            "max" => "1000",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("You can define you gallery image's height from this option. It only works for column structure", "helpme"),
            "dependency" => array(
                'element' => "structure",
                'value' => array(
                    'column'
                ),
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Increase Quality of Image", "helpme"),
            "param_name" => "image_quality",
            "value" => array(
                esc_html__("No Actions", 'helpme') => "1",
                esc_html__("Images 2 times bigger (retina compatible)", 'helpme') => "2",
                esc_html__("Images 3 times bigger (fullwidth row compatible)", 'helpme') => "3"
            ),
            "description" => esc_html__("If you want Gallery images be retina compatible or you just want to use it in fullwidth row, you may consider increasing the image size. This option basically amplifies the image size to not let the browser scale it to fit the column (which is a quality loss).", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'grid'
                )
            )
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Margin Bottom", "helpme"),
            "param_name" => "margin_bottom",
            "value" => "20",
            "min" => "0",
            "max" => "300",
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
        ),
         array(
            'type' => 'item_id',
            'heading' => esc_html__( 'Item ID', 'helpme' ),
            'param_name' => "item_id"
        )

    )
));


*/

vc_map(array(
    "name" => esc_html__("Button", "helpme"),
    "base" => "helpme_button",
    "category" => esc_html__('General', 'helpme'),
    'icon' => 'icon-helpme-button vc_helpme_element-icon',
    'description' => esc_html__( 'Powerful & versatile button shortcode', 'helpme' ),
    "params" => array(
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => esc_html__("Button Text", "helpme"),
            "param_name" => "content",
            "rows" => 1,
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Style", "helpme"),
            "param_name" => "style",
            "value" => array(
                //"Flat" => "flat",
                //"3D" => "three-dimension",
                //"Outline" => "outline",
               // "Line" => "line",
                "Fill" => "fill",
               // "Nudge" => "nudge",
               // "Radius" => "radius",
               // "Fancy Link" => "fancy_link"
            ),
            "description" => esc_html__("", "helpme")
        ),

        array(
            "type" => "dropdown",
            "heading" => esc_html__("Corner style", "helpme"),
            "param_name" => "corner_style",
            "value" => array(
                "Pointed" => "pointed",
                "Rounded" => "rounded",
                "Full Rounded" => "full_rounded"
            ),
            "description" => esc_html__("How will your button corners look like?", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'flat',
                    'three-dimension',
                    'outline',
                    'fill',
                    'nudge'
                )
            )
        ),

        array(
            "type" => "dropdown",
            "heading" => esc_html__("Size", "helpme"),
            "param_name" => "size",
            "value" => array(
                "Small" => "small",
                "Medium" => "medium",
                "Large" => "large",
                "X Large" => "xlarge",
                "XX Large" => "xxlarge"
            ),
            "description" => esc_html__("", "helpme")
        ),
		array(
            "type" => "dropdown",
            "heading" => esc_html__("display", "helpme"),
            "param_name" => "display",
            "value" => array(
				"Block" => "block",
                "Inline Block" => "inline-block",
                "Inline" => "inline"

            ),
            "description" => esc_html__("", "helpme")
        ),

        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Button Background Color", "helpme"),
            "param_name" => "bg_color",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'flat',
                    'three-dimension',
					'fill',
                )
            )
        ),
		array(
            "type" => "colorpicker",
            "heading" => esc_html__("Button Background Color on hover", "helpme"),
            "param_name" => "bg_hover_color",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
					'fill'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Button Text Color", "helpme"),
            "param_name" => "txt_color",
            "value" => "#fff",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'flat',
                    'three-dimension',
                    'fancy_link'
                )
            )
        ),
		array(
            "type" => "range",
            "heading" => esc_html__("font size", "helpme"),
            "param_name" => "font_size",
            "value" => "14",
			'min' => "10",
			'min' => "24",
            "description" => esc_html__("", "helpme")
        ),

        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Underline Color", "helpme"),
            "param_name" => "underline_color",
            "value" => "#ddd",
            "description" => esc_html__("This option is for outline style.", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'fancy_link'
                )
            )
        ),

        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Outline Button Skin", "helpme"),
            "param_name" => "outline_skin",
            "value" => "",
            "description" => esc_html__("This option is for outline style.", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'outline',
                    'line',
                    'fill',
                    'radius'
                )
            )
        ),

        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Outline Button Hover Text", "helpme"),
            "param_name" => "outline_hover_skin",
            "value" => "#fff",
            "description" => esc_html__("This option is for outline style.", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'outline',
                    'line',
                    'fill'
                )
            )
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Outline Button Border Width", "helpme"),
            "param_name" => "outline_border_width",
            "value" => "2",
            "min" => "1",
            "max" => "5",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'outline',
                    'fill'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Nudge Button Skin", "helpme"),
            "param_name" => "nudge_skin",
            "value" => "#444444",
            "description" => esc_html__("This option is for outline style.", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'nudge'
                )
            )
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Add Icon Class Name", "helpme"),
            "param_name" => "icon",
            "value" => "",
            "description" => esc_html__(" to get the icon class name (or any other font icons library that you have installed in the theme)", "helpme"). wp_kses_post(__("<a target='_blank' href='" . admin_url('tools.php?page=icon-library') . "'>Click here</a>", "helpme")),
            "dependency" => array(
                "element" => "style",
                "value" => array(
                    'flat',
                    'three-dimension',
                    'outline',
                    'line',
                    'fill',
                    'nudge',
                    'radius'
                )
            )
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Button URL", "helpme"),
            "param_name" => "url",
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
            "heading" => esc_html__("Align", "helpme"),
            "param_name" => "align",
            "width" => 150,
            "value" => array(
                esc_html__('Left', "helpme") => "left",
                esc_html__('Right', "helpme") => "right",
                esc_html__('Center', "helpme") => "center"
            ),
            "description" => esc_html__("", "helpme")
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Button ID", "helpme"),
            "param_name" => "id",
            "value" => "",
            "description" => esc_html__("If your want to use id for this button to refer it in your custom JS, fill this textbox.", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Margin Bottom", "helpme"),
            "param_name" => "margin_bottom",
            "value" => "15",
            "min" => "-30",
            "max" => "500",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Infinite Animations", "helpme"),
            "param_name" => "infinite_animation",
            "value" => $infinite_animation,
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                "element" => "style",
                "value" => array(
                    'flat',
                    'three-dimension',
                    'outline',
                    'line',
                    'fill',
                    'nudge',
                    'radius'
                )
            )
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


vc_map(array(
    "name" => esc_html__("Call to Action", "helpme"),
    "base" => "helpme_call_to_action",
    "category" => esc_html__('General', 'helpme'),
    'icon' => 'icon-helpme-mini-callout-box vc_helpme_element-icon',
    'description' => esc_html__( 'Callout box for important infos.', 'helpme' ),
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Box Style", "helpme"),
            "param_name" => "style",
            "value" => array(
				"Custom" => "custom",
                "Default" => "default"
                
            ),

            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Layout Style", "helpme"),
            "param_name" => "layout_style",
            "value" => array(
                "Expended" => "expended",
                "Centered" => "centered",
				"Modern" => "modern"
            ),

            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Box Border Width", "helpme"),
            "param_name" => "box_border_width",
            "value" => "0",
            "min" => "1",
            "max" => "5",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme"),
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Button Border Width", "helpme"),
            "param_name" => "button_border_width",
            "value" => "2",
            "min" => "1",
            "max" => "5",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme"),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Box Background Color", "helpme"),
            "param_name" => "bg_color",
            "value" => "#272e43",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'custom'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Box Border Color", "helpme"),
            "param_name" => "border_color",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'custom',
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Text Color", "helpme"),
            "param_name" => "text_color",
            "value" => "#ffffff",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'custom'
                )
            )
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Font Size", "helpme"),
            "param_name" => "text_size",
            "value" => "36",
            "min" => "12",
            "max" => "70",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'custom'
                )
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Font Weight", "helpme"),
            "param_name" => "font_weight",
            "width" => 150,
            "value" => array(
                esc_html__('Default', "helpme") => "inherit",
                esc_html__('Semi Bold', "helpme") => "600",
                esc_html__('Bold', "helpme") => "bold",
                esc_html__('Bolder', "helpme") => "bolder",
                esc_html__('Normal', "helpme") => "normal",
                esc_html__('Light', "helpme") => "300"
            ),
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'custom'
                )
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Text Transform", "helpme"),
            "param_name" => "text_transform",
            "width" => 150,
            "value" => array(
                esc_html__('Default', "helpme") => "uppercase",
                esc_html__('None', "helpme") => "none",
                esc_html__('Uppercase', "helpme") => "uppercase",
                esc_html__('Lowercase', "helpme") => "lowercase",
                esc_html__('Capitalize', "helpme") => "capitalize"
            ),
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'custom'
                )
            )
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Content Text", "helpme"),
            "param_name" => "text",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("Content Text field 2", "helpme"),
            "param_name" => "text2",
            "value" => "",
            "description" => esc_html__("", "helpme"),
			"dependency" => array(
                'element' => "layout_style",
                'value' => array(
                    'modern'
                )
            )
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("Content Text field 3", "helpme"),
            "param_name" => "text3",
            "value" => "",
            "description" => esc_html__("color of this text field will be the theme color ", "helpme"),
			"dependency" => array(
                'element' => "layout_style",
                'value' => array(
                    'modern'
                )
            )
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("Content Text field 4", "helpme"),
            "param_name" => "text4",
            "value" => "",
            "description" => esc_html__("", "helpme"),
			"dependency" => array(
                'element' => "layout_style",
                'value' => array(
                    'modern'
                )
            )
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Button Text", "helpme"),
            "param_name" => "button_text",
            "value" => esc_html__("Donate Now", "helpme"),
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Button Style", "helpme"),
            "param_name" => "button_style",
            "value" => array(
                "Outline" => "outline",
                "Flat" => "flat"
            ),

            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Button URL", "helpme"),
            "param_name" => "button_url",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),

        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Button Skin", "helpme"),
            "param_name" => "outline_skin",
            "value" => "#82b541",
            "description" => esc_html__("", "helpme")
        ),
		array(
            "type" => "colorpicker",
            "heading" => esc_html__("Button Background Color", "helpme"),
            "param_name" => "outline_bg_color",
            "value" => "",
            "description" => esc_html__("", "helpme"),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Hover State Skin", "helpme"),
            "param_name" => "outline_hover_skin",
            "value" => "",
            "description" => esc_html__("This option is for Text and icon colors.", "helpme")
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "helpme"),
            "param_name" => "el_class",
            "value" => "",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "helpme")
        )
    )
));
/*
vc_map(array(
    "name" => esc_html__("Message Box", "helpme"),
    "base" => "helpme_message_box",
    'icon' => 'icon-helpme-message-box vc_helpme_element-icon',
    "category" => esc_html__('General', 'helpme'),
    'description' => esc_html__( 'Message Box with multiple types.', 'helpme' ),
    "params" => array(

        array(
            "type" => "dropdown",
            "heading" => esc_html__("Type", "helpme"),
            "param_name" => "type",
            "value" => array(
                "Love Box" => "love",
                "Hint Box" => "hint",
                "Solution Box" => "solution",
                "Alert Box" => "alert",
                "Confirm Box" => "confirm",
                "Warning Box" => "warning",
                "Star Box" => "star",
                "Built It Yourself" => "generic"
            ),

            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Style", "helpme"),
            "param_name" => "style",
            "value" => array(
                "Pointed Style" => "pointed",
                "Rounded Style" => "rounded"
            ),

            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Add Box Icon Class Name", "helpme"),
            "param_name" => "icon",
            "value" => "",
            "description" => esc_html__(" to get the icon class name (or any other font icons library that you have installed in the theme)", "helpme"). wp_kses_post(__("<a target='_blank' href='" . admin_url('tools.php?page=icon-library') . "'>Click here</a>", "helpme")),
            "dependency" => array(
                'element' => "type",
                'value' => array(
                    'generic'
                )
            )
        ),

        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Box Color", "helpme"),
            "param_name" => "box_color",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "type",
                'value' => array(
                    'generic'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Border Color", "helpme"),
            "param_name" => "border_color",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "type",
                'value' => array(
                    'generic'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Content Color", "helpme"),
            "param_name" => "content_color",
            "value" => "",
            "description" => esc_html__("This option affects icon, vertical separator and text color.", "helpme"),
            "dependency" => array(
                'element' => "type",
                'value' => array(
                    'generic'
                )
            )
        ),

        array(
            "type" => "textarea_html",
            "holder" => "div",
            "heading" => esc_html__("Write your message in this textarea.", "helpme"),
            "param_name" => "content",
            "value" => esc_html__("", "helpme"),
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
*/
vc_map(array(
    "name" => esc_html__("Icon Box", "helpme"),
    "base" => "helpme_icon_box",
    "category" => esc_html__('General', 'helpme'),
    'icon' => 'icon-helpme-icon-box vc_helpme_element-icon',
    'description' => esc_html__( 'Powerful & versatile Icon Boxes.', 'helpme' ),
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Box Style", "helpme"),
            "param_name" => "style",
            "width" => 300,
            "value" => array(
                esc_html__('Style 1', "helpme") => "style1",
                esc_html__('Style 2', "helpme") => "style2",
                esc_html__('Style 3', "helpme") => "style3",
                esc_html__('Style 4', "helpme") => "style4",
                esc_html__('Style 5', "helpme") => "style5",
                esc_html__('Style 6', "helpme") => "style6",
                esc_html__('Style 7', "helpme") => "style7",
				esc_html__('Style 8', "helpme") => "style8",
				esc_html__('Style 9', "helpme") => "style9"
            ),
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Icon Type", "helpme"),
            "param_name" => "icon_type",
            "value" => array(
                esc_html__('Icon', "helpme") => "icon",
                esc_html__('Image', "helpme") => "image"
            ),
            "description" => esc_html__("", "helpme"),
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Add Icon Class Name", "helpme"),
            "param_name" => "icon",
            "value" => "",
            "description" => esc_html__(" to get the icon class name (or any other font icons library that you have installed in the theme)", "helpme"). wp_kses_post(__("<a target='_blank' href='" . admin_url('tools.php?page=icon-library') . "'>Click here</a>", "helpme")),
            "dependency" => array(
                'element' => "icon_type",
                'value' => array(
                    'icon'
                )
            )
        ),

        array(
            "type" => "upload",
            "heading" => esc_html__("Icon Image", "helpme"),
            "param_name" => "icon_image",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "icon_type",
                'value' => array(
                    'image'
                )
            )
        ),
        
        array(
            "type" => "toggle",
            "heading" => esc_html__("Icon Container Frame?", "helpme"),
            "param_name" => "icon_frame",
            "value" => "true",
            "description" => esc_html__("If disabed, icon frame will be removed and box background color will be given to icon color. This option only works for Style 7.", "helpme"),
             "dependency" => array(
                'element' => "style",
                'value' => array(
                    'style7'
                )
            ),
        ),
		array(
            "type" => "toggle",
            "heading" => esc_html__("Icon Container Circle?", "helpme"),
            "param_name" => "rounded",
            "value" => "true",
            "description" => esc_html__("If you disable this option the icon container will not be rounded.", "helpme"),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Icon Align", "helpme"),
            "param_name" => "icon_align",
            "width" => 300,
            "value" => array(
                esc_html__('Left', "helpme") => "left",
                esc_html__('Right', "helpme") => "right",
                esc_html__('Top (Style7)', "helpme") => "top"
            ),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'style2',
                    'style7'
                )
            ),
            "description" => esc_html__("Please note that this option only works with Style 2 and 7. Top option only works for style 7.", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Icon Size (Style 7 only)", "helpme"),
            "param_name" => "icon_size",
            "value" => array(
                esc_html__('Small', "helpme") => "small",
                esc_html__('Medium (48px)', "helpme") => "medium",
                esc_html__('Large (64px)', "helpme") => "large",
            ),
            "description" => esc_html__("Please note that this option will not work for image type icon.", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'style7'
                )
            )
        ),
		array(
            "type" => "range",
            "heading" => esc_html__(" border width", "helpme"),
            "param_name" => "box_style8_border_width",
            "value" => '1',
			'max' => '5',
			'min' => '0',
			"unit" => 'px',
			'step' => '1',   
			"description" => esc_html__("Please note that this option will not work for image type icon.", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'style8'
                )
            )
        ),
		array(
            "type" => "range",
            "heading" => esc_html__(" border radius", "helpme"),
            "param_name" => "box_style8_border_radius",
            "value" => '0',
			'max' => '10',
			'min' => '0',
			"unit" => 'px',
			'step' => '1',   
			"description" => esc_html__("Please note that this option will not work for image type icon.", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'style8'
                )
            )
        ),
		array(
            "type" => "range",
            "heading" => esc_html__(" box shadow", "helpme"),
            "param_name" => "box_style8_box_shadow",
            "value" => '0',
			'max' => '100',
			'min' => '0',
			'step' => '1',   
			"description" => esc_html__("Please note that this option will not work for image type icon.", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'style8'
                )
            )
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", "helpme"),
            "param_name" => "title",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),

        array(
            "type" => "textarea_html",
            "holder" => "div",
            "heading" => esc_html__("Description", "helpme"),
            "param_name" => "content",
            "value" => esc_html__("", "helpme"),
            "description" => esc_html__("Enter your content.", "helpme")
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Read More Text", "helpme"),
            "param_name" => "read_more_txt",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Read More URL", "helpme"),
            "param_name" => "read_more_url",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),

        

        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Icon Skin", "helpme"),
            "param_name" => "icon_color",
            "value" => "",
            "description" => esc_html__("Icon color for style 1, style 2, style 3, style 5 means the icon color. For style 4, style 6 and style 7 icon frame fill color.", "helpme")
        ),

        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Title Color", "helpme"),
            "param_name" => "title_color",
            "value" => "",
            "description" => esc_html__("Optionally you can modify Title color inside this shortcode.", "helpme")
        ),

        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Paragraph Color", "helpme"),
            "param_name" => "txt_color",
            "value" => "",
            "description" => esc_html__("Optionally you can modify text color inside this shortcode.", "helpme")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Button Skin Color", "helpme"),
            "param_name" => "btn_skin",
            "value" => "",
            "description" => esc_html__("This option is for outline style.", "helpme"),
        ),

        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Button Hover Text Color", "helpme"),
            "param_name" => "btn_hover_skin",
            "value" => "",
            "description" => esc_html__("This option is for outline style.", "helpme"),
        ),

        array(
            "type" => "range",
            "heading" => esc_html__("Paragraph Text Line Height", "helpme"),
            "param_name" => "p_line_height",
            "value" => "26",
            "min" => "0",
            "max" => "50",
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

        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "helpme"),
            "param_name" => "el_class",
            "value" => "",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "helpme")
        )
    )
));





/*

vc_map(array(
    "name" => esc_html__("Divider", "helpme"),
    "base" => "helpme_divider",
    "category" => esc_html__('General', 'helpme'),
    'icon' => 'icon-helpme-divider vc_helpme_element-icon',
    'description' => esc_html__( 'Dividers with many styles & options.', 'helpme' ),
    "params" => array(

        array(
            "type" => "dropdown",
            "heading" => esc_html__("Style", "helpme"),
            "param_name" => "style",
            "value" => array(
                "Line" => 'single',
                "Dotted" => 'dotted',
                "Dashed" => 'dashed',
                "Thick" => 'thick'
            ),
            "description" => esc_html__("Please Choose the style of the line of divider.", "helpme")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Divider Color (optional)", "helpme"),
            "param_name" => "divider_color",
            "value" => '',
            "description" => esc_html__("This option will not affect fancy divider border color. default color : #e4e4e4", "helpme")
        ),

        array(
            "type" => "dropdown",
            "heading" => esc_html__("Divider Width", "helpme"),
            "param_name" => "divider_width",
            "value" => array(
                "Full Width" => "full_width",
                "One Half" => "one_half",
                "One Third" => "one_third",
                "One Fourth" => "one_fourth",
                "Custom Width" => "custom_width"
            ),
            "description" => esc_html__("There are 5 widths you can define for each of your divider styles.", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Divider Custom Width", "helpme"),
            "param_name" => "custom_width",
            "value" => "10",
            "min" => "1",
            "max" => "900",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("Choose any custom width for divider", "helpme"),
            "dependency" => array(
                'element' => "divider_width",
                'value' => array(
                    'custom_width'
                )
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Align", "helpme"),
            "param_name" => "align",
            "value" => array(
                "Center" => "center",
                "Left" => "left",
                "Right" => "right",
            ),
            "dependency" => array(
                'element' => "divider_width",
                'value' => array(
                    'custom_width'
                )
            )
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Divider Thickness", "helpme"),
            "param_name" => "thickness",
            "value" => "2",
            "min" => "1",
            "max" => "20",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'single'
                )
            )
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Padding Top", "helpme"),
            "param_name" => "margin_top",
            "value" => "20",
            "min" => "0",
            "max" => "500",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("How much space would you like to have before divider? this value will be applied to top.", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Padding Bottom", "helpme"),
            "param_name" => "margin_bottom",
            "value" => "20",
            "min" => "0",
            "max" => "500",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("How much space would you like to have after divider? this value will be applied to bottom.", "helpme")
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
    "name" => esc_html__("Table", "helpme"),
    "base" => "helpme_table",
    "category" => esc_html__('General', 'helpme'),
    'icon' => 'icon-helpme-table vc_helpme_element-icon',
    'description' => esc_html__( 'Adds styles to your data tables.', 'helpme' ),
    "params" => array(
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "heading" => esc_html__("Table HTML content. You can use below sample and create your own data tables.", "helpme"),
            "param_name" => "content",
            "value" => '<table width="100%">
<thead>
<tr>
<th>Column 1</th>
<th>Column 2</th>
<th>Column 3</th>
<th>Column 4</th>
</tr>
</thead>
<tbody>
<tr>
<td>Item #1</td>
<td>Description</td>
<td>Subtotal:</td>
<td>$3.00</td>
</tr>
<tr>
<td>Item #2</td>
<td>Description</td>
<td>Discount:</td>
<td>$4.00</td>
</tr>
<tr>
<td>Item #3</td>
<td>Description</td>
<td>Shipping:</td>
<td>$7.00</td>
</tr>
<tr>
<td>Item #4</td>
<td>Description</td>
<td>Tax:</td>
<td>$6.00</td>
</tr>
<tr>
<td><strong>All Items</strong></td>
<td><strong>Description</strong></td>
<td><strong>Your Total:</strong></td>
<td><strong>$20.00</strong></td>
</tr>
</tbody>
</table>',
            "description" => esc_html__("Please paste your table html code here.", "helpme")
        ),


        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "helpme"),
            "param_name" => "el_class",
            "value" => "",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "helpme")
        )
    )
));
*/
vc_map(array(
    "name" => esc_html__("Skill Meter", "helpme"),
    "base" => "helpme_skill_meter",
    'icon' => 'icon-helpme-skill-meter vc_helpme_element-icon',
    'description' => esc_html__( 'Show skills in bars by percent.', 'helpme' ),
    "params" => array(

        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", "helpme"),
            "param_name" => "title",
            "value" => "",
            "description" => esc_html__("What skill are you demonstrating?", "helpme")
        ),

        array(
            "type" => "range",
            "heading" => esc_html__("Percent", "helpme"),
            "param_name" => "percent",
            "value" => "50",
            "min" => "0",
            "max" => "100",
            "step" => "1",
            "unit" => '%',
            "description" => esc_html__("How many percent would you like to show from this skill?", "helpme")
        ),

        array(
            "type" => "range",
            "heading" => esc_html__("Progress Bar Height?", "helpme"),
            "param_name" => "height",
            "value" => "17",
            "min" => "5",
            "max" => "50",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Title Color", "helpme"),
            "param_name" => "title_color",
            "value" => '#777',
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Progress Bar Background Color", "helpme"),
            "param_name" => "progress_bar_color",
            "value" => $skin_color,
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Track Bar Background Color", "helpme"),
            "param_name" => "track_bar_color",
            "value" => '#eee',
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
    "name" => esc_html__("Chart", "helpme"),
    "base" => "helpme_chart",
    "category" => esc_html__('General', 'helpme'),
    'icon' => 'icon-helpme-chart vc_helpme_element-icon',
    'description' => esc_html__( 'Powerful & versatile Chart element.', 'helpme' ),
    "params" => array(

        array(
            "type" => "range",
            "heading" => esc_html__("Percent", "helpme"),
            "param_name" => "percent",
            "value" => "50",
            "min" => "0",
            "max" => "100",
            "step" => "1",
            "unit" => '%',
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Bar Color", "helpme"),
            "param_name" => "bar_color",
            "value" => $skin_color,
            "description" => esc_html__("The color of the circular bar.", "helpme")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Track Color", "helpme"),
            "param_name" => "track_color",
            "value" => "#fafafa",
            "description" => esc_html__("The color of the track for the bar.", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Line Width", "helpme"),
            "param_name" => "line_width",
            "value" => "15",
            "min" => "1",
            "max" => "20",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("Width of the bar line.", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Bar Size", "helpme"),
            "param_name" => "bar_size",
            "value" => "170",
            "min" => "1",
            "max" => "500",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("The Diameter of the bar.", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Content", "helpme"),
            "param_name" => "content_type",
            "width" => 200,
            "value" => array(
                "Percent" => "percent",
                "Icon" => "icon",
                "Custom Text" => "custom_text"
            ),
            "description" => esc_html__("The content inside the bar. If you choose icon, you should select your icon from below list. if you have selected custom text, then you should fill out the 'custom text' option below.", "helpme")
        ),

        array(
            "type" => "dropdown",
            "heading" => esc_html__("Icon Size", "helpme"),
            "param_name" => "icon_size",
            "width" => 200,
            "value" => array(
                "Small (16px)" => "16px",
                "Medium (32px)" => "32px",
                "Large (64px)" => "64px",
                "X Large (128px)" => "128px"
            ),
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "content_type",
                'value' => array(
                    'icon'
                )
            )
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Font Size?", "helpme"),
            "param_name" => "font_size",
            "value" => "18",
            "min" => "15",
            "max" => "50",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "content_type",
                'value' => array(
                    'custom_text',
                    'percent'
                )
            )
        ),

        array(
            "type" => "dropdown",
            "heading" => esc_html__("Font Weight", "helpme"),
            "param_name" => "font_weight",
            "width" => 150,
            "value" => array(
                esc_html__('Default', "helpme") => "inherit",
                esc_html__('Semi Bold', "helpme") => "600",
                esc_html__('Bold', "helpme") => "bold",
                esc_html__('Bolder', "helpme") => "bolder",
                esc_html__('Normal', "helpme") => "normal",
                esc_html__('Light', "helpme") => "300"
            ),
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "content_type",
                'value' => array(
                    'custom_text',
                    'percent'
                )
            )
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Add Icon Class Name", "helpme"),
            "param_name" => "icon",
            "value" => "",
            "description" => esc_html__(" to get the icon class name (or any other font icons library that you have installed in the theme)", "helpme"). wp_kses_post(__("<a target='_blank' href='" . admin_url('tools.php?page=icon-library') . "'>Click here</a>", "helpme")),
            "dependency" => array(
                'element' => "content_type",
                'value' => array(
                    'icon'
                )
            )
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Custom Text", "helpme"),
            "param_name" => "custom_text",
            "value" => "",
            "description" => esc_html__("Description will appear below each chart.", "helpme"),
            "dependency" => array(
                'element' => "content_type",
                'value' => array(
                    'custom_text'
                )
            )
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Description", "helpme"),
            "param_name" => "desc",
            "value" => "",
            "description" => esc_html__("Description will appear below each chart.", "helpme")
        ),
		array(
            "type" => "range",
            "heading" => esc_html__("Font Size?", "helpme"),
            "param_name" => "disc_font_size",
            "value" => "18",
            "min" => "15",
            "max" => "50",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "content_type",
                'value' => array(
                    'custom_text',
                    'percent'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Description Color", "helpme"),
            "param_name" => "desc_color",
            "value" => "",
            "description" => esc_html__("The color of the description.", "helpme")
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
    "name" => esc_html__("Padding Divider", "helpme"),
    "base" => "helpme_padding_divider",
   'icon' => 'icon-helpme-padding-space vc_helpme_element-icon',
    "category" => esc_html__('General', 'helpme'),
    'description' => esc_html__( 'Adds space between elements', 'helpme' ),
    "params" => array(
        array(
            "type" => "range",
            "heading" => esc_html__("Padding Size (Px)", "helpme"),
            "param_name" => "size",
            "value" => "40",
            "min" => "0",
            "max" => "500",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("How much space would you like to drop in this specific padding shortcode?", "helpme")
        )
    )
));

vc_map(array(
    "name" => esc_html__("Animated Columns", "helpme"),
    "base" => "helpme_animated_columns",
    "category" => esc_html__('General', 'helpme'),
    'icon' => 'icon-helpme-animated-columns vc_helpme_element-icon',
    'description' => esc_html__( 'Columns with cool animations.', 'helpme' ),
    "params" => array(
        array(
            "type" => "range",
            "heading" => esc_html__("Column Height", "helpme"),
            "param_name" => "column_height",
            "value" => "500",
            "min" => "100",
            "max" => "1200",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("Set the columns height", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("How many Columns in One Row?", "helpme"),
            "param_name" => "column_number",
            "value" => "4",
            "min" => "1",
            "max" => "8",
            "step" => "1",
            "unit" => 'columns',
            "description" => esc_html__("How many columns would you like to show in one row?", "helpme")
        ),
        array(
            "type" => "multiselect",
            "heading" => esc_html__("Choose the Animated Columns", "helpme"),
            "param_name" => "columns",
            "value" => '',
            "options" => $animated_columns,
            "description" => esc_html__("", "helpme")
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
            "description" => esc_html__("Sort retrieved pricing items by parameter.", 'helpme'),
            "param_name" => "orderby",
            "value" => $helpme_orderby,
            "type" => "dropdown"
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Column Styles", "helpme"),
            "param_name" => "style",
            "value" => array(
                "Simple Icon (Icon+Title)" => "simple",
                "Simple Text (Text+Title)" => "simple_text",
                "Full Featured (All)" => "full",
            ),
            "description" => esc_html__("Please choose your columns styles. In each style the feeding content and hover scenarios will be different.", "helpme")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Columns Border Color", "helpme"),
            "param_name" => "border_color",
            "value" => "",
            "description" => esc_html__("The column box color.", "helpme")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Columns Hover Border Color", "helpme"),
            "param_name" => "border_hover_color",
            "value" => "",
            "description" => esc_html__("The column box color.", "helpme")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Columns background Color", "helpme"),
            "param_name" => "bg_color",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Columns background Hover Color", "helpme"),
            "param_name" => "bg_hover_color",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),

        array(
            "type" => "dropdown",
            "heading" => esc_html__("Icon Size", "helpme"),
            "param_name" => "icon_size",
            "value" => array(
                esc_html__('16px', "helpme") => "16",
                esc_html__('32px', "helpme") => "32",
                esc_html__('48px', "helpme") => "48",
                esc_html__('64px', "helpme") => "64",
                esc_html__('128px', "helpme") => "128"
            ),
            "description" => esc_html__("Choose the icon sizes.", "helpme")
        ),

        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Icon / Text Color", "helpme"),
            "param_name" => "icon_color",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),

        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Icon / Text Hover Color", "helpme"),
            "param_name" => "icon_hover_color",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),

        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Text Color (Active)", "helpme"),
            "param_name" => "txt_color",
            "value" => "",
            "description" => esc_html__("This color will be used for title and description normal color. Description will have 70% opacity.", "helpme")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Text Color (Hover)", "helpme"),
            "param_name" => "txt_hover_color",
            "value" => "",
            "description" => esc_html__("This color will be used for title and description hover color.", "helpme")
        ),

        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Button Color (Active)", "helpme"),
            "param_name" => "btn_color",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),

        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Button Color (Hover)", "helpme"),
            "param_name" => "btn_hover_color",
            "value" => "",
            "description" => esc_html__("", "helpme")
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

*/

vc_map(array(
    "name" => esc_html__("Milestones", "helpme"),
    "base" => "helpme_milestone",
    "category" => esc_html__('General', 'helpme'),
    'icon' => 'icon-helpme-milestone vc_helpme_element-icon',
    'description' => esc_html__( 'Milestone numbers to show statistics.', 'helpme' ),
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Content Below Numbers?", "helpme"),
            "param_name" => "style",
            "width" => 200,
            "value" => array(
                "Classic" => "classic",
                "Modern" => "modern"
            ),
            "description" => esc_html__("", "helpme")
        ),
		array(
			"type" => "theme_fonts",
			"heading" => esc_html__("Font Family", "helpme"),
			"param_name" => "font_family",
			"value" => "Roboto",
			"description" => esc_html__("You can choose a font for this shortcode, however using non-safe fonts can affect page load and performance.", "helpme")
		),
		
		array(
            "type" => "textfield",
            "heading" => esc_html__("Element width", "helpme"),
            "param_name" => "mile_width",
            "value" => "150",
			"min" => "100",
            "max" => "370",
            "step" => "1",
            "description" => esc_html__("Please choose in which number it should start.", "helpme"),
			"dependency" => array(
                'element' => "style",
                'value' => array(
                    'classic'
                )
            )
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("Element height", "helpme"),
            "param_name" => "mile_height",
            "value" => "150",
			"min" => "100",
            "max" => "370",
            "step" => "1",
            "description" => esc_html__("Please choose in which number it should start.", "helpme")
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("Element Radius", "helpme"),
            "param_name" => "mile_radius",
            "value" => "500",
			"min" => "100",
            "max" => "370",
            "step" => "1",
            "description" => esc_html__("Please choose in which number it should start.", "helpme")
        ),
		array(
            "type" => "toggle",
            "heading" => esc_html__("box shadow", "helpme"),
            "param_name" => "mile_shadow",
            "value" => 'false',
            "description" => esc_html__("Please choose in which number it should start.", "helpme")
        ),
		 array(
            "type" => "colorpicker",
            "heading" => esc_html__("milestone background color", "helpme"),
            "param_name" => "mile_bg_color",
            "value" => "",
            "description" => esc_html__("", "helpme"),
        ),
		 array(
            "type" => "colorpicker",
            "heading" => esc_html__("milestone Border color", "helpme"),
            "param_name" => "mile_border_color",
            "value" => "#fff",
            "description" => esc_html__("", "helpme"),
             "dependency" => array(
                'element' => "style",
                'value' => array(
                    'classic',
					'modern'
                )
            )
        ),
		 array(
            "type" => "textfield",
            "heading" => esc_html__("milestone Border Width", "helpme"),
            "param_name" => "mile_border_width",
            "value" => "2",
            "description" => esc_html__("", "helpme"),
             "dependency" => array(
                'element' => "style",
                'value' => array(
                    'classic',
					'modern'
                )
            )
        ),
		array(
            "type" => "dropdown",
            "heading" => esc_html__("Border style", "helpme"),
            "param_name" => "mile_border_style",
            "value" => array(
                esc_html__('solid', "helpme") => "solid",
                esc_html__('dotted', "helpme") => "dotted",
                esc_html__('none', "helpme") => "none"
            ),
            "description" => esc_html__("", "helpme"),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Number Start at", "helpme"),
            "param_name" => "start",
            "value" => "0",
            "min" => "0",
            "max" => "100000",
            "step" => "1",
            "unit" => '',
            "description" => esc_html__("Please choose in which number it should start.", "helpme")
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Number Stop at", "helpme"),
            "param_name" => "stop",
            "value" => "100",
            "min" => "0",
            "max" => "100000",
            "step" => "1",
            "unit" => '',
            "description" => esc_html__("Please choose in which number it should Stop.", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Speed", "helpme"),
            "param_name" => "speed",
            "value" => "2000",
            "min" => "0",
            "max" => "10000",
            "step" => "1",
            "unit" => 'ms',
            "description" => esc_html__("Speed of the animation from start to stop in milliseconds.", "helpme")
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Number Text Size", "helpme"),
            "param_name" => "number_size",
            "value" => "36",
            "min" => "10",
            "max" => "60",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Content Below Numbers?", "helpme"),
            "param_name" => "type",
            "width" => 200,
            "value" => array(
                "Icon" => "icon",
                "Text" => "text",
                "No Content" => "none"
            ),
            "description" => esc_html__("Using icon or text would you prefer to represent this milestone?", "helpme")
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Add Icon Class Name", "helpme"),
            "param_name" => "icon",
            "value" => "",
            "description" => esc_html__(" to get the icon class name (or any other font icons library that you have installed in the theme)", "helpme"). wp_kses_post(__("<a target='_blank' href='" . admin_url('tools.php?page=icon-library') . "'>Click here</a>", "helpme")),
             "dependency" => array(
                'element' => "type",
                'value' => array(
                    'icon'
                )
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Icon Size?", "helpme"),
            "param_name" => "icon_size",
            "width" => 200,
            "value" => array(
                esc_html__('16px', "helpme") => "16",
                esc_html__('32px', "helpme") => "32",
                esc_html__('48px', "helpme") => "48",
                esc_html__('64px', "helpme") => "64",
                esc_html__('128px', "helpme") => "128"
            ),
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "type",
                'value' => array(
                    'icon'
                )
            )
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Text Below Numbers", "helpme"),
            "param_name" => "text",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "type",
                'value' => array(
                    'text'
                )
            )
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Number Suffix", "helpme"),
            "param_name" => "text_suffix",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'modern'
                )
            )
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Number Suffix Text Size", "helpme"),
            "param_name" => "number_suffix_text_size",
            "value" => "16",
            "min" => "10",
            "max" => "60",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'modern'
                )
            )
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Text Size", "helpme"),
            "param_name" => "text_size",
            "value" => "16",
            "min" => "10",
            "max" => "60",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "type",
                'value' => array(
                    'text'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Skin color", "helpme"),
            "param_name" => "color",
            "value" => "#919191",
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Text/Icon Color", "helpme"),
            "param_name" => "text_icon_color",
            "value" => "#fff",
            "description" => esc_html__("", "helpme"),
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
    "name" => esc_html__("Audio Player", "helpme"),
    "base" => "helpme_audio",
    "category" => esc_html__('General', 'helpme'),
    'icon' => 'icon-helpme-audio-player vc_helpme_element-icon',
    'description' => esc_html__( 'Adds player to your audio files.', 'helpme' ),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Audio Title", "helpme"),
            "param_name" => "file_title",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "upload",
            "heading" => esc_html__("Upload MP3 file format", "helpme"),
            "param_name" => "mp3_file",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "upload",
            "heading" => esc_html__("Upload OGG file format", "helpme"),
            "param_name" => "ogg_file",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),


        array(
            "type" => "toggle",
            "heading" => esc_html__("For small container?", "helpme"),
            "param_name" => "small_version",
            "value" => "false",
            "description" => esc_html__("If you want to use this player in a small container enable this option. This option will force player controls to below progress bar.", "helpme")
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
    "name" => esc_html__("Process Steps", "helpme"),
    "base" => "helpme_process_steps",
    "as_parent" => array('only' => 'helpme_step'),
    "content_element" => true,
    'icon' => 'icon-helpme-process-builder vc_helpme_element-icon',
    'description' => esc_html__( 'Adds process steps element.', 'helpme' ),
    "category" => esc_html__('Content', 'helpme'),
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Orientation", "helpme"),
            "param_name" => "orientation",
            "value" => array(
                "Vertical" => "vertical",
                "Horizontal" => "horizontal"

            ),
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Skin", "helpme"),
            "param_name" => "skin",
            "value" => array(
                "dark" => "dark",
                "Light" => "light",
                "Custom" => "custom"

            ),
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Background Color?", "helpme"),
            "param_name" => "background_color",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "skin",
                'value' => array(
                    'custom'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Border Color?", "helpme"),
            "param_name" => "border_color",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "skin",
                'value' => array(
                    'custom'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Icon Color?", "helpme"),
            "param_name" => "icon_color",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "skin",
                'value' => array(
                    'custom'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Icon Hover Color?", "helpme"),
            "param_name" => "icon_hover_color",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "skin",
                'value' => array(
                    'custom'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Title Color?", "helpme"),
            "param_name" => "title_color",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "skin",
                'value' => array(
                    'custom'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Description Color?", "helpme"),
            "param_name" => "description_color",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "skin",
                'value' => array(
                    'custom'
                )
            )
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "helpme"),
            "param_name" => "el_class",
            "value" => "",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "helpme")
        )
    ),
 "js_view" => 'VcColumnView'
));



vc_map(array(
    "name" => esc_html__("Step", "helpme"),
    "base" => "helpme_step",
    "content_element" => true,
    "as_child" => array('only' => 'helpme_process_steps'),
    "is_container" => true,
    'icon' => 'icon-helpme-process-builder vc_helpme_element-icon',
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", "helpme"),
            "param_name" => "title",
            "description" => esc_html__("", "helpme")
        ),

        array(
            "type" => "range",
            "heading" => esc_html__("Title Font Size?", "helpme"),
            "param_name" => "font_size",
            "value" => "16",
            "min" => "10",
            "max" => "50",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme"),
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Title Line Height?", "helpme"),
            "param_name" => "line_height",
            "value" => "16",
            "min" => "10",
            "max" => "50",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme"),
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Title Margin Bottom?", "helpme"),
            "param_name" => "margin_bottom",
            "value" => "10",
            "min" => "5",
            "max" => "25",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme"),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Title Font Weight", "helpme"),
            "param_name" => "font_weight",
            "width" => 150,
            "value" => array(
                esc_html__('Default', "helpme") => "inherit",
                esc_html__('Semi Bold', "helpme") => "600",
                esc_html__('Bold', "helpme") => "bold",
                esc_html__('Bolder', "helpme") => "bolder",
                esc_html__('Normal', "helpme") => "normal",
                esc_html__('Light', "helpme") => "300"
            ),
            "description" => esc_html__("", "helpme"),
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Short Description", "helpme"),
            "param_name" => "desc",
            "description" => esc_html__("", "helpme")
        ),


        array(
            "type" => "textfield",
            "heading" => esc_html__("Add Icon Class Name", "helpme"),
            "param_name" => "icon",
            "value" => "helpme-li-smile",
            "description" => esc_html__(" to get the icon class name (or any other font icons library that you have installed in the theme)", "helpme"). wp_kses_post(__("<a target='_blank' href='" . admin_url('tools.php?page=icon-library') . "'>Click here</a>", "helpme")),,
        ),
        array(
            'type' => 'item_id',
            'heading' => esc_html__( 'Item ID', 'helpme' ),
            'param_name' => "tab_id"
        )


    ),
    "js_view" => 'VcColumnView'
));




vc_map(array(
    "name" => esc_html__("Icon Text", "helpme"),
    "base" => "helpme_icon_text",
    "category" => esc_html__('General', 'helpme'),
    'icon' => 'icon-helpme-icon-box vc_helpme_element-icon',
    'description' => esc_html__( 'Powerful & versatile Icon Text.', 'helpme' ),
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Skin", "helpme"),
            "param_name" => "skin",
            "width" => 300,
            "value" => array(
                esc_html__('Dark', "helpme") => "dark",
                esc_html__('Light', "helpme") => "light",
                esc_html__('Custom', "helpme") => "custom"
            ),
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Custom Color?", "helpme"),
            "param_name" => "custom_color",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "skin",
                'value' => array(
                    'custom'
                )
            )
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Default Text", "helpme"),
            "param_name" => "default_txt",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Default Text Font Weight", "helpme"),
            "param_name" => "default_txt_font_weight",
            "width" => 200,
            "default" => 'bold',
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
            "type" => "range",
            "heading" => esc_html__("Default Text Font Size?", "helpme"),
            "param_name" => "font_size",
            "value" => "30",
            "min" => "15",
            "max" => "100",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme"),
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("On Hover Text", "helpme"),
            "param_name" => "hover_txt",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),
        array(
            "heading" => esc_html__("On Hover Text Font Size", "helpme"),
            "param_name" => "hover_font_size",
            "value" => "16",
            "min" => "15",
            "max" => "30",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme"),
            'type' => 'range'
        ),
        array(
            "heading" => esc_html__("On Hover Text Line Height", "helpme"),
            "param_name" => "hover_line_height",
            "value" => "18",
            "min" => "15",
            "max" => "50",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme"),
            'type' => 'range'
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("On Hover Text Font Weight", "helpme"),
            "param_name" => "hover_txt_font_weight",
            "width" => 200,
            "default" => 'bold',
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
            "type" => "textfield",
            "heading" => esc_html__("Link (optional)", "helpme"),
            "param_name" => "link",
            "value" => "",
            "description" => esc_html__("Will convert the icon to a link.", "helpme")
        ),
         array(
            "type" => "dropdown",
            "heading" => esc_html__("Link Target", "helpme"),
            "param_name" => "target",
            "width" => 200,
            "value" => $target_arr,
            "description" => esc_html__("", "helpme")
        ),


        array(
            "type" => "textfield",
            "heading" => esc_html__("Add Icon Class Name", "helpme"),
            "param_name" => "icon",
            "value" => "",
            "description" => esc_html__(" to get the icon class name (or any other font icons library that you have installed in the theme)", "helpme"). wp_kses_post(__("<a target='_blank' href='" . admin_url('tools.php?page=icon-library') . "'>Click here</a>", "helpme")),
        ),

        array(
            "type" => "dropdown",
            "heading" => esc_html__("Icon Size", "helpme"),
            "param_name" => "icon_size",
            "width" => 300,
            "value" => array(
                esc_html__('48px', "helpme") => "48",
                esc_html__('64px', "helpme") => "64",
                esc_html__('128px', "helpme") => "128"
            ),
            "description" => esc_html__("", "helpme")
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
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "helpme")
        )
    )
));

vc_map(array(
    "name" => esc_html__("Secondary Header", "helpme"),
    "base" => "helpme_header",
    "category" => esc_html__('General', 'helpme'),
    "params" => array(

        array(
            "type" => "dropdown",
            "heading" => esc_html__("Menu Location", "helpme"),
            "param_name" => "menu_location",
            "width" => 150,
            "value" => array(
                esc_html__('Primary Navigation', "helpme") => "primary-menu",
                esc_html__('Second Navigation', "helpme") => "second-menu",
                esc_html__('Third Navigation', "helpme") => "third-menu",
                esc_html__('Fourth Navigation', "helpme") => "fourth-menu",
                esc_html__('Fifth Navigation', "helpme") => "fifth-menu",
                esc_html__('Sixth Navigation', "helpme") => "sixth-menu",
                esc_html__('Seventh Navigation', "helpme") => "seventh-menu"
            ),

            "description" => esc_html__("Please choose which menu location you would like to assign to this header.", "helpme")
        ),
         array(
            "type" => "toggle",
            "heading" => esc_html__("Squeeze Header?", "helpme"),
            "param_name" => "squeeze",
            "value" => "true",
            "description" => esc_html__("If you disable this option header height will be in normal height rather than being in sticky state.", "helpme")
        ),

         array(
            "type" => "toggle",
            "heading" => esc_html__("Header Logo?", "helpme"),
            "param_name" => "show_logo",
            "value" => "true",
            "description" => esc_html__("If you dont want to show logo in secondary header, disable this option.", "helpme")
        ),
         array(
            "type" => "toggle",
            "heading" => esc_html__("Header Search Icon?", "helpme"),
            "param_name" => "show_search",
            "value" => "true",
            "description" => esc_html__("If you dont want to show search icon in secondary header, disable this option.", "helpme")
        ),
        array(
            "type" => "toggle",
            "heading" => esc_html__("Header Cart?", "helpme"),
            "param_name" => "show_cart",
            "value" => "true",
            "description" => esc_html__("If you dont want to show cart section in secondary header, disable this option.", "helpme")
        ),
        array(
            "type" => "toggle",
            "heading" => esc_html__("Header Wpml?", "helpme"),
            "param_name" => "show_wpml",
            "value" => "true",
            "description" => esc_html__("If you dont want to show wpml section in secondary header, disable this option.", "helpme")
        ),
        array(
            "type" => "toggle",
            "heading" => esc_html__("Header Border Top?", "helpme"),
            "param_name" => "show_border",
            "value" => "true",
            "description" => esc_html__("If you dont want to show border top in secondary header, disable this option.", "helpme")
        ),
         array(
            "type" => "dropdown",
            "heading" => esc_html__("Header Align", "helpme"),
            "param_name" => "align",
            "value" => array(
                esc_html__('Left', "helpme") => "left",
                esc_html__('Center', "helpme") => "center",
                esc_html__('Right', "helpme") => "right",
            ),

            "description" => esc_html__("", "helpme")
        ),
         array(
            "type" => "dropdown",
            "heading" => esc_html__("Header Wideness", "helpme"),
            "param_name" => "wideness",
            "value" => array(
                esc_html__('Boxed Layout', "helpme") => "boxed",
                esc_html__('Screen Wide Full', "helpme") => "full",
            ),

            "description" => esc_html__("", "helpme")
        ),
          array(
            "heading" => esc_html__("Header Custom Height", "helpme"),
            "param_name" => "custom_header_height",
            "value" => "0",
            "min" => "0",
            "max" => "300",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("If you want to inherit from default value you have for regular menu set the option value to zero. Its recommended to use this option when you disable logo for this header.", "helpme"),
            'type' => 'range'
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Background Color?", "helpme"),
            "param_name" => "background_color",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "group" => "Styling Settings",
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Link Color?", "helpme"),
            "param_name" => "link_color",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "group" => "Styling Settings",
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Link Hover Color?", "helpme"),
            "param_name" => "link_hover_color",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "group" => "Styling Settings",
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Border Top Color?", "helpme"),
            "param_name" => "border_color",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "group" => "Styling Settings",
        ),
        array(
            "heading" => esc_html__("Main Navigation Top Level Font Size", "helpme"),
            "param_name" => "top_level_item_size",
            "value" => "0",
            "min" => "0",
            "max" => "50",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("If you want to inherit from default value you set it for main header set the value to zero.", "helpme"),
            'type' => 'range',
            "group" => "Styling Settings",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "helpme"),
            "param_name" => "el_class",
            "value" => "",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "helpme")
        ),
        

    )
));

*/
vc_map(array(
    "name" => esc_html__("Event Countdown", "helpme"),
    "base" => "helpme_countdown",
    "category" => esc_html__('General', 'helpme'),
    'icon' => 'icon-helpme-event-countdown vc_helpme_element-icon',
    'description' => esc_html__( 'Countdown module for your events.', 'helpme' ),
    "params" => array(
		array(
            "heading" => esc_html__("countdown style", "helpme"),
            "param_name" => "countdown_style",
            "value" => array(
                esc_html__("style 1", "helpme") => '1',
                esc_html__("style 2", "helpme") => '2',
                esc_html__("style 3", "helpme") => '3',
				esc_html__("style 4", "helpme") => '4',
				esc_html__("style 5", "helpme") => '5'
            ),
            "type" => "dropdown"
        ),
		array(
            "heading" => esc_html__("Swith layout left to right", "helpme"),
            "param_name" => "switch",
            "value" => array(
                esc_html__("counter on left", "helpme") => 'left',
                esc_html__("counter on right", "helpme") => 'right',
            ),
            "type" => "dropdown",
			"dependency" => array(
                'element' => "countdown_style",
                'value' => array(
                    '5'
                )
            )
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Upcoming Event Date", "helpme"),
            "param_name" => "date",
            "value" => "",
            "description" => esc_html__("Please fill this field with expect date. eg : 12/24/2015 12:00:00 => month/day/year hour:minute:second", "helpme")
        ),

        array(
            "heading" => esc_html__("UTC Timezone", "helpme"),
            "param_name" => "offset",
            "value" => array(
                "-12" => "-12",
                "-11" => "-11",
                "-10" => "-10",
                "-9" => "-9",
                "-8" => "-8",
                "-7" => "-7",
                "-6" => "-6",
                "-5" => "-5",
                "-4" => "-4",
                "-3" => "-3",
                "-2" => "-2",
                "-1" => "-1",
                "0" => "0",
                "+1" => "+1",
                "+2" => "+2",
                "+3" => "+3",
                "+4" => "+4",
                "+5" => "+5",
                "+6" => "+6",
                "+7" => "+7",
                "+8" => "+8",
                "+9" => "+9",
                "+10" => "+10",
                "+12" => "+12"
            ),
            "type" => "dropdown"
        ),


        /*array(
            "heading" => esc_html__("Skin", "helpme"),
            "param_name" => "skin",
            "value" => array(
                esc_html__("Dark", "helpme") => 'dark',
                esc_html__("Light", "helpme") => 'light',
                esc_html__("Accent Color", "helpme") => 'accent',
                esc_html__("Custom", "helpme") => 'custom'
            ),
			"dependency" => array(
                'element' => "countdown_style",
                'value' => array(
					'3'
                )
            ),
            "type" => "dropdown"
        ),

        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Custom Color?", "helpme"),
            "param_name" => "custom_color",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "skin",
                'value' => array(
                    'custom'
                )
            )
        ),*/
		array(
            "type" => "range",
            "heading" => esc_html__("border width", "helpme"),
            "param_name" => "border_width",
            "value" => "1",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "countdown_style",
                'value' => array(
                    '2',
					'3'
                )
            )
        ),
		array(
            "type" => "colorpicker",
            "heading" => esc_html__("border color", "helpme"),
            "param_name" => "border_color",
            "value" => "1",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "countdown_style",
                'value' => array(
                    '2',
					'3'
                )
            )
        ),
		
		array(
            "type" => "colorpicker",
            "heading" => esc_html__("Days bg color Color?", "helpme"),
            "param_name" => "days_color",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "countdown_style",
                'value' => array(
                    '1'
                )
            )
        ),
		array(
            "type" => "colorpicker",
            "heading" => esc_html__("Hours bg color Color?", "helpme"),
            "param_name" => "hours_color",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "countdown_style",
                'value' => array(
                    '1'
                )
            )
        ),
		array(
            "type" => "colorpicker",
            "heading" => esc_html__("Minutes bg color Color?", "helpme"),
            "param_name" => "minutes_color",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "countdown_style",
                'value' => array(
                    '1'
                )
            )
        ),
		array(
            "type" => "colorpicker",
            "heading" => esc_html__("Seconds bg color Color?", "helpme"),
            "param_name" => "seconds_color",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "countdown_style",
                'value' => array(
                    '1'
                )
            )
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("upcoming event title?", "helpme"),
            "param_name" => "upcoming_event_title",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "countdown_style",
                'value' => array(
                    '1',
					'3'
                )
            )
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("upcoming event discription?", "helpme"),
            "param_name" => "upcoming_event_disc",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "countdown_style",
                'value' => array(
                    '1'
                )
            )
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("upcoming event button url?", "helpme"),
            "param_name" => "upcoming_event_url",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "countdown_style",
                'value' => array(
                    '1',
					'3'
                )
            )
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("upcoming event button text?", "helpme"),
            "param_name" => "upcoming_event_btn_text",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "countdown_style",
                'value' => array(
                    '1',
					'3'
                )
            )
        ),
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
    "name" => esc_html__("Widgetized Sidebar", "helpme"),
    "base" => "helpme_custom_sidebar",
    'icon' => 'icon-helpme-custom-sidebar vc_helpme_element-icon',
    'description' => esc_html__( 'Place Widgetized sidebar', 'helpme' ),
    "category" => esc_html__('Structure', 'helpme'),
    "params" => array(
        array(
          'type' => 'widgetised_sidebars',
          'heading' => esc_html__( 'Sidebar', 'helpme' ),
          'param_name' => 'sidebar',
          'description' => esc_html__( 'Select the widget area to be shown in this sidebar.', 'helpme' )
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "helpme"),
            "param_name" => "el_class",
            "value" => "",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your CSS file.", "helpme")
        )
    )
));
/*
vc_map(array(
    "name" => esc_html__("Flip Box", "helpme"),
    "base" => "helpme_flipbox",
    'icon' => 'icon-helpme-tab-slider vc_helpme_element-icon',
    "category" => esc_html__('General', 'helpme'),
    'description' => esc_html__( 'Flip based boxes.', 'helpme' ),
    'params' => array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Flip Direction", "helpme"),
            "param_name" => "flip_direction",
            "width" => 300,
            "value" => array(
                esc_html__('Horizontal', "helpme") => "horizontal",
                esc_html__('Vertical', "helpme") => "vertical"
            ),
            "description" => esc_html__("", "helpme")
        ),

        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Front Background Color", "helpme"),
            "param_name" => "front_background_color",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Back Background Color", "helpme"),
            "param_name" => "back_background_color",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Front Side Opacity?", "helpme"),
            "param_name" => "front_opacity",
            "value" => "1",
            "min" => "0.1",
            "max" => "1",
            "step" => "0.1",
            "unit" => 'alpha',
            "description" => esc_html__("", "helpme"),
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Back Side Opacity?", "helpme"),
            "param_name" => "back_opacity",
            "value" => "1",
            "min" => "0.1",
            "max" => "1",
            "step" => "0.1",
            "unit" => 'alpha',
            "description" => esc_html__("", "helpme"),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Front Aligment", "helpme"),
            "param_name" => "front_align",
            "width" => 200,
            "value" => array(
                esc_html__('Left', "helpme") => "left",
                esc_html__('Center', "helpme") => "center",
                esc_html__('Right', "helpme") => "right"
            ),
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Back Aligment", "helpme"),
            "param_name" => "back_align",
            "width" => 200,
            "value" => array(
                esc_html__('Left', "helpme") => "left",
                esc_html__('Center', "helpme") => "center",
                esc_html__('Right', "helpme") => "right"
            ),
            "description" => esc_html__("", "helpme")
        ),

        array(
            "heading" => esc_html__("Minimum Height", "helpme"),
            "param_name" => "min_height",
            "value" => "300",
            "min" => "250",
            "max" => "500",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme"),
            'type' => 'range'
        ),
        array(
            "heading" => esc_html__("Max Width", "helpme"),
            "param_name" => "max_width",
            "value" => "500",
            "min" => "250",
            "max" => "1000",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme"),
            'type' => 'range'
        ),
        array(
            "heading" => esc_html__("Left / Right Padding", "helpme"),
            "param_name" => "box_padding",
            "value" => "20",
            "min" => "10",
            "max" => "100",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme"),
            'type' => 'range'
        ),
        array(
            "type" => "toggle",
            "heading" => esc_html__('Border Radius?', 'helpme'),
            "description" => esc_html__("", "helpme"),
            "param_name" => "box_radius",
            "value" => "false"
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Front Title", "helpme"),
            "param_name" => "front_title",
            "value" => "",
            "description" => esc_html__("", "helpme"),
        ),
        array(
            "heading" => esc_html__("Front Title Font Size", "helpme"),
            "param_name" => "front_title_size",
            "value" => "20",
            "min" => "15",
            "max" => "50",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme"),
            'type' => 'range'
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Front Title Font Weight", "helpme"),
            "param_name" => "front_title_font_weight",
            "width" => 200,
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
            "type" => "colorpicker",
            "heading" => esc_html__("Front Title Font Color", "helpme"),
            "param_name" => "front_title_color",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),

        array(
            "type" => "textarea",
            "heading" => esc_html__("Front Description", "helpme"),
            "param_name" => "front_desc",
            "value" => "",
            "description" => esc_html__("", "helpme"),
        ),
        array(
            "heading" => esc_html__("Front Description Font Size", "helpme"),
            "param_name" => "front_desc_size",
            "value" => "20",
            "min" => "15",
            "max" => "30",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme"),
            'type' => 'range'
        ),
        array(
            "heading" => esc_html__("Front Description Line Height", "helpme"),
            "param_name" => "front_desc_line_height",
            "value" => "26",
            "min" => "15",
            "max" => "50",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme"),
            'type' => 'range'
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Front Description Font Color", "helpme"),
            "param_name" => "front_desc_color",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Back Title", "helpme"),
            "param_name" => "back_title",
            "value" => "",
            "description" => esc_html__("", "helpme"),
        ),
        array(
            "heading" => esc_html__("Back Title Font Size", "helpme"),
            "param_name" => "back_title_size",
            "value" => "20",
            "min" => "15",
            "max" => "50",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme"),
            'type' => 'range'
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Back Title Font Color", "helpme"),
            "param_name" => "back_title_color",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Back Title Font Weight", "helpme"),
            "param_name" => "back_title_font_weight",
            "width" => 200,
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
            "type" => "textarea",
            "heading" => esc_html__("Back Description", "helpme"),
            "param_name" => "back_desc",
            "value" => "",
            "description" => esc_html__("", "helpme"),
        ),
        array(
            "heading" => esc_html__("Back Description Font Size", "helpme"),
            "param_name" => "back_desc_size",
            "value" => "20",
            "min" => "15",
            "max" => "30",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme"),
            'type' => 'range'
        ),
        array(
            "heading" => esc_html__("Back Description Line Height", "helpme"),
            "param_name" => "back_desc_line_height",
            "value" => "26",
            "min" => "15",
            "max" => "50",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme"),
            'type' => 'range'
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Back Description Font Color", "helpme"),
            "param_name" => "back_desc_color",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Button Text", "helpme"),
            "param_name" => "button_text",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Button Url", "helpme"),
            "param_name" => "button_url",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),
        array(
            "heading" => esc_html__("Button Size", 'helpme'),
            "description" => esc_html__("", 'helpme'),
            "param_name" => "button_size",
            "value" => array(
                esc_html__("Small", 'helpme') => "small",
                esc_html__("Medium", 'helpme') => "medium",
                esc_html__("Large", 'helpme') => "large"
            ),
            "type" => "dropdown"
        ),

        array(
            "type" => "dropdown",
            "heading" => esc_html__("Button Corner Style", "helpme"),
            "param_name" => "button_corner_style",
            "value" => array(
                "Pointed" => "pointed",
                "Rounded" => "rounded",
                "Full Rounded" => "full_rounded"
            ),
            "description" => esc_html__("", "helpme")
        ),

        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Button Skin Color", "helpme"),
            "param_name" => "btn_skin_1",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Button Hover Color", "helpme"),
            "param_name" => "btn_skin_2",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),
        array(
            "heading" => esc_html__("Button Alignment", 'helpme'),
            "description" => esc_html__("", 'helpme'),
            "param_name" => "btn_alignment",
            "value" => array(
                esc_html__("Left", 'helpme') => "left",
                esc_html__("Center", 'helpme') => "center",
                esc_html__("Right", 'helpme') => "right"
            ),
            "type" => "dropdown"
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
*/