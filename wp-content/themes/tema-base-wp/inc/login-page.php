<?php
/**
* esse arquivo deve ser incluido no arquivo functions
* Get custom css to login page
* Insert custom login css login page
* Get field from acf page options
*/
function my_custom_login() {
    echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/css/login/custom-login-styles.css" />';
    echo
    '<style type="text/css">
        h1 a {
            background-image: url('.get_field('logo_site', 'options'). ') !important;
         }
     </style>';
}
add_action('login_head', 'my_custom_login');


/**
* Text button login page
*
*/
add_action( 'login_form', 'change_text_button_login' );

function change_text_button_login() {
    add_filter( 'gettext', 'change_text_button_login_page', 10, 2 );
}

function change_text_button_login_page( $translation, $text ){
    if ( 'Log In' == $text ) {
        return 'ENTRAR';
    }
    return $translation;
}
