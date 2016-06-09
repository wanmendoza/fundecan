<?php

vc_map(array(
    "name" => esc_html__("Text block", "helpme"),
    "base" => "vc_column_text",
    "wrapper_class" => "clearfix",
    "category" => esc_html__('Typography', 'helpme'),
    'icon' => 'icon-helpme-text-block vc_helpme_element-icon',
     'description' => esc_html__( 'A block of text with WYSIWYG editor', 'helpme' ),
    "params" => array(

        array(
            "type" => "textarea_html",
            "holder" => "div",
            "heading" => esc_html__("Text", "helpme"),
            "param_name" => "content",
            "value" => esc_html__("", "helpme"),
            "description" => esc_html__("Enter your content.", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Tablet & Mobile Align.", "helpme"),
            "param_name" => "responsive_align",
            "value" => array(
                esc_html__('Center', "helpme") => "center",
                esc_html__('Left', "helpme") => "left",
                esc_html__('Right', "helpme") => "right",
            ),
            "description" => esc_html__("In some cases your text align for text may not look good in tablet and mobile devices. you can control align for tablet portrait and all mobile devices using this option. It will be center align by default!", "helpme")
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
    "name" => esc_html__("Fancy Title", "helpme"),
    "base" => "helpme_fancy_title",
    'icon' => 'icon-helpme-fancy-title vc_helpme_element-icon',
    "category" => esc_html__('Typography', 'helpme'),
    'description' => esc_html__( 'Advanced headings with cool styles.', 'helpme' ),
    "params" => array(

        array(
            "type" => "textarea_html",
            "holder" => "div",
            "heading" => esc_html__("Content.", "helpme"),
            "param_name" => "content",
            "value" => esc_html__("", "helpme"),
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Style", "helpme"),
            "param_name" => "style",
            "value" => array(
                "Simple Title" => "simple",
                "Stroke" => "stroke",
                "Standard" => "standard",
                "Avantgarde" => "avantgarde",
                "Alternative" => "alt",
                "Underline" => "underline"
            ),
            "description" => esc_html__("Please note that Alternative style will work only in page content and page sections with solid backgrounds.", "helpme")
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
                    'stroke'
                )
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Tag Name", "helpme"),
            "param_name" => "tag_name",
            "value" => array(
                "h3" => "h3",
                "h2" => "h2",
                "h4" => "h4",
                "h5" => "h5",
                "h6" => "h6",
                "h1" => "h1"
            ),
            "description" => esc_html__("For SEO reasons you might need to define your titles tag names according to priority. Please note that H1 can only be used once in a page due to the SEO reasons. So try to use lower than H2 to meet SEO best practices.", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Stroke Style Border Width", "helpme"),
            "param_name" => "border_width",
            "value" => "3",
            "min" => "1",
            "max" => "5",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("Changes border thickness. Please note that this option only works for Stroke style.", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'stroke',
                    'standard',
                    'avantgarde',
                    'alt',
                    'underline'
                )
            ),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Stroke Style Border Color", "helpme"),
            "param_name" => "border_color",
            "value" => "",
            "description" => esc_html__("If left blank given text color will be applied to border color. Please note that this option only works for Stroke style.", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'stroke'
                )
            ),
        ),
		array(
            "type" => "dropdown",
            "heading" => esc_html__("display.", "helpme"),
            "param_name" => "display",
            "value" => array(
                esc_html__('block', "helpme") => "block",
                esc_html__('inline block', "helpme") => "inline-block",
                esc_html__('inline', "helpme") => "inline",
				esc_html__('table cell', "helpme") => "table-cell",
            ),
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Font Size", "helpme"),
            "param_name" => "size",
            "value" => "14",
            "min" => "12",
            "max" => "100",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Text Line Height", "helpme"),
            "param_name" => "line_height",
            "value" => "24",
            "min" => "12",
            "max" => "100",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("Please note that this value should be more than font size. if less than font size line height value will be 100% to prevent reading issues.", "helpme")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Text Color", "helpme"),
            "param_name" => "color",
            "value" => "#393836",
            "description" => esc_html__("", "helpme")
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
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Text Transform", "helpme"),
            "param_name" => "text_transform",
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
            "type" => "range",
            "heading" => esc_html__("Letter Spacing", "helpme"),
            "param_name" => "letter_spacing",
            "value" => "0",
            "min" => "0",
            "max" => "10",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("Space between each character.", "helpme")
        ),


        array(
            "type" => "theme_fonts",
            "heading" => esc_html__("Font Family", "helpme"),
            "param_name" => "font_family",
            "value" => "",
            "description" => esc_html__("You can choose a font for this shortcode, however using non-safe fonts can affect page load and performance.", "helpme")
        ),
        array(
            "type" => "hidden_input",
            "param_name" => "font_type",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Margin Top", "helpme"),
            "param_name" => "margin_top",
            "value" => "10",
            "min" => "0",
            "max" => "500",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Margin Bottom", "helpme"),
            "param_name" => "margin_bottom",
            "value" => "10",
            "min" => "0",
            "max" => "500",
            "step" => "1",
            "unit" => 'px',
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
            "type" => "dropdown",
            "heading" => esc_html__("Tablet & Mobile Align.", "helpme"),
            "param_name" => "responsive_align",
            "value" => array(
                esc_html__('Center', "helpme") => "center",
                esc_html__('Left', "helpme") => "left",
                esc_html__('Right', "helpme") => "right",
            ),
            "description" => esc_html__("In some cases your text align for text may not look good in tablet and mobile devices. you can control align for tablet portrait and all mobile devices using this option. It will be center align by default!", "helpme")
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
    "name" => esc_html__("Custom heading", "helpme"),
    "base" => "helpme_custom_heading",
    'icon' => 'icon-helpme-message-box vc_helpme_element-icon',
    "category" => esc_html__('Typography', 'helpme'),
    'description' => esc_html__( 'custom heading Box with multiple types.', 'helpme' ),
    "params" => array(

        array(
            "type" => "textfield",
            "heading" => esc_html__("Insert your heading part1 here", "helpme"),
            "param_name" => "custom_heading_text1",
            "value" => '',
            "description" => esc_html__("", "helpme")
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("Insert your heading part2 here", "helpme"),
            "param_name" => "custom_heading_text2",
            "value" => '',
            "description" => esc_html__("", "helpme")
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("Insert your heading part3 here", "helpme"),
            "param_name" => "custom_heading_text3",
            "value" => '',
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__("Small text below heading", "helpme"),
            "param_name" => "custom_text_below_title",
            "value" => '',
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("heading custom color", "helpme"),
            "param_name" => "custom_heading_color",
            "value" => '',
            "description" => esc_html__("custom heading color will effect heading field 1 and 3 leave blank for default color", "helpme")
        ),
		array(
            "type" => "colorpicker",
            "heading" => esc_html__("heading custom color", "helpme"),
            "param_name" => "custom_text_color",
            "value" => '',
            "description" => esc_html__("custom heading color will effect text bellow heading leave blank for default color", "helpme")
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "helpme"),
            "param_name" => "el_class",
            "value" => "",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "helpme")
        ),

    )
));


vc_map(array(
    "name" => esc_html__("Fancy Text", "helpme"),
    "base" => "helpme_fancy_text",
    "category" => esc_html__('Typography', 'helpme'),
    'icon' => 'icon-helpme-title-box vc_helpme_element-icon',
    'description' => esc_html__( 'Adds title text into a highlight box.', 'helpme' ),
    "params" => array(

        array(
            "type" => "textarea_html",
            "rows" => 2,
            "holder" => "div",
            "heading" => esc_html__("Content.", "helpme"),
            "param_name" => "content",
            "value" => esc_html__("", "helpme"),
            "description" => esc_html__("Allowed Tags [em] [del] [i] [b] [strong] [u] [span] [small] [large] [sub] [sup]. Please note that [p] tags will be striped out.", "helpme")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Text Color", "helpme"),
            "param_name" => "color",
            "value" => "#393836",
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Hightlight Background Color", "helpme"),
            "param_name" => "highlight_color",
            "value" => "#000",
            "description" => esc_html__("The Hightlight Background color. you can change color opacity from below option.", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Hightlight Color Opacity", "helpme"),
            "param_name" => "highlight_opacity",
            "value" => "0.3",
            "min" => "0",
            "max" => "1",
            "step" => "0.01",
            "unit" => 'px',
            "description" => esc_html__("The Opacity of the hightlight background", "helpme")
        ),

        array(
            "type" => "range",
            "heading" => esc_html__("Font Size", "helpme"),
            "param_name" => "size",
            "value" => "18",
            "min" => "12",
            "max" => "70",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Line Height (Important)", "helpme"),
            "param_name" => "line_height",
            "value" => "34",
            "min" => "12",
            "max" => "500",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("Since every font family with differnt sizes need different line heights to get a nice looking highlighted titles you should set them manually. as a hint generally (font-size * 2) - 2 works in many cases, but you may need to give more space in between, so we opened your hands with this option. :) ", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Font Weight", "helpme"),
            "param_name" => "font_weight",
            "width" => 150,
            "value" => array(
                esc_html__('Default', "helpme") => "inherit",
                esc_html__('Medium', "helpme") => "500",
                esc_html__('Semi Bold', "helpme") => "600",
                esc_html__('Bold', "helpme") => "bold",
                esc_html__('Bolder', "helpme") => "bolder",
                esc_html__('Normal', "helpme") => "normal",
                esc_html__('Light', "helpme") => "300"
            ),
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Margin Top", "helpme"),
            "param_name" => "margin_top",
            "value" => "0",
            "min" => "-40",
            "max" => "500",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("In some ocasions you may on need to define a top margin for this title.", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Margin Buttom", "helpme"),
            "param_name" => "margin_bottom",
            "value" => "18",
            "min" => "0",
            "max" => "500",
            "step" => "1",
            "unit" => 'px',
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
            "type" => "hidden_input",
            "param_name" => "font_type",
            "value" => "",
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
                esc_html__('Center', "helpme") => "center",
                esc_html__('Justify', "helpme") => "justify"
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
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "helpme")
        )

    )
));

/*
vc_map(array(
    "name" => esc_html__("Blockquote", "helpme"),
    "base" => "helpme_blockquote",
    "category" => esc_html__('Typography', 'helpme'),
    'icon' => 'icon-helpme-blockquote vc_helpme_element-icon',
    'description' => esc_html__( 'Blockquote modules', 'helpme' ),
    "params" => array(


        array(
            "type" => "textarea_html",
            "holder" => "div",
            "heading" => esc_html__("Blockquote Message", "helpme"),
            "param_name" => "content",
            "value" => esc_html__("", "helpme"),
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Style", "helpme"),
            "param_name" => "style",
            "width" => 150,
            "value" => array(
                esc_html__('Classic', "helpme") => "classic",
                esc_html__('Modern', "helpme") => "modern"
            ),
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
    "name" => esc_html__("Dropcaps", "helpme"),
    "base" => "helpme_dropcaps",
    'icon' => 'icon-helpme-dropcaps vc_helpme_element-icon',
    "category" => esc_html__('Typography', 'helpme'),
    'description' => esc_html__( 'Dropcaps element shortcode.', 'helpme' ),
    "params" => array(

        array(
            "type" => "textfield",
            "heading" => esc_html__("Dropcaps Character", "helpme"),
            "param_name" => "char",
            "value" => esc_html__("", "helpme"),
            "description" => esc_html__("", "helpme")
        ),

        array(
            "type" => "dropdown",
            "heading" => esc_html__("Style", "helpme"),
            "param_name" => "style",
            "width" => 150,
            "value" => array(
                esc_html__('Square Default Color', "helpme") => "square-default",
                esc_html__('Circle default Color', "helpme") => "circle-default",
                esc_html__('Square Custom Color', "helpme") => "square-custom",
                esc_html__('Circle Custom Color', "helpme") => "circle-custom"
            ),
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Fill Color", "helpme"),
            "param_name" => "fill_color",
            "value" => $skin_color,
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'square-custom',
                    'circle-custom'
                )
            )
        ),
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "heading" => esc_html__("Paragraph", "helpme"),
            "param_name" => "content",
            "value" => esc_html__("", "helpme"),
            "description" => esc_html__("Enter your content.", "helpme")
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
    "name" => esc_html__("Gradient Text", "helpme"),
    "base" => "helpme_gradient_text",
    'icon' => '',
    "category" => esc_html__('Typography', 'helpme'),
    'description' => esc_html__( '', 'helpme' ),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Gradient Text", "helpme"),
            "param_name" => "text",
            "value" => esc_html__("", "helpme"),
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Align.", "helpme"),
            "param_name" => "text_align",
            "value" => array(
                esc_html__('Left', "helpme") => "left",
                esc_html__('Center', "helpme") => "center",
                esc_html__('Right', "helpme") => "right",
            ),
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
            "type" => "hidden_input",
            "param_name" => "font_type",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Font Size", "helpme"),
            "param_name" => "font_size",
            "value" => "14",
            "min" => "12",
            "max" => "100",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme")
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
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Gradient Style Orientation", "helpme"),
            "param_name" => "gradient_style",
            "width" => 150,
            "value" => array(
                esc_html__('Vertical ', "helpme") => "vertical",
                esc_html__('Horizontal →', "helpme") => "horizontal",
                esc_html__('Radial ○', "helpme") => "radial",
            ),
            "description" => esc_html__("Choose the orientation of gradient style", "helpme")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Start Color", "helpme"),
            "param_name" => "start_color",
            "value" => $skin_color,
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("End Color", "helpme"),
            "param_name" => "end_color",
            "value" => $skin_color,
            "description" => esc_html__("", "helpme")
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
    "name" => esc_html__("Highlight Text", "helpme"),
    "base" => "helpme_highlight",
    'icon' => 'icon-helpme-highlight vc_helpme_element-icon',
    "category" => esc_html__('Typography', 'helpme'),
    'description' => esc_html__( 'adds highlight to an inline text.', 'helpme' ),
    "params" => array(

        array(
            "type" => "textfield",
            "heading" => esc_html__("Highlight Text", "helpme"),
            "param_name" => "text",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),

        array(
            "type" => "dropdown",
            "heading" => esc_html__("Style", "helpme"),
            "param_name" => "style",
            "width" => 150,
            "value" => array(
                esc_html__('Default Color', "helpme") => "default",
                esc_html__('Custom Color', "helpme") => "custom"
            ),
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Fill Color", "helpme"),
            "param_name" => "fill_color",
            "value" => $skin_color,
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
            "heading" => esc_html__("Extra class name", "helpme"),
            "param_name" => "el_class",
            "value" => "",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "helpme")
        )

    )
));


vc_map(array(
    "name" => esc_html__("Custom List", "helpme"),
    "base" => "helpme_custom_list",
    "category" => esc_html__('Typography', 'helpme'),
    'icon' => 'icon-helpme-custom-list vc_helpme_element-icon',
    'description' => esc_html__( 'Powerful list styles with icons.', 'helpme' ),
    "params" => array(
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "heading" => esc_html__("Add your unordered list into this textarea. Allowed Tags : [ul][li][strong][i][em][u][b][a][small]", "helpme"),
            "param_name" => "content",
            "value" => "<ul><li>List Item</li><li>List Item</li><li>List Item</li><li>List Item</li><li>List Item</li></ul>",
            "description" => esc_html__("", "helpme")
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Add Icon Character Code", "helpme"),
            "param_name" => "style",
            "value" => "",
             "description" => esc_html__(" to get the icon class name (or any other font icons library that you have installed in the theme)", "helpme"). wp_kses_post(__("<a target='_blank' href='" . admin_url('tools.php?page=icon-library') . "'>Click here</a>", "helpme")),
        ),


        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Icons Color", "helpme"),
            "param_name" => "icon_color",
            "value" => $skin_color,
            "description" => esc_html__("", "helpme")
        ),

        array(
            "type" => "range",
            "heading" => esc_html__("Margin Bottom", "helpme"),
            "param_name" => "margin_bottom",
            "value" => "30",
            "min" => "-30",
            "max" => "500",
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
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "helpme")
        )

    )
));


vc_map(array(
    "name" => esc_html__("Font icons", "helpme"),
    "base" => "helpme_font_icons",
    'icon' => 'icon-helpme-font-icon vc_helpme_element-icon',
    "category" => esc_html__('Typography', 'helpme'),
    'description' => esc_html__( 'Advanced font icon element', 'helpme' ),
    "params" => array(

        array(
            "type" => "textfield",
            "heading" => esc_html__("Add Icon Class Name", "helpme"),
            "param_name" => "icon",
            "value" => "",
             "description" => esc_html__(" to get the icon class name (or any other font icons library that you have installed in the theme)", "helpme"). wp_kses_post(__("<a target='_blank' href='" . admin_url('tools.php?page=icon-library') . "'>Click here</a>", "helpme")),
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Style", "helpme"),
            "param_name" => "style",
            "value" => array(
                "default" => "default",
                "Filled" => "filled",
                "Generic (customise yourself)" => "custom"
            ),
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Icon Color", "helpme"),
            "param_name" => "color",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'custom',
                    'filled'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Background Color", "helpme"),
            "param_name" => "bg_color",
            "value" => "",
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
            "heading" => esc_html__("Frame Border Color", "helpme"),
            "param_name" => "border_color",
            "value" => "",
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
            "heading" => esc_html__("Icon Hover Color", "helpme"),
            "param_name" => "hover_color",
            "value" => "",
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
            "heading" => esc_html__("Background Hover Color", "helpme"),
            "param_name" => "bg_hover_color",
            "value" => "",
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
            "heading" => esc_html__("Frame Border Hover Color", "helpme"),
            "param_name" => "border_hover_color",
            "value" => "",
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
            "heading" => esc_html__("Icon Size", "helpme"),
            "param_name" => "size",
            "value" => array(
                "16px" => "small",
                "32px" => "medium",
                "48px" => "large",
                "64px" => "x-large",
                "128px" => "xx-large",
                "256px" => "xxx-large"
            ),
            "description" => esc_html__("", "helpme")
        ),

        array(
            "type" => "toggle",
            "heading" => esc_html__("Remove Frame from icon?", "helpme"),
            "param_name" => "remove_frame",
            "value" => "false",
            "description" => esc_html__("", "helpme")
        ),

        array(
            "type" => "range",
            "heading" => esc_html__("Frame Border Width", "helpme"),
            "param_name" => "border_width",
            "value" => "2",
            "min" => "1",
            "max" => "20",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'custom',
                    'default'
                )
            )
        ),

        array(
            "type" => "range",
            "heading" => esc_html__("Horizontal Padding", "helpme"),
            "param_name" => "padding_horizental",
            "value" => "4",
            "min" => "0",
            "max" => "200",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("You can give padding to the icon. this padding will be applied to left and right side of the icon", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Vertical Padding", "helpme"),
            "param_name" => "padding_vertical",
            "value" => "4",
            "min" => "0",
            "max" => "200",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("You can give padding to the icon. this padding will be applied to top and bottom of them icon", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Icon Align", "helpme"),
            "param_name" => "align",
            "width" => 150,
            "value" => array(
                esc_html__('No Align', "helpme") => "none",
                esc_html__('Left', "helpme") => "left",
                esc_html__('Right', "helpme") => "right",
                esc_html__('Center', "helpme") => "center"
            ),
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Link", "helpme"),
            "param_name" => "link",
            "value" => "",
            "description" => esc_html__("You can optionally link your icon. please provide full URL including http://", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Infinite Animations", "helpme"),
            "param_name" => "infinite_animation",
            "value" => $infinite_animation,
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

vc_map(array(
    "name" => esc_html__("Toggle", "helpme"),
    "base" => "helpme_toggle",
    "wrapper_class" => "clearfix",
    'icon' => 'icon-helpme-toggle vc_helpme_element-icon',
    "category" => esc_html__('Typography', 'helpme'),
    'description' => esc_html__( 'Expandable toggle element', 'helpme' ),
    "params" => array(

        array(
            "type" => "textfield",
            "heading" => esc_html__("Toggle Title", "helpme"),
            "param_name" => "title",
            "value" => ""
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Add Icon Class Name (Icon For title)", "helpme"),
            "param_name" => "icon",
            "value" => "",
             "description" => esc_html__(" to get the icon class name (or any other font icons library that you have installed in the theme)", "helpme"). wp_kses_post(__("<a target='_blank' href='" . admin_url('tools.php?page=icon-library') . "'>Click here</a>", "helpme")),
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Custom Icon Color", "helpme"),
            "param_name" => "icon_color",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "heading" => esc_html__("Toggle Content.", "helpme"),
            "param_name" => "content",
            "value" => esc_html__("", "helpme")
        ),

        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Pane Background Color", "helpme"),
            "param_name" => "pane_bg",
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


$tab_id_1 = time() . '-1-' . rand(0, 100);
$tab_id_2 = time() . '-2-' . rand(0, 100);
vc_map(array(
    "name" => esc_html__("Tabs", "helpme"),
    "base" => "vc_tabs",
    "show_settings_on_create" => false,
    "is_container" => true,
    'icon' => 'icon-helpme-tabs vc_helpme_element-icon',
    "category" => esc_html__('Content', 'helpme'),
    'description' => esc_html__( 'Tabbed content', 'helpme' ),
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Style", "helpme"),
            "param_name" => "style",
            "value" => array(
                "Style 1" => "style1",
                "Style 2" => "style2",
                "Style 3" => "style3",
            ),
            "description" => esc_html__("Choose your tabs style.", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Orientation", "helpme"),
            "param_name" => "orientation",
            "value" => array(
                "Horizontal" => "horizontal",
                "Vertical" => "vertical"

            ),
             "dependency" => array(
                'element' => "style",
                'value' => array(
                    'style1',
                    'style2'
                )
            ),
            "description" => esc_html__("Choose tabs orientation. Please note that this option will only work for style 1 and 2.", "helpme")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Container Background Color", "helpme"),
            "param_name" => "container_bg_color",
            "value" => "#fafafa",
            "description" => esc_html__("", "helpme")
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "helpme"),
            "param_name" => "el_class",
            "value" => "",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "helpme")
        )
    ),
    "custom_markup" => '
  <div class="wpb_tabs_holder wpb_holder vc_container_for_children">
  <ul class="tabs_controls">
  </ul>
  %content%
  </div>',
    'default_content' => '
  [vc_tab title="' . esc_html__('Tab 1', 'helpme') . '" tab_id="' . $tab_id_1 . '"][/vc_tab]
  [vc_tab title="' . esc_html__('Tab 2', 'helpme') . '" tab_id="' . $tab_id_2 . '"][/vc_tab]
  ',
    "js_view" => ('VcTabsView')
));



vc_map(array(
    "name" => esc_html__("Tab", "helpme"),
    "base" => "vc_tab",
    "allowed_container_element" => 'vc_row',
    "is_container" => true,
    "content_element" => false,
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", "helpme"),
            "param_name" => "title",
            "description" => esc_html__("Tab title.", "helpme")
        ),


        array(
            "type" => "textfield",
            "heading" => esc_html__("Add Icon Class Name", "helpme"),
            "param_name" => "icon",
            "value" => "",
             "description" => esc_html__(" to get the icon class name (or any other font icons library that you have installed in the theme)", "helpme"). wp_kses_post(__("<a target='_blank' href='" . admin_url('tools.php?page=icon-library') . "'>Click here</a>", "helpme")),
        ),

        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Custom Icon Color", "helpme"),
            "param_name" => "icon_color",
            "value" => "",
            "description" => esc_html__("", "helpme")
        )

    ),
    'js_view' => ('VcTabView')
));


vc_map(array(
    "name" => esc_html__("Accordion", "helpme"),
    "base" => "vc_accordions",
    "show_settings_on_create" => false,
    "is_container" => true,
    'icon' => 'icon-helpme-accordion vc_helpme_element-icon',
    'description' => esc_html__( 'Collapsible content panels', 'helpme' ),
    "category" => esc_html__('Content', 'helpme'),
    "params" => array(
        array(
                "type" => "dropdown",
                "heading" => esc_html__( "Style", "helpme" ),
                "param_name" => "style",
                "width" => 150,
                "value" => array(  esc_html__( 'Simple', "helpme" ) => "simple" , esc_html__( 'Boxed', "helpme" ) => "boxed"),
                "description" => esc_html__( "", "helpme" )
            ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Container Background Color", "helpme"),
            "param_name" => "container_bg_color",
            "value" => "#fafafa",
            "description" => esc_html__("", "helpme")
        ),


        array(
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "helpme"),
            "param_name" => "el_class",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "helpme")
        )
    ),
    "custom_markup" => '
  <div class="wpb_accordion_holder wpb_holder clearfix vc_container_for_children">
  %content%
  </div>
  <div class="tab_controls">
  <a class="add_tab" title="' . esc_html__( 'Add section', 'helpme' ) . '"><span class="vc_icon"></span> <span class="tab-label">' . esc_html__( 'Add section', 'helpme' ) . '</span></a>
  </div>
  ',
    'default_content' => '
  [vc_accordion_tab title="' . esc_html__('Section 1', "helpme") . '"][/vc_accordion_tab]
  [vc_accordion_tab title="' . esc_html__('Section 2', "helpme") . '"][/vc_accordion_tab]
  ',
    'js_view' => 'VcAccordionView'
));
vc_map(array(
    "name" => esc_html__("Accordion Section", "helpme"),
    "base" => "vc_accordion_tab",
    "allowed_container_element" => 'vc_row',
    "is_container" => true,
    "content_element" => false,
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Title", "helpme"),
            "param_name" => "title",
            "description" => esc_html__("Accordion section title.", "helpme")
        ),


        array(
            "type" => "textfield",
            "heading" => esc_html__("Add Icon Class Name (optional)", "helpme"),
            "param_name" => "icon",
            "value" => "",
             "description" => esc_html__(" to get the icon class name (or any other font icons library that you have installed in the theme)", "helpme"). wp_kses_post(__("<a target='_blank' href='" . admin_url('tools.php?page=icon-library') . "'>Click here</a>", "helpme")),
        ),

        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Custom Icon Color", "helpme"),
            "param_name" => "icon_color",
            "value" => "",
            "description" => esc_html__("", "helpme")
        )
    ),
    'js_view' => 'VcAccordionTabView'
));
*/
