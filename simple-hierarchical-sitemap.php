<?php

/*
Plugin Name: Simple Hierarchical Sitemap
Description: This plugin generates an HTML Sitemap in a hierarchical tree of the posts (and pages) ordered by category and then by title.
Author: LordPretender
Version: 1.2
Author URI: http://www.duy-pham.fr
Domain Path: /languages
*/

define ('SHS_DIR', rtrim(plugin_dir_path(__FILE__), '/') );
require( SHS_DIR . '/inc/class.shortcode.php'); // Classe principale

function SimpleHierarchicalSitemap_func( $atts ) {
	return class_exists( 'SimpleHierarchicalSitemapShortcode' ) ? new SimpleHierarchicalSitemapShortcode($atts) : "";
}
add_shortcode( 'simple_hierarchial_sitemap', 'SimpleHierarchicalSitemap_func' );


?>