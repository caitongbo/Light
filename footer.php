<div class="button_container uk-position-fixed uk-position-bottom-right">
        <a class="el-link uk-icon-button uk-icon uk-navbar-toggle uk-margin-medium-right uk-margin-small-bottom"
           href="#modal-full"  style="box-shadow: 0 10px 30px 0 rgba(0,0,0,.08);width: 20px;width: 40px;padding-left: 0px;padding-right: 0px;" uk-toggle>
            <span uk-icon="search" style="color: #fff;"></span>
        </a>
        <?php if (is_home()||is_front_page()||is_singular()){?>
        <a uk-icon="icon: list"  uk-toggle="target: #offcanvas-push" style="box-shadow: 0 10px 30px 0 rgba(0,0,0,.08);"
           class="el-link uk-icon-button uk-icon uk-margin-medium-bottom  uk-margin-medium-right ">
        </a>
        <?php }?>
    </div>
    <?php get_search_form(); ?>

    <?php if (is_single()){?>
    <?php wp_footer()?>
    </body>
    </html>
<?php }elseif (is_home()||is_front_page()){?>

    <footer class="copy uk-section  uk-background-muted uk-margin-remove-vertical  uk-padding-remove-vertical">

        <div class="uk-container-small uk-container uk-visible@m uk-scrollspy-inview uk-animation-slide-bottom-medium">
            <div class="uk-grid uk-grid-stack" uk-grid="">
                <?php ?>
                <div class="uk-width-1-1  uk-visible@m uk-padding-large uk-padding-remove-vertical uk-text-center">
                    <?php if(is_array(cs_get_option('friend_link') )):?>
                    <?php foreach ( cs_get_option('friend_link') as $value ):?>
                    <a class="uk-h6 uk-margin-small-right uk-link-muted uk-text-meta" href="<?php echo $value['link']?>"> <?php echo $value['name']?></a>·
                    <?php endforeach;endif;?>
                </div>

            </div>
        </div>

        <div class="uk-container text-center uk-margin-small-top">
            <div class="uk-scrollspy-inview uk-animation-slide-bottom-medium  uk-margin-small-bottom">

                              <div class="copyright uk-text-meta">
<!--                     Copyright © 2019 <?php bloginfo('name')?> • Theme by <a href="https://github.com/caitongbo/light">light</a> -->
					                    © 2019 Copyright • Theme by <a href="https://github.com/caitongbo/light"><?php bloginfo('name')?></a>
						<div>
							    <?php if (wpstorm('icp_num')){?><?php echo wpstorm('icp_num')?><?php }?>

					</div>                </div>
            </div>
        </div>

    </footer>
    <?php wp_footer()?>
    </body>
    </html>
<?php }else{?>
    <footer class="copy uk-section  uk-background-muted uk-margin-remove-vertical  uk-padding-remove-vertical">
        <div class="uk-container text-center uk-margin-small-top">
            <div class="uk-scrollspy-inview uk-animation-slide-bottom-medium  uk-margin-small-bottom">

                <div class="copyright uk-text-meta">
<!--                     Copyright © 2019 <?php bloginfo('name')?> • Theme by <a href="https://github.com/caitongbo/light">light</a> -->
					                    © 2019 Copyright • Theme by <a href="https://github.com/caitongbo/light"><?php bloginfo('name')?></a>
						<div>
							    <?php if (wpstorm('icp_num')){?><?php echo wpstorm('icp_num')?><?php }?>

					</div>
                </div>

            </div>
        </div>

    </footer>

    <?php wp_footer()?>
    </body>
    </html>
<?php }?>

