<?php

/*
 * Plugin Name: WP TogetherJS
 * Version: 1.0.1
 * Plugin URI: https://github.com/RyanNielson/wp-togetherjs
 * Description: Easily integrate Mozilla's TogetherJS collaboration system into a Wordpress site.
 * Author: Ryan Nielson
 * Author URI: https://github.com/RyanNielson
 * Requires at least: 3.3
 * Tested up to: 3.6.1
 * 
 * @package WordPress
 * @author Ryan Nielson
 * @since 1.0.0
 */

function wp_togetherjs_add_start_button($wp_admin_bar) {
	$args = array(
		'id'    => 'start_together_js_button',
		'title' => '<a href="#" id="start-togetherjs" class="togetherjs-button" onclick="TogetherJS(this); return false;">Start TogetherJS</a>',
		'meta' => array(
			'class' => 'togetherjs-button-container'
		)
	);

	$wp_admin_bar->add_node( $args );
}

function wp_togetherjs_enqueue_styles_and_scripts() {
	wp_enqueue_style("wp_togetherjs_style", plugins_url("assets/wp-togetherjs.css", __FILE__ ));
	wp_enqueue_script("wp_togetherjs_script", plugins_url("assets/wp-togetherjs.js", __FILE__ ), array("jquery"));
	wp_enqueue_script("togetherjs_script", "https://togetherjs.com/togetherjs-min.js");
}

function wp_togetherjs_add_menu_item() {
	add_options_page("WP TogetherJS", "WP TogetherJS", "manage_options", "wp_togetherjs", "wp_togetherjs_settings_page");
}

function wp_togetherjs_add_settings_link($links) {
	$settings_link = "<a href='options-general.php?page=wp_togetherjs_settings'>Settings</a>";
	array_push($links, $settings_link);
	return $links;
}

function wp_togetherjs_register_settings() {
		add_settings_section("wp_togetherjs_main_settings", "Modify plugin settings", "wp_togetherjs_main_settings", "wp_togetherjs_settings");
		add_settings_field("wp_togetherjs_settings_field" , "Settings field:", "wp_togetherjs_settings_field", "wp_togetherjs_settings" , "wp_togetherjs_main_settings");
		register_setting("wp_togetherjs_settings", "wp_togetherjs_settings_field" , "wp_togetherjs_validate_field");
}

function wp_togetherjs_main_settings() {
	echo '<p>Change these settings ot customise your plugin.</p>';
}

function wp_togetherjs_settings_field() {

	$option = get_option("wp_togetherjs_settings_field");

	$data = '';
	if( $option && strlen( $option ) > 0 && $option != '' ) {
		$data = $option;
	}

	echo '<input id="slug" type="text" name="wp_togetherjs_settings_field" value="' . $data . '"/>
			<label for="slug"><span class="description">Description of settings field</span></label>';
}

function wp_togetherjs_validate_field($slug) {
	if($slug && strlen($slug) > 0 && $slug != '') {
		$slug = urlencode( strtolower(str_replace(' ' , '-' , $slug )));
	}
	return $slug;
}

function wp_togetherjs_settings_page() {
?>

	<div class="wrap">
		<div class="icon32" id="icon-options-general"><br/></div>
		<h2>WP TogetherJS Settings</h2>
		<form method="post" action="options.php" enctype="multipart/form-data">

			<?php settings_fields("wp_togetherjs_settings"); ?>
			<?php do_settings_sections("wp_togetherjs_settings"); ?>

			<p class="submit">
				<input name="Submit" type="submit" class="button-primary" value="Save Settings" />
			</p>
		</form>
	</div>

<?php
}

add_action("wp_enqueue_scripts", "wp_togetherjs_enqueue_styles_and_scripts");
add_action("admin_enqueue_scripts", "wp_togetherjs_enqueue_styles_and_scripts");
add_action("login_enqueue_scripts", "wp_togetherjs_enqueue_styles_and_scripts");
add_action("admin_bar_menu", "wp_togetherjs_add_start_button", 999);

add_action("admin_init", "wp_togetherjs_register_settings");
add_action("admin_menu", "wp_togetherjs_add_menu_item");
add_filter("plugin_action_links_" . plugin_basename(__FILE__), "wp_togetherjs_add_settings_link");
