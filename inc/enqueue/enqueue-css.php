<?php

# 加载CSS到<head>中  [Enqueue css]
function wpstorm_enqueue_styles()
{
    wp_enqueue_style('theme', WPSTORM_CSS_PATH ."theme.css",   array(), WPSTORM_THEME_VERSION, 'all');
    wp_enqueue_style('submenu', WPSTORM_CSS_PATH ."submenu.css",   array(), WPSTORM_THEME_VERSION, 'all');
}
# Add CSS to the theme
add_action('wp_enqueue_scripts', 'wpstorm_enqueue_styles', 3);
