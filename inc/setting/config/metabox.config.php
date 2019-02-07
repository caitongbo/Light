<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// =============================================================================
// -----------------------------------------------------------------------------
// METABOX OPTIONS
// -----------------------------------------------------------------------------
// =============================================================================


# 文章设置
# ------------------------------------------------------------------------------
$options[]    = array(
    'id'        => 'post_options',
    'title'     => '文章设置',
    'post_type' => 'post',
    'context'   => 'normal',
    'priority'  => 'high',
    'sections'  => array(
        array(
            'name'  => 'post_seo',
            'title' => 'SEO 设置',
            'icon'  => 'fa fa-magic',
            'fields' => array(
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
        ),

    ),
);

# 页面SEO设置
# ------------------------------------------------------------------------------
$options[]    = array(
    'id'        => 'page_options',
    'title'     => 'SEO设置',
    'post_type' => 'page',
    'context'   => 'normal',
    'sections'  => array(

        array(
            'name'  => 'page_seo',
            'fields' => array(
                array(
                    'id'    => 'seo_custom_title', // this is must be unique
                    'type'  => 'text',
                    'title' => '自定义标题',
                    'help'  => '留空则调用默认全局SEO设置'
                ),
                array(
                    'id'    => 'seo_custom_keywords', // this is must be unique
                    'type'  => 'textarea',
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
        ),
    ),
);


CSFramework_Metabox::instance( $options );
