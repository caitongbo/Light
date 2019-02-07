<?php
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
class Single_Cat_Widget extends WP_Widget {
    function __construct() {
        // Instantiate the parent object
        parent::__construct(
        // 小工具ID
            'cat_list',
            // 小工具名称
            "【eyestorm】文章分类",
            // 小工具选项
            array (
                'description' => "文章分类目录的列表"
            )
        );
    }
    function widget( $args, $instance ) {
        $title = $instance['title'];
        extract( $args );
        ?>
        <div class="uk-grid-margin uk-first-column">
            <div class="uk-panel tm-child-list" id="module-113">

                <h3 class="uk-h4 uk-heading-line">

                    <span><?php echo $title?></span>

                </h3>


                <ul class="tagspopular">
                    <?php
                    $term       = get_term( $tag_id, 'category');
                    $term_url   = get_term_link($term);
                    $children   = get_terms(array(
                        'taxonomy'      =>  'category',
                        'hide_empty'    =>  true,
                        'parent'        =>  $tag_id
                    ));
                    ?>

                    <?php foreach( $children as $chd ) : ?>
                        <li><a href="<?php echo get_term_link($chd, 'product_cat'); ?>"><?php echo $chd->name; ?></a></li>
                    <?php endforeach; ?>

                </ul>

            </div>
        </div>
        <?php
    }
    function update( $new_instance, $old_instance ) {
        // Save widget options
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }
    function form( $instance ) {
        // Output admin widget options form
        $defaults = array(
            'depth' => '-1'
        );
        $title = $instance['title'];
        // markup for form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">标题</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <?php
    }
}
function register_widgets() {
    register_widget( 'Single_Cat_Widget' );
}
add_action( 'widgets_init', 'register_widgets' );