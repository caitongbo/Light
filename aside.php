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
					<div class="contact uk-margin-medium-top text-center uk-grid uk-grid-margin-small uk-grid-stack" uk-grid=""><div class="uk-width-expand uk-first-column">
						<a class="uk-icon" href="https://resume.caitongbo.com" target="_blank" title="我的简历">我的简历</a>
    </div></div>
                <div class="contact uk-margin-medium-top text-center uk-grid uk-grid-margin-small" uk-grid="">
<!-- 					github -->
					<div class="uk-width-expand">
						<a class="el-link uk-button-primary uk-icon-button uk-icon" uk-icon="icon: github" href="https://github.com/caitongbo" target="_blank" title="Github"></a>
                    </div>
					<!-- 					weixin -->
					<div class="uk-width-expand"><a class="el-link uk-button-primary uk-icon-button social weixin" 
href="javascript:" title="微信"><img class="qrcode" src="https://www.caitongbo.com/wp-content/uploads/2019/02/2019020708035038.jpg">
   <span class="uk-icon uk-icon-image " 
style="filter:invert(1);background-image: url('https://www.caitongbo.com/wp-content/themes/light/static/images/weixin.svg');"></span>
                        </a>
                    </div>
<!-- 					weibo -->
                    <?php if (!empty(cs_get_option('weibo'))){?>
                    <div class="uk-width-expand">
                        <a class="el-link uk-button-primary uk-icon-button" href="<?php echo cs_get_option('weibo')?>" target="_blank">
                            <span class="uk-icon uk-icon-image " style="background-image: url('http://eyestorm.wpstorm.com.cn/wp-content/themes/EyeStorm/static/images/weibo.svg');"></span>
                        </a>
                    </div>
                    <?php }?>
<!-- 					qq -->
                    <?php if (!empty(cs_get_option('qq'))){?>
                    <div class="uk-width-expand">
                        <a class="el-link uk-button-primary uk-icon-button" href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo cs_get_option('qq')?>&amp;site=qq&amp;menu=yes" target="_blank" title="QQ">
                            <span class="uk-icon uk-icon-image " style="filter:invert(1);background-image: url('https://www.caitongbo.com/wp-content/themes/light/static/images/qq.svg');"></span>
                        </a>
                    </div>
                    <?php }?>
<!-- 					email -->
 <div class="uk-width-expand">
	 <a class="el-link uk-button-primary uk-icon-button uk-icon" uk-icon="icon: mail" 
href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=VD0UNzU9IDs6MzY7ejc7OQ" target="_blank" title="邮箱"></a>
<!-- 		href="mailto:<?php the_author_meta( 'user_email' ); ?>" target="_blank" title="邮箱"></a> -->
					
						</div>

<!-- 					zhihu -->
					 <div class="uk-width-expand"><a class="el-link uk-button-primary uk-icon-button" 
						   href="https://www.zhihu.com/people/cai-tong-bo" target="_blank" title="知乎">
   <span class="uk-icon uk-icon-image " 
		 style="filter:invert(1);background-image: url('https://www.caitongbo.com/wp-content/themes/light/static/images/zhihu.svg');"></span>
                        </a>
                    </div>
                </div>
            </div>
        <?php }else{
            echo '<div id="menu-container"></div>';
            include_once("inc/xianjian/xianjian_sidebar.php");
        }
        ?>
    </div>
</aside>