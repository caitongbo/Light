<?php


/**
 *
 * Get option
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'wpstorm' ) ) {
    function wpstorm( $option_name = '', $default = '' ) {

        $options = apply_filters( 'wpstorm', get_option( CS_OPTION ), $option_name, $default );

        if( ! empty( $option_name ) && ! empty( $options[$option_name] ) ) {
            return $options[$option_name];
        } else {
            return ( ! empty( $default ) ) ? $default : null;
        }

    }
}

function wpstorm_if_empty($var_name,$before='',$after=''){

    if(!empty($var_name)){
        echo $before.$var_name.$after;
    }

}

//文章所属分类名称
function wpstorm_cat_nicename(){
    $category = get_the_category();
    $length =count($category);
    for($i=0;$i<$length;$i++){
        echo " ".$category[$i]->category_nicename;
    }
}

function wpstorm_cat_name(){
    $category = get_the_category();
    $length =count($category);
    for($i=0;$i<$length;$i++){
        echo "<span class=\"line\">/</span>".$category[$i]->cat_name;
    }
}
function custom_taxonomies_terms_links(){
    //根据当前文章ID获取文章信息
    $post = get_post( $post->ID );

    //获取当前文章的文章类型
    $post_type = $post->post_type;

    //获取文章所在的自定义分类法
    $taxonomies = get_object_taxonomies( $post_type, 'objects' );

    $out = array();
    foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){
        $term_list = wp_get_post_terms($post->ID, $taxonomy_slug, array("fields" => "all"));
        echo $term_list[0]->name; //显示文章所处的分类中的第一个
    }

    return implode('', $out );
}



/**
 * 管理员判断
 * */
function wpstorm_is_administrator() {
    // wp_get_current_user函数仅限在主题的functions.php中使用
    $currentUser = wp_get_current_user();

    if(!empty($currentUser->roles) && in_array('administrator', $currentUser->roles))
        return 1;  // 是管理员
    else
        return 0;  // 非管理员
}



/**
 * 获取框架image图片地址
 * */
function get_wpstorm_img($id){
    $cs_id= wpstorm($id);
    if (!empty($cs_id )){
        $id_url= wp_get_attachment_image_src( $cs_id, $size='full' );
        return $id_url[0];
    }
}
function wpstorm_img($id){
    echo get_wpstorm_img($id);
}
/**
 * 获取框架image的srcset
 * */
function get_wpstorm_img_srcset($id){
    $cs_id= wpstorm($id);
    if (!empty($cs_id )){
        $id_url= wp_get_attachment_image_srcset( $cs_id, $size='full' );
        return $id_url[0];
    }
}
function wpstorm_img_srcset($meta_id){
    echo get_wpstorm_img_srcset($meta_id);
}


/**
 * 获取meta_image图片地址
 **/

function get_wpstorm_meta_img($meta_id){
    if (!empty($meta_id)){
        global $post;
        $meta_data = get_post_meta(get_the_ID(), 'theme_options', true);
        $id_url= wp_get_attachment_image_src($meta_data[$meta_id] , $size='full' );
        return $id_url[0];
    }
}
function wpstorm_meta_img($meta_id){
    echo get_wpstorm_meta_img($meta_id);
}


/**
 * 获取meta_image的srcset
 **/

function get_wpstorm_meta_img_srcset($meta_id){
    if(get_post_type()=="page"){
        $meta_data= get_post_meta(get_the_ID(), 'page_options', true);
    }else{
        $meta_data = get_post_meta(get_the_ID(), 'post_options', true);
    }
    if($meta_data){
        $id_url=wp_get_attachment_image_srcset($meta_data[$meta_id],'');
        return $id_url;
    }

}
function wpstorm_meta_img_srcset($meta_id){
    echo get_wpstorm_meta_img_srcset($meta_id);
}





/**
 * logo函数
 * */


function wpstorm_logo($style=""){
    echo get_wpstorm_logo($style);
}
function get_wpstorm_logo($style){
    if($style=="invert"){
        return get_wpstorm_img("logo_invert");
    }elseif($style=="mobile"){
        return get_wpstorm_img("logo_mobile");
    }elseif($style=="footer"){
        return get_wpstorm_img("logo_footer");
    }else{
        return get_wpstorm_img("logo_normal");
    }

}
/**
 * 备案链接函数
 * */
function wpstorm_icp(){
    $icp_num = wpstorm('icp_num');
    echo '<br><a href="http://www.miitbeian.gov.cn" rel="nofollow">'.$icp_num.'</a>';
}

# 获取作者头像url
# ------------------------------------------------------------------------------
function wpstorm_gravatar_url() {
    $user_email = get_the_author_meta( 'user_email' );
    $user_gravatar_url = 'http://www.gravatar.com/avatar/' . md5($user_email) . '?s=200';
    echo $user_gravatar_url; }

if ( ! function_exists( 'joy' ) ) {
    function joy( $option_name = '', $default = '' ) {

        $options = apply_filters( 'joy', get_option( CS_OPTION ), $option_name, $default );

        if( ! empty( $option_name ) && ! empty( $options[$option_name] ) ) {
            return $options[$option_name];
        } else {
            return ( ! empty( $default ) ) ? $default : null;
        }

    }
}

