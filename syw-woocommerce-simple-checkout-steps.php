<?php
/**
* Plugin Name: SYW Woocommerce Simple Checkout Steps
* Plugin URI: 
* Description: Add checkout steps at your Woocommerce shop for a better shopping experience
* Version: 1.0
* Author: Macarthurval
* Author URI: 
* License: GPL12
*/

add_action('after_setup_theme', 'syw_wscs_textdomain');
function syw_wscs_textdomain(){
    load_theme_textdomain('syw-woocommerce-simple-checkout-steps','lang');
}


function syw_wscs_set_steps(){
	
	$string="";
				
				wp_enqueue_script("jquery");
				
				ob_start();
				include ( 'templates/steps-template.php' );
				$string = ob_get_contents();
				ob_end_clean();
				
				$string = eregi_replace("[\n|\r|\n\r]", '', $string);
			
			echo "<script>
				jQuery(document).ready(function(){
					
					jQuery('header').append('".$string."');
				});
				
				
			</script>";
	
}

add_action('wp_head', 'syw_wscs_set_steps');


?>