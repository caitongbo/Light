<?php if (!defined('ABSPATH')) {
    die;
} // 不能直接访问网页.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// 主题框架设置
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings = array(
    'menu_title' => '主题设置',
    'menu_type' => 'menu', // menu, submenu, options, theme, etc.
    'menu_slug' => 'wpstormtheme' . '-' . wp_get_theme()->display('Name'),
    'menu_position' => 59,
    'ajax_save' => true,
    'show_reset_all' => false,
    'menu_icon' => 'dashicons-hammer',
    'framework_title' => wp_get_theme()->display('Name') . '<small class="oldVer" data-vs="' . WPSTORM_THEME_VERSION . '" style="color:#979797;margin-left:10px">Release ' . WPSTORM_THEME_VERSION . '</small>',
);
// ---------------------------------------
// 常规  --------------------------------
// ---------------------------------------
$options[] = array(
    'name' => 'overwiew',
    'title' => '常规设置',
    'icon' => 'fa fa-list',
    'fields' => array(
        array(
            'id' => 'favicon',
            'type' => 'image',
            'title' => '上传 Favicon',
            'add_title' => '上传',
        ),
        array(
            'id' => 'banner',
            'type' => 'image',
            'title' => '头部背景图片',
            'add_title' => '添加',
        ),
        array(
            'id'      => 'icp_num',
            'type'    => 'text',
            'title'   => '备案号',
            'desc'    => '如果没有可以不填',
        ),
        array(
            'type' => 'notice',
            'class' => 'info',
            'content' => '分页设置',
        ),
        array(
            'id'            => 'i_pagination_type',
            'type'          => 'radio',
            'class'        => 'horizontal',
            'title'         => '选择分页形式',
            'options'       => array(
                'next'      => '下一页/上一页',
                'number'    => '页码',
            ),
            'default'      => 'number'
        ),
    ),
);

// ---------------------------------------
// 博主资料  ------------------------------
// ---------------------------------------
$options[] = array(
    'name'   => 'author',
    'title'  => '博主资料',
    'icon'   => 'fa fa-user',
    'fields' => array(
        array(
            'id'        => 'author_name',
            'type'      => 'text',
            'title'     => '名称',
        ),
        array(
            'id'        => 'author_img',
            'type'      => 'image',
            'title'     => '上传头像',
            'add_title' => '上传',
        ),
        array(
            'id'        => 'qq',
            'type'      => 'text',
            'title'     => 'QQ',
        ),
        array(
            'id'        => 'weibo',
            'type'      => 'text',
            'title'     => '新浪微博',
        ),

    ),
);

// ----------------------------------------
// 公告设置--------------------------------
// ----------------------------------------
$options[] = array(
    'name'   => 'notice',
    'title'  => '公告设置',
    'icon'   => 'fa fa-bullhorn',
    'fields' => array(
        array(
            'type'    => 'notice',
            'class'   => 'info',
            'content' => '公告栏设置',
        ),
        array(
            'id'      => 'notice_switcher',
            'type'    => 'switcher',
            'title'   => '公告栏开关',
            'default' => false,
        ),
        array(
            'id'           => 'notice_content',
            'type'         => 'wysiwyg',
            'dependency'   => array( 'notice_switcher', '==', 'true' ),
            'title'        => '公告栏内容',
        ),
        array(
            'id'      => 'notice_bgc',
            'type'    => 'radio',
            'title'   => '通知栏背景色',
            'dependency'  => array( 'notice_switcher', '==', 'true' ),
            'options'     => array(
                'blue'    => '蓝色',
                'red'     => '红色',
                'orange'  => '橙色',
                'green'   => '绿色',
            ),
            'default'     => 'blue'
        ),

    )
);

