<?php
/**
 * Created by PhpStorm.
 * User: wam
 * Date: 2018/11/6
 * Time: 23:45
 */
function single_widgets_init() {
    register_sidebar(array(
        'name' => __( '文章页侧边栏', 'quickchic' ),
        'id' => 'single_widget',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
}
add_action( 'init', 'single_widgets_init' );
class Last_Posts_Widget extends WP_Widget {
    function __construct() {
        $widget_ops = array(
            'classname' => 'widget_recent_entries',
            'description' => __( '显示指定篇数的最新文章' ),
            'customize_selective_refresh' => true,
        );
        parent::__construct( 'last_posts', __( '【eyestorm】最新文章' ), $widget_ops );
        $this->alt_option_name = 'widget_recent_entries';
    }
    function widget( $args, $instance ) {
        if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        }

        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts' );

        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
        if ( ! $number ) {
            $number = 5;
        }


        /**
         * Filters the arguments for the Recent Posts widget.
         *
         * @since 3.4.0
         * @since 4.9.0 Added the `$instance` parameter.
         *
         * @see WP_Query::get_posts()
         *
         * @param array $args     An array of arguments used to retrieve the recent posts.
         * @param array $instance Array of settings for the current widget.
         */

        $r = new WP_Query( apply_filters( 'widget_posts_args', array(
            'posts_per_page'      => $number,
            'no_found_rows'       => true,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true,
        ), $instance ) );

        if ( ! $r->have_posts() ) {
            return;
        }
        ?>
        <div class="uk-card uk-card-default uk-card-hover uk-margin-medium-bottom uk-padding " >
        <div class="uk-panel" >
            <h3 class="uk-h4 uk-heading-line uk-blend-darken">
                <span><?php echo $title?></span>
            </h3>
            <?php foreach ( $r->posts as $recent_post ) : ?>
                <?php
                $post_title = get_the_title( $recent_post->ID );
                $title      = ( ! empty( $post_title ) ) ? $post_title : __( '(no title)' );
                ?>
            <div class="uk-margin-small-bottom uk-light uk-position-relative uk-inline-clip uk-transition-toggle" tabindex="0">
               <?php if (has_post_thumbnail($recent_post->ID)):?>
               <img class="uk-transition-scale-up uk-transition-opaque" src="<?php echo get_the_post_thumbnail_url($recent_post->ID)?>" srcset="" data-src="<?php echo get_the_post_thumbnail_url($recent_post->ID)?>" data-srcset="" alt="" style="width: 207px; height: 138px;">
               <?php else:?>
               <img class="uk-transition-scale-up uk-transition-opaque" src="http://eyestorm.oss-cn-beijing.aliyuncs.com/2018/11/c-2-1.png" srcset="" data-src="http://eyestorm.oss-cn-beijing.aliyuncs.com/2018/11/c-2-1.png" data-srcset="" alt="">
               <?php endif;?>
                <div class="mask uk-cover" style="background: #000;opacity: 0.4;"></div>
                <a class="el-content" title="" href="<?php the_permalink( $recent_post->ID ); ?>" >
                <div class="uk-position-center">
                    <h3 class="uk-margin-remove uk-h5"><?php echo $title ; ?></h3>
                </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
        </div>
        <?php
        echo $args['after_widget'];
    }
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['number'] = (int) $new_instance['number'];
        return $instance;
    }
    function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
        ?>
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
            <input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" /></p>
        <?php
    }
}
function register_lastposts_widgets() {
    register_widget( 'Last_Posts_Widget' );
}
add_action( 'widgets_init', 'register_lastposts_widgets' );