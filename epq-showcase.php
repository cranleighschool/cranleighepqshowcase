<?php

declare(strict_types=1);
/*
Plugin Name: Cranleigh EPQ Showcase
Plugin URI: https://www.cranleigh.org
Description: Cranleigh EPQ Showcase
Version: v1.0.0
Author: fredbradley
Author URI: https://www.cranleigh.org
License: GPL2
*/

namespace FredBradley\CranleighEPQShowcase;

if (!\defined('WPINC')) {
    exit;
}

require_once plugin_dir_path(__FILE__).'vendor/autoload.php';

new Plugin();
