<?php
/**
 * Plugin Name: Klarity section block
 * Plugin URI: https://github.com/Klarityorg/wp-plugin-section-block
 * Description: Klarity section block
 * Author: Klarity
 * Author URI: https://github.com/Klarityorg
 * Version: 1.1.0
 * License: MIT
 *
 * @package Klarity
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Block Initializer.
 */
require_once plugin_dir_path( __FILE__ ) . 'src/init.php';
