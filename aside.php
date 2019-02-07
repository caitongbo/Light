<aside id="offcanvas-push" uk-offcanvas="mode: push; flip: true;overlay: true">
    <div id="uk-offcanvas-bar" class="uk-offcanvas-bar">
        <button class="uk-offcanvas-close" type="button" uk-close></button>

        <?php if(is_home()||is_front_page()){?>
            <div class="author_info uk-text-center uk-padding-large" style="padding-bottom: 2rem;padding-top: 2rem">
				
<!--  设置头像            
<span class="author_avatar uk-margin-large-bottom">
                <img alt="" src="<?php wpstorm_img('author_img')?>?s=100&amp;d=mm&amp;r=g" srcset="<?php wpstorm_img('author_img')?>" class="avatar avatar-100 photo" height="100" width="100" style="border-radius: 50%;">
            </span> -->
				
                <span class="author_meta ">

                <div class="uk-display-block uk-margin-small-top"><?php echo  cs_get_option('author_name')?></div>
                <span class="uk-display-block uk-text-meta uk-margin-small-top" title=""></span>
            </span>

                <div class="contact uk-margin-medium-top text-center uk-grid uk-grid-margin-small" uk-grid="">
					<div class="uk-width-expand">
						<a class="el-link uk-button-primary uk-icon-button uk-icon" uk-icon="icon: github" href="https://github.com/caitongbo" target="_blank"></a>
                    </div>
                    <div class="uk-width-expand uk-first-column">
                        <a class="el-link uk-button-primary uk-icon-button uk-icon" uk-icon="icon: mail" href="mailto:<?php  the_author_meta( 'user_email' ); ?>" target="_blank"></a>
						</div>
					
                    <?php if (!empty(cs_get_option('weibo'))){?>
                    <div class="uk-width-expand">
                        <a class="el-link uk-button-primary uk-icon-button" href="<?php echo cs_get_option('weibo')?>" target="_blank">
                            <span class="uk-icon uk-icon-image " style="background-image: url('http://eyestorm.wpstorm.com.cn/wp-content/themes/EyeStorm/static/images/weibo.svg');"></span>
                        </a>
                    </div>
                    <?php }?>
                    <?php if (!empty(cs_get_option('qq'))){?>
                    <div class="uk-width-expand">
                        <a class="el-link uk-button-primary uk-icon-button" href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo cs_get_option('qq')?>&amp;site=qq&amp;menu=yes" target="_blank">
                            <span class="uk-icon uk-icon-image " style="filter:invert(1);background-image: url('http://eyestorm.wpstorm.com.cn/wp-content/themes/EyeStorm/static/images/qq.svg');"></span>
                        </a>
                    </div>
                    <?php }?>
                </div>

            </div>
        <?php }else{
            echo '<div id="menu-container"></div>';
            include_once("inc/xianjian/xianjian_sidebar.php");
        }
        ?>
    </div>
</aside>