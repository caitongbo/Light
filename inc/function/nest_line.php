<?php
function nest_line(){
    if (wpstorm('nest_switcher')){
    $opacity=cs_get_option('nest_opacity')/100;
    $count=cs_get_option('nest_count');


    echo '<script type="text/javascript" color="#000" opacity="'.$opacity.'" zIndex="0" count="'.$count.'" src="'.WPSTORM_JS_PATH.'nest.min.js"></script>';


}
}

