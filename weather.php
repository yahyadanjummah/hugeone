<?php
/*
Plugin Name: WEATHER 
Plugin URI: https://wordpress.org/plugins/health-check/
Description: display
Version: 2.7.4
Author: yahya hugeone
Author URI: http://health-check-team.example.com
*/

// Exit if accessed directly
if(!defined('ABSPATH')){
    exit;
}

// Load scripts
require_once(plugin_dir_path(__FILE__).'/includes/weather-scripts.php');


// Load class
require_once(plugin_dir_path(__FILE__).'/includes/weather-class.php');

// Register widget
function register_hugeone(){
    register_widget('Weather_Widget');
}

// Hook in function
add_action('widgets_init', 'register_hugeone');