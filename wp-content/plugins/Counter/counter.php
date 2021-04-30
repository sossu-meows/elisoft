<?php

/**
 * Plugin Name: Widget Couter 

 */
class Widget_Counter extends WP_Widget
{

    function __construct()
    {

        parent::__construct(
            'widget-counter',  // Base ID
            'Widget Counter',   // Name
            array('description' => __('Đây là mô tả cuar Widget counter', 'text_domain'),) // Args
        );

        add_action('widgets_init', function () {
            register_widget('Widget_Counter');
        });
    }

    public $args = array(
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
        'before_widget' => '<div class="widget-wrap">',
        'after_widget'  => '</div></div>'
    );

    public function widget($args, $instance)
    {


        echo $args['before_widget'];

        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }

        echo '<div class="textwidget">';

        $numlength = strlen((string)countall());
        $numlength_now = strlen((string)countnow());
        $numlength_week = strlen((string)countweek());
        $numlength_month = strlen((string)countmonth());
        $numlength_year = strlen((string)countyear());
        $numa = (int)$instance['minimum_length'];

        $them_so = "";
        $them_so_now = "";
        $them_so_week = "";
        $them_so_month = "";
        $them_so_year = "";
        for ($i = $numlength; $i < $numa; $i++) {
            $them_so = $them_so . "0";
        }
        for ($i = $numlength_now; $i < $numa; $i++) {
            $them_so_now = $them_so_now . "0";
        }
        for ($i = $numlength_week; $i < $numa; $i++) {
            $them_so_week = $them_so_week . "0";
        }
        for ($i = $numlength_month; $i < $numa; $i++) {
            $them_so_month = $them_so_month . "0";
        }
        for ($i = $numlength_year; $i < $numa; $i++) {
            $them_so_year = $them_so_year . "0";
        }
        echo '<p>All view: ' . $them_so . countall() . ' </p>   ';
        if ($instance['by_day'] == 'yes') echo '<p>This day: ' . $them_so_now . countnow() . ' </p>   ';
        if ($instance['by_week'] == 'yes') echo '<p>This week: ' . $them_so_week . countweek() . ' </p>  ';
        if ($instance['by_month'] == 'yes') echo '<p>This Month: ' . $them_so_month . countmonth() . ' </p>   ';
        if ($instance['by_year'] == 'yes') echo '<p>This Year: ' . $them_so_year . countyear() . ' </p>   ';

        echo '</div>';