// ----------------------------------------
// 小功能
// ----------------------------------------
$options[] = array(
    'name'        => '小功能',
    'title'       => '小功能',
    'icon'        => 'fa fa-star',

    // begin: fields
    'fields'      => array(
        array(
            'id'    	=> 'pop_switcher',
            'type'      => 'switcher',
            'title'     => '是否开启词汇泡泡功能',
        ),
        array(
            'id'    	=> 'pop_color',
            'type'      => 'color_picker',
            'title'     => '词汇颜色',
            'dependency' => array( 'pop_switcher', '==', 'true' ),

        ),

        array(
            'id'              => 'pop_words',
            'type'            => 'group',
            'title'           => '添加冒泡词汇',
            'button_title'    => '添加',
            'accordion_title' => '添加',
            'dependency' => array( 'pop_switcher', '==', 'true' ),
            'fields'          => array(

                array(
                    'id'      => 'word',
                    'type'    => 'text',
                    'title'   => '冒泡词汇',
                ),



            )
        ),

    ),
);
// ----------------------------------------
// SEO-------------------------------------
// ----------------------------------------
$options[] = array(
    'name' => 'speed',
    'title' => 'SEO设置',
    'icon' => 'fa fa-server',
    'fields' => array(


        array(
            'type' => 'notice',
            'class' => 'info',
            'content' => '首页SEO设置',
        ),
        array(
            'id' => 'seo_home_title', // this is must be unique
            'type' => 'text',
            'title' => '首页标题',
            'help' => '关键词使用英文逗号隔开',
        ),

        array(
            'id' => 'seo_home_keywords', // this is must be unique
            'type' => 'text',
            'title' => '首页关键词',
        ),

        array(
            'id' => 'seo_home_desc', // this is must be unique
            'type' => 'textarea',
            'title' => '首页描述',
        ),


    ),
);
// ----------------------------------------
// 友情链接
// ----------------------------------------
$options[]  = array(
    'name'        => '友情链接',
    'title'       => '友情链接',
    'icon'        => 'fa fa-star',

    // begin: fields
    'fields'      => array(
        array(
            'id'    	=> 'friendslink_switcher',
            'type'      => 'switcher',
            'title'     => '是否启用友情链接',
        ),
        array(
            'id'              => 'friend_link',
            'type'            => 'group',
            'title'           => '添加一个友情链接',
            'button_title'    => '添加',
            'accordion_title' => '添加',
            'dependency' => array( 'friendslink_switcher', '==', 'true' ),
            'fields'          => array(
                array(
                    'id'      => 'name',
                    'type'    => 'text',
                    'title'   => '友情链接名称',
                ),

                array(
                    'id'      => 'link',
                    'type'    => 'text',
                    'title'   => '链接地址',
                ),


            )
        ),


    ),
);
// ------------------------------
// 关于                       -
// ------------------------------
$options[]   = array(
    'name'     => 'about',
    'title'    => '关于',
    'icon'     => 'fa fa-info-circle',
    'fields' => array(

        // 关于主题
        array(
            'type'    => 'content',
            'content' => '<iframe src="http://copyright.zhuti.cx/index.html" style="width:100%;height:800px;"></iframe>',
        ),

    ),
);
// ----------------------------------------
// 自定义代码------------------------------
// ----------------------------------------
$options[] = array(
    'name' => 'code',
    'title' => '自定义',
    'icon' => 'fa fa-code',
    'fields' => array(

        array(
            'class' => 'info',
            'type' => 'notice',
            'content' => '自定义代码',
        ),
        array(
            'id' => 'code_footer',
            'type' => 'wysiwyg',
            'title' => 'footer自定义代码',
            'desc' => '显示在网站版权之前'
        ),
        array(
            'id' => 'code_css',
            'type' => 'wysiwyg',
            'title' => '自定义样式css代码',
        ),
    )
);
// ----------------------------------------
// 备份------------------------------------
// ----------------------------------------
$options[] = array(
    'name' => 'advanced',
    'title' => '备份',
    'icon' => 'fa fa-shield',
    'fields' => array(

        array(
            'type' => 'notice',
            'class' => 'danger',
            'content' => '您可以保存当前的选项，下载一个备份和导入.（此操作会清除网站数据，请谨慎操作）',
        ),

        // 备份
        array(
            'type' => 'backup',
        ),

    )
);

CSFramework::instance($settings, $options);


