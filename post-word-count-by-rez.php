<?php
/*
* Plugin Name: Post Words Count By Rez
<!-- * Plugin URI:        https://example.com/plugins/the-basics/ -->
* Description: Count your Wordpress post words.
* Version: 1.0.
* Requires at least: 5.2
* Requires PHP: 7.2
* Author: Rezwanul Haque
<!-- * Author URI:        https://author.example.com/ -->
<!-- * License: GPL v2 or later -->
<!-- * License URI:       https://www.gnu.org/licenses/gpl-2.0.html -->
<!-- * Update URI:        https://example.com/my-plugin/ -->
* Text Domain: pwc-by-rez
* Domain Path: /languages
*/

add_action('plugin_loaded', 'pwcbr_loadtextdomain');
function pwcbr_loadtextdomain()
{
   load_plugin_textdomain('pwc-by-rez', false, dirname(__FILE__) . "/languages");
}

add_filter('the_content', 'pwcbr_count_words');

function pwcbr_count_words($content)
{
   $stripped_content = strip_tags($content);
   $words = str_word_count($stripped_content);
   $label = __('Total number of words', 'pwc-by-rez');
   $content .= sprintf('<h2>%s: %s</h2>', $label, $words);
   return $content;
}
