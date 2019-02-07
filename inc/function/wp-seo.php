<?php
function auto_title(){

	global $page, $paged;
	$site_description = get_bloginfo( 'description', 'display' );
 	if ($site_description && ( is_home() || is_front_page() )) {
		bloginfo('name');
		echo " - $site_description";
	} else {
        echo trim(wp_title('', 0));
        if ($paged >= 2 || $page >= 2)
            echo ' - ' . sprintf(__('第%s页'), max($paged, $page));
        echo ' | ';
        bloginfo('name');
    }
}
function add_titleTag(){


    if(is_front_page()||is_home()){
        $custom_title_tag=cs_get_option("seo_home_title");
    }elseif((is_single() || is_page())){

        if(get_post_type()=="page"){
            $meta_data= get_post_meta(get_the_ID(), 'page_options', true);
        }else{
            $meta_data = get_post_meta(get_the_ID(), 'post_options', true);
        }

        if($meta_data){
            $custom_title_tag=$meta_data["seo_custom_title"];
        }

    }elseif((is_archive()|| is_category() || is_tag() ) && !is_paged()){
        $queried_object = get_queried_object();
        $term_id = $queried_object->term_id;
        if(get_post_type()=="post_tag"){
            $term_meta = get_term_meta( $term_id, 'tag_options', true );}
        else{
            $term_meta = get_term_meta( $term_id, 'category_options', true );
        }
        if($term_meta){
            $custom_title_tag=$term_meta['seo_custom_title'];
        }
    }

    if (empty($custom_title_tag)){
        echo "<title>";
        auto_title();
        echo "</title>\n" ;
    }else{
        echo "<title>".$custom_title_tag."</title>\n" ;
    }


}



function filter_document_title_separator( $var ) {
    $option_sep = cs_get_option('seo_sep');
    $var = isset( $option_sep ) ? $option_sep : $var;
    return $var;
};


function the4_seo_meta_action(){

    $pages=get_query_var('page');
    if( (is_single() || is_page()) && $pages<2 ){
        global $post;
        $post_extend = get_post_meta( get_the_ID(), 'post_extend', true );
        $post_desc_num = cs_get_option('seo_auto_des_num',120);
        $seo_auto_des = cs_get_option('seo_auto_des',true);
        $seo_auto_keywords = cs_get_option('seo_auto_keywords',true);

        $tag = '';
        $tags=get_the_tags();
        if( $tags ){
            foreach($tags as $val){
                $tag.=','.$val->name;
            }
        }
        $tag=ltrim($tag,',');
        $key_meta = isset($post_extend['seo_custom_keywords']) ? $post_extend['seo_custom_keywords'] : '';
        $des_meta = isset($post_extend['seo_custom_desc']) ? $post_extend['seo_custom_desc'] : '';

        $pt = preg_replace('/\s+/','',strip_tags($post->post_content));
        $excerpt = mb_strimwidth($pt,0,$post_desc_num, '', get_bloginfo( 'charset' ) );

        if( empty($key_meta) && $seo_auto_keywords && isset($tag) ) $keywords=$tag;
        else $keywords=$key_meta;

        if( empty($des_meta) && $seo_auto_keywords ) $description=$excerpt;
        else $description=$des_meta;

        if($keywords){
            echo '<meta name="keywords" content="'.$keywords.'" />';
            echo "\n";
        }

        if($description){
            echo '<meta name="description" content="'.esc_attr($description).'" />';
            echo "\n";
        }
    }

    if( (is_home() || is_front_page()) && !is_paged() ){

        $keywords = cs_get_option('seo_home_keywords');
        $description = cs_get_option('seo_home_desc');

        if($keywords){
            echo '<meta name="keywords" content="'.$keywords.'" />';
            echo "\n";
        }
        if($description){
            echo '<meta name="description" content="'.esc_attr(stripslashes($description)).'" />';
            echo "\n";
        }
    }

    if( ( is_category() || is_tag() ) && !is_paged()){

        $queried_object = get_queried_object();
        $term_id = $queried_object->term_id;

        $term_meta = get_term_meta( $term_id, 'category_options', true );
        $term_meta = wp_parse_args( (array) $term_meta, array(
                'seo_custom_keywords' => '',
                'seo_custom_desc'     => '',
            )
        );
        $keywords = $term_meta['seo_custom_keywords'];
        $description = $term_meta['seo_custom_desc'];

        if($keywords){
            echo '<meta name="keywords" content="'.$keywords.'" />';
            echo "\n";
        }
        if($description){
            echo '<meta name="description" content="'.esc_attr(stripslashes($description)).'" />';
            echo "\n";
        }
    }

    if(!is_paged()){

        $queried_object = get_queried_object();
        $term_id = $queried_object->term_id;

        $term_meta = get_term_meta( $term_id, '_custom_special_options', true );
        $term_meta = wp_parse_args( (array) $term_meta, array(
                'seo_custom_keywords' => '',
                'seo_custom_desc'     => '',
            )
        );
        $keywords = $term_meta['seo_custom_keywords'];
        $description = $term_meta['seo_custom_desc'];

        if($keywords){
            echo '<meta name="keywords" content="'.$keywords.'" />';
            echo "\n";
        }
        if($description){
            echo '<meta name="description" content="'.esc_attr(stripslashes($description)).'" />';
            echo "\n";
        }
    }

}


add_action( 'wp_head', 'add_titleTag',2);
add_filter( 'document_title_separator', 'filter_document_title_separator', 10, 1 );
add_action( 'wp_head', 'the4_seo_meta_action',3);