/*获取框架image图片地址*/
function joy_img ($id){
    $cs_id= joy($id);
    if (!empty($cs_id )){
        $id_url= wp_get_attachment_image_src( $cs_id, $size='full' );
        return $id_url[0];
    }

}
# 特色图像
# ------------------------------------------------------------------------------
function wpstorm_index_thumb(){
    global $post;
    $thumbnail_default=joy_img("thumbnail_default");
    if( has_post_thumbnail($post->ID) ){    //如果有特色缩略图，则输出缩略图地址
        $thumbnail_src = get_the_post_thumbnail_url($post->ID,'index-thumb');
    } else{
        $thumbnail_src = $thumbnail_default;
    }
    echo $thumbnail_src;
}
# 特色图像
# ------------------------------------------------------------------------------
function wpstorm_cat_thumb(){
    global $post;
    $thumbnail_default=joy_img("thumbnail_default");
    if( has_post_thumbnail($post->ID) ){    //如果有特色缩略图，则输出缩略图地址
        $thumbnail_src = get_the_post_thumbnail_url($post->ID,'cat-thumb');
    } else{
        $thumbnail_src = $thumbnail_default;
    }
    echo $thumbnail_src;
}
# 特色图像
# ------------------------------------------------------------------------------
function wpstorm_gallery_thumb(){
    global $post;
    $thumbnail_default=joy_img("thumbnail_default");
    if( has_post_thumbnail($post->ID) ){    //如果有特色缩略图，则输出缩略图地址
        $thumbnail_src = get_the_post_thumbnail_url($post->ID,'gallery-thumb');
    } else{
        $thumbnail_src = $thumbnail_default;
    }
    echo $thumbnail_src;
}
/*
    ==================================================
    获取WordPress所有标签名字和ID
    ==================================================
*/
function getTagArray() {
    $args = array(
        'orderby' => 'name',
        'order' => 'ASC'
    );
    $tags = get_tags($args);
    $res = array();
    foreach ($tags as $tag) {
        $res[$tag->term_id] = $tag->name;
    }
    return $res;
}

function cc_getTags() {
    $args = array(
        'orderby' => 'name',
        'order' => 'ASC'
    );
    return get_tags($args);
}
/*
    ==================================================
    获取WordPress所有分类名字和ID
    ==================================================
*/
function getCatArray() {
    $args = array(
        'orderby' => 'name',
        'order' => 'ASC'
    );
    $cats = get_categories($args);
    $res = array();
    foreach ($cats as $cat) {
        $res[$cat->term_id] = $cat->name;
    }
    return $res;
}

function cc_getCats() {
    $args = array(
        'orderby' => 'name',
        'order' => 'ASC'
    );
    return get_categories($args);
}
/*
    ==================================================
    Login Page
    ==================================================
*/
//添加登录页背景图
function customLoginHead() {
    echo '<link rel="stylesheet" tyssspe="text/css" href="' . get_bloginfo('template_directory') . '/static/css/login.css" />';
}
add_action('login_head', 'customLoginHead');
function customLoginFooter() {
    echo '<script src="'.'https://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"'.'></script>';
    echo '<script src="'.get_bloginfo('template_directory').'/static/js/login.js"'.'></script>';
}
add_action('login_footer', 'customLoginFooter');

/*
    ==================================================
    分类名称
    ==================================================
*/
add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

        $title = single_cat_title( '', false );

    } elseif ( is_tag() ) {

        $title = single_tag_title( '标签：', false );

    } elseif ( is_author() ) {

        $title = '<span class="vcard">' . get_the_author() . '</span>' ;

    }

    return $title;

});

/*
    ==================================================
    自定义后台用户联系方式
    ==================================================
*/
add_filter('user_contactmethods','custom_contactmethods');
function custom_contactmethods($user_contactmethods ){
    $user_contactmethods  = array(
        'qq' => 'QQ',
        'weibo' => '新浪微博',
    );
    return $user_contactmethods ;
}

/*
    ==================================================
    修改作者文章列表链接
    ==================================================
*/

add_filter('the_author_posts_link','cis_nofollow_the_author_posts_link');
function cis_nofollow_the_author_posts_link ($link) {
    return str_replace('<a href=','<a class="uk-display-block uk-margin-small-top" target="_blank" href=', $link);
}


//修改text内容名称代码
function rename_post_formats($safe_text) {
    if ($safe_text == '相册') return '全屏';
    return $safe_text;
}
add_filter('esc_html', 'rename_post_formats');

//判断不同文章形式使用不同的footer
function eyestorm_footer_style( $classes='' ) {
    if ( is_singular() ) {
        if(!(has_post_format('gallery')||has_post_format('video'))){
            $classes= 'style="margin-top: -320px";';
        }
    }
    echo $classes;
}
//禁用默认小工具
add_action( 'widgets_init', 'my_unregister_widgets' );
function my_unregister_widgets() {
    unregister_widget( 'WP_Widget_Archives' );
    unregister_widget( 'WP_Widget_Calendar' );
    unregister_widget( 'WP_Widget_Categories' );
    unregister_widget( 'WP_Widget_Links' );
    unregister_widget( 'WP_Widget_Meta' );
    unregister_widget( 'WP_Widget_Pages' );
    unregister_widget( 'WP_Widget_Recent_Comments' );
    unregister_widget( 'WP_Widget_Recent_Posts' );
    unregister_widget( 'WP_Widget_RSS' );
    unregister_widget( 'WP_Widget_Search' );
    unregister_widget( 'WP_Widget_Tag_Cloud' );
    unregister_widget( 'WP_Widget_Text' );
    unregister_widget( 'WP_Nav_Menu_Widget' );
    unregister_widget( 'WP_Widget_Media_Image' );
    unregister_widget( 'WP_Widget_Media_Gallery' );
    unregister_widget( 'WP_Widget_Custom_HTML' );
    unregister_widget( 'WP_Widget_Media_Video' ); 
    unregister_widget( 'WP_Widget_Media_Audio' ); 
}

