<?php get_header()?>
                        <div class="uk-card-body">

                            <section class="article-list">
                                <?php if (have_posts()):while (have_posts()):the_post()?>
                                <article class="article-item uk-margin-medium-top uk-margin-medium-bottom">

                                    <a href="<?php the_permalink()?>">
                                        <h2 class="article_title uk-h4">
                                            <?php the_title()?>
                                        </h2>
                                    </a>
                                    <div class="article-excerpt uk-text-meta uk-margin-small-bottom">
                                        <?php echo wp_trim_words(get_the_content(),100,'...')?>
                                    </div>

                                    <div class="article-meta">

                                            <span class="item uk-text-meta font-size-lower uk-display-inline-block" >
                                                <span uk-icon="icon: clock ; ratio:0.8"></span>
                                                <time datetime="2018-11-17" class="font-size-lower"><?php the_time('Y-m-d')?></time>
                                            </span>
                                            <span class="item uk-text-meta font-size-lower uk-display-inline-block">
                                                <?php the_tags('<span uk-icon="icon: tag  ; ratio:0.8"></span>')?>
                                            </span>
                                            <span class="item uk-text-meta font-size-lower uk-display-inline-block">
                                                 <span uk-icon="icon: comment  ; ratio:0.8"></span>
                                                <a href="<?php the_permalink()?>#respond" class="font-size-lower"><?php echo get_comments_number()?></a>
                                            </span>

                                    </div>
                                </article>
                                <hr>
                                <?php endwhile;endif;?>

                            </section>
                            <?php eyestorm_pagination(); ?>
                            <?php include('aside.php');?>

                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</main>
<?php get_footer()?>