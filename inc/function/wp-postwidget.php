<?php
class SaidWidget extends WP_Widget {
function __construct() {
    // Instantiate the parent object
    parent::__construct(
    // 小工具ID
        'one_said',
        // 小工具名称
        "【eyestorm】一句话的事",
        // 小工具选项
        array (
            'description' => "留下一句话"
        )
    );
}
function widget( $args, $instance ) {
    // Widget output
    // kick things off
    $title = $instance['title'];
    $url = $instance[ 'depth' ];
    $text = $instance[ 'text' ];
    extract( $args );
    echo $before_widget;
    ?>
    <div class="widget uk-grid-margin uk-first-column">
        <div class="uk-panel" id="module-100">

            <h3 class="uk-h4 uk-heading-line">

                <span><?php echo $title; ?></span>

            </h3>


            <div class="custom"><div class="uk-panel uk-padding uk-background-muted uk-text-center">
                    <blockquote>
                        <p>“<?php echo $text; ?>“</p>
                        <footer class="uk-margin-top"><?php echo $url; ?></footer>
                    </blockquote>
                </div>
            </div>

        </div>
    </div>
    <?php
}
function update( $new_instance, $old_instance ) {
    // Save widget options
    $instance = $old_instance;
    $instance[ 'depth' ] = strip_tags( $new_instance[ 'depth' ] );
    $instance[ 'text' ] = strip_tags( $new_instance[ 'text' ] );
    $instance['title'] = strip_tags($new_instance['title']);
    return $instance;
}
function form( $instance ) {
// Output admin widget options form
$defaults = array(
    'depth' => '-1'
);
$title = $instance['title'];
$depth = $instance[ 'depth' ];
$text = $instance[ 'text' ];
// markup for form
?>
<p>
    <label for="<?php echo $this->get_field_id('title'); ?>">标题</label>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id( 'depth' ); ?>">作者</label>
    <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'depth' ); ?>" name="<?php echo $this->get_field_name( 'depth' ); ?>" value="<?php echo esc_attr( $depth ); ?>">
</p>
    <p>
        <label for="<?php echo $this->get_field_id( 'text' ); ?>">内容</label>
        <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>"><?php echo esc_textarea( $text ); ?></textarea>
    </p>
<?php
    }
}
function register_said_widgets() {
    register_widget( 'SaidWidget' );
}
add_action( 'widgets_init', 'register_said_widgets' );


