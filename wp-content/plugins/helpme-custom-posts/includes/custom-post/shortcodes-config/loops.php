<?php

vc_map(array(
    "name" => esc_html__("Pricing Table", "helpme"),
    "base" => "helpme_pricing_table",
    'icon' => 'icon-helpme-pricing-table vc_helpme_element-icon',
    'description' => esc_html__( 'Shows Pricing table Posts.', 'helpme' ),
    "category" => esc_html__('Loops', 'helpme'),
    "params" => array(

        array(
            "type" => "dropdown",
            "heading" => esc_html__("Style", "helpme"),
            "param_name" => "style",
            "value" => array(
                "Classic" => "classic",
                "Modern" => "modern"
            ),
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Skin", "helpme"),
            "param_name" => "skin",
            "value" => array(
                "Light" => "light",
                "Dark" => "dark"
            ),
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Pricing Background", "helpme"),
            "param_name" => "modern_bg_color",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'modern'
                )
            ),
        ),
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "heading" => esc_html__("Offers", "helpme"),
            "param_name" => "content",
            "value" => "",
            "description" => esc_html__("Please add your offers text. Note : List of offers must be an unordered list. If you dont need offers list, leave this textarea empty. The number of the list items should match the number of your pricing items list as well.", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("How Many Tables?", "helpme"),
            "param_name" => "table_number",
            "value" => "4",
            "min" => "1",
            "max" => "4",
            "step" => "1",
            "unit" => 'table',
            "description" => esc_html__("How many pricing tables would you like to view?", "helpme")
        ),
        array(
            "type" => "multiselect",
            "heading" => esc_html__("Tables", "helpme"),
            "param_name" => "tables",
            "value" => '',
            "options" => $pricing,
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
            "type" => "textfield",
            "heading" => esc_html__("Extra class name", "helpme"),
            "param_name" => "el_class",
            "value" => "",
            "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "helpme")
        )

    )
));

