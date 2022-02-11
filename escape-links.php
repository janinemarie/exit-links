<?php
/**
 * Plugin Name: Escape Links
 * Plugin URI: https://criticalhit.dev
 * Description: Adds shortcodes and JS to provide a quick site exit text link or button that helps hide user activity on this site from casual observers.
 * Version: 1.0.0
 * Author: Janine Paris
 * Author URI: https://criticalhit.dev
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

define( 'ESCAPE_LINK_VERSION', '1.0.0' );

/**
 * Enqueue plugin scripts and styles.
 */
function el_scripts() {

    wp_enqueue_script( 'escape-links', plugins_url('/escape-links.js', __FILE__), array(), null );
    wp_enqueue_style( 'escape-links', plugins_url('/escape-links.css', __FILE__), array(), null );
}
add_action( 'wp_enqueue_scripts', 'el_scripts' );

/** 
 * Add shortcode and handler for exit links
 * 
 * Recognized formats:
 * [exit-link] or [exit-link /]
 * [exit-link]Link Text[/exit-link]
 * [exit-link type=text]
 * [exit-link type=button]
 * 
 * If using both enclosing and self-closing instances of this 
 * shortcode on the same page, make sure to add a trailing forward 
 * slash (/) to the self-closing instances of the shortcode. 
 * 
 * The WordPress shortcode parser does not handle the mixing of 
 * enclosing and non-enclosing forms of the same shortcode and 
 * you will not get the results you want.
 * 
 * https://developer.wordpress.org/plugins/shortcodes/enclosing-shortcodes/#limitations
 *
 * @param array  $atts    Shortcode attributes. Default empty.
 * @return string Shortcode output.
 */



function el_exit_shortcode( $atts = array(), $content = null ) {
    $onclick = 'window.open(\'http://weather.com\');';
    
    // parse the args
    $atts = array_change_key_case( ( array ) $atts, CASE_LOWER ); // normalize attribute keys, lowercase
    $link_format = shortcode_atts( array(
        'type' => '',
    ), $atts );
    
    // parse the content
    if ( $content == null ) {
        $content = 'Exit Site';
    }
    
    $title = 'Quick Site Exit Link';
    $html = '';
    $html .= '<form method="POST" action="" class="el-escape-link">';
    $html .= '<input class="';
    
    switch ( $link_format['type'] ) {
        case '':
        case 'text':
            $html .= 'text';
        break;
        case 'button':
            $html .= 'button';
        break;
    }
    $html .= '" name="el_exit" type="submit" value="' . $content . '" title="' . $title . '" onclick="' . $onclick . '">';
    $html .= '</form>';
    
    return $html; // return the assembled link
}


/**
 * Initialize shortcode
 */
function el_shortcodes_init() {
    add_shortcode( 'exit-link', 'el_exit_shortcode' );
}
add_action( 'init', 'el_shortcodes_init' );