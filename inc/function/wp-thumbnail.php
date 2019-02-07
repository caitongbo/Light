<?php
/** WP 输出响应式图片的srcset
 *
 */
function get_the_post_thumbnail_srcset( $post = null, $size = 'post-thumbnail' ) {
    $post_thumbnail_id = get_post_thumbnail_id( $post );
    if ( ! $post_thumbnail_id ) {
        return false;
    }
    return wp_get_attachment_image_srcset( $post_thumbnail_id, $size );
}
function the_post_thumbnail_srcset( $post = null, $size = 'post-thumbnail' ) {
    echo get_the_post_thumbnail_srcset($post = null,$size);
}

