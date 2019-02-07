<?php
function list_products_category() {
$products_category = array(
'show_option_all'    => '',
'orderby'            => 'name',
'order'              => 'ASC',
'style'              => 'list',
'show_count'         => 0,
'hide_empty'         => 0,
'use_desc_for_title' => 1,
'child_of'           => 0,
'feed'               => '',
'feed_type'          => '',
'feed_image'         => '',
'exclude'            => '',
'exclude_tree'       => '',
'include'            => '',
'hierarchical'       => 1,
'title_li'           => '',
'show_option_none'   => __('无子分类'),
'number'             => null,
'echo'               => 1,
'depth'              => 0,
'current_category' => 0,
'pad_counts'         => 0,
'taxonomy'           => 'category',

);
wp_list_categories($products_category);

echo <<<EOT
<script>
    $('.cat-item>a').addClass('link')
</script>
EOT;
}