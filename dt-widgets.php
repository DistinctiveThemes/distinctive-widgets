<?php
/*
	Plugin Name: Distinctive Widgets
	Plugin URI: http://www.distinctivethemes.com
	Description: Supplementary widget pack for use with Distinctive Themes items.
	Author: Distinctive Themes
	Version: 1.0	
	Author URI: http://www.distinctivethemes.com

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
*/

/* Exit if accessed directly
 ***********************************************************************************/
	if ( !defined('ABSPATH')) exit;


/* Load options panel and define Constants
 ***********************************************************************************/
	define( 'DISTINCTIVETHEMES_WIDGETS_VERSION', '1.0');
	define( 'DISTINCTIVETHEMES_WIDGETS_DIR', dirname(__FILE__) );
	define( 'DISTINCTIVETHEMES_WIDGETS_URL', plugins_url().'/distinctive-widgets' );
	$distinctive_themes_options = get_option('dt_options');


/* Setup Style and Textdomain
 ***********************************************************************************/
	function distinctive_themes_widgetpack_lang() {
		load_plugin_textdomain('distinctive_themes-widget-pack', false, DISTINCTIVETHEMES_WIDGETS_DIR . '/lang');
	}
	add_action( 'after_setup_theme', 'distinctive_themes_widgetpack_lang' );
 
	function distinctive_themes_widgetpack_style() {
		wp_enqueue_style('distinctive_themes-widget-css', DISTINCTIVETHEMES_WIDGETS_URL .'/css/style.css');
	}
	add_action( 'wp_enqueue_scripts', 'distinctive_themes_widgetpack_style' );
	
	
/* Load style file for wp-admin/widgets.php
 ***********************************************************************************/
	function distinctive_themes_widgetpage_style() {
		wp_enqueue_style('distinctive_themes-customfields-style', DISTINCTIVETHEMES_WIDGETS_URL .'/admin/widgetspage_style.css' );
	}
	add_action('admin_head-widgets.php', 'distinctive_themes_widgetpage_style');


/* Setup Each Index
 ***********************************************************************************/

	$distinctive_themes_default_option = array(
		'about_widget' 		=> 1,
		'contact_info' 		=> 1,
		'archive_widget' 	=> 1,
		'ajaxtabs' 			=> 1,
		'authorbadge' 		=> 1,
		'feedburner' 		=> 1,
		'flickrrss' 		=> 1,
		'relatedposts' 		=> 1,
		'share' 			=> 1,
		'social' 			=> 1,
		'text_widget' 		=> 1,
		'popular_random' 	=> 1,
		'recent_tweets' 	=> 1,
		'simple_ad' 		=> 1,
	);

	if (false === $distinctive_themes_options) {
		$distinctive_themes_options = $distinctive_themes_default_option;
	}


/* Also make sure each index exists before comparing it
 ***********************************************************************************/
	
	if (isset($distinctive_themes_options['about_widget']) && $distinctive_themes_options['about_widget'] == 1) {
		require_once (DISTINCTIVETHEMES_WIDGETS_DIR . '/widget-about.php');
	} 	
 
	if (isset($distinctive_themes_options['contact_info']) && $distinctive_themes_options['contact_info'] == 1) {
		require_once (DISTINCTIVETHEMES_WIDGETS_DIR . '/widget-address.php');
	}

	//if (isset($distinctive_themes_options['ajaxtabs']) && $distinctive_themes_options['ajaxtabs'] == 1) {
		//require_once (DISTINCTIVETHEMES_WIDGETS_DIR . '/widget-ajaxtabs.php');
	//}

	if (isset($distinctive_themes_options['authorbadge']) && $distinctive_themes_options['authorbadge'] == 1) {
		require_once (DISTINCTIVETHEMES_WIDGETS_DIR . '/widget-authorbadge.php');
	}

	if (isset($distinctive_themes_options['feedburner']) && $distinctive_themes_options['feedburner'] == 1) {
		require_once (DISTINCTIVETHEMES_WIDGETS_DIR . '/widget-feedburner.php');
	}

	if (isset($distinctive_themes_options['flickrrss']) && $distinctive_themes_options['flickrrss'] == 1) {
		require_once (DISTINCTIVETHEMES_WIDGETS_DIR . '/widget-flickr.php');
	}

	if (isset($distinctive_themes_options['search']) && $distinctive_themes_options['search'] == 1) {
		require_once (DISTINCTIVETHEMES_WIDGETS_DIR . '/widget-search.php');
	}

	if (isset($distinctive_themes_options['social']) && $distinctive_themes_options['social'] == 1) {
		require_once (DISTINCTIVETHEMES_WIDGETS_DIR . '/widget-social.php');
	}

	if (isset($distinctive_themes_options['text_widget']) && $distinctive_themes_options['text_widget'] == 1) {
		require_once (DISTINCTIVETHEMES_WIDGETS_DIR . '/widget-text.php');
	}

	if (isset($distinctive_themes_options['popular_random']) && $distinctive_themes_options['popular_random'] == 1) {
		require_once (DISTINCTIVETHEMES_WIDGETS_DIR . '/widget-pop-rand-rcnt.php');
	}
	
	if (isset($distinctive_themes_options['simple_ad']) && $distinctive_themes_options['simple_ad'] == 1) {
		require_once (DISTINCTIVETHEMES_WIDGETS_DIR . '/widget-simple-ad.php');
	}