<?php
# 加载JavaScript到footer [Add JavaScript to footer]
function wpstorm_enqueue_scripts() {
   wp_deregister_script('jquery');
   wp_enqueue_script( 'uikit.min'        ,WPSTORM_JS_PATH . "uikit.min.js"            ,array() , false , false );
   wp_enqueue_script( 'uikit-icons-flow' ,WPSTORM_JS_PATH . "uikit-icons-flow.min.js" ,array() , false , false );
   wp_enqueue_script( 'theme'            ,WPSTORM_JS_PATH . "theme.js"                ,array() , false , false );
   wp_enqueue_script( 'submenu'          ,WPSTORM_JS_PATH . "submenu.js"              ,array() , false , true );
   if (is_singular()){
       wp_enqueue_script( 'article_nav'      ,WPSTORM_JS_PATH . "article_nav.js"          ,array() , false , true  );
   }

}
# Add JS to the theme
add_action( 'wp_enqueue_scripts' , 'wpstorm_enqueue_scripts' , 4);
