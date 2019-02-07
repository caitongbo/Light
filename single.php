<?php get_header()?>
<?php if (have_posts()):while (have_posts()):the_post()?>
                        <div class="uk-card-body">

                            <article class="post">

                                <h1 class="article_title uk-h4 uk-margin-remove-bottom">
                                    <?php the_title()?>
                                </h1>

                                <hr>

                                <div class="article_content uk-margin-large-bottom">
                                    <?php the_content()?>
                                    <?php// include_once("inc/xianjian/xianjian_article_bottom.php"); ?>
                                </div>

                                <hr>
                                <?php comments_template()?>
                                <?php //include_once("inc/xianjian/xianjian_comment_bottom.php"); ?>
                            </article>
                            <?php include('aside.php');?>


                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</main>
    <footer class="copy uk-section  uk-background-muted uk-margin-remove-vertical  uk-padding-remove-vertical">
        <div class="uk-container text-center uk-margin-small-top">
            <div class="uk-scrollspy-inview uk-animation-slide-bottom-medium  uk-margin-small-bottom">

                <div class="copyright uk-text-meta">
                    作者:<?php the_author_posts_link(''); ?>
                </div>

            </div>
        </div>

    </footer>
<?php endwhile;endif;?>
<?php get_footer()?>