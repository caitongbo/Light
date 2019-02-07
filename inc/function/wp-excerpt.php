<?php

# 定义显示摘要的字数
# ------------------------------------------------------------------------------
function new_excerpt_length($length) {
    return 82;
}
add_filter("excerpt_length", "new_excerpt_length");

# 修改摘要末尾显示
# ------------------------------------------------------------------------------
function new_excerpt_more( $more ) {
    return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">...</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );