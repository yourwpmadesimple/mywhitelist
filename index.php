<?php
/**
* Plugin Name: My WhiteList
* Plugin URI: https://github.com/yourwpmadesimple/mywhitelist.git
* Description: This plugin allows the user to input their name and email address that will be output to a static HTML page
* Version: 1.0
* Author: Wayne Hatter
* Author URI: https://yourwpmadesimple.com
**/

// Redirect user to plugin options page
add_action( 'activated_plugin', 'mywl_activation_redirect' );
function mywl_activation_redirect( $plugin ) {
    if( $plugin == plugin_basename( __FILE__ ) ) {
        exit( wp_redirect( admin_url( 'admin.php?page=my_whitelist' ) ) );
    }
}

// Add link to the plugin's setting page from the plugins page
add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'mywl_settings_link');
function mywl_settings_link( $links ) {
	$links[] = '<a href="' .
		admin_url( 'admin.php?page=my_whitelist' ) .
		'">' . __('Settings') . '</a>';
	return $links;
}

// Remove options on uninstall
function mywl_uninstall(){
	if (!current_user_can('activate_plugins')){
		return;
	} 
	delete_option('mywl_settings');
}
register_uninstall_hook(__FILE__, 'mywl_uninstall');

//add_action( 'admin_init','mywhitelist');
// May not need this functionality. Nevertheless, it will stay put just in case
function mywhitelist() {
		wp_enqueue_style('mywl-css', plugins_url('/includes/css/style.css',__FILE__ ));
		wp_enqueue_style('mywl-ui-base-theme', 'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');

		wp_enqueue_script( 'mywl-js', plugins_url('/includes/js/scripts.js',__FILE__ ), array('jquery'), true);
		wp_enqueue_script( 'mywl-tabs', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js', true);
}


// Options Page
add_action( 'admin_menu', 'mywl_add_admin_menu' );
function mywl_add_admin_menu(  ) { 

	add_menu_page( 'My WhiteList', 'My WhiteList', 'manage_options', 'my_whitelist', 'mywl_options_page' );
}

// Register the options page settings
add_action( 'admin_init', 'mywl_settings_init' );
function mywl_settings_init() { 

	register_setting( 'pluginPage', 'mywl_settings' );

	add_settings_section(
		'mywl_pluginPage_section', 
		__( '', 'mywhitelist' ), 
		'mywl_settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'mywl_name', 
		__( 'Your email "From:" text:', 'mywhitelist' ), 
		'mywl_name_render', 
		'pluginPage', 
		'mywl_pluginPage_section' 
	);

	add_settings_field( 
		'mywl_email', 
		__( 'Your "From:" email address:', 'mywhitelist' ), 
		'mywl_email_render', 
		'pluginPage', 
		'mywl_pluginPage_section' 
    );
    
	add_settings_field( 
		'mywl_brand', 
		__( 'Your brand name:', 'mywhitelist' ), 
		'mywl_brand_render', 
		'pluginPage', 
		'mywl_pluginPage_section' 
	);


}

function mywl_name_render(  ) { 

	$options = get_option( 'mywl_settings' );
	?>
	<input size="30" type='text' name='mywl_settings[mywl_name]' value='<?php echo $options['mywl_name']; ?>' require><span class="require">*required!</span><br>
    <span class="field-value"><?php echo $options['mywl_name']; ?></span>
	<?php

}

function mywl_email_render(  ) { 

	$options = get_option( 'mywl_settings' );
	?>
	<input size="30" type='email' name='mywl_settings[mywl_email]' value='<?php echo $options['mywl_email']; ?>' require><span class="require">*required!</span><br>
    <span class="field-value"><?php echo $options['mywl_email']; ?></span>
	<?php

}

function mywl_brand_render(  ) { 

	$options = get_option( 'mywl_settings' );
	?>
	<input size="30" type='text' name='mywl_settings[mywl_brand]' value='<?php echo $options['mywl_brand']; ?>' require><span class="require">*required!</span><br>
    <span class="field-value"><?php echo $options['mywl_brand']; ?></span>
	<?php

}




function mywl_settings_section_callback(  ) { 
    $section_description = "Enter the <strong>Email</strong> and <strong>Name</strong> you want WhiteListed.";

	echo __( $section_description, 'mywhitelist' );

}


function mywl_options_page(  ) { 

		?>
		<form id="mywl-form" action='options.php' method='post'>

			<h2>My WhiteList</h2>

			<?php
			settings_fields( 'pluginPage' );
			do_settings_sections( 'pluginPage' );
            submit_button('Save Settings');
            ;
			?>

		</form>
		<a href="#source-code" class="view-source">View Source</a>
		<div id="source-code">
		<a href="#" id="x"><img src="http://css-tricks.com/examples/ViewSourceButton/images/x.png" alt="close"></a>
		</div>
		<?php include('includes/mywhitelist.php'); ?>
<?php
}