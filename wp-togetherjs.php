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

function add_togetherjs_start_button($wp_admin_bar) {
	$args = array(
		'id'    => 'start_together_js_button',
		'title' => '<a href="#" id="start-togetherjs" class="togetherjs-button" onclick="TogetherJS(this); return false;">Start TogetherJS</a>',
		'meta' => array(
			'class' => 'togetherjs-button-container'
		)
	);

	$wp_admin_bar->add_node( $args );
}

function enqueue_wp_togetherjs_styles_and_scripts() {
	wp_enqueue_style("wp_togetherjs_style", plugins_url("assets/wp-togetherjs.css", __FILE__ ));
	wp_enqueue_script("wp_togetherjs_script", plugins_url("assets/wp-togetherjs.js", __FILE__ ), array("jquery"));
	wp_enqueue_script("togetherjs_script", "https://togetherjs.com/togetherjs-min.js");
}

add_action("wp_enqueue_scripts", "enqueue_wp_togetherjs_styles_and_scripts");
add_action("admin_enqueue_scripts", "enqueue_wp_togetherjs_styles_and_scripts");
add_action("login_enqueue_scripts", "enqueue_wp_togetherjs_styles_and_scripts");
add_action("admin_bar_menu", "add_togetherjs_start_button", 999);
