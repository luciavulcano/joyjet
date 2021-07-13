<?php
/**
* esse arquivo deve ser incluido no arquivo functions
* Get custom css to wp admin page
*/

add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
    echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/css/admin/custom-admin-styles.css" />';
}