        echo $args['after_widget'];
    }

    public function form($instance)
    {

        $instance = wp_parse_args(
            (array) $instance,
            // The default options.
            array(
                'by_day' => 'yes', // chọn (mặc định)
                'by_week' => 'yes',  // không chọn thì là no (mặc định)
                'by_month' => 'yes',
                'by_year' => 'yes',
                'img' => 'yes'
            )
        );
        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('', 'text_domain');
        $text = !empty($instance['minimum_length']) ? $instance['minimum_length'] : esc_html__('', 'text_domain');





?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_html__('Title:', 'text_domain'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('Text')); ?>"><?php echo esc_html__('Minimum length:', 'text_domain'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('minimum_length')); ?>" name="<?php echo esc_attr($this->get_field_name('minimum_length')); ?>" type="number" cols="30" rows="10" min="5" max="10" value="<?php echo esc_attr($text); ?>"><?php echo esc_attr($text); ?></textarea>
        </p>
        <p>

            <input type="checkbox" id="<?php echo $this->get_field_id('by_day'); ?>" name="<?php echo $this->get_field_name('by_day'); ?>" value="yes" <?php checked('yes', $instance['by_day']); ?>>
            <label for="<?php echo $this->get_field_id('by_day'); ?>">By Day</label><br><br>

            <input type="checkbox" id="<?php echo $this->get_field_id('by_week'); ?>" name="<?php echo $this->get_field_name('by_week'); ?>" value="yes" <?php checked('yes', $instance['by_week']); ?>>
            <label for="<?php echo $this->get_field_id('by_week'); ?>">By Week </label><br><br>

            <input type="checkbox" id="<?php echo $this->get_field_id('by_month'); ?>" name="<?php echo $this->get_field_name('by_month'); ?>" value="yes" <?php checked('yes', $instance['by_month']); ?>>
            <label for="<?php echo $this->get_field_id('by_month'); ?>">By Month </label><br><br>

            <input type="checkbox" id="<?php echo $this->get_field_id('by_year'); ?>" name="<?php echo $this->get_field_name('by_year'); ?>" value="yes" <?php checked('yes', $instance['by_year']); ?>>
            <label for="<?php echo $this->get_field_id('by_year'); ?>">By Year </label><br><br>

            <input type="checkbox" id="<?php echo $this->get_field_id('img'); ?>" name="<?php echo $this->get_field_name('img'); ?>" value="yes" <?php checked('yes', $instance['img']); ?>>
            <label for="<?php echo $this->get_field_id('img'); ?>">With IMG </label><br>

        </p>
<?php

    }
    public function update($new_instance, $old_instance)
    {

        $instance = array();

        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['minimum_length'] = (!empty($new_instance['minimum_length'])) ? $new_instance['minimum_length'] : '';



        $instance['by_day'] = isset($new_instance['by_day']) ? 'yes' : 'no';
        $instance['by_week'] = isset($new_instance['by_week']) ? 'yes' : 'no';
        $instance['by_month'] = isset($new_instance['by_month']) ? 'yes' : 'no';
        $instance['by_year'] = isset($new_instance['by_year']) ? 'yes' : 'no';
        $instance['img'] = isset($new_instance['img']) ? 'yes' : 'no';

        return $instance;
    }
}
$my_widget = new Widget_Counter();
add_action('widgets_init', 'wpdocs_register_widgets');
function wpdocs_register_widgets()
{
    register_widget('Widget_Counter');
}
//add shortcode


/// tao bang
function roytuts_on_activation()
{

    global $wpdb;

    $table_name = $wpdb->prefix . 'prefix_counter';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
            id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            count_view int not null,
            created_at date  not null) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
// xoa table
register_activation_hook(__FILE__, 'roytuts_on_activation');

register_deactivation_hook(__FILE__, 'my_plugin_remove_database');

function my_plugin_remove_database()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'prefix_counter';
    $sql = "DROP TABLE IF EXISTS $table_name";
    $wpdb->query($sql);
    delete_option("my_plugin_db_version");
}






// count  
function countall()
{

    global $wpdb;

    $table_name = $wpdb->prefix . 'prefix_counter';
    $sql = "SELECT sum(count_view) as allview FROM $table_name";
    return $wpdb->get_var($sql);
}
//
function countnow()
{

    global $wpdb;
    $table_name = $wpdb->prefix . 'prefix_counter';
    $sql = "SELECT count_view FROM `wp_prefix_counter`  where created_at = (SELECT CURDATE() today)";
    return $wpdb->get_var($sql);
}
function countweek()
{

    global $wpdb;
    $table_name = $wpdb->prefix . 'prefix_counter';
    $sql = "SELECT sum(`count_view`) as WEEKVIEW FROM `wp_prefix_counter` WHERE WEEK(`created_at`) = WEEK(CURDATE())";
    return $wpdb->get_var($sql);
}
function countmonth()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'prefix_counter';
    $sql = "SELECT sum(`count_view`) as MONTHVIEW FROM wp_prefix_counter WHERE MONTH(`created_at`) = MONTH(CURDATE())";
    return $wpdb->get_var($sql);
}
function countyear()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'prefix_counter';
    $sql = "SELECT SUM(`count_view`) FROM `wp_prefix_counter` WHERE YEAR(`created_at`) = YEAR(CURDATE());";
    return $wpdb->get_var($sql);
}
