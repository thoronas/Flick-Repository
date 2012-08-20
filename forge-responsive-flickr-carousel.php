<?php
/*
Plugin Name: Forge & Smith Responsive Flickr Carousel
Plugin URI: 
Description: This plugin creates a function that lets you put a responsive flickr gallery in your theme files.  
Author: Flynn O'Connor
Version: 0.1
Author URI: 
*/

class Responsive_Carousel {
	function __construct(){
	
		add_action( 'wp_enqueue_scripts', array($this, 'action_enqueue_scripts') );		
		// for using in only admin area
		// add_action( 'admin_enqueue_scripts');  
	
		add_action( 'admin_init', array($this, 'action_admin_init'));
		function action_enqueue_scripts(){
            // register  
			wp_register_script('flynn_jquery_easing', plugins_url('js/jquery.easing.1.3.js', __FILE__), array( 'jquery' ));  
			wp_register_script('flynn_elastislide', plugins_url('js/jquery.elastislide.js', __FILE__), array( 'jquery' )); 
			wp_register_script('flynn_main', plugins_url('js/carousel.main.js', __FILE__));  
      
            // enqueue  
			wp_enqueue_script('flynn_jquery_easing');  
			wp_enqueue_script('flynn_elastislide');  
            wp_enqueue_script('flynn_main'); 		
            
            
            // register  
	        wp_register_style('flynn_styles', plugins_url('css/elastislide.css', __FILE__));  
      
	        // enqueue  
	        wp_enqueue_style('flynn_styles'); 
		
		}
	}

}

global $responsive_carousel;

$responsive_carousel = new Responsive_Carousel; 
 add_filter( 'the_content'); 

function forge_responsive_carousel(){
	return '<div id="carousel" class="es-carousel-wrapper"><div class="es-carousel"><ul></ul></div></div>';

 }

