<?php

    add_action( 'init', 'helpme_ajax_search_init' );  
    function helpme_ajax_search_init() {  
        add_action( 'wp_ajax_helpme_ajax_search', 'helpme_ajax_search' );  
        add_action( 'wp_ajax_nopriv_helpme_ajax_search', 'helpme_ajax_search' );  
    }  
    

    add_action( 'wp_ajax_{action}', 'helpme_hooked_function' );  
    add_action( 'wp_ajax_nopriv_{action}', 'helpme_hooked_function' );
    
    
    function helpme_ajax_search(){  

        $search_term = $_REQUEST['term'];
        $search_term = apply_filters('get_search_query', $search_term);
        
        $search_array = array(
            's'=> $search_term, 
            'showposts'   => 8,
            'post_type' => 'any', 
            'post_status' => 'publish', 
            'post_password' => '',
            'suppress_filters' => true
        );
        
        $query = http_build_query($search_array);
        
        $posts = get_posts( $query );


        $suggestions=array();  
      
        global $post;  
        foreach ($posts as $post): setup_postdata($post);  
            $suggestion = array();  
            $suggestion['label'] = esc_html($post->post_title);  
            $suggestion['link'] = get_permalink();  
            $suggestion['date'] = get_the_date();
            $post_type = get_post_type($post->ID);
            $suggestion['image'] = (has_post_thumbnail( $post->ID )) ? get_the_post_thumbnail($post->ID, 'thumbnail', array('title' => '')) : '<i class="helpme-theme-icon-'.$post_type.'"></i>' ; 
            
    
            $suggestions[]= $suggestion;  
        endforeach;  
      
        // JSON encode and echo  
        $response = $_GET["callback"] . "(" . json_encode($suggestions) . ")";  
        echo esc_attr($response);  
      
        // Don't forget to exit!  
        exit;  
    }  



function add_autocomplete_ui() {
    wp_enqueue_script( 'jquery-ui-autocomplete');  
}

add_action( 'wp_enqueue_scripts', 'add_autocomplete_ui' );