<?php


# 添加WordPress后台底部版权  [Change the text in the admin footer]
#-------------------------------------------------------------------------------
function wpstorm_admin_footer_informations () {
    echo "MADE BY <a href='https://www.wpmee.com/' target='_blank'>WPMEE</a>";
}

add_filter('admin_footer_text' , 'wpstorm_admin_footer_informations' );
