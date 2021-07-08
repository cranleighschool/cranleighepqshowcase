<?php
/*
Plugin Name: Cranleigh EPQ Showcase
Plugin URI: https://www.cranleigh.org
Description: Cranleigh EPQ Showcase
Version: 1.0.0
Author: fredbradley
Author URI: https://www.cranleigh.org
License: GPL2
*/

namespace FredBradley\CranleighEPQShowcase;

if ( ! defined( 'WPINC' ) ) {
	die;
}
require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

$plugin = new Plugin();
