<?php

vc_map(array(
    "name" => esc_html__("Social Networks", "helpme"),
    "base" => "helpme_social_networks",
    'icon' => 'icon-helpme-social-networks vc_helpme_element-icon',
    'description' => esc_html__( 'Adds social network icons.', 'helpme' ),
    "category" => esc_html__('Social', 'helpme'),
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Style", "helpme"),
            "param_name" => "style",
            "value" => array(
                "Square" => "square",
                "Circle" => "circle",
                "Simple" => "simple"
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Skin", "helpme"),
            "param_name" => "skin",
            "value" => array(
                "Dark" => "dark",
                "Light" => "light",
                "Custom" => "custom",
            )
        ),


        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Border Color", "helpme"),
            "param_name" => "border_color",
            "value" => "#ccc",
            "description" => esc_html__("(default: #ccc). Doesn't work with Simple Style", "helpme"),
            "dependency" => array(
                'element' => "skin",
                'value' => array(
                    'custom'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Background Color", "helpme"),
            "param_name" => "bg_color",
            "value" => "",
            "description" => esc_html__("(default: transparent). Doesn't work with Simple Style", "helpme"),
            "dependency" => array(
                'element' => "skin",
                'value' => array(
                    'custom'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Background Hover Color", "helpme"),
            "param_name" => "bg_hover_color",
            "value" => "#232323",
            "description" => esc_html__("(default: #232323). Doesn't work with Simple Style", "helpme"),
            "dependency" => array(
                'element' => "skin",
                'value' => array(
                    'custom'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Icons Color", "helpme"),
            "param_name" => "icon_color",
            "value" => "#ccc",
            "description" => esc_html__("(default: #ccc)", "helpme"),
            "dependency" => array(
                'element' => "skin",
                'value' => array(
                    'custom'
                )
            )
        ),
        array(
            "type" => "colorpicker",
            "heading" => esc_html__("Icons Hover Color", "helpme"),
            "param_name" => "icon_hover_color",
            "value" => "#eee",
            "description" => esc_html__("(default: #eee)", "helpme"),
            "dependency" => array(
                'element' => "skin",
                'value' => array(
                    'custom'
                )
            )
        ),


        array(
            "type" => "range",
            "heading" => esc_html__("Margin", "helpme"),
            "param_name" => "margin",
            "value" => "4",
            "min" => "0",
            "max" => "50",
            "step" => "1",
            "unit" => 'px',
            "description" => esc_html__("How much distance between icons? this margin will be applied to all directions.", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Icons Align", "helpme"),
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
            "heading" => esc_html__("Facebook URL", "helpme"),
            "param_name" => "facebook",
            "value" => "",
            "description" => esc_html__("Fill this textbox with the full URL of your corresponding social netowork. include http:// if left blank this social network icon wont be shown.", "helpme")
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Twitter URL", "helpme"),
            "param_name" => "twitter",
            "value" => "",
            "description" => esc_html__("Fill this textbox with the full URL of your corresponding social netowork. include http:// if left blank this social network icon wont be shown.", "helpme")
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("RSS URL", "helpme"),
            "param_name" => "rss",
            "value" => "",
            "description" => esc_html__("Fill this textbox with the full URL of your corresponding social netowork. include http:// if left blank this social network icon wont be shown.", "helpme")
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Instagram URL", "helpme"),
            "param_name" => "instagram",
            "value" => "",
            "description" => esc_html__("Fill this textbox with the full URL of your corresponding social netowork. include http:// if left blank this social network icon wont be shown.", "helpme")
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Dribbble URL", "helpme"),
            "param_name" => "dribbble",
            "value" => "",
            "description" => esc_html__("Fill this textbox with the full URL of your corresponding social netowork. include http:// if left blank this social network icon wont be shown.", "helpme")
        ),
         array(
            "type" => "textfield",
            "heading" => esc_html__("Vimeo URL", "helpme"),
            "param_name" => "vimeo",
            "value" => "",
            "description" => esc_html__("Fill this textbox with the full URL of your corresponding social netowork. include http:// if left blank this social network icon wont be shown.", "helpme")
        ),
         array(
            "type" => "textfield",
            "heading" => esc_html__("Spotify URL", "helpme"),
            "param_name" => "spotify",
            "value" => "",
            "description" => esc_html__("Fill this textbox with the full URL of your corresponding social netowork. include http:// if left blank this social network icon wont be shown.", "helpme")
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Pinterest URL", "helpme"),
            "param_name" => "pinterest",
            "value" => "",
            "description" => esc_html__("Fill this textbox with the full URL of your corresponding social netowork. include http:// if left blank this social network icon wont be shown.", "helpme")
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Google Plus URL", "helpme"),
            "param_name" => "google_plus",
            "value" => "",
            "description" => esc_html__("Fill this textbox with the full URL of your corresponding social netowork. include http:// if left blank this social network icon wont be shown.", "helpme")
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Linkedin URL", "helpme"),
            "param_name" => "linkedin",
            "value" => "",
            "description" => esc_html__("Fill this textbox with the full URL of your corresponding social netowork. include http:// if left blank this social network icon wont be shown.", "helpme")
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Youtube URL", "helpme"),
            "param_name" => "youtube",
            "value" => "",
            "description" => esc_html__("Fill this textbox with the full URL of your corresponding social netowork. include http:// if left blank this social network icon wont be shown.", "helpme")
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Tumblr URL", "helpme"),
            "param_name" => "tumblr",
            "value" => "",
            "description" => esc_html__("Fill this textbox with the full URL of your corresponding social netowork. include http:// if left blank this social network icon wont be shown.", "helpme")
        ),



        array(
            "type" => "textfield",
            "heading" => esc_html__("Behance URL", "helpme"),
            "param_name" => "behance",
            "value" => "",
            "description" => esc_html__("Fill this textbox with the full URL of your corresponding social netowork. include http:// if left blank this social network icon wont be shown.", "helpme")
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("WhatsApp URL", "helpme"),
            "param_name" => "whatsapp",
            "value" => "",
            "description" => esc_html__("Fill this textbox with the full URL of your corresponding social netowork. include http:// if left blank this social network icon wont be shown.", "helpme")
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("qzone URL", "helpme"),
            "param_name" => "qzone",
            "value" => "",
            "description" => esc_html__("Fill this textbox with the full URL of your corresponding social netowork. include http:// if left blank this social network icon wont be shown.", "helpme")
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("vk.com URL", "helpme"),
            "param_name" => "vkcom",
            "value" => "",
            "description" => esc_html__("Fill this textbox with the full URL of your corresponding social netowork. include http:// if left blank this social network icon wont be shown.", "helpme")
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("IMDb URL", "helpme"),
            "param_name" => "imdb",
            "value" => "",
            "description" => esc_html__("Fill this textbox with the full URL of your corresponding social netowork. include http:// if left blank this social network icon wont be shown.", "helpme")
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Renren URL", "helpme"),
            "param_name" => "renren",
            "value" => "",
            "description" => esc_html__("Fill this textbox with the full URL of your corresponding social netowork. include http:// if left blank this social network icon wont be shown.", "helpme")
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Wechat URL", "helpme"),
            "param_name" => "wechat",
            "value" => "",
            "description" => esc_html__("Fill this textbox with the full URL of your corresponding social netowork. include http:// if left blank this social network icon wont be shown.", "helpme")
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Weibo URL", "helpme"),
            "param_name" => "weibo",
            "value" => "",
            "description" => esc_html__("Fill this textbox with the full URL of your corresponding social netowork. include http:// if left blank this social network icon wont be shown.", "helpme")
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
    "name" => esc_html__("Twitter Feeds", "helpme"),
    "base" => "vc_twitter",
    'icon' => 'icon-helpme-twitter-feeds vc_helpme_element-icon',
    'description' => esc_html__( 'Adds Twitter Feeds.', 'helpme' ),
    "category" => esc_html__('Social', 'helpme'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Twitter name", "helpme"),
            "param_name" => "twitter_name",
            "value" => "",
            "description" => esc_html__("Type in twitter profile name from which load tweets.", "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Tweets count", "helpme"),
            "param_name" => "tweets_count",
            "value" => "5",
            "min" => "1",
            "max" => "30",
            "step" => "1",
            "unit" => 'tweets',
            "description" => esc_html__("How many recent tweets to load.", "helpme")
        ),

        array(
            "type" => "textfield",
            "heading" => esc_html__("Add Icon Class Name", "helpme"),
            "param_name" => "twitter_icon",
            "value" => "",
            "description" => esc_html__(" to get the icon class name (or any other font icons library that you have installed in the theme)", "helpme"). wp_kses_post(__("<a target='_blank' href='" . admin_url('tools.php?page=icon-library') . "'>Click here</a>", "helpme")),
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
    "name" => esc_html__("Video player", "helpme"),
    "base" => "vc_video",
    'icon' => 'icon-helpme-video-player vc_helpme_element-icon',
    'description' => esc_html__( 'Youtube, Vimeo,..', 'helpme' ),
    "category" => esc_html__('Social', 'helpme'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Widget Title", "helpme"),
            "param_name" => "title",
            "value" => "",
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Video link", "helpme"),
            "param_name" => "link",
            "value" => "",
			 "description" => esc_html__(" Link to the video. More about supported formats at", "helpme"). __(' <a href="http://codex.wordpress.org/Embeds#Okay.2C_So_What_Sites_Can_I_Embed_From.3F" target="_blank">WordPress codex page</a>', "helpme"),
           
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
    "name" => esc_html__("Google Maps", "helpme"),
    "base" => "helpme_gmaps",
    "category" => esc_html__('Social', 'helpme'),
    'icon' => 'icon-helpme-advanced-google-maps vc_helpme_element-icon',
    'description' => esc_html__( 'Powerful Google Maps element.', 'helpme' ),
    "params" => array(
         array(
               "type" => "textfield",
               "heading" => esc_html__("Address : Latitude", "helpme"),
               "param_name" => "latitude",
               "value" => "31.5497",
               "description" => esc_html__('', "helpme")
          ),
          array(
               "type" => "textfield",
               "heading" => esc_html__("Address : Longitude", "helpme"),
               "param_name" => "longitude",
               "value" => "74.3436",
               "description" => esc_html__('', "helpme")
          ),
          array(
               "type" => "textfield",
               "heading" => esc_html__("Address : Full Address Text (shown in tooltip)", "helpme"),
               "param_name" => "address",
               "value" => "Lahore",
               "description" => esc_html__('', "helpme")
          ),

          /*array(
               "type" => "textfield",
               "heading" => esc_html__("Address 2 : Latitude", "helpme"),
               "param_name" => "latitude_2",
               "value" => "",
               "description" => esc_html__('', "helpme")
          ),
          array(
               "type" => "textfield",
               "heading" => esc_html__("Address 2 : Longitude", "helpme"),
               "param_name" => "longitude_2",
               "value" => "",
               "description" => esc_html__('', "helpme")
          ),
          array(
               "type" => "textfield",
               "heading" => esc_html__("Address 2 : Full Address Text (shown in tooltip)", "helpme"),
               "param_name" => "address_2",
               "value" => "",
               "description" => esc_html__('', "helpme")
          ),



          array(
               "type" => "textfield",
               "heading" => esc_html__("Address 3 : Latitude", "helpme"),
               "param_name" => "latitude_3",
               "value" => "",
               "description" => esc_html__('', "helpme")
          ),
          array(
               "type" => "textfield",
               "heading" => esc_html__("Address 3 : Longitude", "helpme"),
               "param_name" => "longitude_3",
               "value" => "",
               "description" => esc_html__('', "helpme")
          ),
          array(
               "type" => "textfield",
               "heading" => esc_html__("Address 3 : Full Address Text (shown in tooltip)", "helpme"),
               "param_name" => "address_3",
               "value" => "",
               "description" => esc_html__('', "helpme")
          ),*/



          array(
               "type" => "upload",
               "heading" => esc_html__("Upload Marker Icon", "helpme"),
               "param_name" => "pin_icon",
               "value" =>  plugin_dir_path( __FILE__ ). '/img/marker.png',
               "description" => esc_html__("If left blank Google Default marker will be used.", "helpme")
          ),
          array(
               "type" => "range",
               "heading" => esc_html__("Map height", "helpme"),
               "param_name" => "height",
               "value" => "500",
               "min" => "1",
               "max" => "1000",
               "step" => "1",
               "unit" => 'px',
               "description" => esc_html__('Enter map height in pixels. Example: 200).', "helpme")
          ),

          /*array(
               "type" => "toggle",
               "heading" => esc_html__("Full Height?", "helpme"),
               "param_name" => "full_height",
               "value" => "false",
               "description" => esc_html__("", "helpme")
          ),*/

         /* array(
               "type" => "toggle",
               "heading" => esc_html__("Parallax Effect?", "helpme"),
               "param_name" => "parallax",
               "value" => "false",
               "description" => esc_html__("If you dont want to have parallax effect in this shortcode disable this option.", "helpme")
          ),*/
          array(
               "type" => "range",
               "heading" => esc_html__("Zoom", "helpme"),
               "param_name" => "zoom",
               "value" => "14",
               "min" => "1",
               "max" => "19",
               "step" => "1",
               "unit" => '',
               "description" => esc_html__('', "helpme")
          ),
          array(
               "type" => "toggle",
               "heading" => esc_html__("Pan Control", "helpme"),
               "param_name" => "pan_control",
               "value" => "true",
               "description" => esc_html__("", "helpme")
          ),
          array(
               "type" => "toggle",
               "heading" => esc_html__("Draggable", "helpme"),
               "param_name" => "draggable",
               "value" => "true",
               "description" => esc_html__("", "helpme")
          ),
          array(
               "type" => "toggle",
               "heading" => esc_html__("Zoom Control", "helpme"),
               "param_name" => "zoom_control",
               "value" => "true",
               "description" => esc_html__("", "helpme")
          ),
          array(
               "type" => "toggle",
               "heading" => esc_html__("Map Type Control", "helpme"),
               "param_name" => "map_type_control",
               "value" => "true",
               "description" => esc_html__("", "helpme")
          ),
          array(
               "type" => "toggle",
               "heading" => esc_html__("Scale Control", "helpme"),
               "param_name" => "scale_control",
               "value" => "true",
               "description" => esc_html__("", "helpme")
          ),

          array(
               "type" => "dropdown",
               "heading" => esc_html__("Modify Google Maps Hue, Saturation, Lightness", "helpme"),
               "param_name" => "modify_coloring",
               "value" => array(
                    esc_html__("No", "helpme") => "false",
                    esc_html__("Yes", "helpme") => "true"
               ),
               "description" => esc_html__("", "helpme")
          ),
          array(
               "type" => "colorpicker",
               "heading" => esc_html__("Hue", "helpme"),
               "param_name" => "hue",
               "value" => "#ff4400",
               "description" => esc_html__("Sets the hue of the feature to match the hue of the color supplied. Note that the saturation and lightness of the feature is conserved, which means, the feature will not perfectly match the color supplied .", "helpme"),
               "dependency" => array(
                    'element' => "modify_coloring",
                    'value' => array(
                         'true'
                    )
               )
          ),
		  array(
               "type" => "textfield",
               "heading" => esc_html__("gamma", "helpme"),
               "param_name" => "gamma",
               "value" => "0.72",
               "description" => esc_html__("Sets the hue of the feature to match the hue of the color supplied. Note that the saturation and lightness of the feature is conserved, which means, the feature will not perfectly match the color supplied .", "helpme"),
               "dependency" => array(
                    'element' => "modify_coloring",
                    'value' => array(
                         'true'
                    )
               )
          ),
          array(
               "type" => "range",
               "heading" => esc_html__("Saturation", "helpme"),
               "param_name" => "saturation",
               "value" => "-68",
               "min" => "-100",
               "max" => "100",
               "step" => "1",
               "unit" => '',
               "description" => esc_html__('Shifts the saturation of colors by a percentage of the original value if decreasing and a percentage of the remaining value if increasing. Valid values: [-100, 100].', "helpme"),
               "dependency" => array(
                    'element' => "modify_coloring",
                    'value' => array(
                         'true'
                    )
               )
          ),
          array(
               "type" => "range",
               "heading" => esc_html__("Lightness", "helpme"),
               "param_name" => "lightness",
               "value" => "-4",
               "min" => "-100",
               "max" => "100",
               "step" => "1",
               "unit" => '',
               "description" => esc_html__('Shifts lightness of colors by a percentage of the original value if decreasing and a percentage of the remaining value if increasing. Valid values: [-100, 100].', "helpme"),
               "dependency" => array(
                    'element' => "modify_coloring",
                    'value' => array(
                         'true'
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
    "base" => "vc_flickr",
    "name" => esc_html__("Flickr Feeds", "helpme"),
    'icon' => 'icon-helpme-flickr-feeds vc_helpme_element-icon',
    'description' => esc_html__( 'Show your Flickr Feeds.', 'helpme' ),
    "category" => esc_html__('Social', 'helpme'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Flickr ID", "helpme"),
            "param_name" => "flickr_id",
            "value" => "",
            "description" => esc_html__('To find your flickID visit http://idgettr.com/  In order to use Flickr Shortcode you should first obtain an API key from http://www.flickr.com/services/api/misc.api_keys.htmlFlickr The App Garden and update the field in Theme settings => Third Party API => Flickr API Key.', "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Number of photos", "helpme"),
            "param_name" => "count",
            "value" => "6",
            "min" => "1",
            "max" => "200",
            "step" => "1",
            "unit" => 'photos'
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("How many photos in one row?", "helpme"),
            "param_name" => "column",
            "value" => array(
                esc_html__("1", "helpme") => "one",
                esc_html__("2", "helpme") => "two",
                esc_html__("3", "helpme") => "three",
                esc_html__("4", "helpme") => "four",
                esc_html__("5", "helpme") => "five",
                esc_html__("6", "helpme") => "six",
                esc_html__("7", "helpme") => "seven",
                esc_html__("8", "helpme") => "eight"
            ),
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
    "base" => "helpme_instagram",
    "name" => esc_html__("Instagram Feeds", "helpme"),
    "category" => esc_html__('Social', 'helpme'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Instagram ID", "helpme"),
            "param_name" => "instagram_id",
            "value" => "",
			"description" => esc_html__(" Dont know your user id or token?  to get one.", "helpme"). wp_kses_post(__("<a href='https://instagram.com/oauth/authorize/?client_id=467ede5a6b9b48ae8e03f4e2582aeeb3&redirect_uri=http://instafeedjs.com&response_type=token'>Click here</a>", "helpme")),
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Access Token", "helpme"),
            "param_name" => "access_token",
            "value" => "",
            "description" => esc_html__('', "helpme")
        ),
        array(
            "type" => "range",
            "heading" => esc_html__("Number of photos", "helpme"),
            "param_name" => "count",
            "value" => "6",
            "min" => "1",
            "max" => "60",
            "step" => "1",
            "unit" => 'photos'
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Sort By", "helpme"),
            "param_name" => "sort_by",
            "value" => array(
                esc_html__("Most Recent", "helpme") => "most-recent",
                esc_html__("Least Recent", "helpme") => "least-recent",
                esc_html__("Most Liked", "helpme") => "most-liked",
                esc_html__("Least Liked", "helpme") => "least-liked",
                esc_html__("Most Commented", "helpme") => "most-commented",
                esc_html__("Least Commented", "helpme") => "least-commented",
                esc_html__("Random", "helpme") => "random"
            ),
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Thumbnail Size", "helpme"),
            "param_name" => "size",
            "value" => array(
                esc_html__("Thumbnail (150X150)", "helpme") => "thumbnail",
                esc_html__("Low Resolution (306X306)", "helpme") => "low_resolution",
                esc_html__("Standard Resolution (612X612)", "helpme") => "standard_resolution"
            ),
            "description" => esc_html__("", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("How many photos in one row?", "helpme"),
            "param_name" => "column",
            "value" => array(
                esc_html__("1", "helpme") => "one",
                esc_html__("2", "helpme") => "two",
                esc_html__("3", "helpme") => "three",
                esc_html__("4", "helpme") => "four",
                esc_html__("5", "helpme") => "five"
            ),
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
    "base" => "helpme_contact_form",
    "name" => esc_html__("Contact Form", "helpme"),
    'icon' => 'icon-helpme-contact-form vc_helpme_element-icon',
    'description' => esc_html__( 'Adds Contact form element.', 'helpme' ),
    "category" => esc_html__('Social', 'helpme'),
    "params" => array(


        array(
            "type" => "textfield",
            "heading" => esc_html__("Email", "helpme"),
            "param_name" => "email",
            "value" => "",
            "description" => sprintf(esc_html__('Which email would you like the contacts to be sent, if left empty emails will be sent to admin email : "%s"', "helpme"), get_bloginfo('admin_email'))

        ),
       /* array(
            "type" => "dropdown",
            "heading" => esc_html__("Style", "helpme"),
            "param_name" => "style",
            "value" => array(
                esc_html__("Classic", "helpme") => "classic",
                esc_html__("Modern", "helpme") => "modern"
            ),
            "description" => esc_html__("Choose your contact form style", "helpme")
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Skin", "helpme"),
            "param_name" => "skin",
            "value" => array(
                esc_html__("Dark", "helpme") => "dark",
                esc_html__("Light", "helpme") => "light"
            ),
            "description" => esc_html__("Choose your contact form style", "helpme"),
            "dependency" => array(
                'element' => "style",
                'value' => array(
                    'classic'
                )
            )
        ),
        array(
               "type" => "colorpicker",
               "heading" => esc_html__("Skin Color", "helpme"),
               "param_name" => "skin_color",
               "value" => "#000",
               "description" => esc_html__("", "helpme"),
               "dependency" => array(
                    'element' => "style",
                    'value' => array(
                         'modern'
                    )
               )
        ),

        array(
               "type" => "colorpicker",
               "heading" => esc_html__("Button Text Color", "helpme"),
               "param_name" => "btn_text_color",
               "value" => "#000",
               "description" => esc_html__("", "helpme"),
               "dependency" => array(
                    'element' => "style",
                    'value' => array(
                         'modern'
                    )
               )
        ),

        array(
               "type" => "colorpicker",
               "heading" => esc_html__("Button Hover Text Color", "helpme"),
               "param_name" => "btn_hover_text_color",
               "value" => "#fff",
               "description" => esc_html__("", "helpme"),
               "dependency" => array(
                    'element' => "style",
                    'value' => array(
                         'modern'
                    )
               )
        ),

        array(
            "type" => "toggle",
            "heading" => esc_html__("Show Phone Number Field?", "helpme"),
            "param_name" => "phone",
            "value" => "false",
            "description" => esc_html__("", "helpme")
        ),*/
        array(
            "type" => "toggle",
            "heading" => esc_html__("Show Captcha?", "helpme"),
            "param_name" => "captcha",
            "value" => "true",
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
    "base" => "helpme_contact_info",
    "name" => esc_html__("Contact Info", "helpme"),
    'icon' => 'icon-helpme-contact-info vc_helpme_element-icon',
    "category" => esc_html__('Social', 'helpme'),
    'description' => esc_html__( 'Adds Contact info details.', 'helpme' ),
    "params" => array(

        array(
            "type" => "dropdown",
            "heading" => esc_html__("Skin", "helpme"),
            "param_name" => "skin",
            "value" => array(
                esc_html__("Dark", "helpme") => "dark",
                esc_html__("Light", "helpme") => "light",
                esc_html__("Custom", "helpme") => "custom"
            ),
            "description" => esc_html__("Choose your contact form style", "helpme")
        ),
        array(
             "type" => "colorpicker",
             "heading" => esc_html__("Text & Icon Color", "helpme"),
             "param_name" => "text_icon_color",
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
             "heading" => esc_html__("Border Color", "helpme"),
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
            "type" => "textfield",
            "heading" => esc_html__("Name", "helpme"),
            "param_name" => "name",
            "value" => ""
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Cellphone", "helpme"),
            "param_name" => "cellphone",
            "value" => ""
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Phone", "helpme"),
            "param_name" => "phone",
            "value" => ""
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Address", "helpme"),
            "param_name" => "address",
            "value" => ""
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Website", "helpme"),
            "param_name" => "website",
            "value" => ""
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Email", "helpme"),
            "param_name" => "email",
            "value" => ""
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
