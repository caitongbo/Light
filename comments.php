<?php
/**
 * Created by PhpStorm.
 * User: wam
 * Date: 2018/11/12
 * Time: 13:26
 */
?>
<?php
if ( post_password_required() )
    return;
?>
<div id="comments" class="uk-margin-large-top article_comments">
    <h2 class="uk-h3 uk-heading-bullet uk-margin-medium-bottom"><?php echo number_format_i18n( get_comments_number() );?>条评论</h2>
    <ul class="uk-comment-list">
        <?php if ( !comments_open() ) { ?>

            <li class="tip-box"><p>评论功能已经关闭!</p></li>

        <?php } else if ( post_password_required() ) { ?>

            <li class="tip-box"><p>请输入密码再查看评论内容!</p></li>
            
        <?php } else { wp_list_comments( array(
            'style'       => 'ul',
            'short_ping'  => true,
            'avatar_size' => 48,
            'type'        =>'comment',
            'callback'    =>'simple_comment',
        ) ); } ?>
    </ul>

    <nav class="navigation comment-navigation u-textAlignCenter" data-fuck="400">
        <?php the_comments_pagination(['prev_text'=>'<span uk-icon="icon: chevron-left"></span>', 'next_text'=>'<span uk-icon="icon: chevron-right"></span>','screen_reader_text'=>' ']); ?>
    </nav>
    <?php if(comments_open()) : ?>
    <div id="respond" class="comment-respond">
        <h3 id="reply-title" class="uk-h4 uk-margin-medium-top comment-reply-title">发表评论
            <small>
                <?php cancel_comment_reply_link('取消回复'); ?>
            </small>
        </h3>
        <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
            <p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
        <?php else : ?>
        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" class="uk-form-stacked comment-form" novalidate="">
            <?php if ( $user_ID ) : ?>
                <p class="logged-in-as">已登陆
                    <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php the_author()?></a>.
                    <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="退出当前登录账号">注销?</a>
                </p>

                <p class="comment-form-comment">
                    <textarea class="uk-textarea" id="comment" name="comment" cols="45" rows="8" required aria-required="true"></textarea>
                </p>
            <?php else : ?>
            <p class="comment-form-comment">
                <textarea placeholder="评论" class="uk-textarea" id="comment" name="comment" cols="45" rows="8" required="" aria-required="true"></textarea>
            </p>
            <div class="uk-grid uk-child-width-1-3" uk-grid="">
                <p class="comment-form-author uk-first-column">
                    <input placeholder="昵称*" class="uk-input" id="author" name="author" type="text" value="" size="30" required="" aria-required="true">
                </p>
                <p class="comment-form-email">
                    <input placeholder="邮箱*" class="uk-input" id="email" name="email" type="email" value="" size="30" required="" aria-required="true">
                </p>
                <p class="comment-form-url">
                    <input placeholder="网址(选填)" class="uk-input" id="url" name="url" type="url" value="" size="30">
                </p>
            </div>
            <?php endif; ?>
            <p class="form-submit">
                <button id="submit" class="uk-button uk-button-primary submit" name="submit">发表评论</button>
            </p>
            <input type="hidden" name="comment_post_ID" value="400" id="comment_post_ID">
            <input type="hidden" name="comment_parent" id="comment_parent" value="0">
            <?php comment_id_fields(); ?>
        </form>
    </div><!-- #respond -->
<?php endif; ?>
</div>
<?php endif; ?>

