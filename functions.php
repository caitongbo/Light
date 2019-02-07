<?php

# 常量定义[Constants]
# ------------------------------------------------------------------------------
define( 'WPSTORM_THEME_NAME'      , 'jenney'                                      );
define( 'WPSTORM_THEME_AUTHOR'    , 'WPMEE'                                       );
define( 'WPSTORM_THEME_VERSION'   , '1.2.2'                                         );
define( 'WPSTORM_SRC_PATH'        , get_template_directory_uri()."/static/"         );
define( 'WPSTORM_CSS_PATH'        , get_template_directory_uri()."/static/css/"     );
define( 'WPSTORM_JS_PATH'         , get_template_directory_uri()."/static/js/"      );
define( 'WPSTORM_IMG_PATH'        , get_template_directory_uri()."/static/img/"     );
define( 'WPSTORM_FUNCTIONS_PATH'  , get_template_directory_uri()."/inc/function"    );
define( 'WPSTORM_ELEMENT_PATH'    , get_template_directory()."/static/elements"     );


# 引用cs框架 [Include the cs framework ]
# ------------------------------------------------------------------------------
require_once( dirname( __FILE__ ) . '/inc/setting/cs-framework.php'              );

# 引用JS/CSS [enqueue]
# ------------------------------------------------------------------------------
require_once( dirname( __FILE__ ) . '/inc/enqueue/enqueue-css.php'               );
require_once( dirname( __FILE__ ) . '/inc/enqueue/enqueue-js.php'                );
require_once( dirname( __FILE__ ) . '/inc/enqueue/enqueue-other.php'             );

# WORDPRESS设置和自定义 [WordPress Settings and Customizations]
# ------------------------------------------------------------------------------
require_once( dirname( __FILE__ ) . '/inc/function/wp-add.php'                   );
require_once( dirname( __FILE__ ) . '/inc/function/wp-thumbnail.php'             );
require_once( dirname( __FILE__ ) . '/inc/function/wp-branding.php'              );
require_once( dirname( __FILE__ ) . '/inc/function/wp-breadcrumbs.php'           );
require_once( dirname( __FILE__ ) . '/inc/function/wp-page_nav.php'              );
require_once( dirname( __FILE__ ) . '/inc/function/wp-regMenu.php'               );
require_once( dirname( __FILE__ ) . '/inc/function/wp-remove.php'                );
require_once( dirname( __FILE__ ) . '/inc/function/wp-seo.php'                   );
require_once( dirname( __FILE__ ) . '/inc/function/wp-widget.php'                );
require_once( dirname( __FILE__ ) . '/inc/function/wp-views.php'                 );
require_once( dirname( __FILE__ ) . '/inc/function/wp-excerpt.php'               );
require_once( dirname( __FILE__ ) . '/inc/function/wp-strimwidth.php'            );
require_once( dirname( __FILE__ ) . '/inc/function/wp-list-category.php'         );
require_once( dirname( __FILE__ ) . '/inc/function/wp-wpstorm.php'               );
require_once( dirname( __FILE__ ) . '/inc/function/wp-footwidget.php'            );
require_once( dirname( __FILE__ ) . '/inc/function/wp-gavatar.php'               );
require_once( dirname( __FILE__ ) . '/inc/function/wp-commentlist.php'           );
require_once( dirname( __FILE__ ) . '/inc/function/wp-mobilewalker.php'          );
require_once( dirname( __FILE__ ) . '/inc/function/uk-alert_support.php'         );
require_once( dirname( __FILE__ ) . '/inc/function/script-pop.php'               );
require_once( dirname( __FILE__ ) . '/inc/updater/theme-updater.php'             );

# 添加文章类型
# ------------------------------------------------------------------------------
require_once( dirname( __FILE__ ) . '/inc/function/uk-alert_support.php'         );

# Walker引用
# ------------------------------------------------------------------------------
require_once( dirname( __FILE__ ) . '/inc/walker/WordpressUikitMenuWalker.php'   );
require_once( dirname( __FILE__ ) . '/inc/walker/wp-mobilewalker.php'            );

# xianjian引用
# ------------------------------------------------------------------------------
require_once( dirname( __FILE__ ) . '/inc/xianjian/xianjian_token.php'           );
require_once( dirname( __FILE__ ) . '/inc/xianjian/xianjian_menu.php'            );

# 去除wordpress前台顶部工具条
# ------------------------------------------------------------------------------
show_admin_bar(false);

# 自定义裁剪特色图像
# ------------------------------------------------------------------------------
add_theme_support( 'post-thumbnails' );

add_image_size( 'top-thumb',     1920, 1080, true );
add_image_size( 'cat-thumb',     1120, 292,  true );
add_image_size( 'index-thumb',   290,  250,  true );
add_image_size( 'gallery-thumb', 580,  500,  true );
add_image_size( 'sidebar-thumb', 145,  125,  true );
add_image_size( 'slider-pc',     1150,  341, true );
add_image_size( 'slider-mobile', 500,  341, true  );

