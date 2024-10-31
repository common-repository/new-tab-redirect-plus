<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly



function ntrpp_activation_redirect() {
          exit( wp_redirect( admin_url( 'options-general.php?page=ntrpp-plugin' ) ) );
}

function ntrpp_add_settings_link( $links ) {
    $settings_link = '<a href="'.admin_url( "options-general.php?page=ntrpp-plugin" ).'">' . __( 'Settings' ) . '</a>';
    array_push( $links, $settings_link );
    return $links;
}


function ntrpp_com_content($content) {
	return $content . stripslashes_deep ( esc_attr ( get_option ( 'ntrpp-website-full-url' ) ) );
}

function ntrpp_plugin_settings() {
	add_settings_section ( "ntrpp_plugin_config", "", null, "ntrpp-plugin" );
	add_settings_field ( "ntrpp-website-full-url", "", "ntrpp_plugin_options", "ntrpp-plugin", "ntrpp_plugin_config" , "ntrpp-open-comment-links-in-new-window", "ntrpp-othar-comment-links-in-new-window");
	register_setting ( "ntrpp_plugin_config", "ntrpp-website-full-url" );
	register_setting ( "ntrpp_plugin_config", "ntrpp-open-comment-links-in-new-window" );
	register_setting ( "ntrpp_plugin_config", "ntrpp-othar-comment-links-in-new-window" );
}

function ntrpp_comment_links_in_new_window($text) 
{
	$url = stripslashes_deep ( esc_attr ( get_option ( 'ntrpp-website-full-url' ) ) );
	$check_plugin_enable = stripslashes_deep ( esc_attr ( get_option ( 'ntrpp-open-comment-links-in-new-window' ) ) );
	$check_othor = stripslashes_deep ( esc_attr ( get_option ( 'ntrpp-othar-comment-links-in-new-window' ) ) );

	if(!empty($check_plugin_enable)){
			return str_replace('<a', '<a target="_blank"', $text);
	}
	else if(!empty($check_othor) && !empty($url))
	{
						//$a = new SimpleXMLElement($text);
			$s = explode('href="',$text);
			$t = explode('">',$s[1]);

			$text =  '<a href ='.$url.' rel="nofollow" target="_blank">'.$t[1].'</a>';
			return str_replace('<a', '<a target="_blank"', $text);
	}
	else {
			return str_replace('<a', '<a', $text);
	}
}

function admin_js() { ?>
<script type="text/javascript">

    jQuery(document).ready( function () { 
       jQuery('.franquiaCheckbox').click(function() {
		     jQuery('input[type="checkbox"]').not(this).prop('checked', false);    
		});
    });

</script>
<?php }


function ntrpp_plugin_page() {
	?>
<div class="wrap">
	<form method="post" action="options.php">
            <?php
	settings_fields ( "ntrpp_plugin_config" );
	do_settings_sections ( "ntrpp-plugin" );
	?>
     </form>
</div>
 
<?php
}