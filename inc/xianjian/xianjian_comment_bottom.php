<?php 

if (!defined('ABSPATH')) exit;

include_once('xianjian_utility.php');

xianjian_content_comment_bottom_rec();
	
function xianjian_content_comment_bottom_rec() {
	xianjian_check_render_config();
	if (is_single()) {
		global $xianjian_js_code_map,$xianjian_render_content_comment_bottom_id;
		echo $xianjian_js_code_map[$xianjian_render_content_comment_bottom_id];
	}
}

?>