<?php


/**
 * 添加站点图标
 */
function add_fav(){

    $apple_icon=get_wpstorm_img("apple_icon");
    $favicon=get_wpstorm_img("favicon");
if($apple_icon){
    echo  <<<EOT
<link rel="apple-touch-icon" href="$apple_icon" />   

EOT;
}
if($favicon){
    echo  <<<EOT
<link rel="shortcut icon" href="$favicon" title="Favicon">
EOT;
}

}

add_action('wp_head', 'add_fav');
add_action('admin_enqueue_scripts', 'add_fav');//添加favicon到WordPress后台


/**
 * 添加统计代码带底部
 */
function add_code_2_footer(){

    $code_footer=wpstorm("code_footer");

    echo $code_footer;



}
add_action('wp_footer', 'add_code_2_footer');