vc_map(array(
    "name" => esc_html__("Employees", "helpme"),
    "base" => "helpme_employees",
    'icon' => 'icon-helpme-employees vc_helpme_element-icon',
    "category" => esc_html__('Loops', 'helpme'),
    'description' => esc_html__( 'Shows Employees posts in multiple styles.', 'helpme' ),
    "params" => array(
        /*array(
            "type" => "dropdown",
            "heading" => esc_html__("Style", "helpme"),
            "param_name" => "style",
            "width" => 300,
            "value" => array(
               esc_html__('Column Based (Rounded)', "helpme") => "column_rounded",
                esc_html__('Column Based', "helpme") => "column",
                esc_html__('grid', "helpme") => "grid"
            ),
            "description" => esc_html__("", "helpme")
        ),*/
		array(
            "type" => "dropdown",
            "heading" => esc_html__("Style", "helpme"),
            "param_name" => "hover_style",
            "width" => 300,
            "value" => array(
               esc_html__('Style 1', "helpme") => "1",
                esc_html__('Style 2', "helpme") => "2"
            ),
            "description" => esc_html__("team hover styles", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Column", "helpme"),
            "param_name" => "column",
            "value" => "4",
            "min" => "1",
            "max" => "4",
            "step" => "1",
            "unit" => 'columns',
            "description" => esc_html__("Defines how many column to be in one row.", "helpme")
        ),
       array(
            "type" => "range",
            "heading" => esc_html__("Image Width Dimension", "helpme"),
            "param_name" => "dimension",
            "value" => "370",
            "min" => "100",
            "max" => "600",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("This value wil be applied to employee image width & height. Be infomed social network icons will not be displayed in image size less than 200px.", "helpme")
        ), 
		array(
            "type" => "range",
            "heading" => esc_html__("Image height Dimension", "helpme"),
            "param_name" => "dimensionh",
            "value" => "256",
            "min" => "100",
            "max" => "600",
            "step" => "1",
            "unit" => 'px', 
            "description" => esc_html__("This value wil be applied to employee image width & height. Be infomed social network icons will not be displayed in image size less than 200px.", "helpme")
        ), 
        array(
            "type" => "range",
            "heading" => esc_html__("Count", "helpme"),
            "param_name" => "count",
            "value" => "4",
            "min" => "-1",
            "max" => "4",
            "step" => "1",
            "unit" => 'employee',
            "description" => esc_html__("How many Employees you would like to show? -1 will means whatever you have chosen in wordpress => reading => posts per page option.", "helpme")
        ),
        array(
            "type" => "multiselect",
            "heading" => esc_html__("Select specific Employees", "helpme"),
            "param_name" => "employees",
            "value" => '',
            "options" => $employees,
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Offset", "helpme"),
            "param_name" => "offset",
            "value" => "0",
            "min" => "0",
            "max" => "50",
            "step" => "1",
            "unit" => 'posts',
            "description" => esc_html__("Number of post to displace or pass over, it means based on your order of the loop, this number will define how many posts to pass over and start from the nth number of the offset.", "helpme")
        ),
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
       /* array(
            "type" => "toggle",
            "heading" => esc_html__("Description", "helpme"),
            "param_name" => "description",
            "value" => "true",
            "description" => esc_html__("If you dont want to show Employees description disable this option.", "helpme")
        ), */

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
            "description" => esc_html__("Sort retrieved employee items by parameter.", 'helpme'),
            "param_name" => "orderby",
            "value" => $helpme_orderby,
            "type" => "dropdown"
        ),
        array(
            "type" => "toggle",
            "heading" => esc_html__("Employee Image Stretchability", "helpme"),
            "param_name" => "full_width_image",
            "value" => "false",
            "description" => esc_html__("Enabling this option will set employee image cover the whole grid area.", "helpme")
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
    "name" => esc_html__("Causes", "helpme"),
    "base" => "helpme_causes",
    'icon' => 'icon-helpme-causes vc_helpme_element-icon',
    "category" => esc_html__('Loops', 'helpme'),
    'description' => esc_html__( 'Shows Causes posts in multiple styles.', 'helpme' ),
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Style", "helpme"),
            "param_name" => "style",
            "width" => 300,
            "value" => array(
				esc_html__('grid', "helpme") => "grid",
               //esc_html__('Column Based (Rounded)', "helpme") => "column_rounded",
                esc_html__('Column Based', "helpme") => "column"
                
            ),
            "description" => esc_html__("", "helpme")
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("grid elements ", "helpme"),
            "param_name" => "desktop_items",
			"value" => '3',
			"min" => '1',
			"max" => '4',
			"step" => '1',
            "dependency" => array(
                'element' => "style",
				'value' => array(
					'grid'
				)
			),
			"description" => esc_html__("items to show per row on desktop ", "helpme")
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("grid elements tabs landscape ", "helpme"),
            "param_name" => "tab_landscape_items",
			"value" => '3',
			"min" => '1',
			"max" => '4',
			"step" => '1',
            "dependency" => array(
                'element' => "style",
				'value' => array(
					'grid'
				)
			),
			"description" => esc_html__("items to show per row on tab landscape recommented is 3 items ", "helpme")
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("grid elements tab ", "helpme"),
            "param_name" => "tab_items",
			"value" => '2',
			"min" => '1',
			"max" => '4',
			"step" => '1',
            "dependency" => array(
                'element' => "style",
				'value' => array(
					'grid'
				)
			),
			"description" => esc_html__("items to show per row on tabs recommended id 2 items ", "helpme")
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("grid elements gutter space ", "helpme"),
            "param_name" => "gutter_space",
			"value" => '30',
			"min" => '0',
			"max" => '50',
            "dependency" => array(
                'element' => "style",
				'value' => array(
					'grid'
				)
			),
			"description" => esc_html__("space between items ", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Column", "helpme"),
            "param_name" => "column",
            "value" => "3",
            "min" => "1",
            "max" => "5",
            "step" => "1",
            "unit" => 'columns',
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'column_rounded',
                    'column'
                )
            ),
            "description" => esc_html__("Defines how many column to be in one row.", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Image Width Dimension", "helpme"),
            "param_name" => "dimension",
            "value" => "370",
            "min" => "100",
            "max" => "600",
            "step" => "1",
            "unit" => 'px',
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'grid',
					'column'
                )
            ),
            "description" => esc_html__("This value wil be applied to cause image width & height. Be infomed social network icons will not be displayed in image size less than 200px.", "helpme")
        ),
		array(
            "type" => "range",
            "heading" => esc_html__("Image height Dimension", "helpme"),
            "param_name" => "dimensionh",
            "value" => "400",
            "min" => "100",
            "max" => "600",
            "step" => "1",
            "unit" => 'px',
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'grid',
					'column'
                )
            ),
            "description" => esc_html__("This value wil be applied to cause image width & height. Be infomed social network icons will not be displayed in image size less than 200px.", "helpme")
        ),
		array(
            "type" => "dropdown",
            "heading" => esc_html__("slider navigation ", "helpme"),
            "param_name" => "owl_nav",
			"value" => array(
				esc_html__('On', "helpme") => "true",
				esc_html__('Off', "helpme") => "false",
				),
            "dependency" => array(
                'element' => "style",
				'value' => array(
					'grid'
				)
			),
			"description" => esc_html__("slider navigation prev and next buttons ", "helpme")
        ),
		array(
            "type" => "dropdown",
            "heading" => esc_html__("item loop", "helpme"),
            "param_name" => "item_loop",
			"value" => array(
				esc_html__('On', "helpme") => "true",
				esc_html__('Off', "helpme") => "false",
				),
            "dependency" => array(
                'element' => "style",
				'value' => array(
					'grid'
				)
			),
			"description" => esc_html__("slider navigation prev and next buttons ", "helpme")
        ),
        array(
            "type" => "toggle",
            "heading" => esc_html__("Autoplay", "helpme"),
            "param_name" => "autoplay",
            "value" => "true",
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'grid'
                )
            ),
            "description" => esc_html__("If you enable this option grids will be horizontally scrolled.", "helpme")
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("Auto play speed ", "helpme"),
            "param_name" => "Autoplay_speed",
			"value" => '2000',
			"min" => '0',
			"max" => '10000',
            "dependency" => array(
                'element' => "style",
				'value' => array(
					'grid'
				)
			),
			"description" => esc_html__("autoplay speed ", "helpme")
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("Auto play Delay per slide ", "helpme"),
            "param_name" => "delay",
			"value" => '1000',
			"min" => '0',
			"max" => '10000',
            "dependency" => array(
                'element' => "style",
				'value' => array(
					'grid'
				)
			),
			"description" => esc_html__("delay per slider", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Count", "helpme"),
            "param_name" => "count",
            "value" => "10",
            "min" => "-1",
            "max" => "50",
            "step" => "1",
            "unit" => 'cause',
            "description" => esc_html__("How many Causes you would like to show? -1 will means whatever you have chosen in wordpress => reading => posts per page option.", "helpme")
        ),
		
        array(
            "type" => "multiselect",
            "heading" => esc_html__("Select specific Causes", "helpme"),
            "param_name" => "causes",
            "value" => '',
            "options" => $causes,
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Offset", "helpme"),
            "param_name" => "offset",
            "value" => "0",
            "min" => "0",
            "max" => "50",
            "step" => "1",
            "unit" => 'posts',
            "description" => esc_html__("Number of post to displace or pass over, it means based on your order of the loop, this number will define how many posts to pass over and start from the nth number of the offset.", "helpme")
        ),
        array(
            "type" => "toggle",
            "heading" => esc_html__("Description", "helpme"),
            "param_name" => "description",
            "value" => "false",
            "description" => esc_html__("If you dont want to show Causes description disable this option.", "helpme")
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
            "description" => esc_html__("Sort retrieved cause items by parameter.", 'helpme'),
            "param_name" => "orderby",
            "value" => $helpme_orderby,
            "type" => "dropdown"
        ),
        array(
            "type" => "toggle",
            "heading" => esc_html__("Cause Image Stretchability", "helpme"),
            "param_name" => "full_width_image",
            "value" => "false",
            "description" => esc_html__("Enabling this option will set cause image cover the whole grid area.", "helpme")
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
    "name" => esc_html__("Events", "helpme"),
    "base" => "helpme_events",
    'icon' => 'icon-helpme-events vc_helpme_element-icon',
    "category" => esc_html__('Loops', 'helpme'),
    'description' => esc_html__( 'Events element shortcode.', 'helpme' ),
	"params" => array(
		array(
            "type" => "dropdown",
            "heading" => esc_html__("Style", "helpme"),
            "param_name" => "style",
            "width" => 300,
            "value" => array(
				esc_html__('column', "helpme") => "column",
                esc_html__('thumb', "helpme") => "thumb"
                
            ),
            "description" => esc_html__("", "helpme")
        ),
		array(
            "type" => "range",
            "heading" => esc_html__("Desktop Columns", "helpme"),
            "param_name" => "column",
            "value" => '3',
			"unit" => 'column',
			"step" => '1',
			"min" => '1',
			"max" => '4',
			"dependency" => array(
                'element' => "style",
				'value' => array(
					'column'
				)
			),
            "description" => esc_html__("How many column in a row recommended is 3 for full width and 2 with sidebar.", "helpme")
        ),
		array(
            "type" => "range",
            "heading" => esc_html__("Tablet Columns", "helpme"),
            "param_name" => "responsive_column",
            "value" => '2',
			"unit" => 'column',
			"step" => '1',
			"min" => '1',
			"max" => '3',
			"dependency" => array(
                'element' => "style",
				'value' => array(
					'column'
				)
			),
            "description" => esc_html__("How many column in a row recommended is 3 for full width and 2 with sidebar.", "helpme")
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("image width", "helpme"),
            "param_name" => "event_dimension",
            "value" => '370',
			"unit" => 'px',
			"dependency" => array(
                'element' => "style",
				'value' => array(
					'column'
				)
			),
            "description" => esc_html__("image width.", "helpme")
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("image height", "helpme"),
            "param_name" => "dimensionh",
            "value" => '250',
			"unit" => 'px',
			"dependency" => array(
                'element' => "style",
				'value' => array(
					'column'
				)
			),
            "description" => esc_html__("image width.", "helpme")
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("Events per page", "helpme"),
            "param_name" => "number_count",
            "value" => 3,
            "description" => esc_html__("number of events per page.", "helpme")
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
    "name" => esc_html__("Clients", "helpme"),
    "base" => "helpme_clients",
    'icon' => 'icon-helpme-clients vc_helpme_element-icon',
    "category" => esc_html__('Loops', 'helpme'),
    'description' => esc_html__( 'Shows Clients posts in multiple styles.', 'helpme' ),
    "params" => array(

        array(
            "heading" => esc_html__("Style", 'helpme'),
            "description" => esc_html__("Choose clients loop style", 'helpme'),
            "param_name" => "style",
            "value" => array(
                esc_html__("Column", 'helpme') => "column",
                //esc_html__("Grid", 'helpme') => "grid"
            ),
            "type" => "dropdown"
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("How many Columns?", "helpme"),
            "param_name" => "column",
            "value" => "3",
            "min" => "1",
            "max" => "6",
            "step" => "1",
            "unit" => 'columns',
            "description" => esc_html__("This option defines how many columns will be set in one row. This option only works for column style", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'column'
                )
            )
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Client Item height", "helpme"),
            "param_name" => "item_height",
            "value" => "120",
            "min" => "100",
            "max" => "500",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("Defines the client item height. please note that this option only works for column style.", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'column'
                )
            )
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Count", "helpme"),
            "param_name" => "count",
            "value" => "4",
            "min" => "-1",
            "max" => "50",
            "step" => "1",
            "unit" => 'clients',
            "description" => esc_html__("How many Clients you would like to show? -1 will means whatever you have chosen in wordpress => reading => posts per page option.", "helpme")
        ),
       /* array(
            "heading" => esc_html__("Scroller", 'helpme'),
            "description" => esc_html__("If you enable this option grids will be horizontally scroller and you can swipe through items.", 'helpme'),
            "param_name" => "scroll",
            "value" => array(
                esc_html__("Enable", 'helpme') => "true",
                esc_html__("Disable", 'helpme') => "false"
            ),
            "type" => "dropdown",
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'grid'
                )
            )
        ),*/
        array(
            "type" => "multiselect",
            "heading" => esc_html__("Select specific Clients", "helpme"),
            "param_name" => "clients",
            "value" => '',
            "options" => $clients,
            "description" => esc_html__("", "helpme")
        ),
		array(
            "type" => "toggle",
            "heading" => esc_html__("scroller", "helpme"),
            "param_name" => "scroll",
			"value" => "true",
            //"value" => array(
				//esc_html__("Off", 'helpme') => "false",
               // esc_html__("On", 'helpme') => "true"
                
           // ),
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
            "value" => "5",
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
       /* array(
            "type" => "colorpicker",
            "heading" => esc_html__("Box Background Color", "helpme"),
            "param_name" => "bg_color",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Box Border Color", "helpme"),
            "param_name" => "border_color",
            "value" => "",
            "description" => esc_html__("Please note that this option only works for Column style as well as grid style (when scroller is enabled).", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Box Border Width", "helpme"),
            "param_name" => "border_width",
            "value" => "2",
            "min" => "0",
            "max" => "5",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Logo Box Dimension", "helpme"),
            "param_name" => "dimension",
            "value" => "120",
            "min" => "50",
            "max" => "600",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("This value will be applied to logo box width & height.", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'grid'
                )
            )
        ),
        array(
            "type" => "toggle",
            "heading" => esc_html__("Fit to Background", "helpme"),
            "description" => esc_html__("Scale the background image to be as large as possible so that the background area is completely covered by the background image. Some parts of the background image may not be in view within the background positioning area", "helpme"),
            "param_name" => "cover",
            "value" => "false"
        ),
        array(
            "type" => "toggle",
            "heading" => esc_html__("Hover State Company Details.", "helpme"),
            "param_name" => "hover_state",
            "value" => "false"
        ),*/

        array(
            "type" => "dropdown",
            "heading" => esc_html__("Target", "helpme"),
            "param_name" => "target",
            "width" => 200,
            "value" => $target_arr,
            "description" => esc_html__("Target for the links.", "helpme")
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
    "name" => esc_html__("Blog", "helpme"),
    "base" => "helpme_blog",
     'icon' => 'icon-helpme-blog vc_helpme_element-icon',
    "category" => esc_html__('Loops', 'helpme'),
    'description' => esc_html__( 'Blog loops are here.', 'helpme' ),
    "params" => array(

        array(
            "heading" => esc_html__("Style", 'helpme'),
            "description" => esc_html__("please select which blog loop style you would like to use.", 'helpme'),
            "param_name" => "style",
            "value" => array(
                esc_html__("Classic", 'helpme') => "classic",
                //esc_html__("Modern", 'helpme') => "modern",
               // esc_html__("Masonry", 'helpme') => "masonry",
                esc_html__("Tile", 'helpme') => "tile",
               // esc_html__("Magazine", 'helpme') => "magazine",
                esc_html__("Thumbnail", 'helpme') => "thumb",
               // esc_html__("List", 'helpme') => "list",
               // esc_html__("Scroller", 'helpme') => "scroller",
               // esc_html__("Slideshow", 'helpme') => "slideshow"
            ),
            "type" => "dropdown"
        ),
        /*array(
            "type" => "dropdown",
            "heading" => esc_html__("Loop Structure (Magazine Style Only)", 'helpme'),
            "description" => esc_html__("", 'helpme'),
            "param_name" => "magazine_strcutre",
            "value" => array(
                esc_html__("One Column", 'helpme') => 1,
                esc_html__("Two Columns (Featured post on left side)", 'helpme') => 2,
                esc_html__("Two Columns (Featured post on right side)", 'helpme') => 3,

            ),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'magazine'
                )
            ),
        ),*/
		array(
            "type" => "dropdown",
            "heading" => esc_html__("scroller", "helpme"),
            "param_name" => "scroll",
            "value" => array(
				esc_html__("Off", 'helpme') => "false",
                esc_html__("On", 'helpme') => "true"
                
            ),
            "description" => esc_html__("put loop scroller on or off", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                   // 'grid',
                   // 'masonry',
                    'standard',
                    //'flip'
                )
            )

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
            "param_name" => "items_loop",
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
            "type" => "toggle",
            "heading" => esc_html__("Author Thumbnail (Only for Tile Style)", "helpme"),
            "param_name" => "author",
            "value" => "true",
            "description" => esc_html__("Using this option you can disable/enable author avatar from blog loop tile style.", "helpme"),
             "dependency" => array(
                'element' => "style",
                'value' => array(
                    'tile'
                )
            ),
        ),
        /* array(
            "type" => "dropdown",
            "heading" => esc_html__("Slideshow Layout (Slideshow Style Only)", 'helpme'),
            "description" => esc_html__("This option will let you control the slideshow layout to be full or with sidebar layout. If you are using it in a page section to have it fullwidth but the page layout is with sidebar, then you can use this option to override the functionality.", 'helpme'),
            "param_name" => "slideshow_layout",
            "value" => array(
                esc_html__("Default", 'helpme') => 'default',
                esc_html__("Full Layout", 'helpme') => 'full',
                esc_html__("With Sidebar", 'helpme') => 'sidebar',

            ),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'slideshow'
                )
            ),
        ),*/

        array(
            "type" => "range",
            "heading" => esc_html__("How many Columns?", "helpme"),
            "param_name" => "column",
            "value" => "3",
            "min" => "1",
            "max" => "4",
            "step" => "1",
            "unit" => 'columns',
            "description" => esc_html__("This option defines how many columns will be set in one row.", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    //'masonry',
                    'tile',
                )
            )
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Images Width", "helpme"),
            "param_name" => "image_width",
            "value" => "350",
            "min" => "100",
            "max" => "1000",
            "step" => "1",
            "unit" => 'px',
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Images Height", "helpme"),
            "param_name" => "image_height",
            "value" => "260",
            "min" => "100",
            "max" => "1000",
            "step" => "1",
            "unit" => 'px',
        ),
        array(
            "type" => "toggle",
            "heading" => esc_html__("Image Cropping.", "helpme"),
            "description" => esc_html__("If you have this option enabled the image will be cropped based on the image height option above and the width we dynamically calculate for the layout and column you choose. if you want to show the full size featured image disable this option.", "helpme"),
            "param_name" => "cropping",
            "value" => "true",
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'classic',
                    //'masonry',
                    'tile',
                    //'modern',
                    //'magazine'
                )
            )
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("How many Posts in a page?", "helpme"),
            "param_name" => "count",
            "value" => "10",
            "min" => "-1",
            "max" => "50",
            "step" => "1",
            "unit" => 'posts',
            "description" => esc_html__("How many Posts you would like to show? (-1 means unlimited, please note that unlimited will be overrided the limit you defined at : Wordpress Sidebar > Settings > Reading > Blog pages show at most.)", "helpme"),
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Offset", "helpme"),
            "param_name" => "offset",
            "value" => "0",
            "min" => "0",
            "max" => "50",
            "step" => "1",
            "unit" => 'posts',
            "description" => esc_html__("Number of post to displace or pass over, it means based on your order of the loop, this number will define how many posts to pass over and start from the nth number of the offset.", "helpme"),
        ),
        array(
            "type" => "multiselect",
            "heading" => esc_html__("Select specific Categories", "helpme"),
            "param_name" => "cat",
            "options" => $categories,
            "value" => '',
            "description" => esc_html__("", "helpme"),
        ),

        array(
            "type" => "multiselect",
            "heading" => esc_html__("Select specific Posts", "helpme"),
            "param_name" => "posts",
            "options" => $posts,
            "value" => '',
            "description" => esc_html__("", "helpme"),
        ),

        array(
            "type" => "toggle",
            "heading" => esc_html__("Post Meta", "helpme"),
            "param_name" => "disable_meta",
            "value" => "true",
            "description" => esc_html__("If you dont want to show post meta (author and categories) disable this option.", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'classic',
                    //'masonry',
                    'tile',
                    //'scroller',
                    //'slideshow',
                    //'modern'
                )
            )
        ),


        array(
            "type" => "dropdown",
            "heading" => esc_html__("Content Type (Classic Style Only)", 'helpme'),
            "description" => esc_html__("You can show blog full content in classic style loop.", 'helpme'),
            "param_name" => "classic_excerpt",
            "value" => array(
                esc_html__("Summry (Excerpt)", 'helpme') => "excerpt",
                esc_html__("Full content", 'helpme') => "content"
            ),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'classic'
					
                )
            ),
        ),
        array(
            "type" => "toggle",
            "heading" => esc_html__("Pagination?", "helpme"),
            "param_name" => "pagination",
            "value" => "true",
            "description" => esc_html__("If you dont want to have pagination for this loop disable this option.", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'classic',
                   // 'masonry',
                    'tile',
                    'thumb',
                    //'list',
                   // 'modern'
                )
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Pagination Style", 'helpme'),
            "description" => esc_html__("please select which pagination style you would like to use on this loop.", 'helpme'),
            "param_name" => "pagination_style",
            "value" => array(
                esc_html__("Classic Pagination Navigation", 'helpme') => "1",
                esc_html__("Load more button", 'helpme') => "2"
            ),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'classic',
                    //'masonry',
                    'tile',
                    'thumb',
                    //'list',
                    //'modern'

                )
            )
        ),
		 array(
            "type" => "dropdown",
            "heading" => esc_html__("Thumb style colums", 'helpme'),
            "description" => esc_html__("please select which pagination style you would like to use on this loop.", 'helpme'),
            "param_name" => "thumb_column",
            "value" => array(
                esc_html__("One column", 'helpme') => "one-column",
                esc_html__("Two column", 'helpme') => "two-column"
            ),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'thumb'

                )
            )
        ),

        array(
            "type" => "range",
            "heading" => esc_html__("Post Excerpt Length", "helpme"),
            "description" => esc_html__("Define the length of the length of the excerpt in number of characters. Zero will disable excerpt.", 'helpme'),
            "param_name" => "excerpt_length",
            "value" => "200",
            "min" => "0",
            "max" => "2000",
            "step" => "1",
            "unit" => 'characters',
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'classic',
                   // 'masonry',
                    'tile',
					'thumb',
                    //'list',
                    //'magazine',
                )
            )
        ),

        array(
            "type" => "toggle",
            "heading" => esc_html__("Sortable?", "helpme"),
            "param_name" => "sortable",
            "value" => "false",
            "description" => esc_html__("If you dont want sortable filter navigation disable this option.", "helpme"),
             "dependency" => array(
                'element' => "scroll",
                'value' => array(
                   // 'classic',
                   // 'masonry',
                   // 'tile',
                   // 'list',
                   // 'thumb',
                    //'modern',
					'false'
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
            "description" => esc_html__("Sort retrieved Blog items by parameter.", 'helpme'),
            "param_name" => "orderby",
            "value" => $helpme_orderby,
            "type" => "dropdown"
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

/*
vc_map(array(
    "name" => esc_html__("Blog Teaser", "helpme"),
    "base" => "helpme_blog_teaser",
    'icon' => 'icon-helpme-blog vc_helpme_element-icon',
    "category" => esc_html__('Loops', 'helpme'),
    'description' => esc_html__( 'Blog teaser style loops are here.', 'helpme' ),
    "params" => array(

        array(
            "type" => "range",
            "heading" => esc_html__("Images Height", "helpme"),
            "param_name" => "image_height",
            "value" => "350",
            "min" => "100",
            "max" => "1000",
            "step" => "1",
            "unit" => 'px'
        ),

        array(
            "type" => "multiselect",
            "heading" => esc_html__("Select specific Categories to Appear in slideshow", "helpme"),
            "param_name" => "slideshow_cat",
            "options" => $categories,
            "value" => '',
            "description" => esc_html__("", "helpme"),
        ),

         array(
            "type" => "multiselect",
            "heading" => esc_html__("Select specific Categories to appear as Side Thumbnails", "helpme"),
            "param_name" => "side_thumb_cat",
            "options" => $categories,
            "value" => '',
            "description" => esc_html__("", "helpme"),
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
            "description" => esc_html__("Sort retrieved Blog items by parameter.", 'helpme'),
            "param_name" => "orderby",
            "value" => $helpme_orderby,
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

vc_map(array(
    "name" => esc_html__("Portfolio", "helpme"),
    "base" => "helpme_portfolio",
    'icon' => 'icon-helpme-portfolio vc_helpme_element-icon',
    "category" => esc_html__('Loops', 'helpme'),
    'description' => esc_html__( 'Portfolio loops are here.', 'helpme' ),
    "params" => array(
        array(
            "heading" => esc_html__("Style", 'helpme'),
            "description" => esc_html__("please select which Portfolio loop style you would like to use.", 'helpme'),
            "param_name" => "style",
            "value" => array(
                //esc_html__("Grid", 'helpme') => "grid",
                //esc_html__("Masonry", 'helpme') => "masonry",
                //esc_html__("Flip", 'helpme') => "flip",
                esc_html__("Standard", 'helpme') => "standard",
                esc_html__("Scroller", 'helpme') => "scroller"
            ),
            "type" => "dropdown"
        ),
        array(
            "heading" => esc_html__("Hover Scenarios", 'helpme'),
            "description" => esc_html__("This is what happens when user hovers over a portfolio item. Different animations and styles will be showed up on each scenario.", 'helpme'),
            "param_name" => "hover_style",
            "value" => array(
				esc_html__("Parallax", 'helpme') => "parallax",
                esc_html__("Classic", 'helpme') => "classic",
                esc_html__("Gradient", 'helpme') => "gradient",
                esc_html__("Zoom In", 'helpme') => "zoom-in",
                esc_html__("Zoom Out", 'helpme') => "zoom-out",
                esc_html__("Stroke", 'helpme') => "stroke",
            ),
            "type" => "dropdown",
            "dependency" => array(
                'element' => "style",
                'value' => array(
                   // 'grid',
                   // 'masonry',
                    'standard',
                    'scroller'
                )
            )
        ),
         array(
            "type" => "colorpicker",
            "heading" => esc_html__("Hover Background Color", "helpme"),
            "param_name" => "hove_bg_color",
            "value" => "",
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "hover_style",
                'value' => array(
                    'gradient'
                )
            )
        ),
        /*array(
            "type" => "toggle",
            "heading" => esc_html__("Shows Posts Using Ajax?", "helpme"),
            "param_name" => "ajax",
            "value" => "false",
            "description" => esc_html__("If you enable this option the portfolio posts items will be viewed in the same page above the loop.", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'grid',
                    'masonry',
                    'standard',
                    'flip'
                )
            )

        ),*/
		array(
            "type" => "toggle",
            "heading" => esc_html__("scroller", "helpme"),
            "param_name" => "scroll",
			"value" => "true",
            //"value" => array(
				//esc_html__("Off", 'helpme') => "false",
               // esc_html__("On", 'helpme') => "true"
                
           // ),
            "description" => esc_html__("put loop scroller on or off", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                   // 'grid',
                   // 'masonry',
                    'standard',
					'scroller',
                    //'flip'
                )
            )

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
            "type" => "dropdown",
            "heading" => esc_html__("How many row in one side?", "helpme"),
            "param_name" => "item_row",
            "value" => array(
                esc_html__("One row in one slide", 'helpme') => "1",
                esc_html__("Two row in one slide", 'helpme') => "2"
            ),
            "dependency" => array(
                'element' => "scroll",
                'value' => array(
                    'true'
                )
            )
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("How many Columns?", "helpme"),
            "param_name" => "column",
            "value" => "3",
            "min" => "1",
            "max" => "5",
            "step" => "1",
            "unit" => 'columns',
            "description" => esc_html__("How many columns you would like to have in one row?", "helpme"),
            "dependency" => array(
                'element' => "scroll",
                'value' => array(
                    //'grid',
                    'false',
                    //'flip'
                )
            )
        ),
		array(
            "type" => "dropdown",
            "heading" => esc_html__("gutter space", "helpme"),
            "param_name" => "helpme_portfolio_gutter",
            "value" => array(
                esc_html__("no gutter", 'helpme') => "portfolio_no_gutter",
                esc_html__("with gutter", 'helpme') => "portfolio_with_gutter"
            ),
            "unit" => '',
            "description" => esc_html__("set space between columns default is 30px, set 0 for no space", "helpme"),
            "dependency" => array(
                'element' => "scroll",
                'value' => array(
                    //'grid',
                    'false',
                    //'flip'
                )
            )
        ),
        array(
            "heading" => esc_html__("Image Size", 'helpme'),
            "description" => esc_html__("Please note that this option will not work for Masonry option.", 'helpme'),
            "param_name" => "image_size",
            "value" => array(
                esc_html__("Resize & Crop", 'helpme') => "crop",
                esc_html__("Original Size", 'helpme') => "full",
                esc_html__("Large Size", 'helpme') => "large",
                esc_html__("Medium Size", 'helpme') => "medium"
            ),
            "type" => "dropdown"
        ),
       array(
            "type" => "range",
            "heading" => esc_html__("Image Width", "helpme"),
            "param_name" => "width",
            "value" => "400",
            "min" => "100",
            "max" => "1000",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'scroller'
                )
            )
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Image Height", "helpme"),
            "param_name" => "height",
            "value" => "400",
            "min" => "100",
            "max" => "1000",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'scroller',
                    //'grid',
                    'standard',
                    //'flip'
                )
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
            "description" => esc_html__("If you want portfolio images be retina compatible or you just want to use it in fullwidth row, you may consider increasing the image size. This option will help you define the image quality yourself.", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    //'masonry',
                   // 'grid',
                    'standard',
                   // 'flip'
                )
            )
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("How many Posts in a page?", "helpme"),
            "param_name" => "count",
            "value" => "10",
            "min" => "-1",
            "max" => "50",
            "step" => "1",
            "unit" => 'posts',
            "description" => esc_html__("How many Posts you would like to show? -1 will means whatever you have chosen in wordpress => reading => posts per page option.", "helpme")
        ),

        array(
            "type" => "toggle",
            "heading" => esc_html__("Sortable?", "helpme"),
            "param_name" => "sortable",
            "value" => "false",
            "description" => esc_html__("If you dont want sortable filter navigation disable this option.", "helpme"),
            "dependency" => array(
                'element' => "scroll",
                'value' => array(
                    //'grid',
                   // 'masonry',
                    'false',
                   // 'flip'
                )
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Sortable Align?", "helpme"),
            "param_name" => "sortable_align",
            "value" => array(
                esc_html__("Center", 'helpme') => "center",
                esc_html__("Left", 'helpme') => "left",
                esc_html__("Right", 'helpme') => "right"
            ),
			"dependency" => array(
                'element' => "sortable",
                'value' => array(
                    'true'
                )
            )
        ),

        array(
            "type" => "range",
            "heading" => esc_html__("Offset", "helpme"),
            "param_name" => "offset",
            "value" => "0",
            "min" => "0",
            "max" => "50",
            "step" => "1",
            "unit" => 'posts',
            "description" => esc_html__("Number of post to displace or pass over, it means based on your order of the loop, this number will define how many posts to pass over and start from the nth number of the offset.", "helpme")
        ),


        array(
            "type" => "multiselect",
            "heading" => esc_html__("Select specific Posts", "helpme"),
            "param_name" => "posts",
            "options" => $portfolio_posts,
            "value" => '',
            "description" => esc_html__("", "helpme")
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Select Specific Categories.", "helpme"),
            "param_name" => "categories",
            "value" => '',
            "description" => esc_html__("You will need to go to Wordpress Dashboard => Portfolios => Portfolio Categories. In the right hand find Slug column. you will need to add portfolio category slugs in this option. add comma to separate them.", "helpme")
        ),



        array(
            "type" => "toggle",
            "heading" => esc_html__("Pagination?", "helpme"),
            "param_name" => "pagination",
            "value" => "false",
            "description" => esc_html__("If you dont want to have pagination for this loop disable this option.", "helpme"),
            "dependency" => array(
                'element' => "scroll",
                'value' => array(
                    //'grid',
                   // 'masonry',
                    'false',
                   // 'flip'
                )
            )
        ),

        array(
            "heading" => esc_html__("Pagination Style", 'helpme'),
            "description" => esc_html__("please select which pagination style you would like to use on this loop.", 'helpme'),
            "param_name" => "pagination_style",
            "value" => array(
                esc_html__("Load more button", 'helpme') => "2",
                esc_html__("Classic Pagination Navigation", 'helpme') => "1"
            ),
            "type" => "dropdown",
            "dependency" => array(
                'element' => "pagination",
                'value' => array(
                    //'grid',
                    //'masonry',
                    'true',
                   // 'flip'
                )
            )
        ),

         array(
            "type" => "toggle",
            "heading" => esc_html__("Lightbox Plus Icon", "helpme"),
            "param_name" => "plus_icon",
            "value" => "true",
            "description" => esc_html__("If you don't want to have lightbox feature on this portfolio loop, disable this option. This option will remove plus icon from image hover.", "helpme"),
        ),

         array(
            "type" => "toggle",
            "heading" => esc_html__("Permalink Arrow Icon", "helpme"),
            "param_name" => "permalink_icon",
            "value" => "true",
            "description" => esc_html__("If you don't need permalink button from this loop image hover, disable this option.", "helpme"),
        ),

        /* array(
            "type" => "toggle",
            "heading" => esc_html__("Portfolio Overlay Logo", "helpme"),
            "param_name" => "show_logo",
            "value" => "false",
            "description" => esc_html__("If you do not want to show portfolio item logo that appears over images then turn off this option.", "helpme"),
        ), */

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
            "description" => esc_html__("Sort retrieved Portfolio items by parameter.", 'helpme'),
            "param_name" => "orderby",
            "value" => $helpme_orderby,
            "type" => "dropdown"
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

if(function_exists( 'is_woocommerce' )) {
    $categories = get_terms( 'product_cat', array(
                    'orderby'    => 'count',
                    'hide_empty' => 0,
                 ) );
    $product_cats = array();
    if(is_array($categories)){
        foreach($categories as $cats){
            $product_cats[$cats->slug] = $cats->slug;
        }
    }

vc_map(array(
    "name" => esc_html__("Product Loops", "helpme"),
    "base" => "helpme_products",
    "icon" => 'icon-helpme-blog vc_helpme_element-icon',
    "category" => esc_html__('Loops', 'helpme'),
    'description' => esc_html__( 'Product loops are here.', 'helpme' ),
    "params" => array(

        array(
            "heading" => esc_html__("Style", 'helpme'),
            "description" => esc_html__("please select which woocommerce loop style you would like to use.", 'helpme'),
            "param_name" => "style",
            "value" => array(
                esc_html__("Classic", 'helpme') => "classic",
               // esc_html__("Modern", 'helpme') => "modern",
            ),
            "type" => "dropdown"
        ),

        array(
            "heading" => esc_html__("Display", 'helpme'),
            "description" => esc_html__("", 'helpme'),
            "param_name" => "display",
            "value" => array(
                esc_html__("Recent Products", 'helpme') => "recent",
                esc_html__("Featured Products", 'helpme') => "featured",
                esc_html__("Top Rated Products", 'helpme') => "top_rated",
                esc_html__("Product Category", 'helpme') => "product_category",
                esc_html__("Products on Sale", 'helpme') => "products_on_sale",
                esc_html__("Best Sellings Products", 'helpme') => "best_sellings"
            ),
            "type" => "dropdown"
        ),
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
            "value" => "0",
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
            "value" => "1",
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
            "value" => "1",
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
            "value" => "1",
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
            "type" => "multiselect",
            "heading" => esc_html__("Select specific Categories", "helpme"),
            "param_name" => "category",
            "options" => $product_cats,
            "value" => '',
            "description" => esc_html__("", "helpme"),
            "dependency" => array(
                'element' => "display",
                'value' => array(
                    'product_category',
                )
            )
        ),
		
        array(
            "heading" => esc_html__("Orderby", 'helpme'),
            "description" => esc_html__("Sort retrieved Blog items by parameter.", 'helpme'),
            "param_name" => "orderby",
            "value" => $helpme_product_orderby,
            "type" => "dropdown"
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
            "type" => "range",
            "heading" => esc_html__("How many Columns?", "helpme"),
            "param_name" => "column",
            "value" => "3",
            "min" => "1",
            "max" => "4",
            "step" => "1",
            "unit" => 'columns',
            "description" => esc_html__("This option defines how many columns will be set in one row.", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("How many Product?", "helpme"),
            "param_name" => "product_per_page",
            "value" => "12",
            "min" => "4",
            "max" => "20",
            "step" => "1",
            "unit" => 'product',
            "description" => esc_html__("This option defines how many producr will be set in a page.", "helpme")
        ),
        array(
            "type" => "toggle",
            "heading" => esc_html__("Pagination", "helpme"),
            "description" => esc_html__("", "helpme"),
            "param_name" => "pagination",
            "value" => "true"
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
}
/*
vc_map(array(
    "name" => esc_html__("Product Categories Loops", "helpme"),
    "base" => "helpme_product_categories",
    "icon" => 'icon-helpme-blog vc_helpme_element-icon',
    "category" => esc_html__('Loops', 'helpme'),
    'description' => esc_html__( 'Product categories loops are here.', 'helpme' ),
    "params" => array(

        array(
            "type" => "range",
            "heading" => esc_html__("Number of Product?", "helpme"),
            "param_name" => "number_per_page",
            "value" => "4",
            "min" => "1",
            "max" => "12",
            "step" => "1",
            "unit" => 'product',
            "description" => esc_html__("How many product would you like to view?", "helpme")
        ),

        array(
            "type" => "range",
            "heading" => esc_html__("Number of Product on Row?", "helpme"),
            "param_name" => "columns",
            "value" => "4",
            "min" => "1",
            "max" => "4",
            "step" => "1",
            "unit" => 'product',
            "description" => esc_html__("How many product would you like to one row?", "helpme")
        ),

        array(
            "heading" => esc_html__("Orderby", 'helpme'),
            "description" => esc_html__("Sort retrieved pricing items by parameter.", 'helpme'),
            "param_name" => "orderby",
            "value" => $helpme_product_categories_orderby,
            "type" => "dropdown"
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
    )
));
*/