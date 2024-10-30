<?php
/**
 * Blocks Initializer
 *
 * Enqueue CSS/JS of all the blocks.
 *
 * @since   1.0.0
 * @package Klarity
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue Gutenberg block assets for both frontend + backend.
 *
 * @uses {wp-editor} for WP editor styles.
 * @since 1.0.0
 */
function klarity_section_container_assets() { // phpcs:ignore
	// Styles.
	wp_enqueue_style(
		'klarity_section_container-css', // Handle.
		plugins_url( 'dist/blocks.style.build.css', __DIR__), // Block style CSS.
		['wp-editor'], // Dependency to include the CSS after it.
    filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.style.build.css' ) // Version: File modification time.
	);
}

// Hook: Frontend assets.
add_action( 'enqueue_block_assets', 'klarity_section_container_assets' );

/**
 * Enqueue Gutenberg block assets for backend editor.
 *
 * @uses {wp-blocks} for block type registration & related functions.
 * @uses {wp-element} for WP Element abstraction — structure of blocks.
 * @uses {wp-i18n} to internationalize the block's text.
 * @uses {wp-editor} for WP editor styles.
 * @since 1.0.0
 */
function klarity_section_container_editor_assets() { // phpcs:ignore
	// Scripts.
	wp_enqueue_script(
		'klarity_section_container-js', // Handle.
		plugins_url( '/dist/blocks.build.js', __DIR__), // Block.build.js: We register the block here. Built with Webpack.
		['wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor'], // Dependencies, defined above.
		 filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.build.js' ), // Version: File modification time.
		true // Enqueue the script in the footer.
	);

	// Styles.
	wp_enqueue_style(
		'klarity_section_container-editor-css', // Handle.
		plugins_url( 'dist/blocks.editor.build.css', __DIR__), // Block editor CSS.
		['wp-edit-blocks'], // Dependency to include the CSS after it.
		 filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.editor.build.css' ) // Version: File modification time.
	);
}

// Hook: Editor assets.
add_action( 'enqueue_block_editor_assets', 'klarity_section_container_editor_assets' );
