<?php get_header()?>
                        <section class="uk-card-body uk-background-muted">
                            <h1 class="uk-h2 ">
                                <?php the_archive_title()?>
                            </h1>
                        </section>

                        <main class="article-list uk-card-body">
                            <?php if (have_posts()):while (have_posts()):the_post()?>
                            <article class="article-item uk-margin-small-top uk-margin-small-bottom">
                                <div class="uk-grid" uk-grid>
                                    <a class="uk-width-expand" href="<?php the_permalink()?>">
                                        <h2 class="article_title uk-h5">
                                            <?php the_title()?>
                                        </h2>
                                    </a>
                                    <div class=" article-meta text-right uk-width-expand uk-visible@m">
                                        <span class="item uk-text-meta font-size-lower uk-display-inline-block" >
                                            <time datetime="2018-11-17" class="font-size-lower"><?php the_time('Y-m-d')?></time>
                                        </span>
                                    </div>
                                </div>
                            </article>
                            <hr>
                            <?php endwhile;endif;?>
                            <?php eyestorm_pagination(); ?>
                        </main>

                    </div>
                </div>

            </div>

        </div>
    </div>

</main>
<?php get_footer()?>