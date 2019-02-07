<?php
function footer_widgets_init() {
    register_sidebar(array(
        'name' => __( '底部', 'footer' ),
        'id' => 'footer_widget',
        'before_widget' => '<div class="uk-width-expand@s"><div class="uk-text-left@s uk-text-center uk-panel tm-child-list uk-link-muted">',
        'after_widget' => '</div></div>',
        'before_title' => '<h3 class="el-title uk-h5">',
        'after_title' => '</h3>',
    ));
}
add_action( 'init', 'footer_widgets_init' );
class Footer_Menu_Widget extends WP_Widget {
    function __construct() {
        $widget_ops = array(
            'description' => __( '添加底部导航菜单' ),
            'customize_selective_refresh' => true,
        );
        parent::__construct( 'footer_menu', __('【eyestorm】底部导航菜单'), $widget_ops );
    }

    function widget( $args, $instance ) {
        // Get menu
        $nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;

        if ( ! $nav_menu ) {
            return;
        }

        $title = ! empty( $instance['title'] ) ? $instance['title'] : '';

        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        echo $args['before_widget'];

        if ( $title ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        $defaults = array(
            'theme_location'  => '',
            'menu'            => $nav_menu,
            'container'       => '',
            'container_class' => '',
            'container_id'    => '',
            'menu_class'      => 'categories-module',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
            'depth'           => 0,
            'walker'          => ''
        );

        wp_nav_menu( apply_filters( 'widget_nav_menu_args', $defaults, $nav_menu, $args, $instance ) );

        echo $args['after_widget'];
    }
    function update( $new_instance, $old_instance ) {
        // Save widget options
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['nav_menu'] = strip_tags($new_instance['nav_menu']);
        return $instance;
    }
    function form( $instance ) {
        $title = isset( $instance['title'] ) ? $instance['title'] : '';
        $nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';

        // Get menus
        $menus = wp_get_nav_menus();

        // If no menus exists, direct the user to go and create some.
        ?>
        <div class="nav-menu-widget-form-controls" <?php if ( empty( $menus ) ) { echo ' style="display:none" '; } ?>>
            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>">标题</label>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'nav_menu' ); ?>"><?php _e( 'Select Menu:' ); ?></label>
                <select id="<?php echo $this->get_field_id( 'nav_menu' ); ?>" name="<?php echo $this->get_field_name( 'nav_menu' ); ?>">
                    <option value="0"><?php _e( '&mdash; Select &mdash;' ); ?></option>
                    <?php foreach ( $menus as $menu ) : ?>
                        <option value="<?php echo esc_attr( $menu->term_id ); ?>" <?php selected( $nav_menu, $menu->term_id ); ?>>
                            <?php echo esc_html( $menu->name ); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </p>
        </div>
        <?php
    }
}
function register_footer_widgets() {
    register_widget( 'Footer_Menu_Widget' );
}
add_action( 'widgets_init', 'register_footer_widgets' );