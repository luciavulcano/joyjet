<?php
/**
* Remove meta tag <meta name="generator" content="" />
*/
remove_action('wp_head', 'wp_generator');
