<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// TAXONOMY OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options     = array();


$options[]   = array(
    'id'       => 'category_options',
    'taxonomy' => 'category',
    'fields'   => array(
        array(
            'id'    => 'seo_custom_title', // this is must be unique
            'type'  => 'text',
            'title' => '自定义标题',
            'help'  => '留空则调用默认全局SEO设置'
        ),
        array(
            'id'    => 'seo_custom_keywords', // this is must be unique
            'type'  => 'text',
            'title' => '自定义关键词',
            'help'  => '留空则调用默认全局SEO设置'
        ),
        array(
            'id'    => 'seo_custom_desc', // this is must be unique
            'type'  => 'textarea',
            'title' => '自定义描述',
            'help'  => '留空则调用默认全局SEO设置'
        ),
    ),
);
$options[]   = array(
    'id'       => 'tag_options',
    'taxonomy' => 'post_tag',
    'fields'   => array(
        array(
            'id'    => 'seo_custom_title', // this is must be unique
            'type'  => 'text',
            'title' => '自定义标题',
            'help'  => '留空则调用默认全局SEO设置'
        ),
        array(
            'id'    => 'seo_custom_keywords', // this is must be unique
            'type'  => 'text',
            'title' => '自定义关键词',
            'help'  => '留空则调用默认全局SEO设置'
        ),
        array(
            'id'    => 'seo_custom_desc', // this is must be unique
            'type'  => 'textarea',
            'title' => '自定义描述',
            'help'  => '留空则调用默认全局SEO设置'
        ),
    ),
);

// -----------------------------------------
// Taxonomy Options                        -
// -----------------------------------------

CSFramework_Taxonomy::instance( $options );
