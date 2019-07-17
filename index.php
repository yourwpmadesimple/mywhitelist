<?php
/**
* Plugin Name: My WhiteList
* Plugin URI: https://github.com/yourwpmadesimple/mywhitelist.git
* Description: This plugin allows the user to input their name and email address that will be output to a static HTML page
* Version: 1.0
* Author: Wayne Hatter
* Author URI: https://yourwpmadesimple.com
**/

// Options Page

add_action( 'admin_menu', 'mywl_add_admin_menu' );
add_action( 'admin_init', 'mywl_settings_init' );


function mywl_add_admin_menu(  ) { 

	add_menu_page( 'My WhiteList', 'My WhiteList', 'manage_options', 'my_whitelist', 'mywl_options_page' );

}


function mywl_settings_init(  ) { 

	register_setting( 'pluginPage', 'mywl_settings' );

	add_settings_section(
		'mywl_pluginPage_section', 
		__( '', 'mywhitelist' ), 
		'mywl_settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'mywl_email', 
		__( 'WhiteList Email', 'mywhitelist' ), 
		'mywl_email_render', 
		'pluginPage', 
		'mywl_pluginPage_section' 
	);

	add_settings_field( 
		'mywl_name', 
		__( 'WhiteList Name', 'mywhitelist' ), 
		'mywl_name_render', 
		'pluginPage', 
		'mywl_pluginPage_section' 
	);


}


function mywl_email_render(  ) { 

	$options = get_option( 'mywl_settings' );
	?>
	<input size="30" type='email' name='mywl_settings[mywl_email]' value='<?php echo $options['mywl_email']; ?>'><br>
    <span style="color:green;"><?php echo $options['mywl_email']; ?></span>
	<?php

}


function mywl_name_render(  ) { 

	$options = get_option( 'mywl_settings' );
	?>
	<input size="30" type='text' name='mywl_settings[mywl_name]' value='<?php echo $options['mywl_name']; ?>'><br>
    <span style="color:green;"><?php echo $options['mywl_name']; ?></span>
	<?php

}


function mywl_settings_section_callback(  ) { 
    $section_description = "Enter the <strong>Email</strong> and <strong>Name</strong> you want WhiteListed.";

	echo __( $section_description, 'mywhitelist' );

}


function mywl_options_page(  ) { 

		?>
		<form action='options.php' method='post'>

			<h2>My WhiteList</h2>

			<?php
			settings_fields( 'pluginPage' );
			do_settings_sections( 'pluginPage' );
			submit_button();
			?>

		</form>
		<?php

}