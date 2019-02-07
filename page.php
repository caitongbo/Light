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
            </div>

            <hr>

        </article>

    </div>

    </div>
    </div>

    </div>

    </div>
    </div>
    </main>

<?php endwhile;endif;?>
<?php get_footer()?>