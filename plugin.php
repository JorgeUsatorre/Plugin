<?php
/**
 * @package JorgeUsatorre Words
 * @version 0.0.1
 */
/*
Plugin Name: JorgeUsatorre Words
Plugin URI: http://wordpress.org/plugins/jorgeusatorre-words/
Description: This plugin is a test for the WordPress plugin development course.
Author: JorgeUsatorre
Version: 0.0.1
*/

# List of offensive words
$palabrasmalas= [
    "retrasado",
    "feo",
    "fea",
    "gilipollas"
];
$palabrasbuenas = [
    "incompetente",
    "guapo",
    "guapa",
    "paleto"
];

/**
 * Whenever the word WordPress appears in the content
 * of a post or a page,
 * it will be replaced by WordPressDAM.
 * @param $text string
 * @return string
 */
function jorgeusatorre_wordpress_typo_fix( $text ) {
    global $palabrasmalas, $palabrasbuenas;
    return str_replace( $palabrasmalas, $palabrasbuenas, $text );
}

add_filter('the_content', 'jorgeusatorre_wordpress_typo_fix');

