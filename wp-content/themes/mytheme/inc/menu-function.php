<?php



function display_menu($_location)
{
    $location =  get_nav_menu_locations($_location); // lay nhung location da gan menu vao
    $output = '';
    //dd($location);

    if ($location['primary'] != '0') {
        $menu = get_term($location['primary']);

        $menu_items = wp_get_nav_menu_items($menu->term_id);
        foreach ($menu_items as $row) {
            $haschild = false;
            $parent_id = $row->ID;
            foreach ($menu_items as $sub_menu) {
                if ($sub_menu->menu_item_parent == $parent_id) {
                    $haschild = true;
                    break;
                }
            }
            if ($haschild) {
                $output .= '<div class="nav-item dropdown">
                            <a href="' . $row->url . '" class="nav-link dropdown-toggle" data-toggle="dropdown">' . $row->title . '</a>
                            <div class="dropdown-menu">';



                foreach ($menu_items as $sub) {
                    if ($sub->menu_item_parent == $parent_id) {
                        $output .= '<a href="' . $sub->url . '" class="dropdown-item">' . $sub->title . '</a>';
                    }
                }
                $output .= '</div></div>';
            } else {
                if ($row->menu_item_parent == 0) {
                    $output .= '<a href="' . $row->url . '" class="nav-item nav-link active" data-toggle="">' . $row->title . '</a>';
                }
            }
        }
        $output .= '</div>';
    } else {
        $output .= '<a href="/wordpress" class="nav-item nav-link active">Home</a>
        </div>';
    }
    echo $output;
}
function display_social_menu($_location)
{
    $location =  get_nav_menu_locations($_location); // lay nhung location da gan menu vao
    $output = '';
    if (array_key_exists('social', $location)) {
        $menu_social = get_term($location['social']);
        $menu_items_social = wp_get_nav_menu_items($menu_social->term_id);
        foreach ($menu_items_social as $menu_social) {
            $output .= ' <a href="' . $menu_social->url . '">' . $menu_social->title . '</i></a>';
        }
    }
    echo $output;
}
function display_footer_menu($_location)
{
    $location =  get_nav_menu_locations(); // lay nhung location da gan menu vao
    $output = '';
    if (array_key_exists('secondary', $location)) {
        $menu = get_term($location['secondary']);
        $menu_footer_items = wp_get_nav_menu_items($menu->term_id);
        foreach ($menu_footer_items as $menu_footer) {
            $output .= '

            <a href="' . $menu_footer->url . '">' . $menu_footer->title . '</a>';
        }
    }
    echo $output;
}
