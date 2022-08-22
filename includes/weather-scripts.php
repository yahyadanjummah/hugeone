<?php
   // Add scripts
   function yts_add_scripts(){
    // Add Main css
    wp_enqueue_style('yts_main_style', plugins_url(). '/hugeone/css/style.css');
    
    // Add Main JS
    wp_enqueue_script('yts_main_script', plugins_url(). '/hugeone/js/main.js');
    // Add weather scripts
    wp_register_script('weather', 'https://weatherwidget.io/js/widget.min.js');
    wp_enqueue_script('weather');
   }

   add_action('wp_enqueue_scripts', 'yts_add_scripts');