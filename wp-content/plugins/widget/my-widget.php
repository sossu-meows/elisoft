<?php

/**
 * Plugin Name: My Widget
 */


class My_Widget extends WP_Widget
{

    public function __construct()
    {
        // actual widget processes
        parent::__construct(
            // widget ID
            'my_widgets',
            // widget name
            'My Custom Widgets',
            // widget description
            array('description' => __('Display custom widget from khoa', 'text domain'),)
        );
    }

    public function widget($args, $instance)
    {
        // outputs the content of the widget
        //dd($argc);
        //echo "Toi day roi";
        //dd($instance);
        echo $args['before_widget'];

        echo $args['before_title'];
        echo $instance['title'];
        echo $args['after_title'];
        echo $instance['text'];
        echo $args['after_widget'];
    }

    public function form($instance)
    {
        // outputs the options form in the admin

        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('', 'text_domain');
        $text = !empty($instance['text']) ? $instance['text'] : esc_html__('', 'text_domain');
        // lấy giá trị title và text
?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_html__('Title:', 'text_domain'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('Text')); ?>"><?php echo esc_html__('Text:', 'text_domain'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('text')); ?>" name="<?php echo esc_attr($this->get_field_name('text')); ?>" type="text" cols="30" rows="10"><?php echo esc_attr($text); ?></textarea>
        </p>
<?php
    }

    public function update($new_instance, $old_instance)
    {
        // processes widget options to be saved
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['text'] = (!empty($new_instance['text'])) ? $new_instance['text'] : '';
        return $instance;
    }
}
add_action('widgets_init', function () {
    register_widget('My_Widget');
});
