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

	function __construct() {

		add_action( 'wp_enqueue_scripts', array( $this, 'action_enqueue_scripts' ) );

		add_action( 'wp_head', array( $this, 'action_wp_head' ) );
		add_action( 'admin_init', array( $this, 'action_admin_init' ) );
	}

	function action_enqueue_scripts() {
		// Register
		wp_register_script('flynn_elastislide', plugins_url('js/jquery.elastislide.js', __FILE__), array( 'jquery' )); 
		wp_register_script('flynn_main', plugins_url('js/carousel.main.js', __FILE__));
		
		// enqueue  
		wp_enqueue_script('flynn_jquery_easing', plugins_url('js/jquery.easing.1.3.js', __FILE__), array( 'jquery' ));
		wp_enqueue_script('flynn_elastislide');
		wp_enqueue_script('flynn_main');

		// register  
		wp_register_style('flynn_styles', plugins_url('css/elastislide.css', __FILE__));
		// enqueue  
		wp_enqueue_style('flynn_styles');
	}

	function action_admin_init() {

		// register_setting( 'responsive_carousel', 'responsive_carousel', array( $this, 'validate_settings' ) );
		add_settings_section( 'responsive_carousel', 'Responsive Carousel', '__return_false', 'media' );
		add_settings_field( 'rc_flickr_id', 'Flickr ID', array( $this, 'settings_flicker_id' ), 'media', 'responsive_carousel' );
	}

	function settings_flicker_id() {

		echo '<input type="text" name="rc_flickr_id" />';
	}

	function validate_settings( $input ) {

		return $output;
	}

	function action_wp_head() {

		?>
		<script>
			var responsive_carousel = '<?php echo esc_js( $responsive_carousel_id ); ?>';
		</script>
		<?php
	}

}

global $responsive_carousel;
$responsive_carousel = new Responsive_Carousel;


function forge_responsive_carousel(){
	return '<div id="carousel" class="es-carousel-wrapper"><div class="es-carousel"><ul></ul></div></div>';
}
