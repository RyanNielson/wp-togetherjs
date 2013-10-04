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

}

function wp_togetherjs_add_settings_link($links) {

}

function wp_togetherjs_register_settings() {

}

function wp_togetherjs_main_settings() {

}

function wp_togetherjs_settings_field() {

}

function wp_togetherjs_validate_field() {

}

function wp_togetherjs_settings_page() {

}

add_action("wp_enqueue_scripts", "wp_togetherjs_enqueue_styles_and_scripts");
add_action("admin_enqueue_scripts", "wp_togetherjs_enqueue_styles_and_scripts");
add_action("login_enqueue_scripts", "wp_togetherjs_enqueue_styles_and_scripts");
add_action("admin_bar_menu", "wp_togetherjs_add_start_button", 999);

add_action("admin_init", "wp_togetherjs_register_settings");
add_action("admin_menu", "wp_togetherjs_add_menu_item");
add_filter("plugin_action_links_" . plugin_basename(__FILE__), "wp_togetherjs_add_settings_link");
