<?php
# 浏览次数统计
# ------------------------------------------------------------------------------
function record_visitors()
{
if (is_singular())
{
global $post;
$post_ID = $post->ID;
if($post_ID)
{
$post_views = (int)get_post_meta($post_ID, 'views', true);
if(!update_post_meta($post_ID, 'views', ($post_views+1)))
{
add_post_meta($post_ID, 'views', 1, true);
}
}
}
}
add_action('wp_head', 'record_visitors');
//函数名称：post_views
//函数作用：取得文章的阅读次数
function wpstorm_post_views($before = '(点击 ', $after = ' 次)', $echo = 1)
{
global $post;
$post_ID = $post->ID;
$views = (int)get_post_meta($post_ID, 'views', true);
if ($echo) echo $before, number_format($views), $after;
else return $views;
}
