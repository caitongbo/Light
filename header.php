
<!--本页面共查询 <?php echo get_num_queries(); ?> 次，生成页面耗时<?php timer_stop(3); ?> 秒-->

<!DOCTYPE html>
<html lang="zh_hans">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<?php wp_head()?>
</head>
<body>
<?php wpstorm_alert();?>
<main class="uk-background-muted uk-section uk-padding-remove-bottom"  style="min-height: 252px; padding-top: 60px;">
    <div class="uk-container-small uk-container uk-margin-medium-bottom">
        <div class="uk-grid uk-grid-stack uk-first-column" uk-grid="">
            <div class="uk-width-1-1@s uk-first-column">
                <div class="uk-first-column">
                    <?php
                        $banner_img_id = cs_get_option('banner');
                        $banner_img_src= wp_get_attachment_image_src($banner_img_id,$size='full');
                    ?>
                    <div class="el-item uk-card uk-card-default uk-card-hover uk-scrollspy-inview uk-animation-slide-bottom-medium" style="">
                        <header data-src="<?php if (!empty($banner_img_id)): echo $banner_img_src[0]; else: echo 'https://bj-src.wpstorm.cn/2018/11/2018111806293896.png';endif;?>" class="uk-light uk-background-norepeat uk-position-relative uk-background-cover uk-background-bottom-center uk-section uk-section-xlarge uk-padding-remove-bottom"
                                style="background-image: url('<?php if (!empty($banner_img_id)): echo $banner_img_src[0]; else: echo 'https://bj-src.wpstorm.cn/2018/11/2018111806293896.png';endif;?>');height:240px"  uk-img="">

                            <a href="<?php bloginfo('url')?>" class="uk-h3 uk-position-center-right uk-margin-large-right text-right">
                                <h1 class="uk-h3"><?php bloginfo('name')?></h1>
                                <div class="desc uk-text-meta "><?php bloginfo('description')?></div>
                            </a>


                            <div class="uk-position-bottom-right uk-margin-medium-right">

                                <ul class="uk-navbar-nav ">
                                    <?php wp_menu('main_menu')?>
                                </ul>

                            </div>

                            <div class="uk-position-center-right">

                            </div>


                        </header>